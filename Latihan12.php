<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "dbklinik";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DBname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

//Select Data from Database
$sql = "SELECT No_Rawat, No_RM, Tgl_Rawat, Tgl_Cetak, Total_Tindakan, Total_Biaya, Total_Obat, Uang_Muka, Kekurangan FROM perawatan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo "<h2>"."Tabel Perawatan"."</h2>";
echo "<table border=1>
<tr>
    <td>No Rawat</td> 
     <td>No RM</td>
     <td>Tanggal Rawat</td>
     <td>Tanggal Cetak</td>
     <td>Total Tindakan</td>
     <td>Total Biaya</td>
     <td>Total Obat</td>
     <td>Uang Muka</td>
     <td>Kekurangan</td>
     </tr>";

  while($row = $result->fetch_assoc()) {
          echo "          <tr>
     <td>".$row["No_Rawat"]."</td> 
     <td>".$row["No_RM"]."</td>
     <td>".$row["Tgl_Rawat"]."</td>
     <td>".$row["Tgl_Cetak"]."</td>
     <td>".$row["Total_Tindakan"]."</td>
     <td>".$row["Total_Biaya"]."</td>
     <td>".$row["Total_Obat"]."</td>
     <td>".$row["Uang_Muka"]."</td>
     <td>".$row["Kekurangan"]."</td>
    </tr>";
}echo "</table>";

} else {
  echo "0 results";
}

echo "<br>";

//Insert Data
// $sql = "INSERT INTO dokter (ID_Dokter, Nama)
// VALUES ('D9', 'Dr. Betar')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully"."<br>";
//      } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


//Select Data Tabel Dokter di DBklinik
$sql = "SELECT ID_Dokter, Nama FROM dokter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>"."List Dokter Klinik Fitria"."</h2>";
echo "<table border=1>
<tr>
    <td>ID</td>
    <td>Nama Dokter</td>
     </tr>";

    // output data of each row
  while($row = $result->fetch_assoc()) {
          echo " 
     <tr>
     <td>".$row["ID_Dokter"]."</td> 
     <td width=100px>".$row["Nama"]."</td>
    </tr>";
}
    echo "</table>";


} else {
  echo "0 results";
}
?>