<?php
class Kolko
{
	
	private $GameTable=array
	(
		'0'=>array(0=>'',1=>'',2=>''),
		'1'=>array(0=>'',1=>'',2=>''),
		'2'=>array(0=>'',1=>'',2=>''),		
	);
	
	private $Punkty=array(array(0,0),array(0,1),array(0,2),array(1,0),array(1,1),array(1,2),
			array(2,0),array(2,1),array(2,2));
		
	private $Game=array();
	private $size=9;
			
	public function __construct()
	{
		//echo sizeof($this->Punkty);
		//echo "<BR>";
		for($i=0;$i<sizeof($this->Punkty);$i++)
		{
			
		}	
		
		$this->LosujGre();
		$this->PokazGre();
		$this->Wynik();
		
	}
	
	public function CreateGameTable()
	{
			
	}
	
	public function Wynik()
	{		
			$win1="";
			$win2="";
			$win3="";
			$win4="";
			
			
			// Tablica sumująca tablice
			$arr=array();
			// iteracja tablicy arr
			$nr=0;			
			
			
			// Liczba wygranych
			$Player0=0;
			$Player1=0;
			
			
			for($i=0;$i<3;$i++)
				{
					$win1="";
					$win2="";
						for($j=0;$j<3;$j++)
						{
						//$win.=$this->GameTable[$i][$j];						
						$win1.=$this->GameTable[$i][$j];			
						$win2.=$this->GameTable[$j][$i];			
						}
						//echo $win1."<BR>";
					$arr[$nr]=$win1;$nr++;
					$arr[$nr]=$win2;$nr++;
						//echo $win2."<BR>";
				
				$win3.=$this->GameTable[3-$i-1][$i];							
				$win4.=$this->GameTable[$i][$i];									
				}	
				$arr[$nr]=$win3;$nr++;
				$arr[$nr]=$win4;$nr++;

		foreach($arr as $value)
		{
			
			//echo $value."<BR>";
			if(strpos($value,'0')!==false){}else {
				//echo "Wygrana '1'<BR>";
				$Player1++;
				}
				
			if(strpos($value,'1')!==false){}else {
				//echo "Wygrana '0'<BR>";
				$Player0++;
				}
		}
		
		
		if($Player0>$Player1){echo "Wygrało O<BR>";}else
		if($Player1>$Player0){echo "Wygrał X<BR>";}else
		if($Player0==$Player1){echo "REMIS<BR>";}
		
			
	}
	
	public function PokazGre()
	{
		foreach($this->GameTable as $x)
		{
			foreach($x as $y)
			{
			if($y==1){$y="X";}else $y="0";
			echo $y." | ";				
			}
			echo "<BR>";
			echo "=======<BR>";
		}
		
	}
	public function LosujGre()
	{
		
		// "1"=="X"
		// "0"=="O"
		
		$start=rand(0,1);
		for($i=0;$i<$this->size;$i++)
		{
			//echo "$i:<BR>,";
				
			$losuj=true;
			$j=0;
			while($losuj)
			{
			$numer=rand(0,$this->size-1);
			
			
				if(!$this->check($numer,$i))
				{
					$losuj=false;
					//echo $numer.":";
					
					//echo "x:".$this->Punkty[$numer][0].", y:".$this->Punkty[$numer][1]."<BR>";
				
					if($start=="1")
					{
					$this->GameTable[	$this->Punkty[$numer][0]	][	$this->Punkty[$numer][1]	]=$start;
					$start="0";
					}else
						{
							$this->GameTable[	$this->Punkty[$numer][0]	][	$this->Punkty[$numer][1]	]=$start;
					$start="1";
						}
					
				}
			$this->Game[$i]=$numer;
			}
			
			$j++;
		}
		
	}
	
	public function check($numer,$nr)
	{
		$wylosowano=false;
		for($i=0;$i<sizeof($this->Game);$i++)
		{
			if($numer==$this->Game[$i])
			{
				$wylosowano=true;
				return true;
			}
		}
	
	return $wylosowano;
	}
	
	public function SprawdzWygrana()
	{
		
	}
}
$K=new Kolko();

?>