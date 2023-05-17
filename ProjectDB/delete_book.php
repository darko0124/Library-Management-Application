<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h1>Изтриване на книга</h1>
<form method="post">
Книга:<select name="book">
                 <?php
                include 'config.php';
                $sql = "SELECT * FROM Book";
                $result= mysqli_query($dbConn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $idemployee=$row['ID_BOOK'];
                    echo '<option value='.$row['ID_BOOK'].'>'.$row['Book_title'].'</option>';
                    }
               
                ?></select><br>
            
  <input type="submit" name="submit" value="Изтрий книга"><br>
</form>
<?php
include 'config.php';
if (isset($_POST['submit'])) {
  $name = $_POST['book'];
  //$result = mysqli_query($dbConn, "SELECT ID_BOOK FROM book WHERE ID_Book='$name'");
  //$row = mysqli_fetch_array($result);
 //$book_id = $row['ID_BOOK'];
  //$new_book_id = 2; // replace this with the ID of the book you want to use as a replacement
  //mysqli_query($dbConn, "UPDATE book_renting SET Book_ID_BOOK=$new_book_id WHERE Book_ID_BOOK=$book_id");
  mysqli_query($dbConn, "DELETE FROM book WHERE ID_BOOK=$name");
  echo "Книгата е изтрита успешно.";
}
$result=mysqli_query($dbConn, "SELECT * FROM book");
echo '<ol>';
while ($row=mysqli_fetch_array($result)) {
  echo '<li>'.$row['Book_title'].'</li>';
}
echo '</ol>';
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>
