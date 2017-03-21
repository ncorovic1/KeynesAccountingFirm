<?php
    require_once('database.php'); 
    include 'brisanjeUslugePoID.php';
    
    if( isset($_GET['id']) && $_GET['id'] ) {
        try { 
            $id = $_GET['id'];
            $base = new Database();
            $connection = $base->connect();      
            $connection->exec("set names utf8");

            $services = "SELECT   id, position, header
                         FROM     services
                         WHERE    id = :id
                         ORDER BY position";
            $query = $connection->prepare($services);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $rezultat = $query->execute();
            $service = $query->fetchAll();
            $service = $service[0];

            if( !count($service) ) 
                die();

            $components = "SELECT   id, service_id, type, text
                           FROM     components 
                           WHERE    service_id = :service_id
                           ORDER by id";
            $query = $connection->prepare($components);
            $query->bindParam(':service_id', $id, PDO::PARAM_STR);
            $rezultat = $query->execute();
            $service[3] = $query->fetchAll();
            $service['components'] = $service[3];
                        
            if (!$rezultat) {
                    $greska = $query->errorInfo();
                    print "SQL greska: ".$greska[2];
                    exit();
            }      
            
            echo '<div id="allFields">
                    <div class="form-group">
                        <label class="col-md-2" style="padding-left: 18px;">
                            Redni broj: </label>
                        <textarea class="col-md-10" placeholder="Redni broj(pozicija)" rows="1" name="RB">'.$service['position'].'</textarea>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2" style="padding-left: 18px;">
                            Glavni naslov: </label>
                        <textarea class="col-md-10" placeholder="Naslov usluge" rows="1" name="Header">'.$service['header'].'</textarea>
                    </div>';
                        
            for($j = 0; $j < count($service['components']); $j++) {
                $s = $service['components'][$j];
                $type = $service['components'][$j]['type'];
                echo '<div class="form-group">
                            <div class="col-md-2">
                                <select style="width: 150px; border: none;" name="type[]">
                                    <option value=1 '.(($type == 1) ? 'selected'  : '').'> Paragraf        </option>
                                    <option value=2 '.(($type == 2) ? 'selected'  : '').'> Sporedni naslov </option>
                                    <option value=3 '.(($type == 3) ? 'selected'  : '').'> Bullets         </option>
                                </select>
                            </div>
                            <textarea class="col-md-9" placeholder="Tekst" rows="3" name="text[]">'.$service['components'][$j]['text'].'</textarea>
                            <div class="col-md-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default removeButton redWhite">
                                            <i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-default addButton redWhite">
                                            <i class="fa fa-plus"></i></button>
                                    </div>                                        
                                </div>
                            </div>
                        </div>';          
            }


           echo      '<div class="form-group">
                            <div><div>
                                    <div class="col-md-12">
                                        <button type="button" class="redWhite addButton" style="width: 100%; border-radius: 2px;"> 
                                            Nova komponenta </button>
                                    </div>
                            </div></div>
                        </div>
                    </div>
                    <input type="hidden" name="deleteID" value='.$service['id'].'>';


        } catch(PDOException $e) {
            echo $e->getMessage();
        } finally {
            $connection = null;
        }
    }
?>