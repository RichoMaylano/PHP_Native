<html>

<title>Latihan 9</title>

<head>
    <style>
</style>

</head>


<body>
   
<h3>Tambah Lokasi</h3>
<form method="post" action="">
    
    Nama Tempat : <input type="text" name="nama"  placeholder="Masukkan Nama Tempat..." required autofocus>
    Latitude : <input type="text" name="lat" placeholder="Masukkan Nilai Latitude..." required autofocus>
    Longitude : <input type="text" name="long" placeholder="Masukkan Nilai Longitude..." required autofocus>
    <input type="submit" value="Submit" name="submit">
</form>    
<hr>
<h2>Data Tempat Wisata</h2>

    <?php
if (isset($_POST['submit'])){
$file=fopen("locations.txt","a") or die ("Unable to open file");
    rewind($file);
$nama= $_POST['nama'];
$lat= $_POST['lat'];
$long= $_POST['long'];
    $add = "\n".$nama.",\"".$lat.",".$long."\"";
fwrite($file,$add);
  fclose($file);
}

       ?>

<?php 
 function distance($x1, $y1, $x2, $y2){
     return sqrt(pow($x2-$x1, 2)+pow($y2-$y1, 2));
 }
?>

<table border ="1">
<?php
$dataLokasi=array();
$i = 0;
$my_file=fopen("locations.txt","r") or die ("Unable to open file");

echo "<tr>
<td align=center>No</td>
<td align=center>Nama Lokasi</td>
<td align=center>Latitude</td>
<td align=center>Longitude</td>
<td align=center>Jarak</td>
</tr>";

while(!feof($my_file)){
$res=fgets($my_file);
$data = explode(",", $res);
// print_r($data);

if($i==0){
   $i++; //diberi increment supaya data tidak bernilai 0 saja
   continue;
}

//menginisiasi nilai variabel
$lokasi = $data[0];
$lati = str_replace('"',"",$data[1]);
$longi = str_replace('"',"",$data[2]);

//init data distance
$x1=-7.56526;
$y1=110.81423;
$x2=$lati;
$y2=$longi;

//masukkan rumus fungsi distance
$r = distance($x1,$y1,$x2,$y2);

//Bentuk data arr asosiatif
$arrData=(
    array("loc"=>$lokasi, "lat"=>$lati, "long"=>$longi, "jarak"=>$r)
);

//menambahkan ke arr dataLokasi yang sudah diinisiasi di awal
array_push($dataLokasi,$arrData);

//Menampilkan Data
// echo "<tr>
// <td>".$i."</td>
// <td>".$lokasi."</td>
// <td>".$lati."</td>
// <td>".$longi."</td>
// <td>".$r."</td>
// </tr>";
// $i++;

}

//Data pada kolom jarak yang akan disorting
$jarak=array_column($dataLokasi, 'jarak');

//sort array dataLokasi berdasarkan jarak yang di ascending
array_multisort($jarak, SORT_ASC, $dataLokasi);

fclose($my_file);
?>

<?php 
//Menampilkan Data menggunakan looping for
// for($i=0; $i < count($dataLokasi); $i++){
//     echo "<tr>
// <td>".$i."</td>
// <td>".$dataLokasi[$i]['loc']."</td>
// <td>".$dataLokasi[$i]['lat']."</td>
// <td>".$dataLokasi[$i]['long']."</td>
// <td>".$dataLokasi[$i]['jarak']."</td>
// </tr>";
// }


//menampilkan data menggunakan foreach (tanpa index)
foreach ($dataLokasi as $dataLoc) {
    echo "<tr>
<td>".$i++."</td>
<td>".$dataLoc['loc']."</td>
<td>".$dataLoc['lat']."</td>
<td>".$dataLoc['long']."</td>
<td>".$dataLoc['jarak']."</td>
</tr>";
}
?>

</table>
</body>

</html>