<?php

namespace Log\Formatter;

use Base\Formatter\Formatter;
use Log\Entity\Log as LogEntity;

class Acao implements Formatter
{
    function set($value)
    {
        $this->value = $value;
        return $this;
    }
    
    function get()
    {
        return LogEntity::$translate['acao'][$this->value];
    }
}
