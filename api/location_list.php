<?php
    include '../db/db.php';
    api_acess();
    $sql = "SELECT * FROM location";
    $result = get($sql);
    echo json_encode($result);

?>