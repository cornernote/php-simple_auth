<?
    $host = "MYSQL-2.unitedservices.com.au";
    $dbname = "users_unitedservices_com_au";
    $username = "myuser1104";
    $password = "ElvhRQGf";
    
    $connection = mysql_connect($host, $username, $password);
    mysql_select_db($dbname,$connection);
    
    /*
    Check to see if connection was successful
    */
    ?>
