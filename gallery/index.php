<?php

require_once('../lib/config.php');
require_once('../lib/db.php');
require_once('../lib/filter.php');

if ($config['database']['enabled']) {
	$images = getImagesFromDB();
} else {
	$images = getImagesFromDirectory($config['foldersAbs']['images']);
}
$imagelist = array_reverse($images);

$btnShape = 'shape--' . $config['ui']['button'];
$uiShape = 'shape--' . $config['ui']['style'];

$first_img = '../' . $config['foldersRoot']['images'] . DIRECTORY_SEPARATOR . $imagelist[0];
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// meta params to evaluate
$og_img_alt = 'Photobooth';
$seconds_to_cache = 60;

header("Cache-Control: max-age=$seconds_to_cache");
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
        <meta name="msapplication-TileColor" content="<?=$config['colors']['primary']?>">
        <meta name="theme-color" content="<?=$config['colors']['primary']?>">

        <title><?=$config['ui']['branding']?> FTP Gallery</title>

        <!-- Favicon + Android/iPhone Icons -->
        <link rel="apple-touch-icon" sizes="180x180" href="resources/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="resources/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="resources/img/favicon-16x16.png">
        <link rel="manifest" href="resources/img/site.webmanifest">
        <link rel="mask-icon" href="resources/img/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="canonical" href="<?=$actual_link?>">

        <!-- Fullscreen Mode on old iOS-Devices when starting photobooth from homescreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?=$first_img?>">
        <meta property="og:image:secure_url" content="<?=$first_img?>">
        <meta property="og:image:width" content="500">
        <meta property="og:image:height" content="500">
        <meta property="og:url" content="<?=$actual_link?>">
        <meta name="twitter:card" content="summary_large_image">

        <!--  Non-Essential, But Recommended -->
        <meta name="twitter:image:alt" content="<?=$og_img_alt?>">
        <meta name="twitter:image" content="<?=$first_img?>">

        <link rel="stylesheet" href="../node_modules/normalize.css/normalize.css" />
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="../node_modules/material-icons/iconfont/material-icons.css">
        <link rel="stylesheet" href="../node_modules/material-icons/css/material-icons.css">
        <link rel="stylesheet" href="../resources/css/gallery_ftp.css?v=<?php echo $config['photobooth']['version']; ?>" />
        <?php if (is_file("../private/overrides.css")): ?>
        <link rel="stylesheet" href="../private/overrides.css?v=<?php echo $config['photobooth']['version']; ?>" />
        <?php endif; ?>

        <style>
            .front-cover {
                background-image: linear-gradient(black, white), url(<?=$first_img?>);
            }
        </style>


    </head>
    <body>
        <header class="front-cover"><?=$config['ui']['branding']?> FTP Gallery</header>

        <div class="container">
            <?php
            $index = 0;

            foreach ($imagelist as $image) {
                $index += 1;
		        $filename_thumb = '../' . $config['foldersRoot']['thumbs'] . DIRECTORY_SEPARATOR . $image;
		        $filename_photo = '../' . $config['foldersRoot']['images'] . DIRECTORY_SEPARATOR . $image;
                $download_name = $image;

		        if (is_readable($filename_photo)) {
		        ?>
                    <div class="img-container">
                        <div class="interior">
                            <a id="opener<?=$index?>" class="modal-btn" href="#open-modal<?=$index?>"><img class="<?php echo $uiShape; ?>" src="<?=$filename_photo?>"  alt="<?=$image?>"/></a>
                        </div>
                    </div>
                    <div id="open-modal<?=$index?>" class="modal-window">
                        <div class="modal-content">
                            <div class="action-bar-outer">
                                <div class="action-bar">
                                    <a href='<?=$filename_photo?>' class="btn--gal <?php echo $btnShape; ?>" download='<?=$og_img_alt?>_<?=$download_name?>'><i class="fa fa-download"></i></a>
                                    <a href="#opener<?=$index?>" class="btn--gal <?php echo $btnShape; ?>" title="Close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <img class= "<?php echo $uiShape; ?>" src="<?=$filename_photo?>" loading="lazy" alt="<?=$image?>" />
                        </div>
                    </div>

		        <?php
                }
                ?>
            <?php
            }
            ?>
        </div>

	<script type="text/javascript" src="../api/config.php?v=<?php echo $config['photobooth']['version']; ?>"></script>
	<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../resources/js/theme.js?v=<?php echo $config['photobooth']['version']; ?>"></script>
    </body>
</html>
