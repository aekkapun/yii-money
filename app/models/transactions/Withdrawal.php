<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Withdrawal
 *
 * @author Dan De Luca
 */
class Withdrawal extends Transactions {

	public function negativeValue($TransAmount) {
		$value = - $TransAmount;
		return $value;
	}

}
