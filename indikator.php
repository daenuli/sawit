<?php

$line = '';

$f = fopen('capture.txt', 'r');

$cursor = -1;

fseek($f, $cursor, SEEK_END);

$char = fgetc($f);

while ($char === "w" || $char === "n") {

  fseek($f, $cursor--, SEEK_END);

  $char = fgetc($f);

}

/**
15
* Read until the start of file or first newline char
16
*/

while ($char !== false && $char !== "w" && $char !== "n" ) {

/**
19
* Prepend the new char
20
*/

	if (is_numeric($char)) {
       $line = $char . $line;
    } 
  

  fseek($f, $cursor--, SEEK_END);

  $char = fgetc($f);

}
//echo substr($line,0,7) ;
if(strlen($line) == 8){
echo $line;
};
?>
