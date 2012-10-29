<?php

class EMoney
{
	/**
	 * Renders a category link.
	 * @param model $subCat
	 */
	public static function subCatLink($subCat){
		if($subCat)
			return CHtml::link($subCat->catName,array('subcat/view','id'=>$subCat->Id));
		else
			return 'None';
	}
	
	/**
	 * Renders a payee link.
	 * @param model $payee
	 */
	public static function payeeLink($payee){
		if($payee)
			return CHtml::link($payee->PayeeName,array('payee/view','id'=>$payee->Id));
		else
			return 'None';
	}
	
	/**
	 * Renders an account link.
	 * @param model $account
	 */	
	public static function accountLink($account){
		if($account)
			return CHtml::link($account->AccName,array('account/view','id'=>$account->Id));
		else
			return 'None';
	}
	
	/**
	 * Checks whether a value is negative and returns the formated ammount if true
	 * @param model $account
	 */		
	public static function isWithdrawal($amount){
		if($amount < 0)
			return self::formatAmount($amount);
	}
	
	/**
	 * Checks whether a value is positive and returns the formated ammount if true
	 * @param model $account
	 */		
	public static function isDeposit($amount){
		if($amount > 0)
			return self::formatAmount($amount);
	}
	
	/**
	 * Formats an ammount into a currency
	 * @param model $account
	 */		
	public static function formatAmount($amount){
		return Yii::app()->numberFormatter->formatCurrency($amount,Yii::app()->params->currency);
	}
}
