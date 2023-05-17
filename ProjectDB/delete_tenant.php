<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'config.php';
$result = mysqli_query($dbConn, "SELECT * FROM Tenant");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Tenant_name'].'</li>';
}echo '</ol>';
?>
<h1>Изтриване на наемател</h1>
<form method="post">
Име на наемател:<input type="text" name="name"><br>
<input type="submit" name="submit" value="Изтрий наемател"><br>
</form>
<?php
include 'config.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$sql="DELETE FROM Tenant WHERE Tenant_name='$name'";
mysqli_Query($dbConn, $sql);
$result=mysqli_query($dbConn, "SELECT * FROM Tenant");
echo '<ol>';
while ($row=mysqli_fetch_array($result)) {
echo '<li>'.$row['Tenant_name'].'</li>';
}echo '</ol>';
}
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>