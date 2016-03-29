<?php

namespace TM\Table\Field\Type;

class TextType implements TypeInterface
{

    public function __toString()
    {
        return 'TEXT';
    }

}