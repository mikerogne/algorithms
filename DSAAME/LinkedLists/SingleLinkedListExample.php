<?php
require(__DIR__ . '/../../vendor/autoload.php');

use DSAAME\LinkedLists\SingleLinkedList;

$list = new SingleLinkedList();

$list->addNode("first");
$list->addNode("second");
$list->addNode("third");
var_dump($list->getAllNodes());

$list->deleteLastNode();
var_dump($list->getAllNodes());

$list->deleteLastNode();
var_dump($list->getAllNodes());


