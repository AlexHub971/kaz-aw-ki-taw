<?php

ob_start();

?>

<div id="cover" class="container-fluid g-0">
    <div id="carouselCover" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?=IMAGE_CAROUSEL_PATH?>room-5<?=IMAGE_EXTENSION?>" class="d-block w-100" alt=".">
        </div>
        <div class="carousel-item">
          <img src="<?=IMAGE_CAROUSEL_PATH?>room-1<?=IMAGE_EXTENSION?>" class="d-block w-100" alt=".">
        </div>
        <div class="carousel-item">
          <img src="<?=IMAGE_CAROUSEL_PATH?>room-6<?=IMAGE_EXTENSION?>" class="d-block w-100" alt=".">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselCover" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselCover" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <main>
    <section id="title" class="container col-sm-12 col-md-6 col-lg-5 m-auto my-3">
      <h1 class="text-center">
        <span class="price">
          KazAwKiTaw
        </span>
        <br>
        Locations saisonnières en Guadeloupe
      </h1>
      <p class="text-center">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae perferendis autem maxime voluptatem placeat rem
        sint veritatis non cum recusandae excepturi est quam, dolor modi accusamus suscipit.
      </p>
    </section>

    <section id="hosting" class="container">
      <h2>Nos Hébergements</h2>
      <div class="container-fluid">

        <div class="row">
        <?php
for($i=0; $i < count($properties);$i++) : 

?>
          <div class="col-sm-12 col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
            <div class="card">
            <a href="index.php?page=property&propertyid=<?= $properties[$i]->getId(); ?>">
              <img src="<?= IMAGE_PROPERTY_PATH.$properties[$i]->getImageUrl_1().IMAGE_EXTENSION; ?>" class="card-img-top" alt="<?= $properties[$i]->getTitle(); ?>">
            </a>
              <div class="card-body text-start">
                <h5 class="card-title text-start"><?= $properties[$i]->getTitle(); ?></h5>
                <p class="card-text text-start"><?= trim(substr($properties[$i]->getDescription(),0,80))." ..."; ?></p>
                <div class="d-flex justify-content-between">
                  <span class="h4 fw-bold"><a href="index.php?page=property&propertyid=<?= $properties[$i]->getId(); ?>" class="price text-decoration-none"><?=$properties[$i]->getPrice();?> &euro;</a> / nuit</span>
                  <a href="index.php?page=property&propertyid=<?= $properties[$i]->getId(); ?>" class="btn btn-cta flex-shrink-1">+ de détails</a>
                </div>
              </div>
            </div>
          </div>
          <?php endfor; ?>
        </div>

      </div>


    </section>

  </main>

<?php
$content = ob_get_clean();
$pageTitle = "Guadeloupe Locations saisonnières & de vacances - Kaz Aw Ki Taw";
$pageDesc = "Vous recherchez un hébergement pour vos vacances en Guadeloupe ? Pensez Kaw Aw Ki Taw !";
$idBodyCss = "properties";
// $displayList = true;
require "template.view.php";
?>