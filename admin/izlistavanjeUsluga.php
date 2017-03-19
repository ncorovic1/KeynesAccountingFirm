<?php
    require_once('database.php'); 
    include 'brisanjeUslugePoID.php';
    
    try { 
        $base = new Database();
        $connection = $base->connect();      
        $connection->exec("set names utf8");

        $services = "SELECT   id, position, header
                     FROM     services
                     ORDER BY position";
        $query = $connection->prepare($services);
        $rezultat = $query->execute();
        $services = $query->fetchAll();
        
        
        $components = "SELECT   id, service_id, type, text
                       FROM     components 
                       WHERE    service_id = :service_id
                       ORDER by id";
        $query = $connection->prepare($components);
       
        $i = 0;
        if( count($services) ) {
            foreach($services as $s) {
                $query->bindParam(':service_id', $s['id'], PDO::PARAM_STR);
                $rezultat = $query->execute();
                $services[$i]['components'] = $query->fetchAll();
                $i += 1;
            }
        }

        if (!$rezultat) {
                $greska = $query->errorInfo();
                print "SQL greska: ".$greska[2];
                exit();
        }      
//
//ISPIS
//
        // L-Left, R-Right
        $komponente = array();
        $komponente[1]['L'] = '<p>';
        $komponente[1]['R'] = '</p>';
        $komponente[2]['L'] = '<br><p><b>';
        $komponente[2]['R'] = '</b></p>';
        $komponente[3]['L'] = '<ul class="lista-stavke">';
        $komponente[3]['R'] = '</ul>';
        
        for($i = 0; $i < count($services); $i++) {
            
            if($priviledge == "user" && $i != 0)
                echo '<hr>';
            
            echo '<div class="usluga">
                    <div class="row margin-b-40">
                        <div class="col-sm-6">
                            <h2>'.$services[$i]['header'].'</h2>
                        </div>
                    </div>
                    <div class="lista">';
            
            for($j = 0; $j < count($services[$i]['components']); $j++) {
                $s = $services[$i]['components'][$j];
                echo $komponente[$s['type']]['L'];
                if( $s['type'] != 3) {
                    echo $s['text'];
                }
                else {
                    $bullets = explode(PHP_EOL, $s['text']);
                    //var_dump($bullets);
                    foreach($bullets as $b)
                        echo '<li>'.$b.'</li>';
                }
                echo $komponente[$s['type']]['R'];
            }
            
            if( $priviledge == "admin")
                echo '      <form method="GET">
                                <button name="deleteID" class="delete_dugme" value="'.$services[$i]['id'].'">Brisi uslugu</button>
                            </form>';
           echo      '</div>
                  </div>';
            
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    } finally {
        $connection = null;
    }
?>