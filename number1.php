<?php
class statia{
    private $text;
    public function __construct($url){
        $this->text = $this->getTextFromUrl($url);
    }
    private function getTextFromUrl($url){
        if (filter_var($url,FILTER_VALIDATE_URL)){
            $content = @file_get_contents($url);
            if($content !== false){
                $text = strip_tags($content);
                return trim($text);
            } 
        }
        return "error";
    }
   
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
        $linc = '<a href="http://localhost:3000/statia.php">'. implode( ' ',$lw) . '<a>';
        $qwe = implode(' ',array_slice($w,0,-3));
        return $qwe . ' ' . $linc . ' ...';
    }
}
$url = "http://localhost:3000/statia.php";
$Statia = new statia($url);
$fgh = $Statia->ssilka();
echo $fgh;
?>
<html>
   
</html>
