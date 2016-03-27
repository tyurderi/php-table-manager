<?php

namespace TM\Table\Field;

use WCKZ\Generator\FileBuilder;

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

    public function __toString()
    {
        $query = new FileBuilder();
        $query->add('`%s` %s', $this->getName(), $this->getType());

        if($encoding = $this->getEncoding())
        {
            $query->add(' COLLATE %s', $encoding);
        }

        if($this->isUnsigned())
        {
            $query->add(' UNSIGNED');
        }

        if(!$this->isNullAble())
        {
            $query->add(' NOT NULL');
        }

        if($defaultValue = $this->getDefaultValue())
        {
            $query->add(' DEFAULT %s', $this->quoteType($defaultValue));
        }

        if($this->isAutoIncrement())
        {
            $query->add(' AUTO_INCREMENT');
        }

        return (string) $query;
    }

    protected function quoteType($value)
    {
        if($value === null)
        {
            return 'NULL';
        }
        else if(is_string($value))
        {
            return '\'' . $value . '\'';
        }
        else if(is_numeric($value))
        {
            return $value;
        }

        throw new \InvalidArgumentException('Unrecognized value type.');
    }

}