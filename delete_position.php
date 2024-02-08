<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'config.php';
$result= mysqli_query($dbConn, "SELECT * FROM Position");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Position_name'].'</li>';
}echo '</ol>';
?>
<h1>Изтриване на позиция</h1>
<form method="post">
Име на позиция:<input type="text" name="name"><br>
<input type="submit" name="submit" value="Изтрий позиция"><br>
</form>
<?php
include 'config.php';
if (isset($_POST['submit']))
{
$name=$_POST['name'];
$sql="DELETE FROM Position WHERE Position_name='$name'";
mysqli_query($dbConn, $sql);
$result= mysqli_Query($dbConn, "SELECT * FROM Position");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Position_name'].'</li>';
}echo '</ol>';
}
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>