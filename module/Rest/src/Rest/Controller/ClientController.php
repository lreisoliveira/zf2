<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Client as HttpClient;
use Zend\View\Model\JsonModel;

/**
 * Class client rest
 *  
 * @author leandro
 */
class ClientController extends AbstractRestfulController
{

    /**
     * Exemplo de consumo de webservice rest
     *
     * @param mixed $id | Neste exemplo representa o verbo http
     * @return \Zend\Http\Response|\Zend\Stdlib\ResponseInterface
     */
    public function get($id)
    {

        $client = new HttpClient();
        $client->setAdapter('Zend\Http\Client\Adapter\Curl');
        
        // json | xml | html
        $format = $this->getEvent()->getRouteMatch()->getParam('format');
        
        if ($format == 'json' || $format == 'xml')
        	$contentType = "application/$format";
        else 
        	$contentType = 'text/html';
        
        // url do service
        $url = "http://zf2/server-rest.$format/1";
        	 
        // define a url do service
        $client->setUri($url);
        
        // define os headers
        $client->setHeaders(
	        		array(
		        		'Host' 				=> 'www.example.com',
		        		'Accept-encoding' 	=> 'gzip,deflate',
		        		'X-Powered-By' 		=> 'Zend Framework',
		        		'Content-Type' 		=> $contentType
	        		)
        		);
        
        // define o verbo: POST | PUT | DELETE | GET
        $client->setMethod($id);
        
        // define os parametros
        $client->setParameterGET(array('meuParametro'=>$id));
        
        // envia a requisicao
        $response = $client->send();
        
        // dados de envio
        $request = $client->getRequest();
        
        //echo "<br/> Requisição: <br/><br/>";
        //echo $request->toString() . '<br/>';

        // dados de resposta
        //$response = $client->getResponse();
        
        //echo '<br/>------------------- <br/>';
        
        //echo "<br/> Resposta: <br/><br/>";
		//echo 'Status ' . $response->getStatusCode();
        //echo "<br/>";
		//echo 'Conteúdo: ' . $response->getContent();
		//echo "<br/>";
		
        //echo '<pre>';
        //print_r($response->getHeaders()); //$response->setContent($resposta);
        //die;
        
        return $response;

        /*$data = ['valor' =>1234567];
        $data = json_encode($data);

        $response = $this->getResponse();
        $response->setStatusCode(200);
        //$response->setContent($data);
        return $response;

        $data = ['valor' =>1234567];
        $result = new JsonModel( $data );
        return $result;*/
    }
}