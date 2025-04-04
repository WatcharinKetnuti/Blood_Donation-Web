<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blood Donation</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/styles2.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed ">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand ps-3" href="index.php">Blood Donation</a>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><h5 class="text-center"><?=login_status()? "User: ".login_data('admin_username') : ''?> </h5></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../Action/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <?php
                                if(login_data('admin_level') == 'A')
                                {
                            ?>
                            <a class="nav-link" href="../screen/admin_Table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div> <!-- Updated icon -->
                                Admin
                            </a>
                            <a class="nav-link" href="../screen/member_Table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div> <!-- Updated icon -->
                                Member
                            </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="location_Table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div> <!-- Updated icon -->
                                Location
                            </a>
                            <a class="nav-link" href="schedule_Table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div> <!-- Updated icon -->
                                Schedule
                            </a>
                            <a class="nav-link" href="reserve_Table.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-heart"></i></div> <!-- Updated icon -->
                                Reserve
                            </a>

    
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">
                            <?php
                                if(login_status())
                                {
                                    echo "Logged in as ";
                                    if(login_data('admin_level') == 'A')
                                    {
                                        echo "Administrator";
                                    }
                                    else
                                    {
                                        echo "Schedule Manager";
                                    }
                                }
                            ?> 
                        </div>
                    </div>
                </nav>
            </div>
        <div id="layoutSidenav_content">