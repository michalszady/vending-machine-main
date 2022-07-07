<?php

namespace VendingMachine\Input;

use VendingMachine\Exception\InvalidInputException;

class InputHandler implements InputHandlerInterface
{
    protected $vendingMachine;

    public function __construct($vendingMachine)
    {
        $this->vendingMachine = $vendingMachine;
    }

    /**
     * @throws InvalidInputException
     */
	public function getInput(): InputInterface
    {
        $input = new Input($this->vendingMachine);
        return $input;
    }
}
