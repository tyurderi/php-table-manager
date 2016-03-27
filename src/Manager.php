<?php

namespace TM\Table;

use WCKZ\Generator\FileBuilder;

class Manager
{

    public function alterTable($tableName)
    {
        return new AlterTable($tableName);
    }

    public function createQuery(Table $table)
    {
        $query = new FileBuilder();
        $query->add('CREATE TABLE IF NOT EXISTS `%s` (', $table->getName())->newLine();

        $fields       = $table->getFields();
        $fieldCount   = count($fields);
        $primaryField = null;

        foreach($fields as $i => $field)
        {
            if($field->isPrimaryKey())
            {
                $primaryField = $field;
            }

            $query->add('%s', (string) $field);

            if($i < $fieldCount - 1 || ($i == $fieldCount - 1 && $primaryField !== null))
            {
                $query->add(',');
            }

            $query->newLine();
        }

        if($primaryField !== null)
        {
            $query->add('PRIMARY KEY(`%s`)', $primaryField->getName())->newLine();
        }

        $query->add(')');

        return (string) $query;
    }

}