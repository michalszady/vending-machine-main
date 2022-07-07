<?php

namespace VendingMachine\Input;

use VendingMachine\Action\Action;
use VendingMachine\Action\ActionInterface;
use VendingMachine\Money\MoneyCollectionInterface;

class Input implements InputInterface
{
	protected $vendingMachine;

	public function __construct($vendingMachine)
	{
		$this->vendingMachine = $vendingMachine;
	}

	public function getAction(): ActionInterface
	{
		$input = readline('Input: ');
		$action = new Action($input);
		return $action;
	}
	public function getMoneyCollection(): MoneyCollectionInterface
	{
		return $this->vendingMachine->getCurrentTransactionMoney();
	}
}
