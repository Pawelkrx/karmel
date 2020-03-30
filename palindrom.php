<?PHP
/*




*/
class Palindrom
{

	private $word;
	private $reverse;
	
	public function __construct($word="null")
	{
	
	
	
		//$this->isPalindrom($word);
	}
	
	
	public function isPalindrom($word)
	{
	
		$reverse="";
		// reverse word
		for($i=(strlen($word)-1);$i>=0;$i--)
		{
			
			$reverse.=$word[$i];
		}
		echo $word."==".$reverse."<BR>";
			
			if(!strcmp($word,$reverse))
			{
				echo "$word is PALINDROME<BR>";
			return true;
			}
			else
				{
				echo "$word is not PALINDROME<BR>";
				return false;
				}
		
	
	}
	
	public function isPalindrom2($word)
	{
		
		$reverse=strrev($word);
		
		if(!strcmp($word,$reverse))
		{
			
			echo "$word==$reverse  <B>IS</b> palindrome<BR>";
		}else{
			echo "$word!=$reverse <b>IS NOT</B> palindrome </br>";
			}
		
		
	}
}
$word=array("madam","racecar","race cars","kajak");
$Palindrom=new Palindrom();
	foreach($word as $value)
	{
	$Palindrom->isPalindrom($value);
	}

	echo "<BR><BR><B>Method two.</b><BR>";
	foreach($word as $value)
	{
	$Palindrom->isPalindrom2($value);
	}
?>