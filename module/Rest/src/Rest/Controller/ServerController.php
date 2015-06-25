<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

/**
 * Class server rest
 * 
 * @author leandro
 */
class ServerController extends AbstractRestfulController
{
	
	/**
	 * Define o formato da resposta
	 * 
	 * @param mixed $content
	 * @param string $format
	 * @return \Rest\Controller\Ambigous|string
	 */
	private function formataResposta($content, $format)
	{
		if ($format == 'json') {
			return $this->toJson($content);
		} else if ($format == 'xml') {
			return $this->toXML($content);
		} 
	}
	
	/**
	 * Formata a resposta para o formato JSON
	 *
	 * @param unknown $content
	 * @return Ambigous <string, mixed>
	 */
	private function toJson($content)
	{
		$adapter = new \Zend\Serializer\Adapter\Json;
		return $adapter->serialize($content);
	}
	
	/**
	 * Formata a resposta para o formato XML
	 * 
	 * @param unknown $content
	 * @return string
	 */
	private function toXML($content) 
	{
		$content = json_encode($content);
		$string = "<?xml version='1.0' encoding='UTF-8'?>
				   <document>
				      <resposta>$content</resposta>
					</document>";
		
		$xml = simplexml_load_string($string);
		
		$domxml = new \DOMDocument('1.0');
		$domxml->preserveWhiteSpace = false;
		$domxml->formatOutput = true;
		$domxml->loadXML($xml->asXML());
		return $domxml->saveXml();
	}
	
	/**
     * Prepara a resposta a ser enviada ao cliente
	 * 
	 * @param mixed $content
	 * @param string $methodo
	 * @return \Zend\Stdlib\ResponseInterface
	 */
    private function preparaResposta($content,$methodo)
    {

        $content['metodo'] = str_replace('::','',strstr($methodo, '::'));

        // formato default: json
        $format = $this->getEvent()->getRouteMatch()->getParam('format');

        $response = $this->getResponse();
        
      	$contentType = "application/$format";

        //seta status 200 - sucesso
        $response->setStatusCode(200);

        //cria o header personalizado
        $response->getHeaders()->addHeaderLine('Content-Type', $contentType)
                 //controle de acesso
                 ->addHeaderLine('Access-Control-Allow-Origin','*')
                 //define os verbos que permitidos
                 ->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');
        
        // envelopa a resposta no formato solicitado
        $resposta = $this->formataResposta($content, $format);        
        
        //coloca o conteudo na resposta
        $response->setContent($resposta);
          
        return $response;
    }

    /**
     * Chamado automaticamente quando a requisição vier via http
	 * 
     * (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractRestfulController::get()
     */
    public function get($id)
    {
        $content = array();
        
        $parametro = $this->params()->fromQuery();
        
        $response = $this->preparaResposta($content,__METHOD__);
        return $response;
    }

    /**
     * Chamado automaticamente quando a requisição vier via http
     * 
     * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
     */
    public function create($data)
    {
        $content = array();
        $response = $this->preparaResposta($content,__METHOD__);
        return $response;
    }

    /**
     * Chamado automaticamente quando a requisição vier via http
     * 
     * @see \Zend\Mvc\Controller\AbstractRestfulController::update()
     */
    public function update($id, $data)
    {
        $content = array();
        $response = $this->preparaResposta($content,__METHOD__);
        return $response;
    }

    /**
     * Chamado automaticamente quando a requisição vier via http
     * 
     * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
     */
    public function delete($id)
    {
        $content = array();
        $response = $this->preparaResposta($content,__METHOD__);
        return $response;
    }
}