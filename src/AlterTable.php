<?php

namespace TM\Table;

use WCKZ\Generator\FileBuilder;

class AlterTable
{

    /**
     * @var string
     */
    protected $name    = '';

    /**
     * @var array
     */
    protected $changes = array();

    public function __construct($name)
    {
        $this->name  = $name;
    }

    public function getQuery()
    {
        $query = new FileBuilder();
        $query->add('ALTER TABLE `%s`', $this->name)->newLine();

        $count = count($this->changes);
        foreach($this->changes as $i => $change)
        {
            $query->indent(1, '  ')->add($change);

            if($i < $count - 1)
            {
                $query->add(',')->newLine();
            }
        }

        $query->add(';');

        return (string) $query;
    }

    /**
     * ALTER TABLE `table` ADD `field` INT NOT NULL AFTER 'field'
     */
    public function addField(Field\Field $field, $afterField = '')
    {
        $this->changes[] = sprintf(
            'ADD %s%s',
            (string) $field,
            !empty($afterField) ? 'AFTER `' . $afterField . '`' : ''
        );

        return $this;
    }

    /**
     * ALTER TABLE `table` DROP `field`
     */
    public function removeField($fieldName)
    {
        $this->changes[] = sprintf('DROP `%s`', $fieldName);

        return $this;
    }

    /**
     * TABLE `table` ADD INDEX(`field`)
     */
    public function addIndex($fieldName)
    {
        $this->changes[] = sprintf('ADD INDEX(`%s`)', $fieldName);

        return $this;
    }

    /**
     * TABLE `table` ADD UNIQUE(`field`)
     */
    public function addUnique($fieldName)
    {
        $this->changes[] = sprintf('ADD UNIQUE(`%s`)', $fieldName);

        return $this;
    }

    /**
     * ALTER TABLE `table` ADD PRIMARY KEY(`field`)
     */
    public function addPrimaryKey($fieldName)
    {
        $this->changes[] = sprintf('ADD PRIMARY KEY(`%s`)', $fieldName);

        return $this;
    }

}