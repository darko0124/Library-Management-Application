<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'config.php';
if (isset($_POST["submit"])) {
$id = $_POST['id'];
$name = $_POST['name'];
$address= $_POST['address'];
$phone_number = $_POST['phone_number'];
$result = mysqli_query($dbConn, "SELECT * FROM Tenant");
$i=0;
while ($row = mysqli_fetch_array($result)) {
$i++;
if ($i == $id) {
if (!empty($name)) {
mysqli_query($dbConn, "UPDATE Tenant SET Tenant_name='$name' WHERE ID_TENANT='$row[ID_TENANT]'");
echo '<p>Успешно актуализирахте името на наемател ! Ново име: '.$name.'</p>';
}
if (!empty($address)) {
mysqli_query($dbConn, "UPDATE Tenant SET Address='$address' WHERE ID_TENANT='$row[ID_TENANT]'");
echo '<p>Успешно актуализирахте адреса на наемател ! Нов адрес: '.$address.'</p>';
}
if (!empty($phone_number)) {
mysqli_query($dbConn, "UPDATE Tenant SET Phone_number='$phone_number' WHERE ID_TENANT='$row[ID_TENANT]'");
echo '<p>Успешно актуализирахте телефонния номер на наемател ! Нов телефонен номер: '.$phone_number.'</p>';
}
break;
}
}
} 
$result=mysqli_query($dbConn, "SELECT * FROM Tenant");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
echo '<li>'.$row['Tenant_name'].' '.$row['Address'].' '.$row['Phone_number'].'</li>';

}
echo '</ol>';
echo '<h1>Промяна на данни за наемател</h1>';
echo '<form method ="post">';
echo 'Пореден номер на наемател: <input type ="text" name="id"><br>';
echo 'Име на наемателя: <input type="text" name="name"><br>';
echo 'Адрес на наемателя: <input type="text" name="address"><br>';
echo 'Телефонен номер на наемателя: <input type="text" name="phone_number"><br>';
echo '<input type ="submit" name="submit" value="Актуализирай наемател"><br>';
echo '</form>';
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>
