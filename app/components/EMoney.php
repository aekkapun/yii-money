<?php

class EMoney
{
	public static function subCatLink($subCat){
		if($subCat)
			return CHtml::link($subCat->catName,array('subcat/view','id'=>$subCat->Id));
		else
			return 'None';
	}
	
	public static function payeeLink($payee){
		if($payee)
			return CHtml::link($payee->PayeeName,array('payee/view','id'=>$payee->Id));
		else
			return 'None';
	}
	
	public static function accountLink($account){
		if($account)
			return CHtml::link($account->AccName,array('account/view','id'=>$account->Id));
		else
			return 'None';
	}
	
	public static function isWithdrawal($amount){
		if($amount < 0)
//			return Yii::app()->numberFormatter->format($amount,Yii::app()->params->currency);
			return Yii::app()->numberFormatter->formatCurrency($amount,Yii::app()->params->currency);
	}
	
	public static function isDeposit($amount){
		if($amount > 0)
			return Yii::app()->numberFormatter->formatCurrency($amount,Yii::app()->params->currency);
	}
}
