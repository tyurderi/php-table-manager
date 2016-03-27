<?php

namespace TM\Table\Field\Type;

class CustomType implements TypeInterface
{

    protected $typeValue = '';

    public function __construct($typeValue)
    {
        $this->typeValue = $typeValue;
    }

    public function __toString()
    {
        return $this->typeValue;
    }

}