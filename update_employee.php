
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
    echo '<li>'.$row['Employee_name'].'- Телефон:'.$row['Phone_number'].'</li>';
        }echo '</ol>';
        
        echo'<h1>Промяна данните на служител</h1>
        <form method="post">
            Име на служител:<input type="text" name="name" value='.$row['Employee_name'].'><br>
            Телефон:<input type="text" name="phone" value='.$row['Phone_number'].'><br>    
            <input type="submit" name="submit" value="Актуализирай служител"><br>
        </form>';
       // тук стана малко сложно, но исках полетата да са предварително попълнени с данните от таблицата, които ще променяме
        if (isset($_POST["submit"]))
            {
                $name=$_POST['name'];
                $phone=$_POST['phone'];
        $sql="UPDATE Employee SET 'Phone_number='$phone' WHERE Employee_name='$name'";
        //така реално ще променя само телефона - може и всичко да променя, но пак става сложен кода, ако решиш, ако всичко върви и ти е ясно
        //може да го коригираме да може да се променя и името и позицията
        mysqli_query($dbConn, $sql);
        $result= mysqli_query($dbConn,"SELECT * FROM Employee");
        echo '<ol>';
        while ($row = mysqli_fetch_array($result)) {
    echo '<li>'.$row['Employee_name'].'- Телефон:'.$row['Phone_number'].'</li>';
        }echo '</ol>';
            }
        ?>
    </body>
</html>