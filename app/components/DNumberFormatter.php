<?php
	
class DNumberFormatter extends CNumberFormatter
{
	private $_locale;
	private $_formats=array();

	/**
	 * Constructor.
	 * @param mixed $locale locale ID (string) or CLocale instance
	 */
	public function __construct($locale)
	{
		if(is_string($locale))
			$this->_locale=CLocale::getInstance($locale);
		else
			$this->_locale=$locale;
	}

	/**
	 * Formats a number based on the specified pattern.
	 * Note, if the format contains '%', the number will be multiplied by 100 first.
	 * If the format contains '‰', the number will be multiplied by 1000.
	 * If the format contains currency placeholder, it will be replaced by
	 * the specified localized currency symbol.
	 * @param string $pattern format pattern
	 * @param mixed $value the number to be formatted
	 * @param string $currency 3-letter ISO 4217 code. For example, the code "USD" represents the US Dollar and "EUR" represents the Euro currency.
	 * The currency placeholder in the pattern will be replaced with the currency symbol.
	 * If null, no replacement will be done.
	 * @return string the formatting result.
	 */
	public function format($pattern,$value,$currency=null)
	{
		$format=$this->parseFormat($pattern);
		$result=$this->formatNumber($format,$value);
		if($currency===null)
			return $result;
		else if(($symbol=$this->_locale->getCurrencySymbol($currency))===null)
			$symbol=$currency;
		return str_replace('¤',$symbol,$result);
	}

	/**
	 * Formats a number using the currency format defined in the locale.
	 * @param mixed $value the number to be formatted
	 * @param string $currency 3-letter ISO 4217 code. For example, the code "USD" represents the US Dollar and "EUR" represents the Euro currency.
	 * The currency placeholder in the pattern will be replaced with the currency symbol.
	 * @return string the formatting result.
	 */
	public function formatCurrency($value,$currency)
	{
		return $this->format($this->_locale->getCurrencyFormat(),$value,$currency);
	}

	/**
	 * Formats a number using the percentage format defined in the locale.
	 * Note, if the percentage format contains '%', the number will be multiplied by 100 first.
	 * If the percentage format contains '‰', the number will be multiplied by 1000.
	 * @param mixed $value the number to be formatted
	 * @return string the formatting result.
	 */
	public function formatPercentage($value)
	{
		return $this->format($this->_locale->getPercentFormat(),$value);
	}

	/**
	 * Formats a number using the decimal format defined in the locale.
	 * @param mixed $value the number to be formatted
	 * @return string the formatting result.
	 */
	public function formatDecimal($value)
	{
		return $this->format($this->_locale->getDecimalFormat(),$value);
	}

	/**
	 * Formats a number based on a format.
	 * This is the method that does actual number formatting.
	 * @param array $format format with the following structure:
	 * <pre>
	 * array(
	 * 	'decimalDigits'=>2,     // number of required digits after decimal point; 0s will be padded if not enough digits; if -1, it means we should drop decimal point
	 *  'maxDecimalDigits'=>3,  // maximum number of digits after decimal point. Additional digits will be truncated.
	 * 	'integerDigits'=>1,     // number of required digits before decimal point; 0s will be padded if not enough digits
	 * 	'groupSize1'=>3,        // the primary grouping size; if 0, it means no grouping
	 * 	'groupSize2'=>0,        // the secondary grouping size; if 0, it means no secondary grouping
	 * 	'positivePrefix'=>'+',  // prefix to positive number
	 * 	'positiveSuffix'=>'',   // suffix to positive number
	 * 	'negativePrefix'=>'(',  // prefix to negative number
	 * 	'negativeSuffix'=>')',  // suffix to negative number
	 * 	'multiplier'=>1,        // 100 for percent, 1000 for per mille
	 * );
	 * </pre>
	 * @param mixed $value the number to be formatted
	 * @return string the formatted result
	 */
	protected function formatNumber($format,$value)
	{
		if (!empty($format)) {
			$format = array(
				'decimalDigits' => 2,
				'maxDecimalDigits' => 2,
				'integerDigits' => 1,
				'groupSize1' => 0,
				'groupSize2' => 0,
				'positivePrefix' => '',
				'positiveSuffix' => '',
				'negativePrefix' => '-',
				'negativeSuffix' => '',
				'multiplier' => 1
			);
		}
		
		$negative=$value<0;
		$value=abs($value*$format['multiplier']);
		if($format['maxDecimalDigits']>=0)
			$value=round($value,$format['maxDecimalDigits']);
		$value="$value";
		if(($pos=strpos($value,'.'))!==false)
		{
			$integer=substr($value,0,$pos);
			$decimal=substr($value,$pos+1);
		}
		else
		{
			$integer=$value;
			$decimal='';
		}

		if($format['decimalDigits']>strlen($decimal))
			$decimal=str_pad($decimal,$format['decimalDigits'],'0');
		if(strlen($decimal)>0)
			$decimal=$this->_locale->getNumberSymbol('decimal').$decimal;

		$integer=str_pad($integer,$format['integerDigits'],'0',STR_PAD_LEFT);
		if($format['groupSize1']>0 && strlen($integer)>$format['groupSize1'])
		{
			$str1=substr($integer,0,-$format['groupSize1']);
			$str2=substr($integer,-$format['groupSize1']);
			$size=$format['groupSize2']>0?$format['groupSize2']:$format['groupSize1'];
			$str1=str_pad($str1,(int)((strlen($str1)+$size-1)/$size)*$size,' ',STR_PAD_LEFT);
			$integer=ltrim(implode($this->_locale->getNumberSymbol('group'),str_split($str1,$size))).$this->_locale->getNumberSymbol('group').$str2;
		}

		if($negative)
			$number=$format['negativePrefix'].$integer.$decimal.$format['negativeSuffix'];
		else
			$number=$format['positivePrefix'].$integer.$decimal.$format['positiveSuffix'];

		return strtr($number,array('%'=>$this->_locale->getNumberSymbol('percentSign'),'‰'=>$this->_locale->getNumberSymbol('perMille')));
	}

