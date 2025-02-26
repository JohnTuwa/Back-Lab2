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
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Workplace Name</th>
        <th>Workplace City</th>
    </tr>

    <?php
    while ($workplace = mysqli_fetch_assoc($response)) {
        echo "<tr>";
        echo "<td>" . $workplace['id'] . "</td>";
        echo "<td>" . $workplace['workplace_name'] . "</td>";
        echo "<td>" . $workplace['workplace_city'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
