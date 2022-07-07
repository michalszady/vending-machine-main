<?php

namespace VendingMachine\Money;

class Money implements MoneyInterface
{
    protected $value;
    public $code;

    const DOLLAR = 1.00;
    const Q = 0.25;
    const D = 0.10;
    const N = 0.05;

    public function __construct(string $code)
    {
        
        $this->code = $code;
        switch ($this->code) {
            case 'DOLLAR':
                $this->value = self::DOLLAR;
                break;
            case 'Q':
                $this->value = self::Q;
                break;
            case 'D':
                $this->value = self::D;
                break;
            case 'N':
                $this->value = self::N;
                break;
            default:
                $this->value = false;                 
                break;
        }
    
    }

    public function getValue(): float
    {
        return $this->value;
    }
    public function getCode(): string
    {
        return $this->code;
    }
}
