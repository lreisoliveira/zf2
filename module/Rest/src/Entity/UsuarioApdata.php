<?php
/**
 * Esta classe contém uma representação da tabela TBFCL_SOLICITANTE
 *
 * @author Leonard Albert <lampedro@fcl.com.br>
 * @date 29/01/2015 13:00h
 */
namespace Intranet\Entity;

use Doctrine\ORM\Mapping as ORM;
use Intranet\Entity\AbstractEntity;

/**
 * Fields da tabela Apdata
 *
 * @ORM\Entity
 * @ORM\Table(name="TBFCL_SOLICITANTE")
 * @ORM\Entity(repositoryClass="Intranet\Entity\UsuarioApdataRepository")
 *
 */
class UsuarioApdata extends AbstractEntity
{
    /**
     * Número do Re do funcionário.
     *
     * @ORM\Id
     * @ORM\Column(name="CD_SOLICITANTE", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer $re
     */
    protected $re;

    /**
     * Nome completo do funcionário.
     *
     * @ORM\Column(name="NM_SOLICITANTE", type="string")
     * @var string $nome
     */
    protected $nome;

    /**
     * Número do centro de custo do funcionário.
     *
     * @ORM\Column(name="CD_CCUSTO", type="string")
     * @var string $centro_custo
     */
    protected $centro_custo;

    /**
     * Data de nascimento real do funcionário.
     *
     * @ORM\Column(name="DT_NASCIMENTO", type="string")
     * @var string $data_nascimento
     */
    protected $data_nascimento;

    /**
     * Descrição do cargo do funcionário.
     *
     * @ORM\Column(name="DS_CARGO", type="string")
     * @var string $descricao_cargo
     */
    protected $descricao_cargo;

    /**
     * Código de situação do funcionário dentro da empresa.
     *
     * @ORM\Column(name="CD_SITUACAO", type="string")
     * @var string $situacao
     */
    protected $situacao;

    /**
     * E-mail do funcionário.
     *
     * @ORM\Column(name="NM_EMAIL", type="string")
     * @var string $email
     */
    protected $email;

    /**
     * Descrição do departamento do funcionário.
     *
     * @ORM\Column(name="DS_CCUSTO", type="string")
     * @var string $descricao_departamento
     */
    protected $descricao_departamento;

    /**
     * Codigo da area de negocio do funcionário.
     *
     * @ORM\Column(name="CD_NEGOCIO", type="string")
     * @var string $area_negocio
     */
    protected $area_negocio;

    /**
     * Descriçção da area de negocio do funcionário.
     *
     * @ORM\Column(name="DS_NEGOCIO", type="string")
     * @var string $descricao_negocio
     */
    protected $descricao_negocio;

    /**
     * Data de nascimento FAKE do funcionário para exibição.
     *
     * @ORM\Column(name="ANIVERSARIO", type="date")
     * @var date $aniversario
     */
    protected $aniversario;

    /**
     * Identifica o bloqueio do cadastro do funcionário.
     *
     * @ORM\Column(name="BLOQUEIO", type="string")
     * @var string $bloqueio
     */
    protected $bloqueio;

    /**
     * Data de admissão do funcionário.
     *
     * @ORM\Column(name="DT_ADMISSAO", type="string")
     * @var string $data_admissao
     */
    protected $data_admissao;

    /**
     * Data de demissão do funcionário.
     *
     * @ORM\Column(name="DT_DEMISSAO", type="string")
     * @var string $data_demissao
     */
    //protected $data_demissao;

    /**
     * Número de CPF do funcionário.
     *
     * @ORM\Column(name="CPF", type="string")
     * @var string $cpf
     */
    protected $cpf;

    /**
     * Ramal do funcionário.
     *
     * @ORM\Column(name="RAMAL", type="string")
     * @var string $ramal
     */
    protected $ramal;

    /**
     * Login do funcionário.
     *
     * @ORM\Column(name="LOGIN", type="string")
     * @var string $login
     */
    protected $login;

    /**
     * Local/Andar onde o funcionário trabalha.
     *
     * @ORM\Column(name="ANDAR", type="string")
     * @var string $local
     */
    protected $local;

    /**
     * Número de identificação do funcionário.
     * Códigos de 1 a 6 CLT, código 7 Estagiário.
     *
     * @ORM\Column(name="TP_EMPREGADO", type="string")
     * @var string $tipo_empregado
     */
    protected $tipo_empregado;

    /**
     * Data de início do bloqueio no AD
     *
     * @ORM\Column(name="DT_SITUACAO_INICIO", type="date")
     * @var string $dt_situacao_inicio
     */
    protected $dt_situacao_inicio;

    /**
     * Data de fim do bloqueio no AD
     *
     * @ORM\Column(name="DT_SITUACAO_FIM", type="date")
     * @var string $dt_situacao_fim
     */
    protected $dt_situacao_fim;
}