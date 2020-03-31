<?php



class RandomLotto
{
	
	private $Numbers=array();
	private $start=1;
	private $endd=49;
	private $q=6;
	public function __construct()
	{

		// randomNumbers
		$this->randomNumbers();
		// showNumbers
		$this->showNumbers();
		// returnArrayNumbers	
	}
	
	public function showNumbers()
	{
		echo "The drawn numbers are: <BR>";
		foreach($this->Numbers as $value)
		{
			echo $value.",";
		}
		
	}
	
	private function randomNumbers()
	{
		
		$j=0;
		for($i=0;$i<$this->q;$i++)
		{
					
			$losuj=true;
			$number="";
			
			while($losuj)
			{
				
				$number=rand($this->start,$this->endd);				
					
					if(!$this->check($number,$i))
					{
					$losuj=false;
					}
				
			}
			
			$this->Numbers[$j]=$number;
			$j++;
						
		}
	}
	
	private function check($number,$nr)
	{
			$wylosowana=false;
			
			if($nr<1)
			{
			//$wylosowana=false;
			}else
				{
					for($i=0;$i<sizeof($this->Numbers);$i++)
					{						
						if($number==$this->Numbers[$i])
						{
							$wylosowana=true;
						}						
					}
				}
				
	return $wylosowana;	
	}
	
	
	
}// end of class

$random=new RandomLotto();

?>