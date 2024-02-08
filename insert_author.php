<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<h1>Въвеждане на нов автор</h1><br>
<form method="post">
Автор:<input type="text" name="author_name"/><br>
<br>
<input type="submit" name="submit" value="Въведи" /><br><br>
</form>
<?php
include 'config.php';
if(isset($_POST["submit"]))
{
$author_name=$_POST['author_name'];

if(!empty($author_name))
{
$sql="INSERT INTO Author (Author_name) VALUES ('$author_name')";
$result= mysqli_query($dbConn, $sql);
if(!$result)
{
die ('Грешка!'. mysqli_error($dbConn));
}
echo 'Успешно въведохте автор';
}
else {
echo 'Не се получи!';
}

$sql='SELECT *FROM Author';
$result= mysqli_query($dbConn, $sql);

echo '<table border=1>';
echo '<tr>';
echo '<td>'.'Автор'.'</td>';
echo '<tr>';
while ($row = mysqli_fetch_array($result))
{
echo '<td>'.$row['Author_name'].'</td>';
echo '</tr>';
}
echo '</table>';
}

?>
<a href="index.php">Обратно към начало</a>
</body>
</html>
