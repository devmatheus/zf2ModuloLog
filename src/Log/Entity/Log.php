<?php

namespace Log\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="Base\Entity\BaseRepository")
 */
class Log
{
    const ACAO_CADASTRO = 0;
    const ACAO_EDICAO   = 1;
    const ACAO_EXCLUSAO = 2;
    const ACAO_LOGIN    = 3;
    const ACAO_LOGOUT   = 4;
    
    static $translate = [
        'acao' => [
            self::ACAO_CADASTRO => 'Cadastro',
            self::ACAO_EDICAO   => 'Edição',
            self::ACAO_EXCLUSAO => 'Exclusão',
            self::ACAO_LOGIN    => 'Login',
            self::ACAO_LOGOUT   => 'Logout'
        ]
    ];

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false, length=11)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(name="registro_id", type="text", length=45, nullable=true)
     * @var string
     */
    protected $registroId;

    /**
     * @ORM\Column(name="acao", type="integer", length=1, nullable=false)
     * @var int
     */
    protected $acao;

    /**
     * @ORM\ManyToOne(targetEntity="Usuarios\Entity\Usuario", inversedBy="logs", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", nullable=true)
     */
    protected $usuario;

    /**
     * @ORM\Column(name="registro_antigo", type="text", nullable=true)
     * @var string
     */
    protected $registroAntigo;

    /**
     * @ORM\Column(name="registro_novo", type="text", nullable=true)
     * @var string
     */
    protected $registroNovo;

    /**
     * @ORM\Column(name="data_hora", type="datetime", nullable=false)
     * @var string
     */
    protected $dataHora;

    /**
     * @ORM\Column(name="entity", type="string", length=45, nullable=true)
     * @var string
     */
    protected $entity;
    
    /**
     * @ORM\Column(name="formulario_recebido", type="text", nullable=true)
     * @var string
     */
    protected $formularioRecebido;

    public function __construct($options = null)
    {
        $hydrator = new Hydrator\ClassMethods;
        $hydrator->hydrate($options, $this);
        
        if (!$this->dataHora) {
            $this->setDataHora();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUsuario()
    {
        return is_object($this->usuario) ? $this->usuario:false;
    }

    public function getUsuarioNome()
    {
        return $this->getUsuario() ? $this->getUsuario()->getNome():'';
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getRegistroAntigo()
    {
        return $this->registroAntigo;
    }

    public function setRegistroAntigo($registroAntigo)
    {
        $this->registroAntigo = $registroAntigo;
        return $this;
    }

    public function getRegistroNovo()
    {
        return $this->registroNovo;
    }

    public function setRegistroNovo($registroNovo)
    {
        $this->registroNovo = $registroNovo;
        return $this;
    }

    public function getDataHora()
    {
        return $this->dataHora;
    }
    
    public function setDataHora()
    {
        $this->dataHora = new \DateTime('now');
        return $this;
    }

    public function setRegistroId($registroId)
    {
        $this->registroId = $registroId;
        return $this;
    }

    public function getRegistroId()
    {
        return $this->registroId;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setAcao($acao)
    {
        $this->acao = $acao;
        return $this;
    }

    public function getAcao()
    {
        return self::$translate['acao'][$this->acao];
    }

    public function getFormularioRecebido()
    {
        return $this->formularioRecebido;
    }

    public function setFormularioRecebido($formularioRecebido)
    {
        $this->formularioRecebido = $formularioRecebido;
        return $this;
    }
    
    public function toArray()
    {
        $hydrator = new Hydrator\ClassMethods;
        return $hydrator->extract($this);
    }
}
