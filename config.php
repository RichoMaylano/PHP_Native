<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $DBname = "game";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $DBname);

        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
?>