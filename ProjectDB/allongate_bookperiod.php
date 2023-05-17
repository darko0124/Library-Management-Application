<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Удължаване на период за връщане на книга</h1><br>
        <form method="post">
            Читател:<select name="tenant">
                 <?php
                include 'config.php';
                $sql = "SELECT * FROM Tenant";
                $result= mysqli_query($dbConn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $idemployee=$row['ID_TENANT'];
                    echo '<option value='.$row['ID_TENANT'].'>'.$row['ID_TENANT'].'-'.$row['Tenant_name'].'</option>';
                    }
                
                ?></select><br>
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
            Дни за удължаване:<input type="text" name="days">

            <br>
            <input type="submit" name="submit" value="Въведи" /><br><br>
        </form>
        <?php
        include 'config.php';
        if (isset($_POST["submit"]))
            {
                $tenant=$_POST['tenant'];
                $book=$_POST['book'];
                $days=$_POST['days'];
                
                
               $sql="SELECT * FROM book_renting WHERE Tenant_ID_TENANT = $tenant AND Book_ID_BOOK = $book";
            $res= mysqli_query($dbConn, $sql);
            if ($row= mysqli_fetch_assoc($res)){
                //if ($row['Numberofbooks']>1){           
                $c=$row['Rent_days']+$days;
                $query="UPDATE book_renting SET Rent_days='$c' WHERE Tenant_ID_TENANT = $tenant AND Book_ID_BOOK = $book";
                mysqli_query($dbConn, $query);
                
            }}
         
        $sql= 'SELECT *
                    FROM
                    (SELECT book.Book_title, employee.Employee_name, book_renting.Rent_days,book_renting.Rent_date,tenant.Tenant_name
                    FROM BOOK_RENTING book_renting
                    JOIN BOOK book
                    ON book_renting.Book_ID_BOOK=book.ID_BOOK
                    JOIN PUBLISHING_HOUSE publishing_house
                    ON book.Publishing_house_ID_PBH=publishing_house.ID_PBH
                    JOIN AUTHOR author
                    ON book.Author_ID_AUTHOR=author.ID_AUTHOR
                    JOIN BOOK_TYPE book_type
                    on book.Book_type_ID_BOOKTYPE=book_type.ID_BOOKTYPE
                    JOIN TENANT tenant
                    ON book_renting.Tenant_ID_TENANT=tenant.ID_TENANT
                    JOIN EMPLOYEE employee
                    ON book_renting.Employee_ID_EMPLOYEE=employee.ID_EMPLOYEE
                    JOIN POSITION position
                    ON employee.Position_ID_POSITION=position.ID_POSITION) subquery';

       
         $result= mysqli_query($dbConn, $sql);
         if (!$result) {
    die('Invalid query: ' . mysqli_error($dbConn));
}
       
        echo '<table border=1>';
            echo '<tr>';
            echo '<td>'.'Дата на вземане'.'</td>';
            echo '<td>'.'Брой дни'.'</td>';
            echo '<td>'.'Служител'.'</td>';
            echo '<td>'.'Читател'.'</td>';
            echo '<td>'.'Книга'.'</td>';
            echo '</tr>';
if (mysqli_num_rows($result) == 0) {
    echo "No records found.";
}
            while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';    
            echo '<td> '.$row['Rent_date']." </td>";
            echo "<td>".$row['Rent_days'].' </td>';
            echo '<td>'.$row['Employee_name'].' </td>';
            echo '<td>'.$row['Tenant_name'].'</td>';
            echo '<td> '.$row['Book_title'].' </td>';
            echo '</tr>';}
            echo '</table>';
            
        ?>
        <br><a href="index.php">Обратно към начало</a>
    </body>
</html>