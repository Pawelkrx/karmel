<?php
// $Object= new Prostokat(x,y,width,height,color)
// default color="black"
// width = szerokosc
// height = wysokosc
// x = left 
// y = top 

class Prostokat
{

	private $x;
	private $y;
	private $width;
	private $height;
	private $color="blue";
	private $border="5";
	
	public $style="width:px;height:px;top:px;left:px;position:absolute;border:0px solid color;";
	public $div="<div id='' style=''></div>";
	
	function __construct($x=200,$y=200,$width=100,$height=100,$color="black")
	{
		//  left
		$this->x=$x;
		// top
		$this->y=$y;
		$this->width=$width;$this->border;
		$this->height=$height;$this->border;
		
		// Korekta do poprawnego wyświetlania
		$width =$this->width-$this->border;
		$height=$this->height-$this->border;
			$this->style=str_replace("width:","width:$width",$this->style);
			$this->style=str_replace("height:","height:$height",$this->style);
			$this->style=str_replace("top:","top:$y",$this->style);
			$this->style=str_replace("left:","left:$x",$this->style);
			$this->style=str_replace("border:0","border:$this->border",$this->style);
			$this->style=str_replace("color","$color",$this->style);
	
	$this->div=str_replace("style=''","style='".$this->style."'",$this->div);
	echo $this->div;
	}
	
	public function distance()
	{
	$x=pow($this->x,2);
    $y=pow($this->y,2);
	
	
	$distance=round(sqrt($x+$y));
	//echo $distance;
	return $distance;
	}
	public function leftPoint()
	{
		
		return array($this->x,$this->y);
	}
	
	public function maxPoint()
	{
		$x=$this->x+$this->width;
		$y=$this->y+$this->height;
		
		$Point=array($x,$y);		
		
		return $Point;
	}
}










class PrzecinajaSie
{
	
	private $object1;
	private $object2;
	
	function __construct($object1,$object2)
	{
		$this->object1=$object1;
		$this->object2=$object2;
		//$this->object1->distance();
		$this->czyPrzecinaja();
	}
	
	private function czyPrzecinaja()
	{
		// blue is nr 2
		// red is nr 1
		//echo $this->object1->leftPoint()[0]."<BR>";
		//echo $this->object1->leftPoint()[1]."<BR>";
		echo "Współrzędne Prostokat nr1:".$this->object1->leftPoint()[0].','.$this->object1->leftPoint()[1];
		echo "<BR>";
		echo "Distance:".$this->object1->distance()."<BR>";		
		echo "Współrzędne Prostokąt nr2:".$this->object2->leftPoint()[0].','.$this->object2->leftPoint()[1];
		echo "<BR>";
		echo "Distance:".$this->object2->distance()."<BR>";
		
		if($this->object1->distance()<$this->object2->distance())
			{
				echo "Object1 jest bliżej<BR>";
				
				// Jeśli leftPoint Obiektu dalszego
			    echo $this->object1->maxPoint()[0];
				echo ",";
				echo $this->object1->maxPoint()[1];
				
				echo "<BR>";
				// Jeśli leftPoint Obiektu dalszego
			    echo $this->object2->leftPoint()[0];
				echo ",";
				echo $this->object2->leftPoint()[1];
				
				if($this->object1->maxPoint()[0]>$this->object2->leftPoint()[0]
				   &&
				   $this->object1->maxPoint()[1]>$this->object2->leftPoint()[1]
				  )
				{
					echo "Przecinaja sie w osi X i Y<BR>";
				}else 
					{
						if( $this->object1->maxPoint()[0]==$this->object2->leftPoint()[0]
							&&
						    $this->object1->maxPoint()[1]>=$this->object2->leftPoint()[1]
							||
							$this->object1->maxPoint()[0]<=$this->object2->leftPoint()[0]
							&&
						    $this->object1->maxPoint()[1]==$this->object2->leftPoint()[1]
						  )
						  {
							echo "Nakładają się na siebie<BR>";  
						  }
					}
					
				
								
				
			}else
				if($this->object1->distance()>$this->object2->distance())
				{
				echo "Object 2 jest bliżej<BR>";
				}else 
					{
					echo "Object1 i Object2 mają tą samą odległość więc przecinają się<BR>";
					}
		
		
		
	}
}


?>
<HTML>
<style type="text/css">
</style>

<BODY>
<DIV id="Prostokat1"></DIV>
<DIV id="Prostokat2"></DIV>
<?php
$Prostokat1=new Prostokat(100,100,50,100,"blue");
$Prostokat2=new Prostokat(140,190,100,200,"brown");

$PrzecinajaSie=new PrzecinajaSie($Prostokat1,$Prostokat2);
?>
</BODY>
</HTML>



<?php

?>