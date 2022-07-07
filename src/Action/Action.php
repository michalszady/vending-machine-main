<?php

namespace VendingMachine\Action;

use VendingMachine\Exception\InvalidInputException;
use VendingMachine\Response\Response;
use VendingMachine\Response\ResponseInterface;
use VendingMachine\VendingMachineInterface;
use VendingMachine\Item\ItemCode;
use VendingMachine\Money\Money;

class Action implements ActionInterface
{
    protected $name;

    public function __construct($action)
    {
        switch ($action) {
            case 'GET-A':
                $this->name = 'A';
                break;
            case 'GET-B':
                $this->name = 'B';
                break;
            case 'GET-C':
                $this->name = 'C';
                break;
            case 'RETURN-MONEY':
                $this->name ='RETURN-MONEY';
                break;
            case 'DOLLAR':
                $this->name ='DOLLAR';
                break;
            case 'Q':
                $this->name ='Q';
                break;
            case 'D':
                $this->name ='D';
                break;
            case 'N':
                $this->name ='N';
                break;
            default:
                $exception = new InvalidInputException("Nie znaleziono polecenia");
                echo $exception->message();
                $this->name = -1;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function handle(VendingMachineInterface $vendingMachine): ResponseInterface
    {
        $money = new Money($this->getName());
        if ($this->getName()!= -1) {            
            if ($money->getValue()) {              
                $vendingMachine->insertMoney($money);
                $moneyCodes = [];
                foreach($vendingMachine->getCurrentTransactionMoney()->toArray() as $moneyCode)
                {
                    $moneyCodes[]=$moneyCode->code;
                }
                $response = new Response("Current balance: ".$vendingMachine->getCurrentTransactionMoney()->sum()." (".implode(", ",$moneyCodes).")"."\n");
            } else if($this->getName()!='RETURN-MONEY') {
                $vendingMachine->getCurrentTransactionMoney()->sum();                
                $vendingMachine->dropItem(new ItemCode($this->getName()));
                $response = new Response($this->getName()."\n");
            }else{
                $moneyCodes = [];
                foreach($vendingMachine->getCurrentTransactionMoney()->toArray() as $moneyCode)
                {
                    $moneyCodes[]=$moneyCode->code;
                }
                $response = new Response(implode(", ",$moneyCodes)."\n");
            }
        }else{
            $response = new Response("\n");
        }    
        return $response;
    }
}
