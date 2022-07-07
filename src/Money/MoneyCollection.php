<?php

namespace VendingMachine\Money;

class MoneyCollection implements MoneyCollectionInterface
{

    
    private $money = [];
    private $moneySum = 0;
    public function add(MoneyInterface $money): void
    {
        $this->money[] = $money;
    }
    public function sum(): float
    {
        $this->moneySum = 0;
        foreach($this->money as $m)
        {
            $this->moneySum+=$m->getValue();
        }
        return floatval($this->moneySum);
    }
    public function merge(MoneyCollectionInterface $moneyCollection): void
    {

    }
    public function empty(): void
    {
        $this->money = [];
    }

    /**
     * @return MoneyInterface[]
     */
    public function toArray(): array
    {
        
        return $this->money;
    }
}
