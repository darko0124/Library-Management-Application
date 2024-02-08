<html>
<head>
<meta charset="UTF-8">
<title>Въвеждане на нов наемател</title>
</head>
<body>

<h1>Въвеждане на нов наемател</h1><br>
<form method="post">
Име:<input type="text" name="name" /><br>
Адрес:<input type="text" name="address" /><br>
Телефон:<input type="text" name="phone" /><br>

<?php
include 'config.php';
$sql="SELECT * FROM Tenant";
$result= mysqli_query($dbConn, $sql);
while ($row = mysqli_fetch_array($result))
{
    echo '<option value="'.$row['ID_TENANT'].'">'.$row['Tenant_name'].' '.$row['Address'].' '.$row['Phone_number'].'</option>';
}
?>
</select><br>

<input type="submit" name="submit" value="Въведи" /><br><br>
</form>
<?php
include 'config.php';
if (isset($_POST["submit"]))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $tenant_id=$_POST['tenant_id'];

    if(!empty($name)&&!empty($address)&&!empty($phone))
    {
        $sql="INSERT INTO Tenant (Tenant_name, Address, Phone_number) VALUES ('$name','$address','$phone')";
        $result= mysqli_query($dbConn, $sql);
        if(!$result)
        {
            die('Грешка!'. mysqli_error($dbConn));
        }
        echo 'Успешно въведохте наемател';
    }
    else {
        echo 'Не се получи!';
    }

    $sql='SELECT *FROM Tenant';

    $result= mysqli_query($dbConn, $sql);

    echo '<table border=1>';
    echo '<tr>';
    echo '<td>'.'Име на наемател'.'</td>';
    echo '<td>'.'Адрес'.'</td>';
    echo '<td>'.'Телефон'.'</td>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';    
        echo '<td> '.$row['Tenant_name']." </td>";
        echo "<td>".$row['Address'].' </td>';
        echo '<td>'.$row['Phone_number'].' </td>';//евентуално тук може да се наложи да сложиш Position_name ако направиш сложна заявка
        echo '</tr>';
    }
    echo '</table>';
}
?>
<a href="index.php">Обратно към начало</a>
</body>
</html>
