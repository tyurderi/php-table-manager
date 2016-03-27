<?php

namespace TM\Table;

class Table
{

    /**
     * @var string
     */
    protected $name    = '';

    /**
     * @var Field\Field[]
     */
    protected $fields = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addField($name, Field\Type\TypeInterface $type)
    {
        $this->fields[] = new Field\Field($name, $type);
    }

    public function getField($name)
    {
        foreach($this->fields as $field)
        {
            if($field->getName() === $name)
            {
                return $field;
            }
        }

        return null;
    }

    public function deleteField($name)
    {
        foreach($this->fields as $key => $field)
        {
            if($field->getName() === $name)
            {
                unset($this->fields[$key]);
                return true;
            }
        }

        return false;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getName()
    {
        return $this->name;
    }

}