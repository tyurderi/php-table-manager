<?php

namespace TM\Table\Field\Type;

class TinyIntType implements TypeInterface
{

    protected $length = 0;

    public function __construct($length = 2)
    {
        $this->length = (int) $length;
    }

    public function __toString()
    {
        return 'tinyint(' . $this->length . ')';
    }

}