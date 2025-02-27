<?php
require_once "checkupdates.php";
require_once "updates.php";
require_once "models/model.php";
$model = new Model();
$icon = mysqli_fetch_assoc($model->getDatawadmin());
if (!empty($icon)) {
    $ten = $icon['ten'];
    $iconi = $icon['icon'];
} else {
    $ten = "Admin Dashboard";
    $iconi = "https://lh3.googleusercontent.com/pw/AP1GczPljgcKGy1Sje5wLcXY1XBfGbFED1GOUUY1EguHgnwWI3r2gbm09LcKxfMgQ0umNdDyPpigfZ6ZQoog6q5mkW8FHyaiUmjLlmbkJI8hLskJCA7LQil4Ez9qcMhJ2_EEdHb02tq2NkL0C0ptaMP6wo-SvQ=w240-h240-s-no-gm?authuser=1";
}

$filePath = "assets/fonts/fonts.txt";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ten ?></title>
    <script src="https://kit.fontawesome.com/21ecfbbaac.js" crossorigin="anonymous"></script>
    <link rel="icon" href="<?php echo $iconi; ?>" type="image/png" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />

    <!-- main css -->
    <link rel="stylesheet" href="assets/css/qlnavbar.css">
    <link rel="stylesheet" href="assets/css/style.css?v=5">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .ui-sortable-helper {
            background-color: rgb(238, 238, 238) !important;
        }


        .ui-sortable-placeholder {
            background-color: rgb(248, 13, 13) !important;
            border: 2px dashed #ffb6b6;
        }

    </style>
</head>