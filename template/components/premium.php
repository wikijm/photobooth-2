<?php

use Photobooth\Service\LanguageService;
use Photobooth\Utility\ComponentUtility;
use Photobooth\Utility\PathUtility;

$languageService = LanguageService::getInstance();
$step = isset($_GET['step']) ? $_GET['step'] : 'collage';

?>
<div id="premium" class="premium rotarygroup">
    <div class="premium-body">
    <?php 
        // Prikazujemo različite ekrane na osnovu trenutnog koraka
        switch ($step) {
            case 'collage':
                include PathUtility::getAbsolutePath('template/components/premium.collage.php');
                break;
            case 'quantity':
                include PathUtility::getAbsolutePath('template/components/premium.quantity.php');
                break;
            case 'shooting':
                include PathUtility::getAbsolutePath('template/components/premium.shootingphp');
                break;
            case 'choice':
                include PathUtility::getAbsolutePath('template/components/choice.php');
                break;
            default:
                include PathUtility::getAbsolutePath('template/components/gallery.images.php');
                break;
        }
        ?>
    </div>
</div>
