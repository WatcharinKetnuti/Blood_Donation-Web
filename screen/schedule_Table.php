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
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Max donation</th>
                                            <th>Blood type</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                            <th>Location</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM schedule left join location on schedule.location_id = location.location_id";
                                            $result = get($sql);
                                            if($result !== false)
                                            {
                                                foreach($result as $row)
                                                {
                                                   
                                                    echo "<tr>";
                                                    echo "<td>".$row['schedule_id']."</td>";
                                                    echo "<td>".$row['schedule_start_date']." - ".$row['schedule_end_date']."</td>";
                                                    echo "<td>".$row['schedule_start_time']." - ".$row['schedule_end_time']."</td>";
                                                    echo "<td>".$row['schedule_max']."</td>";
                                                    echo "<td>".$row['schedule_blood_type']."</td>";
                                                    echo "<td>".$row['schedule_detail']."</td>";
                                                    if($row['schedule_status'] == "E")
                                                    {
                                                        echo "<td>Enable</td>";
                                                    }
                                                    else if($row['schedule_status'] == "D")
                                                    {
                                                        echo "<td>Disable</td>";
                                                    }
                                                    else
                                                    {
                                                        echo "<td>Cancel</td>";
                                                    }
                                                    echo "<td>".$row['location_name']."</td>";
                                                    
                                                   
                                                    
                                                    echo "<td>
                                                    <a class='btn edit-btn' href='schedule_Form.php?id=".$row['schedule_id']."'>Edit</a>
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
