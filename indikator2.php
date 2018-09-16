<?php

$line = '';

$f = fopen('capture2.txt', 'r');

$cursor = -1;

fseek($f, $cursor, SEEK_END);

$char = fgetc($f);

while ($char === "+" || $char === "-") {

  fseek($f, $cursor--, SEEK_END);

  $char = fgetc($f);

}

/**
15
* Read until the start of file or first newline char
16
*/

while ($char !== false && $char !== "+" && $char !== "-" ) {

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
if(strlen($line) == 7){
echo $line;
};
?>
