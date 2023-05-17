     <?php
        // Replace the values below with your own database credentials

        $host='localhost';
        $dbUser='root';
        $dbPass='';
        $dbName='library';
        if (!$dbConn= mysqli_connect($host, $dbUser,$dbPass))
        {
            die('Не може да се осъществи връзка със сървъра!');
        }
        if (!mysqli_select_db($dbConn, $dbName))
        {
            die(' Не може да се селектира базата от данни');
        }
        mysqli_query($dbConn,"SET NAMES 'UTF8'");
        
?>
?>
