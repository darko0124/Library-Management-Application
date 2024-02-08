<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Заемане на книга</h1><br>
        <form method="post">
            Дата на вземане:<input type="date" name="date_take" /><br>
            Брой дни на заемане:<input type="text" name="days" /><br>
            Служител:<select name="employee">
                 <?php
                include 'config.php';
                $sql = "SELECT * FROM Employee";
                $result= mysqli_query($dbConn, $sql);
                while ($row = mysqli_fetch_array($result)) 
                {
                    $idemployee=$row['ID_EMPLOYEE'];
                    echo '<option value='.$row['ID_EMPLOYEE'].'>'.$row['Employee_name'].'</option>';
                    }
               
                ?></select><br>
            Читател:<select name="tenant">
                 <?php
                include 'config.php';
                $sql = "SELECT * FROM Tenant";
                $result= mysqli_query($dbConn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $idemployee=$row['ID_TENANT'];
                    echo '<option value='.$row['ID_TENANT'].'>'.$row['Tenant_name'].'</option>';
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
            
            <br>
            <input type="submit" name="submit" value="Въведи" /><br><br>
        </form>
        <?php
        include 'config.php';
        if (isset($_POST["submit"]))
            {
                $date_take=$_POST['date_take'];
                $days=$_POST['days'];
                $employee=$_POST['employee'];
                $tenant=$_POST['tenant'];
                $book=$_POST['book'];
                
                
                if (!empty($date_take)&&!empty($days)&&!empty($employee)&&!empty($tenant)&&!empty($book))
                    {
                $sql="INSERT INTO book_renting (Rent_date,Rent_days,Employee_ID_EMPLOYEE,Tenant_ID_TENANT,Book_ID_BOOK) VALUES ('$date_take','$days','$employee','$tenant','$book')" ;//ако колната е varchar da e v '' value ('$book_name')
                $result= mysqli_query($dbConn, $sql);
                    if (!$result)
                        {
                             die ('Грешка!'. mysqli_error($dbConn));
                        }
                 echo 'Успешно взехте книга';
                    }
         else {
            echo 'Не сте получи!';    
            }
        // тук е хубаво обаче да се добави и една Update заявка, която да променя полето за брой на книгите в таблица книги
               $sql="SELECT * FROM Book WHERE ID_BOOK=$book";
            $res= mysqli_query($dbConn, $sql);
            if ($row= mysqli_fetch_assoc($res)){
                //if ($row['Numberofbooks']>1){           
                //иска ми се да я има и тази проверка, но не съм сигурна къде трябва да се сложи, 
                //защото реално този наем е записан в другата таблица, ако го направя така че да прави проверката преди записването
                //кодът ще стане много сложен за разбиране 
                //!!! Виж как ти се казва полето за брой на книгите в Book И го смени на всякъде където пише broi, че не помня как го кръстихме
                //echo "Книгата $b може да се отдаде под наем";
                $c=$row['Numberofbooks']-1;
                $query="UPDATE Book SET Numberofbooks='$c' WHERE ID_BOOK=$book";
                mysqli_query($dbConn, $query);
                
            }}
            //else echo "Книгата или не е налична или е само едно копие.";
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

        // тази заявка е за да се изведе в таблица на екрана цялата таблица, след добавянето на нова книга. Не съм правила толкова
       // сложни заявки и не съм сигурна дали ще тръгне, възможно е тук да даде грешка
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
