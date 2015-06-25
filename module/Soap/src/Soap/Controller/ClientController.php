<?php

namespace Soap\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Soap\Client;

/**
 * Class serv soap
 *  
 * @author leandro
 */
class ClientController extends AbstractActionController
{

    /**
     * Acesso Webservice utilizando PHP Nativo
     */
	public function nativoAction() 
    {
    	
    	$options = array(
    			"trace" => true,
    			'soap_version' => SOAP_1_2,
    			'uri'      => 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/index',
    			'location' => 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/index',
    	);
    	
    	$client = new \SoapClient("http://".$_SERVER['HTTP_HOST']."/server-soap/index?wsdl", $options);
    	
    	try {
    		
    		$result = $client->OlaMundo();
    		echo $client->__getLastResponse();
    	}
    	catch (Exception $e) {
    		$error_xml =  $client->__getLastRequest();
    		echo $error_xml;
    		echo "\n\n".$e->getMessage();
    	}
    	
    	echo '<pre>';
    	
    	echo("\nDumping request headers:\n" .$client->__getLastRequestHeaders());
    	
    	echo("\nDumping request:\n".$client->__getLastRequest());   	
    	echo("\nDumping response headers:\n".$client->__getLastResponseHeaders());
    	echo("\nDumping response:\n".$client->__getLastResponse());
    	die;
   }
  
    /**
   	 * Acesso Webservice utilizando PHP Zend Client
     */
   public function indexAction() 
   {

		ini_set('default_socket_timeout', 600);
   	   		
   		$options = array(
   			'soap_version' => SOAP_1_2,
   		);
   		
	   	$client = new Client('http://'.$_SERVER['HTTP_HOST'].'/server-soap/index?wsdl', $options);
	   		
	   	try {
	   	
	   		$result = $client->OlaMundo();
	   		echo $client->getLastResponse();
	   	}
	   	catch (Exception $e) {
	   		$error_xml =  $client->getLastRequest();
	   		echo $error_xml;
	   		echo "\n\n".$e->getMessage();
	   	}
	   		
	   	echo '<pre>';
	   		
	   	echo("\nDumping request headers:\n".$client->getLastRequestHeaders());
	   		
	   	echo("\nDumping request:\n".$client->getLastRequest());
	   		
	   	echo("\nDumping response headers:\n".$client->getLastResponseHeaders());
	   		
	   	echo("\nDumping response:\n".$client->getLastResponse());   	
	   	
	   	die;
   	
   }
}

/*
 * Options para SoapClient nativo
 * $params = array(
    				'server_id' => 1,
    				'ip_address' => '*',
    				'domain' => 'test2.int',
    				'type' => 'vhost',
    				'parent_domain_id' => 0,
    				'vhost_type' => 'name',
    				'hd_quota' => 100000,
    				'traffic_quota' => -1,
    				'cgi' => 'y',
    				'ssi' => 'y',
    				'suexec' => 'y',
    				'errordocs' => 1,
    				'is_subdomainwww' => 1,
    				'subdomain' => '',
    				'php' => 'y',
    				'ruby' => 'n',
    				'redirect_type' => '',
    				'redirect_path' => '',
    				'ssl' => 'n',
    				'ssl_state' => '',
    				'ssl_locality' => '',
    				'ssl_organisation' => '',
    				'ssl_organisation_unit' => '',
    				'ssl_country' => '',
    				'ssl_domain' => '',
    				'ssl_request' => '',
    				'ssl_cert' => '',
    				'ssl_bundle' => '',
    				'ssl_action' => '',
    				'stats_password' => '',
    				'stats_type' => 'webalizer',
    				'allow_override' => 'All',
    				'apache_directives' => '',
    				'php_open_basedir' => '/',
    				'custom_php_ini' => '',
    				'backup_interval' => '',
    				'backup_copies' => 1,
    				'active' => 'y',
    				'traffic_quota_lock' => 'n',
    				'pm_process_idle_timeout' => 3,
    				'pm_max_requests' => 4,
    		);
 * */