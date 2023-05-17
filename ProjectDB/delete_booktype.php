<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'config.php';
$result = mysqli_query($dbConn, "SELECT * FROM book_type") or die(mysqli_error($dbConn));
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Type_name'].'</li>';
}echo '</ol>';
?>
<h1> Изтриване на тип на книга</h1>
<form method="post">
Тип на книгата:<input type="text" name="name"><br>
<input type="submit" name="submit" value="Изтрий тип книга"><br>
</form>
<?php
include 'config.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$sql="DELETE FROM book_type WHERE Type_name='$name'";
mysqli_Query($dbConn,$sql);
$result=mysqli_query($dbConn, "SELECT * FROM book_type");
echo '<ol>';
while ($row=mysqli_fetch_Array($result)) {
echo '<li>'.$row['Type_name'].'</li>';
}echo '</ol>';
}
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>