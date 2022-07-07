<?php

namespace VendingMachine;

use VendingMachine\Item\ItemCodeInterface;
use VendingMachine\Item\ItemInterface;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Money\MoneyInterface;

interface VendingMachineInterface
{
    public function addItem(ItemInterface $item): void; //tworzę listę produktów przy uruchomienuy --- new Item(price,count,itemcode code), wywołuje itemCollection
    public function dropItem(ItemCodeInterface $itemCode): void; //usuwam produkt z listy gdy kupiony
    public function insertMoney(MoneyInterface $money): void; ///wrzucam pieniądze przy czym początkowe saldo 0
    public function getCurrentTransactionMoney(): MoneyCollectionInterface; //current balance - pieniadze wrzucane do maszyny
    public function getInsertedMoney(): MoneyCollectionInterface; //return-money pieniądze wrzucone do masyzny
}
