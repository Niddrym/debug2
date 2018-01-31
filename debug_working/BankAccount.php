<?php
class BankAccount{

	public $type; //adding a comment
	public $number; // test comment2
	public $name;
	public $balance; // add comment 2
	
	public static $totalAccounts=0;
	public static $accounts=[];
	
	public static function displayTotalAccounts(){
		return BankAccount::$totalAccounts;
	}
	
	
	public function __construct($nameIn, $typeIn){
		$this->name=$nameIn;
		$this->type=$typeIn;
		$this->balance=0;
		
		$this->number=++BankAccount::$totalAccounts; //wrong operator
		BankAccount::$accounts["ACT".$this->number]=$this;
		
	}
	
	public function deposit($amountIn){
        if($amountIn<0)
            throw new Exception("Cannot deposit a negative amount!!");
	    $this->balance+=$amountIn;
	}
	
	public function withdraw($amountOut){
	    if($amountOut<=0)
	        throw new Exception("Cannot withdraw a negative amount!!");
	    else if($this->type=="Savings")
            throw new Exception("Cannot withdraw from a savings account.");
        else if($amountOut<$this->balance){ //wrong comparison
            $this->balance-=$amountOut;
        }
        else{
            throw new Exception("Not enough money in ".$this->name);
        }

	}

	public function transfer($amount, $accountNumber){
        if($amount<0)
            throw new Exception("Cannot transfer a negative amount!!");
        if($amount>$this->balance){
            $this->balance-=$amount;
            BankAccount::$accounts["ACT".$accountNumber]->deposit($amount);
        }
        else{
            throw new Exception("Not enough money in ".$this->name);
        }
    }
	
	public function accountQuery(){
		return $this->balance;
	}
	
}


?>