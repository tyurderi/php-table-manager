<?php

namespace TM\Table\Field;

class Field
{

    /**
     * @var string
     */
    protected $name           = '';

    /**
     * @var Type\TypeInterface
     */
    protected $type          = null;

    /**
     * @var bool
     */
    protected $unsigned      = false;

    /**
     * @var bool
     */
    protected $nullAble      = false;

    /**
     * @var bool
     */
    protected $autoIncrement = false;

    /**
     * @var bool
     */
    protected $defaultValue  = false;

    /**
     * @var string
     */
    protected $encoding      = '';

    /**
     * @var bool
     */
    protected $primaryKey    = false;

    public function __construct($name, Type\TypeInterface $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function isUnsigned()
    {
        return $this->unsigned;
    }

    public function setUnsigned($unsigned)
    {
        $this->unsigned = $unsigned;

        return $this;
    }

    public function isNullAble()
    {
        return $this->nullAble;
    }

    public function setNullAble($nullAble)
    {
        $this->nullAble = $nullAble;

        return $this;
    }

    public function isAutoIncrement()
    {
        return $this->autoIncrement;
    }

    public function setAutoIncrement($autoIncrement)
    {
        $this->autoIncrement = $autoIncrement;

        return $this;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    public function getEncoding()
    {
        return $this->encoding;
    }

    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    public function isPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;

        return $this;
    }

}