<?php
include('../db/db.php');
include('../component/header.php');
include('../component/modal.php');

// if($_SESSION['user'] == "")
// {
// 	header("Location: login.php");
// }

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Schedule Data</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a class="btn add-btn" href="schedule_Form.php">Add</a></li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Schedule Table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Reserve Date</th>
                                            <th>Donation Date</th>
                                            <th>Schedule date</th>
                                            <th>Location</th>
                                            <th>User</th>
                                            <th>Blood type</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM reserve left join reserve_detail on reserve.reserve_id = reserve_detail.reserve_id 
                                            left join schedule s on reserve_detail.schedule_id = s.schedule_id 
                                            left join location on s.location_id = location.location_id 
                                            left join member on reserve.member_id = member.member_id";
                                            $result = get($sql);
                                            if($result !== false)
                                            {
                                                foreach($result as $row)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['reserve_id']."</td>";
                                                    echo "<td>".$row['reserve_date']."</td>";
                                                    echo "<td>".$row['reserve_donation_date']."</td>";
                                                    echo "<td>".$row['schedule_start_date']." - ".$row['schedule_end_date']."</td>";
                                                    echo "<td>".$row['location_name']."</td>";
                                                    echo "<td>".$row['member_fname']." ".$row['member_lname']."</td>";
                                                    echo "<td>".$row['member_blood_type']."</td>";
                                                    if($row['reserve_status'] == "W")
                                                    {
                                                        echo "<td>Waiting</td>";
                                                    }
                                                    else if($row['reserve_status'] == "D")
                                                    {
                                                        echo "<td>Donated</td>";
                                                    }
                                                    else
                                                    {
                                                        echo "<td>Cancel</td>";
                                                    }
                                                    
                                                    
                                                   
                                                    
                                                    echo "<td>
                                                    <a class='btn edit-btn' href='schedule_Form.php?id=".$row['reserve_id']."'>Edit</a>
                                                    <button class='btn delete-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-href='../Action/location_Delete.php?id=".$row['schedule_id']." '>Delete</button>
                                                    </td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include('../component/footer.php');
?>
