<?php
$link = mysqli_connect("localhost", "admin", "admin");

$db = "StudentsDB";
$select = mysqli_select_db($link, $db);
if($select){
    echo "Successfully selected $db", "<br>";
} else {
    echo "Failed to select $db";
}

//При натисканні кнопки у формі намагаємося додати новий запис до бази даних
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['workplace_name'];
    $city = $_POST['workplace_city'];

    //Перевіряємо чи поля не порожні перед додаванням
    if (empty($name) || empty($city)) {
        echo "Error: Both fields are required.";
    } else {
        $query = "INSERT INTO workplaces (workplace_name, workplace_city) VALUES ('$name', '$city')";
        $response = mysqli_query($link, $query);

        if ($response) {
            echo "Workplace added successfully!";
        } else {
            echo "Error: " . mysqli_error($link);
        }
    }
}
?>
<html>
    <body>
        <p>Add new workplace</p>
        <form method="post">
            <label for="workplace_name">Workplace name: </label>
            <input type="text" name="workplace_name" id="worlplace_name"/><br>
            <label for="workplace_city">Workplace city: </label>
            <input type="text" name="workplace_city" id="workplace_city"/><br>
            <input type="submit" name="submit" id="submit" value="create"/>
        </form>
        <a href="index.php">To main page</a><br>
    </body>
</html>