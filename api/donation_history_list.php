<?php
    include '../db/db.php';
    api_acess();

    $member_id = $_GET['memberid'] ?? '';
    
    $sql = "SELECT 
                reserve.reserve_id as donation_id,
                reserve.member_id,
                reserve_detail.reserve_donation_date as donation_date,
                location.location_name,
                member.member_blood_type as blood_type
            FROM reserve 
            LEFT JOIN reserve_detail ON reserve.reserve_id = reserve_detail.reserve_id 
            LEFT JOIN schedule ON reserve_detail.schedule_id = schedule.schedule_id 
            LEFT JOIN location ON schedule.location_id = location.location_id 
            LEFT JOIN member ON reserve.member_id = member.member_id
            WHERE reserve.reserve_status = 'D' 
            AND reserve.member_id = '$member_id'
            ORDER BY donation_id DESC 
             ";  
    

    
    $result = get($sql);
    echo json_encode($result);
?>