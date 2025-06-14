<?php
    include '../db/db.php';
    api_acess();

    $datenow = date('Y-m-d');
    $formatted_date = date('Y-m-d', strtotime($_GET['date']));

    $location =  "location.location_name = '{$_GET['location']}'";
    $date = "'$formatted_date' BETWEEN schedule.schedule_start_date AND schedule.schedule_end_date";
    $blood = "schedule.schedule_blood_type LIKE '%{$_GET['blood']}%' ";

    $conditions = [];
    $conditions[] = "schedule.schedule_status = 'E' AND schedule.schedule_end_date >= '$datenow'";
    if (!empty($_GET['location'])) {
        $conditions[] = $location;
    }
    if (!empty($_GET['date'])) {
        $conditions[] = $date;
    }
    if (!empty($_GET['blood'])) {
        $conditions[] = $blood;
    }
    $conditions = implode(' AND ', $conditions);

    //echo''. $conditions .'';

    $sql = "SELECT * FROM schedule 
            LEFT JOIN location ON schedule.location_id = location.location_id 
            WHERE $conditions
            ORDER BY schedule.schedule_start_date DESC";
            



    $result = get($sql);
    echo json_encode($result);

    // echo"<br>";
    // echo"<br>";
    // echo $sql;


?>