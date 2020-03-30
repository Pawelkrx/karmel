<?PHP
/*




*/
class Palindrom
{

	private $word;
	private $reverse;
	
	public function __construct($word="null")
	{
	
	
	
		$this->isPalindrom($word);
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
}
$word=array("madam","racecar","race cars","kajak");
foreach($word as $value)
{
$Palindrom=new Palindrom($value);
}
?>