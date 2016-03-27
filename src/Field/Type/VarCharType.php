<?php

namespace TM\Table\Field\Type;

class VarCharType implements TypeInterface
{

    protected $length = 0;

    public function __construct($length)
    {
        $this->length = (int) $length;
    }

    public function __toString()
    {
        return 'VARCHAR(' . $this->length . ')';
    }

}