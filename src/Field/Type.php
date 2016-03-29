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

    public static function text()
    {
        return new Type\TextType();
    }

    public static function mediumText()
    {
        return new Type\MediumTextType();
    }

    public static function tinyInt($length = 2)
    {
        return new Type\TinyIntType($length);
    }

}