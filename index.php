<?php
setcookie('nama','nama',time()+(60*60*24*30),'/');
?>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
    <?php 
    if (isset($_POST['submit'])){
         $username=$_POST['username'];
         $_COOKIE['username']=$username;
         $tgl = date("d/m/Y H:i:s");
         //$counter=1; 
        setcookie('username',$_COOKIE['username'],time()+(60*60*24*30),'/');
        setcookie('tgl',$tgl,time()+(60*60*24*30),'/');
        setcookie('counter',$counter,time()+(60*60*24*30),'/');
        //refresh page
        header ("location: index.php");
    }
    ?>
    <?php
        if (!isset($_COOKIE['nama'])){
    ?>
        <form method="POST" action="index.php">
            Masukkan nama anda: <input type="text" name="username">
            <input type ="submit" value="Submit" name="submit">
        </form>
    <?php
        } else {
        if ($_COOKIE['counter']==1){
                echo "Selamat datang ".$_COOKIE['username'].". Ini adalah kunjungan anda ke-".$_COOKIE['counter'];
            } else {
                echo "Selamat datang ".$_COOKIE['username'].". Ini adalah kunjungan anda ke-".$_COOKIE['counter'].". Kunjungan anda sebelumnya pada tanggal ".$_COOKIE['tgl'];
            }
            setcookie('counter',$_COOKIE['counter']+1,time()+(60*60*24*30),'/');
            setcookie('tgl',date("d/m/Y H:i:s"),time()+(60*60*24*30),'/');
        }
    ?>
    </body>
</html>