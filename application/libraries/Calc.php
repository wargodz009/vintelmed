<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calc {
	function total($price = 0,$count = 0,$discount = 0) {
		
		$total = $price * $count;
		$less = $total * ($discount / 100 );
		return $total - $less;
	}
	function to_money($x){
		return 'P '.number_format($x,2);
	}
}