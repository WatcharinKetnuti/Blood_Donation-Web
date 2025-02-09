<?php
include('../db/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reserve_id = $_POST['reserve_id'];
    $reserve_status = $_POST['reserve_status'];
    $donation_date = $_POST['donation_date'];
    $location_name = $_POST['location_name'];
    $search = $_POST['search'];

    $sql = "UPDATE reserve SET reserve_status = '$reserve_status' WHERE reserve_id = '$reserve_id'";
    $result = set($sql);

    if ($result) {
        $query_string = http_build_query([
            'donation_date' => $donation_date,
            'location_name' => $location_name,
            'search' => $search
        ]);
        header("Location: ../screen/reserve_Table.php?$query_string");
    } else {
        echo "Error updating record";
    }
}
?>
