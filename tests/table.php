<?php

use TM\Table\Table;
use TM\Table\Field\Field;
use TM\Table\Field\Type;
use TM\Table\Manager;

require_once __DIR__ . '/../vendor/autoload.php';

$table = new Table('user');
$table->addField('id', Type::int(11));
$table->addField('username', Type::varChar(32));

$table->getField('id')
    ->setPrimaryKey(true)
    ->setAutoIncrement(true);

$manager = new Manager();
$query   = $manager->createQuery($table);

echo $query, PHP_EOL;

$query = $manager->alterTable('user')
        ->addField(new Field('password', Type::varChar(32)))
        ->getQuery();

echo $query, PHP_EOL;