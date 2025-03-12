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

//При натисканні кнопки у формі намагаємося змінити дані
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['workplace_name'];
    $city = $_POST['workplace_city'];

    $query = "UPDATE workplaces SET workplace_name = '$name', workplace_city = '$city' WHERE id = $workplace_id";
    $response = mysqli_query($link, $query);

    if ($response) {
        echo "Workplace edited successfully!";
    } else {
        echo "Error: " . mysqli_error($link);
    }
    
}
$query = "SELECT * FROM workplaces WHERE id = $workplace_id";
$response = mysqli_query($link, $query);
$workplace = mysqli_fetch_assoc($response);
?>
<html>
    <body>
        <p>Edit workplace</p>
        <form method="post">
            <label for="workplace_name">Workplace name: </label>
            <input type="text" name="workplace_name" id="worlplace_name"
            value="<?php echo $workplace['workplace_name'];?>"/><br>

            <label for="workplace_city">Workplace city: </label>
            <input type="text" name="workplace_city" id="workplace_city"
            value="<?php echo $workplace['workplace_city'];?>"/><br>

            <input type="submit" name="submit" id="submit" value="edit"/>
        </form>
        <a href="index.php">To main page</a><br>
    </body>
</html>