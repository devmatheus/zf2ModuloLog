<?php

namespace Log\Service;

use Doctrine\ORM\EntityManager;
use Base\Service\AbstractService;

class Log extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = 'Log\Entity\Log';
    }
}
