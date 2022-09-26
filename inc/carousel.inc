<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.bundle.min.js"></script>
<div class="d-sm-flex">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $uneimage['chemin']; ?>" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $uneimage['chemin2']; ?>" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $uneimage['chemin3']; ?>" class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>