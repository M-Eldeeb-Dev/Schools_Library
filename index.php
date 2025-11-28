<?php
include_once "inc/header.php";

?>
<?php
include_once "inc/config.php";
$connect = connection();
$sql = "SELECT * FROM schools";
$result = mysqli_query($connect, $sql);

?>


<?php
        if (!$result || mysqli_num_rows($result) === 0) {
            echo '<div class="container mt-5 vh-80"><div class="alert alert-danger" role="alert">Photos not found!</div></div>';
            include_once "inc/footer.php";
            exit;
        }
    ?>

<div class="glass-main-container">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="First slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="1"
                aria-label="Second slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="2"
                aria-label="Third slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="3"
                aria-label="Forth slide"
            ></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="carousel-item <?= $active = $row['id'] == 1 ? 'active' : ''?>">
                    <img
                        src="<?= $row['school_image']?>"
                        class="w-100 img-fluid d-block"
                        alt="<?= $row['name']?>"
                        height="300px"
                    />
                    <div class="carousel-caption d-none d-md-block glass-carousel-caption">
                        <h3><?= $row['name']?></h3>
                    </div>
                </div>
            <?php }?>
        </div>
        
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselId"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselId"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <?php 

    mysqli_data_seek($result, 0); 
    ?>

    <?php
        if (!$result || mysqli_num_rows($result) === 0) {
            echo '<div class="container mt-5 vh-80"><div class="alert alert-danger" role="alert">School not found!</div></div>';
            include_once "inc/footer.php";
            exit;
        }
    ?>

    <div class="container p-5 justify-content-center align-items-center">
        <div class="row">
            <?php while($school = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4">
                <div class="card bg-dark m-3 text-center text-light glass-card">
                    <img class="card-img-top" height="250px" src="<?= $school['school_image']?>" alt="<?= $school['name']?>" />
                    <div class="card-body">
                        <h4 class="card-title"><?= $school['name']?></h4>
                        <a href="show.php?id=<?= $school['id']?>" class="btn btn-primary text-center">Show More Details</a>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
</div>

<?php
 
include_once "inc/footer.php";

?>