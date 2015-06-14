<?php

namespace ApiTest\Controller;

use Zend\Http\Request;
use Zend\Http\Response;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;

use PHPUnit_Framework_TestCase;
use Api\Controller\EquipesController;

use ApiTest\Bootstrap;

class ApiControllerTest extends PHPUnit_Framework_TestCase
{

    protected $serviceManager;
    protected $entityManager;
    protected $controller;

    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    /**
     * Configuração dos testes
     */
    public function setUp()
    {
        //seta o gerenciador de servicos
        $this->serviceManager = Bootstrap::getServiceManager();

        //pega a configuraçao da aplicaçao
        $config = $this->serviceManager->get('Config');

        //pega as rotas da aplicacao de dentro do array de configuracao
        $routerConfig   = isset($config['router']) ? $config['router'] : array();

        //monta objeto router a partir das configuracoes do array de rota
        $router = HttpRouter::factory($routerConfig);

        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);

        //define o controller de equipes
        $this->controller = new EquipesController();

        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($this->serviceManager);

        //banco de dados
        $this->entityManager  = $this->serviceManager->get('Doctrine\ORM\EntityManager');

        //repositorio a ser verificado
        //$repositorioEquipes = $this->entityManager->getRepository('Esportes\Entity\Equipes');
    }

    /**
     * Teste de conexão com o banco de dados
     */
    public function testConexaoBancoDeDados()
    {
        $erro       = false;
        $mensagem   = '';
        try {
            $this->entityManager->getConnection()->connect();
        } catch (\Exception $e) {
            $mensagem = $e->getMessage();
            $erro = true;
        }
        $this->assertFalse($erro,$mensagem);
    }

    /**
     * Teste status getList do controller
     */
    public function testStatus200()
    {
        $this->assertEquals(200, $this->controller->get(1)->getStatusCode());
    }

    /**
     * Teste para POST
     */
    public function testPost()
    {
        /* ?? por que utilizar request ao inves de chamar o metodo do controller que ja faz o processo? */
        /*$this->request->setMethod('post');
        $this->request->getPost()->set('chave', 'valor');
 
        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
 
        $this->assertEquals(200, $response->getStatusCode());*/
    }

    /*
     * Teste para GET
     */
    public function testGet()
    {
        /*$this->request->setMethod('GET');
        $this->request->getPost()->set('chave', 'valor');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
 
        $this->assertEquals(200, $response->getStatusCode());*/
    }
 
    /*
     * Teste para PUT
     */
    public function testPut()
    {
        /*$this->routeMatch->setParam('id', '1');
        $this->request->setMethod('put');
 
        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
 
        $this->assertEquals(200, $response->getStatusCode());*/
    }
 
    /*
     * Teste para DELETE
     */
    public function testDelete()
    {
        /*$this->routeMatch->setParam('id', '1');
        $this->request->setMethod('delete');
 
        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
 
        $this->assertEquals(200, $response->getStatusCode());*/
    }
}