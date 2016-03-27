<?php

namespace TM\Table;

use WCKZ\Generator\FileBuilder;

class Manager
{

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

            $query->add('%s', $this->createFieldQuery($field));

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

    protected function createFieldQuery(Field\Field $field)
    {
        $query = new FileBuilder();
        $query->add('`%s` %s', $field->getName(), $field->getType());

        if($encoding = $field->getEncoding())
        {
            $query->add(' COLLATE %s', $encoding);
        }

        if($field->isUnsigned())
        {
            $query->add(' UNSIGNED');
        }

        if(!$field->isNullAble())
        {
            $query->add(' NOT NULL');
        }

        if($defaultValue = $field->getDefaultValue())
        {
            $query->add(' DEFAULT %s', $this->quoteType($defaultValue));
        }

        if($field->isAutoIncrement())
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