<?php
include('../db/db.php');
authen();
include('../component/header.php');
?>

<main class="min-vh-100 d-flex align-items-center justify-content-center bg-white">
    <div class="container py-5">
        <div class="card shadow border-0">
            <div class="card-body text-center py-5">
                <h1 class="fw-bold text-danger mb-3">
                    <i class="fas fa-heartbeat me-2"></i>Welcome to Blood Donation System
                </h1>
                <p class="lead text-muted mb-4">
                    Manage and track reservation & donation data efficiently.
                </p>
                <a href="reserve_data.php" class="btn btn-danger btn-lg px-4 shadow-sm">
                    <i class="fas fa-database me-2"></i>Go to Data Manager
                </a>
            </div>
        </div>
    </div>
</main>

<?php
include('../component/footer.php');
?>
