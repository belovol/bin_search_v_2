<?php
    $key = $_POST['key'];
    $name = NULL;

    foreach (glob("*.txt") as $filename) {
    	$name = $filename;
    }


    function binarySearch(array $array, $item, int $start = 0, int $end = null):int {
    if ($end === null) {
    	$end = count($array) - 1;
    }

    if ($start > $end) return 0;
     
    $halfIndex = (int)($start + $end) / 2;

        if ($array[$halfIndex] !== $item) {
            if ($array[$halfIndex] < $item) $start = $halfIndex + 1; 
            else $end = $halfIndex - 1;  
            return binarySearch($array, $item, $start, $end);     
        }

    return $halfIndex;
    }    

    $descriptor = fopen($name, 'r');
    if ($descriptor) {
    while (($string = fgets($descriptor)) !== false) {
        $cut = explode(" ", $string);
        sort($cut); 
     
        //echo "<center>position is ".binarySearch($cut, $key).": <h3>".$key."</h3>";
        if (binarySearch($cut, $key) != 0) echo "<center>совпадение есть<h3>".$key."</h3>";
        }
    fclose($descriptor);

    }   else echo 'Невозможно открыть указанный файл';

 
?>