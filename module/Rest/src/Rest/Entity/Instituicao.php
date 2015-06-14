<?php

/**
 * Esta classe contém uma representação da tabela TBFCL_SOLICITANTE
 *
 * @author Leonard Albert <lampedro@fcl.com.br>
 * @date 29/01/2015 13:00h
 */
namespace Api\Entity;

use Doctrine\ORM\Mapping as ORM;
use Api\Entity\AbstractEntity;

/**
 * Fields da tabela Apdata
 *
 * @ORM\Entity
 * @ORM\Table(name="artigos")
 * @ORM\Entity(repositoryClass="Api\Entity\InstituicaoRepository")
 *
 */
class Instituicao extends AbstractEntity
{
    /**
     * Número do Re do funcionário.
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $id;

    /**
     * Nome completo do funcionário.
     *
     * @ORM\Column(name="descricao", type="string")
     * @var string $descricao
     */
    protected $descricao;

}