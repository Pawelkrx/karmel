<?php
// $Object= new Prostokat(x,y,width,height,color)
// default color="black"
// width = szerokosc
// height = wysokosc
// x = left 
// y = top 

class Rectangle
{
	// lewy górny x
	public $x1;
	
	// lewy górny y
	public $y1;
	
	
	public $x2;
	public $y2;
	
	// szerokość
	private $width;
	
	// wysokość
	private $height;
	
	// szerokość linii
	private $border="1";	
	
	private $color="black";
	
	private $rectangle="<div id='Prostokat' style='{style}'></div>";
	private $style="margin-left:{left};margin-top:{top};width:{width};height:{height};border:solid 1px {color}
		;position:absolute;";
	
	// maksymalny punkt x
	public $maxX;
	// maksymalny punkt y
	public $maxY;
	
	
	
	public function __construct($x,$y,$width,$height,$color)
	{
			$this->color=$color;
			
			$this->x1=$x;
			$this->y1=$y;
			
			$this->width=$width;
			$this->height=$height;
			
			$this->x2=$this->x1+$this->width;
			$this->y2=$this->y1+$this->height;
			
			$this->createRectangle();
			$this->draw();
		
	}
	
	private function draw()
	{
		//echo "draw";
		echo $this->rectangle;
	}
	
	private function createRectangle()
	{
		$this->style=str_replace("{left}",$this->x1,$this->style);
		$this->style=str_replace("{top}",$this->y1,$this->style);
		$this->style=str_replace("{width}",$this->width,$this->style);
		$this->style=str_replace("{height}",$this->height,$this->style);
		$this->style=str_replace("{color}",$this->color,$this->style);
		$this->rectangle=str_replace("{style}",$this->style,$this->rectangle);
	}
	
}

class Punkt
{
	public $x;
	public $y;
	
	public $width="40";
	public $height="40";
	
	public $centerX;
	public $leftX;
	public $rightX;
	
	private $punkt="<div id='punkt' style='{style}'>Punkt</div>";
	private $style="width:{width}px;height:{height}px;margin-left:{left}px;margin-top:{top}px;border: 1px;solid red 1px;background-color:red;position:absolute;";
	
	public function __construct($x,$y)
	{
		$this->x=$x;
		$this->y=$y;
		
		$this->rightX=$this->x+$this->width;
		$this->centerX=$this->width/2;
		
		$this->createPoint();
		
		echo $this->punkt;
	}
	
	private function createPoint()
	{
			$this->style=str_replace("{width}",$this->width,$this->style);
			$this->style=str_replace("{height}",$this->height,$this->style);
			$this->style=str_replace("{left}",$this->x+1,$this->style);
			$this->style=str_replace("{top}",$this->y,$this->style);
			$this->punkt=str_replace("{style}",$this->style,$this->punkt);			
	}	
}


class Przeciecie
{
	public function __construct($Rect1,$Rect2)
	{
		echo "Czy przecinają się?<BR>";
		
		//echo "$Rect2->x1 > $Rect1->x1 && $Rect2->x1 < $Rect1->x2"."<BR>";
		//echo "||<BR>";
		//echo "$Rect2->x2 > $Rect1->x1 && $Rect2->x2 < $Rect1->x2<BR>";
		if(	( ($Rect2->x1 > $Rect1->x1 && $Rect2->x1 < $Rect1->x2
			  ||
			  $Rect2->x2 > $Rect1->x1 && $Rect2->x2 < $Rect1->x2)
			  &&
			  ($Rect2->y1 > $Rect1->y1 && $Rect2->y1 < $Rect1->y2
			  ||
			  $Rect2->y2 > $Rect1->y1 && $Rect2->y2 < $Rect1->y2)			  
			)
		  )//if
		{
			echo "Przecinaja sie w osi X i Y<BR>";
		}else
			{
				echo "Nie przecinaja sie<BR>";
			}
		
	}
}
// x,y,height,width
$Rectangle1=new Rectangle(100,100,200,300,"brown");
$Rectangle2=new Rectangle(100,100,10,25,"blue");
$Przecinaja=new Przeciecie($Rectangle1,$Rectangle2);


?>
<HTML>
<style type="text/css">
</style>

<BODY>
<DIV id="Prostokat1"></DIV>
<DIV id="Prostokat2"></DIV>
<?php

?>
</BODY>
</HTML>



<?php

?>