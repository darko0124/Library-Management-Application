<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.php';
        $result= mysqli_query($dbConn,"SELECT * FROM Employee");
echo '<ol>';
        while ($row = mysqli_fetch_array($result)) {
    echo '<li>'.$row['Employee_name'].'</li>';
        }echo '</ol>';
        ?>
        <h1>Изтриване на служител</h1>
        <form method="post">
            Име на служител:<input type="text" name="name"><br>
            <input type="submit" name="submit" value="Изтрий служител"><br>
 <a href="http://localhost/ProjectDB/index.php" input type="button">Обратно към менюто</а><br>
        </form>
       <?php
include 'config.php';
if (isset($_POST['submit']))
{
    $name=$_POST['name'];
$sql="DELETE FROM Employee WHERE Employee_name='$name'";
mysqli_query($dbConn, $sql);
$result= mysqli_query($dbConn,"SELECT * FROM Employee");
echo '<ol>';
        while ($row = mysqli_fetch_array($result)) {
    echo '<li>'.$row['Employee_name'].'</li>';
        }echo '</ol>';
}
?>

<!-- no whitespace or output after the closing ?> tag -->
</body>
</html>
