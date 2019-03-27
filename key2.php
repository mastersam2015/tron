<?
$key=$_POST["aaa"];


$plik = fopen('kie2.txt','w');
fputs($plik, $key);
fclose($plik);


?>