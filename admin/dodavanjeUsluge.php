<?php
    require_once('database.php'); 
    
    if( isset($_POST['RB'], $_POST['Header'], $_POST['submit']) &&
        $_POST['RB'] != null && $_POST['Header'] != null ) {
        
        $position      = $_POST['RB'];
        $header        = $_POST['Header'];
        
        $tipoviPolja         = array();
        $vrijednostiPolja    = array();
        $vrijednostiBulletsa = array();

        foreach ($_POST['type'] as $key => $value) {
            
            if( !isset($_POST['text'][$key]) || $_POST['text'][$key] == "")
                continue;
            
            $tipoviPolja[$key]         = $value;  
            $vrijednostiPolja[$key]    = $_POST['text'][$key];
            $vrijednostiBulletsa[$key] = $value ==  3 ? explode(PHP_EOL, $_POST['text'][$key]) : 0;
        }
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//DB INSERT
//////////////////////////////////////////////////////////////////////////////////////////////////////////        
        try {      
            $base = new Database();
            $connection = $base->connect();      
            $connection->exec("set names utf8");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//SERVICES         
//////////////////////////////////////////////////////////////////////////////////////////////////////////
            $services = "INSERT
                         INTO   services(`position`, `header`) 
                         VALUES(:position, :header)";

            $query = $connection->prepare($services);
            $query->bindParam(':position',      $position,      PDO::PARAM_STR);
            $query->bindParam(':header',        $header,        PDO::PARAM_STR);
            $rezultat = $query->execute();
            $service_id = $connection->lastInsertId();
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//COMPONENTS
//////////////////////////////////////////////////////////////////////////////////////////////////////////
            $components = "INSERT
                           INTO   components(`service_id`, `type`, `text`) 
                           VALUES(:service_id, :type, :text)";
            
            $component_ids = array();
            $query = $connection->prepare($components);
            foreach($tipoviPolja as $index => $type) {
                $text = $vrijednostiPolja[$index];
                $query->bindParam(':service_id', $service_id, PDO::PARAM_STR);
                $query->bindParam(':type',       $type,       PDO::PARAM_STR);
                $query->bindParam(':text',       $text,       PDO::PARAM_STR);
                $rezultat = $query->execute();
                $component_ids[$index] = $connection->lastInsertId();
            }
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//BULLETS      
//////////////////////////////////////////////////////////////////////////////////////////////////////////
            $bullets = "INSERT
                        INTO   bullets(`component_id`, `text`) 
                        VALUES(:component_id,  :text)";
            
            $query = $connection->prepare($bullets);
            foreach($tipoviPolja as $index => $type) {
                if($type == 3) {
                    $component_id = $component_ids[$index];
                    foreach($vrijednostiBulletsa[$index] as $bullet) {
                        $text = $bullet;
                        $query->bindParam(':component_id', $component_id, PDO::PARAM_STR);
                        $query->bindParam(':text',         $text,         PDO::PARAM_STR);
                        $rezultat = $query->execute();
                    }
                }
            }
            
            if (!$rezultat) {
                    $greska = $query->errorInfo();
                    print "SQL greska: ".$greska[2];
                    exit();
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        } finally {
            $connection = null;
        }
    }
//        var_dump($tipoviPolja);
//        var_dump($vrijednostiPolja);
//        var_dump($vrijednostiBulletsa);
//        die();
?>