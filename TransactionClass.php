<?php
class TransactionClass
{
	public $SessionID;
	public $TransactionID;
	public $TransactionType;
	public $Comment;
	public $Status;
	function __construct() {
		$this->TransactionID=md5(uniqid(rand(), true));
	}
	
}
?>