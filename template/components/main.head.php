<?php
include 'main.defaults.php'; ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="msapplication-TileColor" content="<?= $config['colors']['primary'] ?>">
    <meta name="theme-color" content="<?= $config['colors']['primary'] ?>">

    <title><?= $pageTitle ?></title>

    <!-- Favicon + Android/iPhone Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $fileRoot ?>resources/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $fileRoot ?>resources/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $fileRoot ?>resources/img/favicon-16x16.png">
    <link rel="manifest" href="<?= $fileRoot ?>resources/img/site.webmanifest">
    <link rel="mask-icon" href="<?= $fileRoot ?>resources/img/safari-pinned-tab.svg" color="#5bbad5">

    <!-- Fullscreen Mode on old iOS-Devices when starting photobooth from homescreen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="stylesheet" href="<?= $fileRoot ?>node_modules/normalize.css/normalize.css" />
    <link rel="stylesheet" href="<?= $fileRoot ?>node_modules/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= $fileRoot ?>node_modules/material-icons/iconfont/material-icons.css">
    <link rel="stylesheet" href="<?= $fileRoot ?>node_modules/material-icons/css/material-icons.css">
    <link rel="stylesheet" href="<?= $fileRoot ?>resources/css/tailwind.css?v=<?= $config['photobooth']['version'] ?>"/>

    <?php
    echo '<link rel="stylesheet" href="' . $fileRoot . 'resources/css/' . $mainStyle . '?v=' . $config['photobooth']['version'] . '"/>';
    if ($photoswipe) {
        echo '<link rel="stylesheet" href="' . $fileRoot . 'node_modules/photoswipe/dist/photoswipe.css"/>' . "\n";
        if ($config['gallery']['bottom_bar']) {
            echo '<link rel="stylesheet" href="' . $fileRoot . 'resources/css/photoswipe-bottom.css?v=' . $config['photobooth']['version'] . '"/>' . "\n";
        }
    }
    if (is_file($fileRoot . 'private/overrides.css')) {
        echo '<link rel="stylesheet" href="' . $fileRoot . 'private/overrides.css?v=' . $config['photobooth']['version'] . '"/>' . "\n";
    }
    ?>

    <script type="text/javascript" src="<?= $fileRoot ?>node_modules/jquery/dist/jquery.min.js"></script>

<style>
:root {
    --brand-1: <?= $config['colors']['panel'] ?>;
    --brand-2: <?= $config['colors']['primary_light'] ?>;
    --primary: <?= $config['colors']['primary'] ?>;
    --primary-light: <?= $config['colors']['primary_light'] ?>;
    --secondary: <?= $config['colors']['secondary'] ?>;
    --secondary-font: <?= $config['colors']['font_secondary'] ?>;
    --tertiary: <?= $config['colors']['highlight'] ?>;
    --font: <?= $config['colors']['font'] ?>;
    --button-font: <?= $config['colors']['button_font'] ?>;
    --start-font: <?= $config['colors']['start_font'] ?>;
    --panel: <?= $config['colors']['panel'] ?>;
    --btn-border: <?= $config['colors']['border'] ?>;
    --box: <?= $config['colors']['box'] ?>;
    --gallery-button: <?= $config['colors']['gallery_button'] ?>;
    --countdown: <?= $config['colors']['countdown'] ?>;
    --countdown-bg: <?= $config['colors']['background_countdown'] ?>;
    --cheese: <?= $config['colors']['cheese'] ?>;
}
</style>
</head>
