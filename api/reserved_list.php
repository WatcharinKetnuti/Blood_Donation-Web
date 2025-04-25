<?php
    include '../db/db.php';
    api_acess();
    $where = "";
    $noti = $_GET['noti'] ?? "false";
    if($noti == "true") {
        $where = "AND DATEDIFF(reserve_detail.reserve_donation_date, CURDATE()) BETWEEN 0 AND 3";
    }

    $sql = "SELECT reserve.*, location.location_name, location.location_address, s.schedule_start_date,
            s.schedule_end_date, s.schedule_start_time, s.schedule_end_time, s.schedule_detail,
            reserve_detail.reserve_donation_date FROM reserve 
            LEFT JOIN reserve_detail ON reserve.reserve_id = reserve_detail.reserve_id 
            LEFT JOIN schedule s ON reserve_detail.schedule_id = s.schedule_id 
            LEFT JOIN location ON s.location_id = location.location_id 
            LEFT JOIN member ON reserve.member_id = member.member_id
             WHERE reserve.reserve_status = 'W' AND reserve.member_id = '{$_GET['member_id']}'
                $where
             order by reserve.reserve_id desc limit 1";
    //echo $noti;
    //echo $sql;

    $result = get($sql);
    echo json_encode($result);
?>