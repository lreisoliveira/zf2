<?php

/**
 * Repositório da represetação da tabela UsuarioApdata. Contém as regras de pesquisa ao banco.
 */
namespace Api\Entity;

use Doctrine\ORM\EntityRepository,
    Doctrine\ORM\Query\ResultSetMapping;

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
class InstituicaoRepository extends EntityRepository
{

    /**
     * Inicializa sessão com a base de dados
     *
     * @author Leonard Albert <lampedro@fcl.com.br>
     * @name init
     * @access public
     */
    public function init()
    {
        $this->getEntityManager()->getConnection()->getDriver()->getName();
    }

        /**
     * Busca todos usuários Ativos da empresa.
     *
     * @return object
     */
    public function listar()
    {
        $this->init();
        $sql = 'SELECT u FROM Api\Entity\Instituicao u';
        $r = $this->getEntityManager()->createQuery($sql)->execute();
        return  $this->getEntityManager()->createQuery($sql)->execute();
    }
}
