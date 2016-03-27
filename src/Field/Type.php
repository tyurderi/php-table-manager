<?php

namespace TM\Table\Field;

class Type
{

    public static function custom($typeValue = '')
    {
        return new Type\CustomType($typeValue);
    }

    public static function varChar($length = 255)
    {
        return new Type\VarCharType($length);
    }

    public static function int($length = 11)
    {
        return new Type\IntType($length);
    }

}