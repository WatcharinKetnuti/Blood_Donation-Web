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
                        <h1 class="mt-4">Location Data</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a class="btn add-btn" href="location_Form.php">Add</a></li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Location Table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Detail</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM location";
                                            $result = get($sql);
                                            if($result !== false)
                                            {
                                                foreach($result as $row)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['location_id']."</td>";
                                                    echo "<td>".$row['location_name']."</td>";
                                                    echo "<td>".$row['location_detail']."</td>";
                                                    echo "<td>
                                                    <a class='btn edit-btn' href='location_Form.php?id=".$row['location_id']."'>Edit</a>
                                                    
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
