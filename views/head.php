<?php
if (isset($_SESSION['user'])) {
  $user = unserialize($_SESSION['user']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($pageTitle) ? $pageTitle : "Kaw aw ki Taw" ?></title>
  <meta name="description" content="<?= isset($pageDesc) ? $pageDesc : "Kaw aw ki Taw : Locations saisonnières en Guadeloupe " ?>">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@500&family=Josefin+Slab:wght@300&display=swap" rel="stylesheet">

</head>