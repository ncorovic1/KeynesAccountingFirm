<?php
    require_once('database.php'); 
    
    if( isset($_GET['deleteID']) && $_GET['deleteID'] > 0) {
        
        $se_id = $_GET['deleteID'];
        
        $base = new Database();
        $connection = $base->connect();      
        $connection->exec("set names utf8");
        
        $connection->exec("DELETE
                           FROM   bullets
                           WHERE  component_id IN (SELECT id
                                                   FROM   components
                                                   WHERE  service_id=".$se_id.")");
        
        $connection->exec("DELETE
                           FROM   components
                           WHERE  service_id=".$se_id);
        
        $connection->exec("DELETE
                           FROM   services
                           WHERE  id=".$se_id);
    }
?>