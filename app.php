<?php
include_once __DIR__ . '/vendor/autoload.php';

use VendingMachine\VendingMachine;
use VendingMachine\Item\ItemCollection;
use VendingMachine\Item\Item;
use VendingMachine\Money\Money;
use VendingMachine\Input\InputHandler;

$item1 = new Item('0.65',1,'A');
$item2 = new Item('1.00',1,'B');
$item3 = new Item('1.50',1,'C');

$itemCollection = new ItemCollection();

$vendingMachine = new VendingMachine($itemCollection);
$vendingMachine->addItem($item1);
$vendingMachine->addItem($item2);
$vendingMachine->addItem($item3);

$inputHendler = new InputHandler($vendingMachine);
$input = $inputHendler->getInput();
while ($action = $input->getAction()) {
    echo $action->handle($vendingMachine);
}

