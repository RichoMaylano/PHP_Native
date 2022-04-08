<html>

<title>Tebak Angka</title>

<body>
<?php
session_start();
if(empty($_SESSION['bil'])){
$_SESSION['bil']=rand(1,10);
}
?>

<h2>Tebaklah Angka dengan Benar!</h2>

<?php


if(isset($_POST['submit'])){
    if($_POST['number']==null){
    echo "Silahkan tebak angka !";
}else if($_POST['number']<$_SESSION['bil']){
        echo "Tebakan anda terlalu rendah nilainya!";
    }else if($_POST['number']>$_SESSION['bil']){
    echo "Tebakan anda terlalu tinggi nilainya!";
}else{
    echo "Selamat Tebakan anda Benar!";
    session_destroy();
    echo "<a type='button' href='tebak.php'>(Main Lagi?)</a>";
    exit();       
}
}

// echo "<br>";
// echo "Angka yang benar adalah ".$_SESSION['bil'];

?>

<form method="post" action="tebak.php">
    Masukkan Angka 1-10 : <input type="number" min="1" max="10" name="number">
<input type="submit" value="submit" name="submit">
</form>


</body>
</html>