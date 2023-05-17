<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h1>Справка за отдадени книги за период, подредени по клиенти(наематели)</h1><br>
<form method="post">
Дни на заемане:<input type="text" name="text"><br>
Дата на заемане:<input type="date" name="date_take">
<input type="submit" name="submit" value="Въведи" /><br><br>
</form>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';
if (isset($_POST["submit"]))
{
$text=$_POST['text'];
$date_take=$_POST['date_take'];


if(!empty($text)&&!empty($date_take))
{
$sql="SELECT * FROM BOOK_RENTING book_renting 
JOIN BOOK book ON book_renting.Book_ID_BOOK=ID_BOOK 
JOIN EMPLOYEE employee ON book_renting.Employee_ID_EMPLOYEE=ID_EMPLOYEE 
JOIN TENANT tenant ON book_renting.Tenant_ID_TENANT=ID_TENANT
WHERE Rent_days='$text' and Rent_date='$date_take'
ORDER BY Tenant_name DESC";


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
        echo '<th>Дата на заемане</th>';
        echo '<th>Дни на заемане</th>';
        echo '<th>Служител</th>';
        echo '<th>Наемател</th>';
        echo '</tr>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['Book_title'].'</td>';
            echo '<td>'.$row['Rent_date'].'</td>';
            echo '<td>'.$row['Rent_days'].'</td>';
            echo '<td>'.$row['Employee_name'].'</td>';
            echo '<td>'.$row['Tenant_name'].'</td>';
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