<?php
include_once "inc/header.php";
include_once "inc/config.php";

$connect = connection();


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php"); 
    exit;
}

$school_id = (int) $_GET['id'];


$sql = "SELECT * FROM schools WHERE id = $school_id";


$result = mysqli_query($connect, $sql);


if (!$result || mysqli_num_rows($result) === 0) {
    echo '<div class="container mt-5 vh-80"><div class="alert alert-danger" role="alert">School not found!</div></div>';
    include_once "inc/footer.php";
    exit;
}

$school = mysqli_fetch_assoc($result);

?>

<div class="container p-5 mt-5">
    <div class="card bg-dark text-light shadow-lg">
        <img class="card-img-top  img-fluid" 
             src="<?= $school['school_image']?>" 
             alt="<?= htmlspecialchars($school['name'])?>" 
             style="max-height: 400px; object-fit: cover;">
        
        <div class="card-body">
            <h1 class="card-title text-success mb-4"><?= htmlspecialchars($school['name'])?></h1>
            
            <hr>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="lead"><strong>Number Of Students:</strong> <?= htmlspecialchars($school['number_of_students'] ?? 'N/A')?></p>
                </div>

                <div class="mt-4 col-md-6">
                    <h2>About the School</h2>
                    <p><?= htmlspecialchars($school['description'] ?? 'No detailed description available.')?></p>
                </div>
    
                <?php if (!empty($school['academic_manger'])): ?>
                    <div class="mt-2 col-md-6">
                        <h3>Contact Information</h3>
                        <p><strong>Academic Manger:</strong> <?= htmlspecialchars($school['academic_manger'])?></p>
                    </div>
                <?php endif; ?>
    
                <div class="mt-4 col-md-6">
                    <a href="index.php" class="btn btn-secondary">← Back to Schools</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
include_once "inc/footer.php";
?>