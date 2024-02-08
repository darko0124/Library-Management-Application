<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h1>Въвеждане на нова книга</h1><br>
<form method="post">
Заглавие:<input type="text" name="name" /><br/>
Година на издаване:<input type="text" name="year" /><br/>
Бройки:<input type="text" name="numberofbooks" /><br/>
Автор:<select name="author">
<?php
include 'config.php';
$sql="SELECT * FROM author";
$result= mysqli_query($dbConn, $sql);
while ($row= mysqli_fetch_array($result))
{
echo '<option value='.$row['ID_AUTHOR'].'>'.$row['Author_name'].'</option>';
}
?>
</select>
<br>
Тип:<select name="type">
<?php
$sql="SELECT * FROM Book_Type";
$result= mysqli_query($dbConn, $sql);
while ($row= mysqli_fetch_array($result))
{
echo '<option value='.$row['ID_BookType'].'>'.$row['Type_name'].'</option>';
}
?></select>
<br/>
Издателство:<select name="PBH">
<?php
$sql="SELECT * FROM Publishing_house";
$result= mysqli_query($dbConn, $sql);
while ($row= mysqli_fetch_array($result))
{
echo '<option value='.$row['ID_PBH'].'>'.$row['PBH_name'].'</option>';
}
?></select>
<br/>
<input type="submit" name="submit" value="Въведи" /><br><br>
</form>
<?php
include 'config.php';
if (isset($_POST['submit']))
{
$name=$_POST['name'];
echo $name;
$year=$_POST['year'];
$numberofbooks=$_POST['numberofbooks'];
$author =$_POST['author'];

$type = $_POST['type'];
$PBH = $_POST['PBH'];
echo $author;


$sql= "INSERT INTO book (ID_BOOK, Book_title, Year_of_publishment, Author_ID_AUTHOR, Numberofbooks, Book_Type_ID_BOOKTYPE, Publishing_house_ID_PBH) VALUES (NULL, '$name', '$year', '$author', '$numberofbooks', '$type', '$PBH')";
$result = mysqli_query($dbConn, $sql);
if (!$result)
{
echo 'Не се получи !';
}
else
{
echo 'Успешно въведохте нова книга !';
}
}


$sql='SELECT Book.Book_title, Book.Year_of_publishment, Author.Author_name, Book.Numberofbooks, Book_Type.Type_name, Publishing_house.PBH_name FROM Book JOIN Author ON Book.Author_ID_AUTHOR = Author.ID_Author JOIN Book_Type ON Book.Book_Type_ID_BOOKTYPE=Book_Type.ID_BookType JOIN Publishing_house ON Book.Publishing_house_ID_PBH=Publishing_house.ID_PBH';
$result= mysqli_query($dbConn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<table border=1>';
    echo'<tr>';
    echo '<td>'.'Заглавие на книга'.'</td>';
    echo '<td>'.'Година на издаване'.'</td>';
    echo '<td>'.'Автор'.'</td>';
    echo '<td>'.'Брой книги'.'</td>';
    echo '<td>'.'Тип на книга'.'</td>';
echo '<td>'.'Издателство'.'</td>';
echo '</tr>';
    while ($row = mysqli_fetch_array($result)) {
        echo'<tr>';
        echo'<td>'.$row['Book_title']."</td>";
        echo'<td>'.$row['Year_of_publishment']."</td>";
        echo'<td>'.$row['Author_name']."</td>";
        echo'<td>'.$row['Numberofbooks']."</td>";
        echo'<td>'.$row['Type_name']."</td>";
        echo'<td>'.$row['PBH_name']."</td>";
        echo '</tr>';
    }
    echo '</table>';
}
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>