<?php 
class Statia { 
    private $text; 
    private $url; 

    public function __construct($url) { 
        $this->url = $url; 
        $this->text = $this->getTextFromFile($url); 
    } 

    private function getTextFromFile($filePath) { 
        if (file_exists($filePath)) { 
            $content = file_get_contents($filePath); 
            if ($content !== false) { 
                $text = strip_tags($content); 
                return trim($text); 
            } else {
                return "error";
            }
        } 
        return "error"; 
    } 

    public function genAnons() { 
        if ($this->text === "error" || $this->text === "error") {
            return $this->text;
        }

        $anons = substr($this->text, 0, 250); 
        $w = explode(' ', $anons); 

        if (count($w) < 3) {
            return $anons . '...';
        }

        $ltw = array_slice($w, -3); 
        $linkText = implode(' ', $ltw);     
        $link = '<a href="' . $this->url . '">' . $linkText . '</a>'; 

        $w[count($w) - 3] = $link; 
        $w = array_slice($w, 0, -2); 

        $anons = implode(' ', $w) . '...'; 
        return $anons; 
    } 
} 

$articleFiles = ["statia1.html", "statia2.html"];

foreach ($articleFiles as $filePath) {
    $Statia = new Statia($filePath); 
    $fgh = $Statia->genAnons(); 
    echo "<p>$fgh</p>";
}
?> 
<html> 
</html>