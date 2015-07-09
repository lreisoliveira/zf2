<?php

/**
 * Repositório da represetação da tabela Artigos
 */
namespace Rest\Entity;

use Doctrine\ORM\EntityRepository,
    Doctrine\ORM\Query\ResultSetMapping;

/**
 * Repositório da represetação da tabela UsuarioApdata. Contém as regras de pesquisa ao banco.
 *
 * @author Leandro Oliveira <lreisoliveira@gmail.com>
 * @date 09/07/2015 13:00h
 * @version v1.1.0
 * @copyright © 2015, leandro.com.br
 * @access public
 * @package Rest\Entity\IntituicaoRepository
 */
class InstituicaoRepository extends EntityRepository
{

    /**
     * Inicializa sessão com a base de dados
     *
	 * @author Leandro Oliveira <lreisoliveira@gmail.com>
     * @name init
     * @access public
     */
    public function init()
    {
        $this->getEntityManager()->getConnection()->getDriver()->getName();
    }

    /**
     * Busca todos os registros
     *
     * @return object
     */
    public function listar()
    {
        $this->init();
        $sql = 'SELECT u FROM Rest\Entity\Instituicao u';
        $r = $this->getEntityManager()->createQuery($sql)->execute();
        return  $this->getEntityManager()->createQuery($sql)->execute();
    }
}
