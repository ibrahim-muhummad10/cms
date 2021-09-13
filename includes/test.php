<?php 
class Clean {
function removeProfanity($text) {
    $badwords = array("idiotic" => "shortsighted",
"moronic" => "unreasonable",
"insane" => "illogical");
// Remove bad words
return strtr($text, $badwords);
}
}
$clean =new Clean();
echo $clean->removeProfanity("idiotic insane");
