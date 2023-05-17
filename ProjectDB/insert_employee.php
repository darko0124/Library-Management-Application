<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
       
        <h1>Въвеждане на нов служител</h1><br>
        <form method="post">
            Име:<input type="text" name="name" /><br>
            Телефон:<input type="text" name="phone" /><br>
            Позиция:<select name="position">
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
                $name=$_POST['name'];
                $phone=$_POST['phone'];
                $position=$_POST['position'];
              
                if (!empty($name)&&!empty($phone)&&!empty($position))
                    {
                        $sql = "INSERT INTO Employee (Employee_name, Phone_number, Position_ID_POSITION) VALUES ('$name', '$phone', '$position')";
                        $result = mysqli_query($dbConn, $sql);
                        if (!$result)
                            {
                                 die ('Грешка!'. mysqli_error($dbConn));
                            }
                     else echo 'Успешно въведохте служител';
                    }
                 else {
                    echo 'Не се получи!';    
                        }
                }
        
      $sql = 'SELECT Employee.Employee_name, Employee.Phone_number, Position.Position_name FROM Employee JOIN position ON Employee.Position_ID_POSITION=Position.ID_POSITION';
$result = mysqli_query($dbConn, $sql);

if (!$result) {
    die('Грешка при изпълнение на заявката: ' . mysqli_error($dbConn));
} else {
    echo '<table border=1>';
    echo '<tr>';
    echo '<td>' . 'Име на служител' . '</td>';
    echo '<td>' . 'Телефон' . '</td>';
    echo '<td>' . 'Длъжност' . '</td>';
    echo '</tr>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td> ' . $row['Employee_name'] . " </td>";
        echo "<td>" . $row['Phone_number'] . ' </td>';
        echo '<td>' . $row['Position_name'] . ' </td>';
        echo '</tr>';
    }
    echo '</table>';
}

            ?>
        <a href="index.php">Обратно към начало</a>
    </body>
</html> 

