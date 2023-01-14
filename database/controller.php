<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sig";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "select * from tbl_positif_covid";

$result = mysqli_query($conn, $query);

$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}

$json = json_encode(($emparray));

// echo "Connected successfully";
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        let data = <?= $json ?>;
        console.log(data)
    </script>
</body>

</html> -->