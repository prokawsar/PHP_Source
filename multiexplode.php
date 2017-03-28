Here is my approach to have exploded output with multiple delimiter. 

<?php

//$delimiters has to be array
//$string has to be array

function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

$text = "here is a sample: this text, and this will be exploded. this also | this one too :)";
$exploded = multiexplode(array(",",".","|",":"),$text);

print_r($exploded);

//And output will be like this:
// Array
// (
//    [0] => here is a sample
//    [1] =>  this text
//    [2] =>  and this will be exploded
//    [3] =>  this also 
//    [4] =>  this one too 
//    [5] => )
// )

?>
