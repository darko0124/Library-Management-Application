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
$result = mysqli_query($dbConn, "SELECT * FROM Author");
$i=0;
while ($row = mysqli_fetch_array($result)) {
$i++;
if ($i == $id) {
mysqli_query($dbConn, "UPDATE Author SET Author_name='$name' WHERE ID_AUTHOR='$row[ID_AUTHOR]'");
echo '<p>Успешно актуализирахте автор ! Ново име: '.$name.'</p>';
break;
}
}
}
$result=mysqli_query($dbConn, "SELECT * FROM Author");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Author_name'].'</li>';
}
echo '</ol>';

echo '<h1>Промяна на данни за автор</h1>';
echo '<form method ="post">';
echo 'Пореден номер на автор: <input type ="text" name="id"><br>';
echo 'Име на автора: <input type="text" name="name"><br>';
echo '<input type ="submit" name="submit" value="Актуализирай автор"><br>';
echo '</form>';
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>