<?php

namespace VendingMachine;

use VendingMachine\Item\ItemCodeInterface;
use VendingMachine\Item\ItemCollection;
use VendingMachine\Item\ItemInterface;
use VendingMachine\Money\MoneyCollection;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Money\MoneyInterface;

class VendingMachine implements VendingMachineInterface
{
    public $itemCollection;
    public $moneyCollection;
    public function __construct(ItemCollection $itemCollection)
    {
        $this->itemCollection = $itemCollection;
        $this->moneyCollection = new MoneyCollection();
    }
   
    public function addItem(ItemInterface $item): void//tworzę listę produktów przy uruchomienuy --- new Item(price,count,itemcode code), wywołuje itemCollection
    {
        $this->itemCollection->add($item);
    }
    public function dropItem(ItemCodeInterface $itemCode): void //usuwam produkt z listy gdy kupiony
    {
        if ($this->itemCollection->get($itemCode)->getPrice()<=$this->moneyCollection->sum()) {
            $this->itemCollection->del($itemCode);
            $this->moneyCollection->empty();
        }else{
            echo "ZA MAŁO ŚRODKÓW PIENIĘŻNYCH: ";
        }
    }
    public function insertMoney(MoneyInterface $money): void 
    {
        $this->moneyCollection->add($money);
    }
    public function getCurrentTransactionMoney(): MoneyCollectionInterface 
    {
        return $this->moneyCollection;
    }
    public function getInsertedMoney(): MoneyCollectionInterface 
    {
        $moneyCollection = new MoneyCollection();
        return $moneyCollection;
    }
}
