<?php
    $rec = "http://localhost:8080/keynes/admin/add.php?yes=A%0D%0AB%0D%0AC";
    print_r(explode("%0D%0A", $rec));
?>