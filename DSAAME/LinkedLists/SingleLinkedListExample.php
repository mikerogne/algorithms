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

$list->deleteAllNodes();
var_dump($list->getAllNodes());


$list->addNode("first2");
$list->addNode("second2");
$list->addNode("third2");
var_dump($list->getAllNodes());

$list->deleteFirstNode();
var_dump($list->getAllNodes());

$list->addNodeToBeginning('new starter node!');
var_dump($list->getAllNodes());
var_dump($list->getTotalNodes());
