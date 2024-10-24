<?php 
class Statia { 
    private $text; 
    private $url; 

    public function __construct($url) { 
        $this->url = $url; 
        $this->text = $this->getTextFromUrl($url); 
    } 

    private function getTextFromUrl($url) { 
        if (filter_var($url, FILTER_VALIDATE_URL)) { 
            $content = file_get_contents($url); 
            if ($content !== false) { 
                $text = strip_tags($content); 
                return trim($text); 
            } 
        } 
        return "error"; 
    } 

    public function genAnons() { 
        $anons = substr($this->text, 0, 250); 
        $words = explode(' ', $anons); 

        if (count($words) < 3) {
            return $anons . '...';
        }

        $lastThreeWords = array_slice($words, -3); 
        $linkText = implode(' ', $lastThreeWords); 
        $link = '<a href="' . $this->url . '">' . $linkText . '</a>'; 

        $words[count($words) - 3] = $link; 
        $words = array_slice($words, 0, -2); 

        $anons = implode(' ', $words) . '...'; 
        return $anons; 
    } 
} 

$url = "C:\Users\NIKRO\OneDrive\Документы\GitHub\braind\statia.html"; 
$Statia = new Statia($url); 
$fgh = $Statia->genAnons(); 
echo $fgh; 
?> 
<html> 
</html>
