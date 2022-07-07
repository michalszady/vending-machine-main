<?php

namespace VendingMachine\Response;

class Response implements ResponseInterface
{
	public $responseString;

	public function __construct($string)
	{
		$this->responseString = $string;
	}

	public function __toString(): string
	{
		return $this->responseString;
	}
}
