<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Incluimos el archivo fpdf
require_once APPPATH.'third_party\fpdf\fpdf.php';

//Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
class Pdf extends FPDF {
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
  /*  function myCell($w,$h,$x,$t){
        $height = $h/3;
        $firts = $height+2;
        $second=$height+$height+$height+3;
        $tree=$height+$height+$height+$height+$height+4;
        $len = strlen($t);
        if($len>20){
            $txt = str_split($t,15);
            $this->SetX($x);
            $this->Cell($w,$firts,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$tree,$txt[2],'','','');
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB','0','L','0');
        }
        else{
            $this->SetX($x);
            $this->Cell($w,$h,$t,'LTRB','0','L','0');
        }
    }
  */
    // El encabezado del PDF
    public function Header(){

        $this->SetTitle('Registro de productividad del servicio de urgencias');
        $this->Image('assets/img/prodpdf.png',0,0,300);
        $this->SetFont('Arial','B',13);
        $this->Cell(20);
        $this->Ln(30);
    }
    function GenerateWord()
    {
        //Get a random word
        $nb=rand(3,10);
        $w='';
        for($i=1;$i<=$nb;$i++)
            $w.=chr(rand(ord('a'),ord('z')));
        return $w;
    }

    function GenerateSentence()
    {
        //Get a random sentence
        $nb=rand(1,10);
        $s='';
        for($i=1;$i<=$nb;$i++)
            $s.=GenerateWord().' ';
        return substr($s,0,-1);
    }
    // El pie del pdf
    public function Footer(){
        $this->SetY(-25);
        $this->SetX(25);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'ELABORO',0,0,'L');
    }
}
?>;