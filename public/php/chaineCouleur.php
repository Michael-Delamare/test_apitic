<?php
$string = "test";
$Nstring = str_split ( "$string" ,1);
foreach ($Nstring as $value) {
    $str= "rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
    echo "<b style='color:".$str."'>".$value."</b>";
}
?>
