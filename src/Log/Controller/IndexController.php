<?php

namespace Log\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends \Base\Controller\CrudController
{
    public function __construct()
    {
        $this->tituloModulo = 'Log';
        $this->entity       = 'Log\Entity\Log';
        $this->controller   = 'log';
        
        $this->grid['campos'] = [
            'id'       => ['label' => 'ID', 'style' => 'width: 60px'],
            'usuario'  => ['label' => 'Usuário', 'style' => 'width: 150px'],
            'dataHora' => [
                'label'     => 'Data',
                'style'     => 'width: 180px',
                'formatter' => 'Base\Formatter\DateTime'
            ],
            'entity'   => ['label' => 'Entidade'],
            'acao'     => [
                'label'     => 'Ação',
                'style'     => 'width: 100px',
                'formatter' => 'Log\Formatter\Acao'
            ]
        ];
        $this->grid['relacoes'] = [
            'usuario' => [
                'entity'     => 'Usuarios\Entity\Usuario',
                'campo'      => 'nome',
                'referencia' => 'id'
            ]
        ];
        $this->grid['acoes']['links']['visualizar'] = [
            'action' => 'detalhes',
            'campo'  => 'id',
            'class'  => 'btn-primary',
            'label'  => 'Visualizar'
        ];
        $this->varsView['restDisabled'] = true;
    }

    public function detalhesAction()
    {
        $registro = $this->getRepo()->find($this->params()->fromRoute('id'));
        return new ViewModel(array('registro' => $registro));
    }
}
