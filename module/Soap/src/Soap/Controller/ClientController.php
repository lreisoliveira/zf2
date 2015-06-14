<?php

namespace Soap\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class serv soap 
 * @author leandro
 */
class ClientController extends AbstractActionController
{

    /**
     * (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction() {
    	
    	$options = array(
    			"trace" => true,
    			"encoding" => "utf-8",
    			'soap_version' => SOAP_1_2,
    			'uri'      => 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/',
    			'location' => 'http://'.$_SERVER['HTTP_HOST'].'/server-soap/',
    			
    	);
    	
    	$client = new \SoapClient("http://".$_SERVER['HTTP_HOST']."/server-soap/?wsdl", $options);
    	
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
    	
    	echo("\nDumping request headers:\n"
    			.$client->__getLastRequestHeaders());
    	
    	echo("\nDumping request:\n".$client->__getLastRequest());
    	
    	echo("\nDumping response headers:\n"
    			.$client->__getLastResponseHeaders());
    	
    	echo("\nDumping response:\n".$client->__getLastResponse());
    	 
    	die;
    	
   }
}

/*
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