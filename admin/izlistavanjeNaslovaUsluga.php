<?php
    require_once('database.php'); 

    try { 
        $base = new Database();
        $connection = $base->connect();      
        $connection->exec("set names utf8");

        $services = "SELECT   id, header
                     FROM     services
                     ORDER BY position";
        $query = $connection->prepare($services);
        $rezultat = $query->execute();
        $services = $query->fetchAll();
        
        if (!$rezultat) {
                $greska = $query->errorInfo();
                print "SQL greska: ".$greska[2];
                exit();
        }    
        
        for($i = 0; $i < count($services); $i++) 
            echo '<option value="'.$services[$i]['id'].'">'.$services[$i]['header'].'</option>';
        
    } catch(PDOException $e) {
        echo $e->getMessage();
    } finally {
        $connection = null;
    }
?>