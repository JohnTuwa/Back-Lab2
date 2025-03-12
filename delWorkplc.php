<?php
$link = mysqli_connect("localhost", "admin", "admin");

$db = "StudentsDB";
$select = mysqli_select_db($link, $db);
if($select){
    echo "Successfully selected $db", "<br>";
} else {
    echo "Failed to select $db";
}

$workplace_id = intval($_GET['workplace_id']); 

$query = "SELECT * FROM workplaces WHERE id = $workplace_id";
$response = mysqli_query($link, $query);
$workplace = mysqli_fetch_assoc($response);

// Коли натиснуто кнопку у формі намагаємося видалити рядок з таблиці
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "DELETE FROM workplaces WHERE id = $workplace_id";
    $response = mysqli_query($link, $query);

    if ($response) {
        echo "Workplace deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($link);
    }
}
?>
<html>
    <body>
        <p>Delete workplace</p>
        <form method="post">
            <p>Are you sure you want to delete <?php echo $workplace['workplace_name']?>?</p>
            <input type="submit" name="submit" id="submit" value="Yes!"/>
        </form>
        <a href="index.php">To main page</a><br>
    </body>
</html>