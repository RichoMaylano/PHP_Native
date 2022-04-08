<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Math Game</title>
</head>
<body>
	<h1>Welcome to Math Game</h1>

	<?php
    
		if (!isset($_COOKIE['username'])){
?>
<form method="POST">
            Masukkan nama anda: <input type="text" name="username">
            <input type ="submit" value="Submit" name="submitname">
        </form>

<?php			if (isset($_POST['submitname'])){
				// baca nama user dari form 
				$username=$_POST['username'];
                
                // simpan nama user ke cookie
                setcookie('username', $username, time()+3*30*24*60*60);

				// redirect to math.php?mode=start
                header("location:Kuis.php?mode=start");
            }

		} else {

			if ($_GET['mode']=="play"){
        
                if (isset($_POST['submitans'])){
					// cek jawaban user
                    
                    // jika jawaban benar -> score +10
					if($_POST['tebak']==$_SESSION['hasil']){
                       $_SESSION['score']+=10;
                    echo "Jawaban anda benar";
                    }
                    
                    // jika jawaban salah -> score -2
					//                    -> lives -1
					else{
                            $_SESSION['lives'] -= 1;
                            $_SESSION['score'] -= 2;
                            echo "Jawaban anda Salah";
                    }
                    
                    
                    // update score, lives di session
					
                    
                    // redirect to math.php?mode=play
				header("location:Kuis.php?mode=play");
                } else if ($_SESSION['lives']>0) {

            echo "Player : " .$_COOKIE['username']. "<br> <br>";

            echo "Score : ".$_SESSION['score']." /"." Lives : ".$_SESSION['lives']."<br><br>";
            $bil1=rand(1,10);
            $bil2=rand(1,10);
                $_SESSION['hasil']=$bil1+$bil2;
            
           
           
           ?>         
					<!-- muncul pertanyaan -->
                  <form method="post" action="Kuis.php?mode=play">
       
       <?php echo $bil1." + ".$bil2." = ";
    
    ?>
    <input type="text"  name="tebak" placeholder="Masukkan disini">
    <input type="submit" name="submitans" value="jawab">
    
                </form>
                  
             <?php
                } else {
                    //simpan score ke database
                    
            
                    // cetak game over
                    echo "Game Over";
                
					// munculkan link: Main lagi -> mode=start | Hall of Fame -> mode=halloffame
                     echo "<a type='button' href='Kuis.php?mode=start'>(Main Lagi?)</a>"."/"."<a type='button' href='Kuis.php?mode=halloffame'>(Hall Of Fame?)</a>";
                
                    }
            
?>

<?php
				
        }

			if ($_GET['mode']=="start"){
				
                // simpan score dan lives ke session
                // set score -> 0
				$_SESSION['score']=0;

                // set lives -> 3
				$_SESSION['lives']=3;
            
                // redirect to math.php?mode=play
                header("location:Kuis.php?mode=play");
			}

			if ($_GET['mode']=="halloffame"){
				// tampilkan data score dari db sort by score limit 10
		include 'config.php';

        $sql = "INSERT INTO main (username,score,tanggal) VALUES ('".$_COOKIE['username']."', '".$_SESSION['score']."', '".date("Y-m-d H:i:s")."')";

            if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully"."<br>";
                } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
         
        $sql = "SELECT score FROM main ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        echo "<h2>"."Hasil Score"."</h2>";
            // output data of each row
        
        echo "<table border=1>
                <tr> 
                <td align=center>Nama</td>
                <td align=center>Score Akhir</td>
                <td align=center>Tanggal</td>
                </tr>
        ";


            while($row = $result->fetch_assoc()) {
                echo " 
            <tr>
            <td width=100px>".$_COOKIE["username"]."</td> 
            <td>".$row["score"]."</td>
            <td>".date("Y-m-d H:i:s")."</td>
            </tr>";
        }echo "</table>";

        } else {
        echo "0 results";
        }


        
            }
		}
    

	?>
</body>
</html>