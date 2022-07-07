<?php

namespace VendingMachine\Item;

use VendingMachine\Exception\ItemNotFoundException;

class ItemCollection implements ItemCollectionInterface
{
    protected $items = [];
    protected $count = 0;

    public function add(ItemInterface $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @throws ItemNotFoundException
     */
    public function get(ItemCodeInterface $itemCode): ItemInterface
    {
        foreach ($this->items as $item) {
            if ($item->getCode() == $itemCode) {
                return $item;
            }
        }
        if ($this->count($itemCode)==0) {
            $exception = new ItemNotFoundException("Wybrany produkt nie jest dostępny. Wybierz inny.");
            echo $exception->message();
            return new Item(0, 0, 0);
        }
    }

    public function count(ItemCodeInterface $itemCode): int
    {
        $this->count = 0;
        foreach ($this->items as $item) {
            if ($item->getCode() == $itemCode) {
                $this->count++;
            }
        }
        return $this->count;
    }

    public function empty(): void
    {
    }

    public function del(ItemCodeInterface $itemCode): void
    {
        for ($t = 0;$t<count($this->items);$t++) {
            if ($this->items[$t]->getCode() == $itemCode) {
                array_splice($this->items, $t, $t==0?1:$t);
            }
        }
    }
}
