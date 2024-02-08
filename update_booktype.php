<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'config.php';
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $result = mysqli_query($dbConn, "SELECT * FROM Book_type");
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $i++;
        if ($i == $id) {
            mysqli_query($dbConn, "UPDATE Book_type SET Type_name='$name' WHERE ID_BookType='$row[ID_BookType]'");
            echo '<p>Успешно актуализирахте вид на книгата! Ново име: '.$name.'</p>';
            break;
        }
    }
}
$result = mysqli_query($dbConn, "SELECT * FROM Book_type");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
    echo '<li>'.$row['Type_name'].'</li>';
}
echo '</ol>';

echo '<h1>Промяна на данни за вид книга</h1>';
echo '<form method="post">';
echo 'Пореден номер на вид: <input type="text" name="id"><br>';
echo 'Вид на книга: <input type="text" name="name"><br>';
echo '<input type="submit" name="submit" value="Актуализирай вид"><br>';
echo '</form>';
?>
</body>
</html>
