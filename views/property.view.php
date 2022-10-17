<?php

ob_start();

if (isset($user)) {
    $userId = strval($user->getId());
    $propertyId = strval($property->getId());
    if (isset($propertyUserRating)) {
        $action = KazawkitawModel::PROPERTY_USER_UPDATE_RATE;
    } else {
        $action = KazawkitawModel::PROPERTY_USER_RATE;
    }
}

$sAmenities = "";
$count = count($property->getAmenities());
foreach ($property->getAmenities() as $key => $value) {
    $sAmenity = $value->getName();

    $sAmenities .= $sAmenity;
    if ($key < $count - 1) {
        $sAmenities .= ", ";
    }
}

$sOwners = "";
$count = count($property->getOwners());
foreach ($property->getOwners() as $key => $value) {
    $sOwner = "<a class='owner' href='index.php?page=owner&ownerid=" . $value->getId() . "'>" . $value->getFirstname() . " " . substr($value->getLastname(), 0, 1) . ". (" . $value->getAlias() . ")" . "</a>";
    $sOwners .= $sOwner;
    if ($key < $count - 1) {
        $sOwners .= ", ";
    }
}

$sTowns = "";
foreach ($property->getTowns() as $key => $value) {
    $sTown = $value->getName();
    $sTowns .= $sTown;
}


?>


<div id="cover" class="container-fluid g-0">
    <img src="<?= IMAGE_PROPERTY_PATH . $property->getImageUrl_1() . IMAGE_EXTENSION; ?>" alt="<?= $property->getTitle(); ?>" class="w-100">
</div>

<main class="my-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-12">
                            <h1><?= $property->getTitle(); ?></h1>
                            <p>
                                <?= $property->getDescription(); ?>
                            </p>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-3">
                                        <h4>
                                            Superficie
                                        </h4>
                                        <p>
                                            <?= $property->getSize(); ?> m<sup>2</sup>
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <h4>
                                            Nb. de pièces
                                        </h4>
                                        <p>
                                            <?= $property->getRooms(); ?> pièces
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <h4>
                                            Commune
                                        </h4>
                                        <p>
                                            <?= $sTowns; ?>
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <h4>
                                            Nb. de lits
                                        </h4>
                                        <p>
                                            <?= $property->getBedCapacity(); ?> lits
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <hr>


                </div>

            </div>
            <div class="col-lg-3 mb-sm-3 mb-2">

                <h4>A partir de</h4>
                <span class="price display-4">
                    <span class="fw-bold">
                        <?= $property->getPrice(); ?> &euro;
                    </span> / nuit
                </span>

                <form id="form_rate" action="" method="post" style="display:<?= isset($user) ? "block" : "none"; ?>">
                    <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="userId" value="<?= $userId; ?>">
                    <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="propertyId" value="<?= $propertyId; ?>">
                    <input style="display:<?= isset($propertyUserRating) ? "block" : "none"; ?>" type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="propertyUserRatingId" value="<?= isset($propertyUserRating) ? $propertyUserRating->getId() : "" ?>">
                    <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="action" value="<?= $action ?>">
                    <input type="number" placeholder="Noter ce logement." name="rate" pattern="^([0-9]|[1-9][0-9]|100)$" value="<?= isset($propertyUserRating) ? $propertyUserRating->getRate() : (IS_DEBUG ? random_int(5, 80) : ""); ?>">
                    <input type="submit" id='submit' value="<?= isset($propertyUserRating) ? "Mettre la note à jour" : "Noter"; ?>">
                </form>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-9 mb-sm-2 mb-1">

                <img class="w-100" src="<?= IMAGE_PROPERTY_PATH . $property->getImageUrl_1() . IMAGE_EXTENSION; ?>" alt="">

            </div>

            <div class="col-lg-3">
                <img class="w-100 mb-lg-3 mb-sm-2 mb-1" src="<?= IMAGE_PROPERTY_PATH . $property->getImageUrl_2() . IMAGE_EXTENSION; ?>" alt="">

                <img class="w-100" src="<?= IMAGE_PROPERTY_PATH . $property->getImageUrl_3() . IMAGE_EXTENSION; ?>" alt="">

                <a href="#" class="btn btn-lg btn-cta mt-5">
                    Contactez votre hôte
                </a>
            </div>

        </div>

    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 mb-sm-2 mb-1">

                <h4>Services :</h4>
                <p>
                    <?= $sAmenities ?>
                </p>

                <h4>Votre hôte :</h4>
                <p>
                    <?= $sOwners ?>
                </p>


            </div>

        </div>

    </div>

</main>


<?php
$content = ob_get_clean();
$pageTitle = "Location saisonnière " . ucwords(strtolower($sTowns)) . " " . $property->getTitle() . " | Guadeloupe - Location de vacances Kaz aw ki Taw";
$pageDesc = "Location de vacances " . $property->getTitle() . " à partir de " . $property->getPrice() . " € / nuit";
$idBodyCss = "property";
// $displayList = false;
require "template.view.php";
?>