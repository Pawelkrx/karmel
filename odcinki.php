<?php

// Klasa reprezentuje odcinek
// Aby aplikacja działała poprawnie
// Pierwszy punk musi mieć mniejszą współrzędną x1 od drugiego punktu x2. 
class Odcinek
{
	
	//	współrzędne punktu A
	private $x1;
	private $y1;
	
	// współrzędne punktu B
	private $x2;
	private $y2;
	// współczynnik kierunkowy
	private $a;
	
	// miejsce przecięcia z osią YO
	private $b;
	
	
	// Konstruktor przypisuje zmienne private
	// oraz oblicza współczynik kierunkowy
	// $a
	// i przecięcie osi Y0
	// $b
	public function __construct($A,$B)
	{
		$this->x1=number_format($A[0],2);
		$this->y1=number_format($A[1],2);
	
		$this->x2=number_format($B[0],2);
		$this->y2=number_format($B[1],2);
	
	
	// Nie dziel przez zero
	// Oblicza współczynnik kierunkowy
	if(	($this->x1-$this->x2)!=0)
		{
		$this->a=$a=number_format(($this->y1-$this->y2)/($this->x1-$this->x2),2);
		}
	// Nie dziel przez zero
	// Oblicza przecięcie z osią Y0
	if(	($this->x1-$this->x2)!=0)
		{
		$this->b=$b=number_format($this->y1-(	($this->y1-$this->y2)/($this->x1-$this->x2)*$this->x1	));
		}
	
	echo "a: ".$a."<BR>";
	echo "b: ".$b."<BR>";
	echo "Odcinek w punktach:"."A($this->x1,$this->y1); B($this->x2,$this->y2)"."<BR>";
	}
	
	
	// Funkcja sprawdza czy wspołrzędna x punktu x,y
	// znajduje się na linii prostej	
	// reprezentującej odcinek
	// zwraca true lub false. 
	public function isX($x,$y)
	{
		$x=number_format($x,2);
		$y=number_format($y,2);
		
		// y=ax+b
		// y-b=ax
		// x=(y-b)/a
		//$x=(float)$x;
		$isX=round(($y-$this->b)/$this->a,4);
		//echo $x-$isX."<BR>";
		
		// Korekta do zaokrąglania
		// 
		if($x-$isX<0.01){$isX=$x;}
		// rzutowanie typu
		$isX=((int) (($isX * 100))/100);// = 5.49
		
		//echo "$isX==$x"."<BR>";				
		if($isX==$x)
		{
			//echo "x znajduje się na linii<BR>";
			return true;
		}else {
			//echo "x nie znajduje się na linii<BR>";
			return false;
			}
	}
	
	// Funkcja zwraca true lub false
	// sprawdza czy współrzędne y punktu x,y
	// znajduje się na lini
	public function isY($x,$y)
	{
		// $y=ax+b
		$isY=$this->a*$x+$this->b;
		$isY=number_format($isY,2);
		$y=number_format($y,2);
		if($isY==$y)
		{
			//echo "y znajduje się na linii<BR>";
			return true;
		}else {
			//echo "y nie znajduje się na linii<BR>";
			return false;}
	}
	
	// Sprawdza czy punkt znajduje się na odcinku
	public function isExist($x,$y)
	{
			// Punkt znajduje się na odcinku jeśli
			// znajduje się na lini
			// oraz x>=x1 i x<=x2
			if($this->isX($x,$y) && $this->isY($x,$y))
			{
				//echo "Punkt znajduje się na linii<BR>";
				if($x>=$this->x1 && $x<=$this->x2)
				{
					//echo "Punkt znajduje sie na odcinku<BR>";
					return true;
				}
				else
					{
					return false;
					//echo "Punkt nie znajduje się na odcinku<BR>";
					}
			}else
				{
				return false;
				//echo "Punkt nie znajduje się na linii<BR>";
				}
		
	}
	
	// zwraca współczynnik kierunkowy a
	// $a
	public function getA()
	{
		return $this->a;
	}
	
	
	// Zwraca przecięcie z osią Y0
	// współrzędna b
	public function getB()
	{
		return $this->b;
	}
}

// Klasa reprezentuje dwa odcinki
// Sprawdza czy dwie proste się przecinają
// Sprawdza czy dwa odcinki się przecinają. 
class DwieProste
{
	
	private $a1;
	private $b1;
	private $a2;
	private $b2;
	
	private $x;
	private $y;
	
	private $Odcinek1;
	private $Odcinek2;
	
	public function __construct($Odcinek1,$Odcinek2)
	{
			$this->Odcinek1=$Odcinek1;
			$this->Odcinek2=$Odcinek2;
			
			$this->a1=$Odcinek1->getA();
			$this->b1=$Odcinek1->getB();
			
			$this->a2=$Odcinek2->getA();
			$this->b2=$Odcinek2->getB();
			//echo "y=$this->a1*x+$this->b1<BR>";
			
			$this->punktPrzeciecia();
			$this->czyPrzecinajaSie();
			
	}
	
	
	// Funkcja sprawdza czy dwa odcinki się przecinają
	// Odcinki przecinają się gdy gdy spełnione są dwa warunki:
	// Punkt przecięcia znajduje się na Odcinek1 i Odcinek2
	public function czyPrzecinajaSie()
	{
		
			if($this->Odcinek1->isExist($this->x,$this->y) && $this->Odcinek2->isExist($this->x,$this->y))
			{
			echo "Odcinki sie przecinaja<BR>";
			return true;
			}else
				{
					return false;
				}
	}
	// Funkcja zwraca punkt Przeciecia się linii
	public function punktPrzeciecia()
	{
		if($this->a1!=$this->a2)
		{
		$this->x=number_format(($this->b1-$this->b2)/($this->a2-$this->a1),2);
		//echo $this->x;
		$this->y=number_format(($this->a2*$this->b1-$this->b2*$this->a1)/($this->a2-$this->a1),2);
		echo "Punkt przecięcia:".$this->x.",".$this->y."<BR>";	
		}
		else
		{
			echo "Proste nigdy się nie przetną<BR>";
		}
	}
}

$Odcinek1=new Odcinek(array(2.50,3.50),array(8.00,7.00));
$Odcinek2=new Odcinek(array(5.00,7.50),array(12.50,4.00));
$PunktPrzeciecia=new DwieProste($Odcinek1,$Odcinek2);

?>
