<?php
/*
Losowa generator symulujący gre w kółko i krzyżyk
Na wejściu generuje losową tablicę o wymiarach zadanych przez użytkownika
i generuje jej wynik
*/

class Kolko
{
	
	// Tablica wyników gry
	private $GameTable=array();
	// Wielkość wyników gry
	private $sizeGameTable=3;
	
	// Tablica Punktów gry
	// rozmiar Tablicy to sizeGameTable*sizeGameTable 
	private $PointsTable=array();
	private $sizePointsTable;
	
	// GameNumbers
	// Tablica losowych liczb, punktów
	private $GameNumbers=array();
	private $sizeGameNumbers;
	public function __construct($x=3)
	{
		$this->sizeGameTable=$x;
		$this->sizePointsTable=pow($this->sizeGameTable,2);
		$this->sizeGameNumbers=pow($this->sizeGameTable,2);
	
		$this->createGameTable();
		
		$this->playGame();
		$this->showGameTable();
		$this->Wynik();
		//var_dump($this->GameTable);
		//var_dump($this->PointsTable);
	}
	
	//funkcja tworzy tablic wylosowanej gry
	// $GameTable
	//oraz tablicę punktów;
	private function createGameTable()
	{
		for($i=0;$i<$this->sizeGameTable;$i++)
		{
			$z=$this->sizeGameTable;
			for($j=0;$j<$this->sizeGameTable;$j++)
			{
			
			//$this->GameTable[$i][$j]=rand(0,1);
			$this->GameTable[$i][$j]="";
			$this->PointsTable[$i*$z+$j]=array($i,$j);			
			}			
		}
	}
	
	private function playGame()
	{
		// 0 = 'O'
		// 1 = 'X'
		$start=0;
		
			$j=0;
		for($i=0;$i<$this->sizePointsTable;$i++)
		{
				
				$losuj=true;
				while($losuj)
				{
					$numer=rand(0,$this->sizePointsTable-1);
					if(!$this->check($numer,$i))
					{
						$losuj=false;
					}
				}			
				
			//echo "Wylosowałem:".$numer." Point is:".$this->PointsTable[$numer][0].",".$this->PointsTable[$numer][1]."<BR>";
			
			if($start=='0')
			 {
			 $this->GameTable[ $this->PointsTable[$numer][0] ][ $this->PointsTable[$numer][1] ] = $start;
			 $start=1;
			 }else
			   {
				$this->GameTable[ $this->PointsTable[$numer][0] ][ $this->PointsTable[$numer][1] ] = $start;
				$start=0;
			   }
			 
			
			$this->GameNumbers[$i]=$numer;
			
			$j++;
		}	
	}
	
	
	private function check($numer,$nr)
	{
		$wylosowano=false;
		for($i=0;$i<sizeof($this->GameNumbers);$i++)
		{
			if($this->GameNumbers[$i]==$numer)
			{
				if($this->GameNumbers[$i]==$numer)
				{
				//echo "Wylosowano juz<BR>";
				return $wylosowano="true";
				}
			}
		}
		
	return $wylosowano;
	}
	
	
	
	
	
	
	
	private function showGameTable()
	{
		
		for($i=0;$i<$this->sizeGameTable;$i++)
		{
			for($j=0;$j<$this->sizeGameTable;$j++)
			{
			
				if($this->GameTable[$i][$j]=='0')
				{
					echo "O";
				}else
					if($this->GameTable[$i][$j]=='1')
					{
						echo "X";
					}
				//echo $this->GameTable[$i][$j];
				echo "  |  ";
			}			
			echo "<BR>";
			echo "================<BR>";
		}
		
		
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
			
			
			//for($i=0;$i<3;$i++)
				for($i=0;$i<$this->sizeGameTable;$i++)
				{
					$win1="";
					$win2="";
						//for($j=0;$j<3;$j++)
						for($j=0;$j<$this->sizeGameTable;$j++)						
						{
						//$win.=$this->GameTable[$i][$j];						
						$win1.=$this->GameTable[$i][$j];			
						$win2.=$this->GameTable[$j][$i];			
						}
						//echo $win1."<BR>";
					$arr[$nr]=$win1;$nr++;
					$arr[$nr]=$win2;$nr++;
						//echo $win2."<BR>";
				//$this->sizeGameTable
				//$win3.=$this->GameTable[3-$i-1][$i];							
				$win3.=$this->GameTable[$this->sizeGameTable-$i-1][$i];							
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
	
	
	
	
	
	
	
}
$K=new Kolko(3);

?>