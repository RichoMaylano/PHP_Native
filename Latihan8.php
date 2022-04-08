<html>

<title>Latihan 8</title>

<head>
   <style>
</style>

</head>


<body>
<h2>Data Tempat Wisata</h2>

<table border='1'>
<?php 
$file=fopen("locations.txt","r") or die ("Unable to open file");


$i = 0;

//membaca data tiap baris
while(!feof($file)){
$res=fgets($file);
//mengubah tanda " menjadi empty string
// $replace= str_replace('"',"",$res);

//memecah array data yang mempunyai batasan ,
// $data = explode(",",$replace);

// echo "<table>";

//men skip data array 0 yang mempunyai nilai string Location
if($i==0){
   $i++; //diberi increment supaya data tidak bernilai 0 saja
   continue;
}

$data = explode(",", $res);
$nama = $data[0];
$lat = str_replace('"',"",$data[1]);
$long = str_replace('"',"",$data[2]);

echo "<tr>
<td>".$i."</td>
<td>".$nama."</td>
<td>".$lat."</td>
<td>".$long."</td>
</tr>";
$i++;
// echo "<table border='2'>";

// echo "<tr>";

// echo "<td>";
// echo $i;
// $i++;
// echo "</td>";


// echo "<td width='300px'>";
// print_r($data[0]);
// echo "</td>";

// echo "<td width='300px'   >";
// print_r($data[1]);
// echo "</td>";

// echo "<td width='300px'   >";
// print_r($data[2]);
// echo "</td>";

// echo "</tr>";
// echo "</table>";



}
   fclose($file);
?>
</table>


</body>

</html>