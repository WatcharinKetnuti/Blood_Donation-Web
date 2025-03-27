<?php
    include '../db/db.php';
    api_acess();

    $formatted_date = date('Y-m-d', strtotime($_GET['date']));

    $location =  "location.location_name = '{$_GET['location']}'";
    $date = "schedule.schedule_start_date <= '{$formatted_date}' AND schedule.schedule_end_date >= '{$formatted_date}'";
    $blood = "schedule.schedule_blood_type LIKE '%{$_GET['blood']}%' OR schedule.schedule_blood_type = ''";

    $conditions = [];
    $conditions[] = "schedule.schedule_status = 'E'";
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
                WHERE $conditions";




    $result = get($sql);
    echo json_encode($result);

    // echo"<br>";
    // echo"<br>";
    // echo $sql;


?>