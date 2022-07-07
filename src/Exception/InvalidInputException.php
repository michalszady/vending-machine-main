<?php

namespace VendingMachine\Exception;

use InvalidArgumentException;

class InvalidInputException extends InvalidArgumentException
{
    function message(){
        return "BŁĄÐ : " . $this->getMessage();
     }
}
