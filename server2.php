<?
ob_start();
session_start();

//---------------------kierunek
$plik = fopen('kie2.txt','r');
$kie=fgets($plik, 100);

$plik = fopen('p2.txt','r');
$p1=fgets($plik, 100);

$plik = fopen('p1.txt','r');
$p2=fgets($plik, 100);


$la=$_SESSION["last"];
if ((empty($kie))and($la!=4)){
$_SESSION["xx"]=3;
$_SESSION["last"]=3;
}

if (($kie==1)and($la!=2)){
$_SESSION["xx"]=1;
$_SESSION["last"]=1;
}



if (($kie==2)and($la!=1)){
$_SESSION["xx"]=2;
$_SESSION["last"]=2;
}

if (($kie==3)and($la!=4)){
$_SESSION["xx"]=3;
$_SESSION["last"]=3;
}



if (($kie==4)and($la!=3)){
$_SESSION["xx"]=4;
$_SESSION["last"]=4;
}



if (!isset($_SESSION["xx"])){
$_SESSION["xx"]=4;
}

//echo $kie." kie<br>";

$ki=$_SESSION["xx"];

?>


<center>
<strong style="color:00ff00;">player2</strong><br>

<?

echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" >";

//-----------------------------------------------lewy
$plik = fopen('p2x.txt','r');
$p1x=fgets($plik, 10000);
fclose($plik);
$plik = fopen('p2y.txt','r');
$p1y=fgets($plik, 10000);
fclose($plik);


$plik = fopen('p1x.txt','r');
$p2x=fgets($plik, 10000);
fclose($plik);
$plik = fopen('p1y.txt','r');
$p2y=fgets($plik, 10000);
fclose($plik);


if (empty($p1x)){
$p1x="20,";
}


if (empty($p1y)){
$p1y="30,";
}




//echo $p1x." p1x<br>";
$tabx=explode(",",$p1x);

$taby=explode(",",$p1y);

$tabx2=explode(",",$p2x);

$taby2=explode(",",$p2y);
//var_dump($tabx)."<br><br>";
//----------------------------------last ip

foreach ($tabx as $key){
$t++;
if (!empty($key)){
$lx=$key;
}
$tab3[1][$t]=$key;
}



foreach ($taby as $key2){
$o++;
if (!empty($key2)){
$ly=$key2;
}
$tab3[2][$o]=$key2;
}

foreach ($tabx2 as $key3){
$t2++;
if (!empty($key3)){
$tab4[1][$t2]=$key3;
}
}



foreach ($taby2 as $key4){
$o2++;
if (!empty($key4)){
$tab4[2][$o2]=$key4;
}
}
//--------------------------------------------------prawy


for ($i=0;$i<=50;$i++){
echo "<tr>";


for ($j=0;$j<=50;$j++){
//--------------------------------------warunki
$ko++;

if ($j==0){
echo "<td class=\"cze\"></td>";
$z=1;
}
if($i==50){

if ($j>48){
$z=1;
}
else
{
echo "<td class=\"cze\"></td>";
$z=1;
}
}

if ($j==50){

echo "<td class=\"cze\"></td>";
$z=1;
}
if($i==0){
if ($j>44){
$z=1;
}else{
echo "<td class=\"cze\"></td>";
$z=1;
}
}
for($k=0;$k<=$o;$k++){
if(($tab3[1][$k]==$i)and($tab3[2][$k]==$j)){
echo "<td  class=\"zie\" ></td>";
$z=1;
if($ko>7){
if ($tab3[1][$k]==0){
$res=1;
$punkt=1;
}
if ($tab3[1][$k]==50){
$res=1;
$punkt=1;
}
if ($tab3[2][$k]==0){
$res=1;
$punkt=1;
}

if ($tab3[2][$k]==50){
$res=1;
$punkt=1;
}
}
}


if(($tab4[1][$k]==$i)and($tab4[2][$k]==$j)){
echo "<td  class=\"nie\" ></td>";
$z=1;
}
}


if($z!=1){
echo "<td   ></td>";

}
else{
$z=0;
}
}
echo "</tr>";
}
//---------------------c2
echo "";

echo "</table>";

//-------------------------------------------punktacja i warunki





//-----------------------------------------kierunek




//----lewo
if (($ki==1)and($la!=2)){

$lx=$lx;
$ly=$ly-1;
$_SESSION["last"]=1;

}

//----prawo
if (($ki==2)and($la!=1)){

$lx=$lx;
$ly=$ly+1;
$_SESSION["last"]=2;
}


//-----gora
if (($ki==3)and($la!=4)){

$lx=$lx-1;
$ly=$ly;
$_SESSION["last"]=3;
}

//dol
if (($ki==4)and($la!=3)){

$lx=$lx+1;
$ly=$ly;
$_SESSION["last"]=4;
}




$p1x=$p1x.",".$lx;
$p1y=$p1y.",".$ly;

$plik = fopen('p2x.txt','w');
fputs($plik, $p1x);
fclose($plik);



$plik = fopen('p2y.txt','w');
fputs($plik, $p1y);
fclose($plik);


echo "<br>";
?>

<br>

<table border="1" ><tr><td width="30">player1<br><?  echo $p2; ?></td><td width="30">
<?
echo "</td><td width=\"30\">player2<br>".$p1."</td></tr></table>";
//--------------------------------------------zapis do plikow

for($z=0;$z<=$o;$z++){

if(($lx==$tab3[1][$z])and($ly==$tab3[2][$z])){
$res=1;
$punkt=1;
}

}
for($z=0;$z<=$o;$z++){

if(($lx==$tab4[1][$z])and($ly==$tab4[2][$z])){
$res=1;
$punkt=1;
}

}

if ($res==1){

if ($punkt==1){
$plik = fopen('p1.txt','r');
$punkt=fgets($plik, 10000);
fclose($plik);


$punkt++;
$plik = fopen('p1.txt','w');
fputs($plik, $punkt);
fclose($plik);
}


echo "aaaa";
$plik = fopen('p2y.txt','w');
fputs($plik, '20,');
fclose($plik);


$plik = fopen('p2x.txt','w');
fputs($plik, '20,');
fclose($plik);



$p1++;


$plik = fopen('kol2.txt','w');
fputs($plik, '3');
fclose($plik);



$plik = fopen('p1y.txt','w');
fputs($plik, '30,');
fclose($plik);


$plik = fopen('p1x.txt','w');
fputs($plik, '20,');
fclose($plik);



$p1++;


$plik = fopen('kol1.txt','w');
fputs($plik, '3');
fclose($plik);






}
if (($ki==1)and($la==2)){
//echo "<br>nnnnnnnn blad";
}elseif(($ki==1)and($la!=2)){
//echo "<br>nnnnnnnn dobrze<br>";
}
//echo $ki." ki<br>";
//echo $res." res<br>";
//echo $lx." lx<br>";
//echo $ly." ly<br>";
//echo $p1x." p1x<br>";
//echo $p1y." p1y<br>";

?>