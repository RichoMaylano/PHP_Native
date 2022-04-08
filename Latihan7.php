<html>

<title>Latihan 7</title>

<head>
   <style>

.genap{
    background-color : black;
    color : white;
}

.ganjil{
    background-color : white;
    color : black;
}
</style>

</head>


<body>
<?php 
include 'kotak_lib.php';

$my_file=fopen("notebaru.txt","r") or die ("Unable to open file");
while(!feof($my_file)){
$res=fgets($my_file);
$data = explode("|",$res);
print_r($data);
buatKotak($data[0],$data[1]);
}


fclose($my_file);

?>


</body>

</html>