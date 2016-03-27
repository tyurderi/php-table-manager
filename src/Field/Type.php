<?php

namespace TM\Table\Field;

class Type
{

    public static function custom($typeValue = '')
    {
        return new Type\Custom($typeValue);
    }

    public static function varChar($length = 255)
    {
        return new Type\VarChar($length);
    }

}