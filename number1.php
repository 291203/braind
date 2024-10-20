<?php
class statia{
    private $text;
    public function __construct($url){
        $this->text = $this->getTextFromUrl($url);
    }
    private function getTextFromUrl($url){
        $content = @file_get_contents($url);
        if($content !== false){
        $text = strip_tags($content);
        return trim($text);
        }
    }
    //public function getText(){
        //return $this->text;
    //}
    public function predlozh(){
        if(preg_match('/^(.*?[.!?])/',$this->text ,$matches)){
            return trim($matches[1]);
        }
        return '';
    }
    public function ssilka(){
        $w = preg_split('/\s+/',trim($this->predlozh()));
        $c = count($w);
        $lw = array_slice($w,-3);
        $linc = '<a href="http://statia.com">'. implode( ' ',$lw) . '<a>';
        $qwe = implode(' ',array_slice($w,0,-3));
        return $qwe . ' ' . $linc . ' ...';
    }
}
$url = "http://statia.com";
$Statia = new statia($url);
$fgh = $Statia->ssilka();
echo $fgh;
?>
<html>
   
</html>
