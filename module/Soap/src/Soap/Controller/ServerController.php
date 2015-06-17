<?php

namespace Soap\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server as SoapServer;
use Soap\Service\OlaMundo;
use Zend\Soap\Zend\Soap;

/**
 * Class server soap
 * 
 * @author leandro
 */
class ServerController extends AbstractActionController
{

    /**
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
	public function indexAction() {
    	
        if (isset($_GET['wsdl'])) {

        	$this->handleWSDL();
        	
        } else {
            
        	$this->handleSOAP();
        }
        $view = new ViewModel();
        $view->setTerminal(true);
        exit();
    }

    /**
     * Gerador do WSDL
     */
    public function handleWSDL() {

        $autodiscover = new AutoDiscover();

        // aponta a classe que será carragada o WSDL
        $autodiscover->setClass('\Soap\Service\OlaMundo');

        // Setamos o Uri de retorno sem o parâmetro ?wdsl
        $autodiscover->setUri('http://'.$_SERVER['HTTP_HOST'].'/server-soap/index');
        $wsdl = $autodiscover->generate();
        $wsdl = $wsdl->toDomDocument();

        header('Content-type: application/xml');
        echo $wsdl->saveXML();
    }

    /**
     * Recebe as requisições externas
     */
    public function handleSOAP() {
    	
    	$options = array(
    			'cache_wsdl'     => WSDL_CACHE_NONE,
    			'uri'            => 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/index',
    			'location'       => 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/index',
    	);
    	
    	$wsdl = 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/index?wsdl';
    	
    	$server = new SoapServer($wsdl, $options);
    	$server->setObject(new OlaMundo());
    	$server->handle();
   }
}