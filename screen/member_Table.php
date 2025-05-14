<?php
include('../db/db.php');
authen();
if(login_data('admin_level') != 'A')
{
    header("Location: ../screen/index.php");
}
include('../component/header.php');
include('../component/modal.php');

// if($_SESSION['user'] == "")
// {
// 	header("Location: login.php");
// }

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Member Data</h1>
                        <ol class="breadcrumb mb-4">
                            
                        </ol>
                        <?php
                            if(isset($_SESSION['message']))
                            {
                                echo "<div class='alert alert-success' role='alert'>".$_SESSION['message']."</div>";
                                unset($_SESSION['message']);
                            }
                        ?>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Member Table
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Birth Date</th>
                                            <th>Tel</th>
                                            <th>Blood Type</th>
                                            <th>IDCard</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM member";
                                            $result = get($sql);
                                            if($result !== false)
                                            {
                                                foreach($result as $row)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['member_id']."</td>";
                                                    echo "<td>".$row['member_fname']." ".$row['member_lname']."</td>";
                                                    echo "<td>".date('d/m/Y', strtotime($row['member_birth_date']))."</td>";
                                                    echo "<td>".$row['member_tel']."</td>";
                                                    echo "<td>".$row['member_blood_type']."</td>";
                                                    echo "<td>".$row['member_cardID']."</td>";
                                                    echo "<td>".$row['member_address']."</td>";
                                                    echo "<td>".$row['member_email']."</td>";
                                                    echo "<td>
                                                   
                                                    
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
