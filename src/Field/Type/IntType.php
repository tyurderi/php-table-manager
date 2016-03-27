<?php

namespace TM\Table\Field\Type;

class IntType implements TypeInterface
{

    protected $length = 0;

    public function __construct($length = 11)
    {
        $this->length = (int) $length;
    }

    public function __toString()
    {
        return 'int(' . $this->length . ')';
    }

}