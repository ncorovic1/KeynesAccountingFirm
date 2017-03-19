<?php
//0       => form Component
//1       => paragraph
//2       => Subheading
//3       => Bullets

$type = $_GET['type'];
if($type) {
    //U Bazu preko fajla.
}

switch ($type) {
    case 0:
        echo "<br><br>
              <div class=\"form-comp\">
                  <div class=\"col-md-2\">
                      <select style=\"width: 150px; border: none;\">
                          <option> Sporedni naslov </option>
                          <option> Paragraf        </option>
                          <option> Bullets         </option>
                      </select>
                  </div>
                  <textarea class=\"col-md-10\" placeholder=\"Tekst Usluge\" rows=\"3\" name=\"component[]\"></textarea>
              </div>";
        break;
    case 1:
        echo "1";
        break;
    case 2:
        echo "2";
        break;
    case 3:
        echo "3";
        break;
    default:
        break;
}

?>