<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

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
}
