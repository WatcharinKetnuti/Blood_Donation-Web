<?php
    include '../db/db.php';
    api_acess();
    $sql = "SELECT * FROM schedule left join location on schedule.location_id = location.location_id";
    $result = get($sql);
    echo json_encode($result);

?>