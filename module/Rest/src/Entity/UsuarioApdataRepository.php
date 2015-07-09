<?php

/**
 * Repositório da represetação da tabela UsuarioApdata. Contém as regras de pesquisa ao banco.
 */
namespace Intranet\Entity;

use Doctrine\ORM\EntityRepository,
    Doctrine\ORM\Query\ResultSetMapping;

use Doctrine\DBAL\Event\Listeners\OracleSessionInit;

/**
 * Repositório da represetação da tabela UsuarioApdata. Contém as regras de pesquisa ao banco.
 *
 * @author Leonard Albert <lampedro@fcl.com.br>
 * @date 29/01/2015 13:00h
 * @version v1.1.0
 * @copyright © 2015, fcl.com.br
 * @access public
 * @package Intranet\Entity\UsuarioApdataRepository
 */
class UsuarioApdataRepository extends EntityRepository 
{

    /**
     * Nome do driver
     *
     * @var $driver string
     */
    protected $driver;

    /**
     * Codigo de situação do funcionário desativado dentro da empresa.
     */
    public static $situacao_desativados = '0, 2, 3, 14, 51, 99';

    /**
     * Inicializa sessão com a base de dados
     *
     * @author Leonard Albert <lampedro@fcl.com.br>
     * @name init
     * @access public
     */
    public function init()
    {
        $this->driver = $this->getEntityManager()->getConnection()->getDriver()->getName();
        if (strstr($this->driver, 'oci')) {
            $this->getEntityManager()->getEventManager()->addEventSubscriber(new OracleSessionInit());    
        }
    }
 
    /**
     * Busca todos os usuários dentro da empresa
     * 
     * @param string $where
     * @return boolean
     */
    public function buscarTodos($where = false)
    {
        $this->init();
 
        return parent::findAll();
    }
    
    /**
     * Busca todos usuários Ativos da empresa.
     *
     * @return object
     */
    public function buscarAtivos()
    {
        $this->init();

         $sql = 'SELECT u FROM Intranet\Entity\UsuarioApdata u '                                                                                              
            . 'WHERE  u.situacao NOT IN ('. self::$situacao_desativados .') ';

        return  $this->getEntityManager()->createQuery($sql)->execute();
    }

    /**
     * Busca todos usuários Inativos da empresa.
     * 
     * @return object
     */
    public function buscarInativos()
    {
        $this->init();

        $sql = 'SELECT u FROM Intranet\Entity\UsuarioApdata u '
            . 'WHERE u.situacao IN ('. self::$situacao_desativados .') ';

        return  $this->getEntityManager()->createQuery($sql)->execute();
    }

    /**
     * Busca todos os usuários que serão bloqueados ($bloqueio = 0) ou desbloqueados ($bloqueio = 1)
     * com o intervalo entre hoje, para bloqueios (ou dia anterior para desbloqueios) e
     * 3 dias anteriores a esta data.
     *
     * Esses 3 dias é uma margem de segurança, caso o processo tenha algum incidente durante algum fim de semana
     * ou feriado prolongado, que inviabilizasse o processo de ser executado quando deveria.
     *
     * @return object
     */
    public function buscarBloqueios($bloqueio)
    {
        $this->init();

        if (strstr($this->driver, 'oci')){
            //tratamento de datas para oracle
            $format = 'd/m/Y'; //oracle
            $campoValidarInicio = "to_char(u.dt_situacao_inicio,'DD/mm/YYYY')";
            $campoValidarFim    = "to_char(u.dt_situacao_fim,   'DD/mm/YYYY')";
        } else {
            //tratamento de datas para mysql
            $format = 'Y-m-d'; //mysql
            $campoValidarInicio = 'u.dt_situacao_inicio';
            $campoValidarFim    = 'u.dt_situacao_fim';
        }

        $data = new \DateTime();

        $campo = $campoValidarInicio;

        if($bloqueio==1) {

            $campo = $campoValidarFim;

            //A data de bloqueio a ser avaliado é sempre o dia anterior à data de verificação
            $data->sub(new \DateInterval('P1D'));
        }

        //se for bloqueio a data a ser avaliada é a atual
        //se for desbloqueio, a data
        $data_situacao = $data->format($format);

        //indica período de 3 dias
        $data->sub(new \DateInterval('P3D'));

        $data_anterior = $data->format($format);

        $sql =   "SELECT u FROM Intranet\Entity\UsuarioApdata u "
               . "WHERE u.situacao NOT IN (". self::$situacao_desativados .") and  $campo BETWEEN '".$data_anterior."' AND '".$data_situacao."' ";

        return  $this->getEntityManager()->createQuery($sql)->execute();
    }
}
