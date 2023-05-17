<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h1> Reports</h1><br>
<form method="post">
<input type="submit" name="submit" value="Generate report" /><br><br>
</form>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';
if (isset($_POST["submit"]))
{
$sql="SELECT * FROM BOOK_RENTING book_renting
JOIN BOOK book ON book_renting.Book_ID_BOOK=ID_BOOK 
JOIN EMPLOYEE employee ON book_renting.Employee_ID_EMPLOYEE=ID_EMPLOYEE
JOIN TENANT tenant ON book_renting.Tenant_ID_TENANT=ID_TENANT
JOIN PUBLISHING_HOUSE publishing_house ON book.Publishing_house_ID_PBH=ID_PBH
JOIN POSITION position ON employee.Position_ID_POSITION=ID_POSITION
JOIN BOOK_TYPE book_type ON book.Book_Type_ID_BOOKTYPE=ID_BookType
JOIN AUTHOR author ON book.Author_ID_AUTHOR=ID_AUTHOR
ORDER BY Rent_date ASC
";


$result=mysqli_query($dbConn, $sql);

if(!$result)
{
die ('Грешка!' . mysqli_error($dbConn));
}
if(mysqli_num_rows($result) == 0) {
    echo "No results found";
} else {
    echo "Results found";
}

 echo '<table border=1>';
echo '<tr>';
echo '<th>Заглавие</th>';
echo '<th>Автор</th>';
echo '<th>Година на издаване</th>';
echo '<th>Издателство</th>';
echo '<th>Брой книги</th>';
echo '<th>Вид</th>';
echo '<th>Дата на заемане</th>';
echo '<th>Дни на заемане</th>';
echo '<th>Служител</th>';
echo '<th>Позиция</th>';
echo '<th>Телефонен номер на служител</th>';
echo '<th>Наемател</th>';
echo '<th>Адрес на наемател</th>';
        echo '</tr>';
 while($row = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>'.$row['Book_title'].'</td>';
echo '<td>'.$row['Author_name'].'</td>';
echo '<td>'.$row['Year_of_publishment'].'</td>';
echo '<td>'.$row['PBH_name'].'</td>';
echo '<td>'.$row['Numberofbooks'].'</td>';
echo '<td>'.$row['Type_name'].'</td>';
echo '<td>'.$row['Rent_date'].'</td>';
echo '<td>'.$row['Rent_days'].'</td>';
echo '<td>'.$row['Employee_name'].'</td>';
echo '<td>'.$row['Position_name'].'</td>';
echo '<td>'.$row['Phone_number'].'</td>';
echo '<td>'.$row['Tenant_name'].'</td>';
echo '<td>'.$row['Address'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
}

    
    else {
        echo 'Не се получи!';
    }


?>

<br><a href="index.php"> Обратно към начало</a>
</body>
</html>