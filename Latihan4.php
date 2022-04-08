<html>

<title>Latihan 4</title>

<head>
</head>

<body>


<!-- Fungsi Array-->
<?php 

//include apabila tdk terdapat file yg diimport maka akan muncul warning dan tetap bisa berjalan
//require apabila tdk terdapat file maka akan fatal error
include 'arithmatics-lib.php';

$bil1 = 2;
$bil2 = 3;
$bil3 = 2;
$bil4 = 3;


// data array yang berisi banyak data di 1 variabel
$bilangan=array('20', '30', '40', '50', '60');

$arrlength = count($bilangan);
$jum = $bilangan[0]+$bilangan[4];
$sum = $bilangan[0]+$bilangan[1]+$bilangan[2]+$bilangan[3]+$bilangan[4];
$rata = $sum/$arrlength;

echo $jum. '<br>';
echo $rata. '<br>';
echo 'Nilai dari bilangan diatas adalah &nbsp' .pengurangan($bil1, $bil2);


?>

<br>

<!-- FUNGSI GET -->
<?php 
// perintah GET untuk mendapatkan data berupa array (array asosiatif) dari URL atau akses lain -> URL http://localhost/Basic_PHP/Latihan4.php?bil1=20&bil2=30 -->
// apabila nilai tidak ada di URL maka akan muncul undefined -> dengan menggunakan fungsi isset
if(isset($_GET['bil1']) && isset($_GET['bil2'])) {
$a= $_GET['bil1'];
$b= $_GET['bil2'];

$hasil= $a+$b;

echo "Hasil Penjumlahan ".$a. " dan ".$b. " adalah ".$hasil;

}
?>
</body>

</html>
