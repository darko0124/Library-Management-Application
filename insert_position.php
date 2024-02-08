<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>


<h1>Въвеждане на нова позиция</h1><br>
<form method="post">
Позиция:<input type="text" select name="Position_name"><br>
<?php
include 'config.php';
$sql = "SELECT * FROM Position";
$result= mysqli_query($dbConn, $sql);
while ($row = mysqli_fetch_array($result))
{
echo '<option value='.$row['ID_POSITION'].'>'.$row['Position_name'].'</option>';
}
?></select><br>
<br>
<input type="submit" name="submit" value="Въведи" /><br><br>
</form>
<?php
include 'config.php';
if (isset($_POST["submit"]))
{
$position_name=$_POST['Position_name'];

if(!empty($position_name))
{
$sql="INSERT INTO Position (Position_name) VALUES ('$position_name')";
$result= mysqli_query($dbConn, $sql);
if (!$result)
{
die ('Грешка!'. mysqli_error($dbConn));
}
echo 'Успешно въведохте позиция';
}
else {
echo 'Не се получи!';
}

$sql= 'SELECT *FROM Position';
$result= mysqli_query($dbConn, $sql);

echo '<table border=1>';
echo '<tr>';
echo '<td>'.'Позиция'.'</td>';
echo '</tr>';
while ($row = mysqli_fetch_array($result)) {
echo '<tr>';
echo "<td>".$row['Position_name']." </td>";
echo '</tr>';}
echo '</table>';
}
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>
