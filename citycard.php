<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Card</title>
    <link rel="stylesheet" href="style.css">
</head> 

<body>
<header>
    <p>Welcome to MeinAusflug!</p> 
</header>

<?php
//connect to my database:
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

//create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}


// Fetch city data
$sql = "SELECT * FROM citycard";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>


<section>
    <h1>City Information</h1>
    <div class="city">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="City_Card">';
                echo '<h2>' . htmlspecialchars($row["city_name"].", ".$row["country"]) . '</h2>';
                echo '<p>' . htmlspecialchars($row["city_description"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No cities found in the database.</p>";
        }
        ?>
    </section>
</body>
</html>