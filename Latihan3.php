<html>

<title>Latihan 3</title>

<head>
    <style>

.genap{
    background-color : red;
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
    
      function buatKotak($baris, $kolom){
        $num=1;
        echo '<table border="2">';
// looping untuk baris
    for($i=1; $i<=$baris;$i++){
    echo '<tr>';
    // looping untuk kolom
    
        for($j=1; $j<=$kolom;$j++){
            if($num%2==0){
      $style="genap";
    }
    else 
        $style="ganjil";
    echo '<td class="'.$style.'">';  
            // output baris dan kolom
        
    echo  $num;   
    echo '</td>';
    $num++; 
        }
    echo '</tr>';
    } 
echo '</table>';
    }

    buatKotak(10,15);
       ?>
</body>

</html>