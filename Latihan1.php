<?php

define("GREETING", "Hello World!");
echo GREETING;
?>

<br>

<?php 
$x = 23465.768;
$int_cas= (int)$x;
echo $int_cas;

?>

<br>

<?php 
$x = 4;
$y = 7;
echo "Apakah 4 Lebih besar drpd 7?";
if($x > $y){
echo "Benar";
} else {
    echo "salah";
}
?>

<br>
<?php 
$t = date("H");
if($t < "10"){
echo "Have a good morning";
}else if ($t < "20"){
    echo  "Have a good day";
} else {
echo "Have a good night";
}
?>

<br>

<?php 
for($x=0; $x<10;$x++){
    if($x==4){
        continue;
    }
    echo "Nilainya adalah $x <br>";
}
?>