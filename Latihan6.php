<html>

<title>Latihan 6</title>

<head>
    <style>
</style>

</head>


<body>

<!-- mengolah data per baris -->
    <?php
   $my_file=fopen("note.txt","r") or die ("Unable to open file");
echo fgets($my_file,filesize("note.txt"));
fclose($my_file);
?>

<br>

<!-- mengolah semua karakter yang ada beberapa baris menjadi satu baris -->
<?php
$my_file=fopen("note.txt","r") or die ("Unable to open file");
while(!feof($my_file)){
echo fgetc($my_file);
}
fclose($my_file);
?>

<!-- menulis karakter  -->
<?php
$my_file=fopen("notebaru.txt","w") or die ("Unable to open file");
$txt="John Doe \n";
fwrite($my_file,$txt);
$txt="Jane Doe \n";
fwrite($my_file,$txt);
fclose($my_file);
?>


</body>

</html>