	/**
	 * Parses a given string pattern.
	 * @param string $pattern the pattern to be parsed
	 * @return array the parsed pattern
	 * @see formatNumber
	 */
	protected function parseFormat($pattern)
	{
		if(isset($this->_formats[$pattern]))
			return $this->_formats[$pattern];

		$format=array();

		// find out prefix and suffix for positive and negative patterns
		$patterns=explode(';',$pattern);
		$format['positivePrefix']=$format['positiveSuffix']=$format['negativePrefix']=$format['negativeSuffix']='';
		if(preg_match('/^(.*?)[#,\.0]+(.*?)$/',$patterns[0],$matches))
		{
			$format['positivePrefix']=$matches[1];
			$format['positiveSuffix']=$matches[2];
		}

		if(isset($patterns[1]) && preg_match('/^(.*?)[#,\.0]+(.*?)$/',$patterns[1],$matches))  // with a negative pattern
		{
			$format['negativePrefix']=$matches[1];
			$format['negativeSuffix']=$matches[2];
		}
		else
		{
			$format['negativePrefix']=$this->_locale->getNumberSymbol('minusSign').$format['positivePrefix'];
			$format['negativeSuffix']=$format['positiveSuffix'];
		}
		$pat=$patterns[0];

		// find out multiplier
		if(strpos($pat,'%')!==false)
			$format['multiplier']=100;
		else if(strpos($pat,'‰')!==false)
			$format['multiplier']=1000;
		else
			$format['multiplier']=1;

		// find out things about decimal part
		if(($pos=strpos($pat,'.'))!==false)
		{
			if(($pos2=strrpos($pat,'0'))>$pos)
				$format['decimalDigits']=$pos2-$pos;
			else
				$format['decimalDigits']=0;
			if(($pos3=strrpos($pat,'#'))>=$pos2)
				$format['maxDecimalDigits']=$pos3-$pos;
			else
				$format['maxDecimalDigits']=$format['decimalDigits'];
			$pat=substr($pat,0,$pos);
		}
		else   // no decimal part
		{
			$format['decimalDigits']=0;
			$format['maxDecimalDigits']=0;
		}

		// find out things about integer part
		$p=str_replace(',','',$pat);
		if(($pos=strpos($p,'0'))!==false)
			$format['integerDigits']=strrpos($p,'0')-$pos+1;
		else
			$format['integerDigits']=0;
		// find out group sizes. some patterns may have two different group sizes
		$p=str_replace('#','0',$pat);
		if(($pos=strrpos($pat,','))!==false)
		{
			$format['groupSize1']=strrpos($p,'0')-$pos;
			if(($pos2=strrpos(substr($p,0,$pos),','))!==false)
				$format['groupSize2']=$pos-$pos2-1;
			else
				$format['groupSize2']=0;
		}
		else
			$format['groupSize1']=$format['groupSize2']=0;

		return $this->_formats[$pattern]=$format;
	}
}