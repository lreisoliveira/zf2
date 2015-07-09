<?php

/**
 * Esta classe contém uma representação da tabela Artigos
 *
 * @author Leandro Oliveira <lreisoliveira@gmail.com>
 * @date 09/01/2015 13:00h
 */
namespace Rest\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rest\Entity\AbstractEntity;

/**
 * Fields da tabela Artigos
 *
 * @ORM\Entity
 * @ORM\Table(name="artigos")
 * @ORM\Entity(repositoryClass="Rest\Entity\InstituicaoRepository")
 *
 */
class Instituicao 
{
    /**
     * Id do artigo
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $id
     */
    protected $id;

    /**
     * Nome do artigo
     *
     * @ORM\Column(name="descricao", type="string")
     * @var string $descricao
     */
    protected $descricao;
}
