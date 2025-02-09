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
                        <h1 class="mt-4">Admin Data</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a class="btn add-btn" href="admin_Form.php">Add</a></li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Admin Table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM admin";
                                            $result = get($sql);
                                            if($result !== false)
                                            {
                                                foreach($result as $row)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['admin_id']."</td>";
                                                    echo "<td>".$row['admin_username']."</td>";
                                                    echo "<td>".$row['admin_password']."</td>";
                                                    echo "<td>";
                                                    if($row['admin_level'] == "A")
                                                    {
                                                        echo "Admin";
                                                    }
                                                    else if($row['admin_level'] == "M")
                                                    {
                                                        echo "Schedule Manager";
                                                    }
                                                    echo "</td>";
                                                    echo "<td>
                                                    <a class='btn edit-btn' href='admin_Form.php?id=".$row['admin_id']."'>Edit</a>
                                                    <button class='btn delete-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-href='../Action/admin_Delete.php?id=".$row['admin_id']." '>Delete</button>
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
