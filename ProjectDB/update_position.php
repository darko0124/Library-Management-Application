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
$result = mysqli_query($dbConn, "SELECT * FROM Position");
$i=0;
while ($row = mysqli_fetch_array($result)) {
$i++;
if ($i == $id) {
mysqli_query($dbConn, "UPDATE Position SET Position_name='$name' WHERE ID_POSITION='$row[ID_POSITION]'");
echo '<p>Успешно актуализирахте позиция ! Ново име: '.$name.'</p>';
break;
}
}
}
$result=mysqli_query($dbConn, "SELECT * FROM Position");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Position_name'].'</li>';
}
echo '</ol>';

echo '<h1>Промяна на данни за позиция</h1>';
echo '<form method ="post">';
echo 'Пореден номер на позиция: <input type="text" name="id"><br>';
echo 'Позиция: <input type="text" name="name"><br>';
echo '<input type="submit" name="submit" value="Актуализирай позиция"><br>';
echo '</form>';
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>