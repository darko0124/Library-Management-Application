<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h1>Търсене на книга по издателство</h1><br>
<form method="post">
Издателство:<select name="PBH">
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';
$sql="SELECT * FROM Publishing_House";
$result= mysqli_query($dbConn, $sql);
while ($row = mysqli_fetch_array($result))
{
$idPBH=$row['ID_PBH'];
echo '<option value='.$row['ID_PBH'].'>'.$row['PBH_name'].'</option>';
}
?></select><br>
<br>
<input type="submit" name="submit" value="Въведи" /><br>
</form>
<?php
include 'config.php';
if (isset($_POST["submit"]))
{
$PBH=$_POST['PBH'];

if(!empty($PBH))
{
$sql="SELECT * FROM BOOK book JOIN PUBLISHING_HOUSE publishing_house ON book.Publishing_house_ID_PBH=publishing_house.ID_PBH JOIN AUTHOR author ON book.Author_ID_AUTHOR=author.ID_AUTHOR JOIN BOOK_TYPE book_type on book.Book_type_ID_BOOKTYPE=book_type.ID_BOOKTYPE WHERE Publishing_house_ID_PBH=$PBH ORDER BY book.Year_of_publishment DESC ";


$result=mysqli_query($dbConn, $sql);
if(!mysqli_query($dbConn, $sql)) {
    die ('Грешка!' . mysqli_error($dbConn));
}
if(mysqli_num_rows($result) == 0) {
    echo "No results found !";
} else {
    echo "Results found !";
}


echo '<table border=1>';
echo '<tr>';
echo '<th>Заглавие</th>';
echo '<th>Автор</th>';
echo '<th>Издателство</th>';
echo '<th>Година на издаване</th>';
echo '<th>Тип на книгата</th>';
echo '</tr>';
while($row = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>'.$row['Book_title'].'</td>';
echo '<td>'.$row['Author_name'].'</td>';
echo '<td>'.$row['PBH_name'].'</td>';
echo '<td>'.$row['Year_of_publishment'].'</td>';
echo '<td>'.$row['Type_name'].'</td>';
echo '</tr>';
}
echo '</table>';

}
else {
echo 'Не се получи!';
}

}
?>
<br><a href="index.php"> Обратно към начало</a>
</body>
</html>