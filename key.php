<?
$key=$_POST["aaa"];


$plik = fopen('kie1.txt','w');
fputs($plik, $key);
fclose($plik);


?>