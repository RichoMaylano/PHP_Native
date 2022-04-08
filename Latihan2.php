<html>

<title>Latihan 2</title>

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
$awal=microtime(true);

// Merupakan deklarasi variabel nilai baris dan kolom
$baris = 10;
$kolom = 15;

$num=1;
    
echo '<table border="1">';
// looping untuk baris
    for($i=1; $i<=$baris;$i++){
    echo '<tr>';
    // looping untuk kolom
        for($j=1; $j<=$kolom;$j++){
            // output baris dan kolom
        if($num%2==0){
      $style="genap";
    }
    else 
        $style="ganjil";
    echo '<td class="'.$style.'">';    
    echo  $num;   
    echo '</td>';
    $num++; 
        }
    echo '</tr>';
    } 
echo '</table>';

$akhir=microtime(true);
$lama=$akhir-$awal;
echo ("<br>The micro time is : &nbsp" . $lama ."&nbsp detik");
?>

</table>
</body>
</html>