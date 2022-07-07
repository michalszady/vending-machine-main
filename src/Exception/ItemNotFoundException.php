<?php

namespace VendingMachine\Exception;

use RuntimeException;

class ItemNotFoundException extends RuntimeException
{
    function message(){
        return "KOMUNIKAT : " . $this->getMessage();
     }
    
}
