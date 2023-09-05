<?php

// $btnClass = 'btn btn--' . $config['ui']['button'];
// $btnShape = 'shape--' . $config['ui']['button'];
// $uiShape = 'shape--' . $config['ui']['style'];

$btnClasses['general'] = 'text-button-font text-base md:text-2xl lg:text-4xl';
$btnClasses['general'] .= $config['ui']['button'] === 'modern' ? ' bg-gradient-radial from-tertiary via-primary to-secondary' : ' bg-primary';
$btnClasses['general'] .= ' hover:bg-tertiary active:bg-tertiary focus:bg-tertiary';

// classic
$btnClasses['classic'] = ' flex inline-flex m-2 items-center justify-center';
$shapeClasses['classic'] = 'rounded-none';
$btnShapeClasses['classic'] = $shapeClasses['classic'];
$borderClasses['classic'] = 'border-none';
$btnSize['classic'] = 'h-12 sm:h-16 min-w-[130px] w-auto m-2 p-2';

// classic_rounded
$btnClasses['classic_rounded'] = $btnClasses['classic'];
$shapeClasses['classic_rounded'] = 'rounded';
$btnShapeClasses['classic_rounded'] = $shapeClasses['classic_rounded'];
$borderClasses['classic_rounded'] = 'border-none';
$btnSize['classic_rounded'] = $btnSize['classic'];

// modern
$btnClasses['modern'] = ' inline-flex m-2 items-center justify-center flex-col shrink-0 grow-0';
$shapeClasses['modern'] = 'rounded-md';
$btnShapeClasses['modern'] = 'rounded-full';
$borderClasses['modern'] = 'border-solid border-4 border-btn-border';
$btnSize['modern'] = 'w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28';

// modern_squared
$btnClasses['modern_squared'] = $btnClasses['modern'];
$shapeClasses['modern_squared'] = $shapeClasses['modern'];
$btnShapeClasses['modern_squared'] = $shapeClasses['modern_squared'];
$borderClasses['modern_squared'] = 'border-solid border-4 border-btn-border shadow-lg';
$btnSize['modern_squared'] = $btnSize['modern'];

// custom
$btnClasses['custom'] = ' btn--custom';
$shapeClasses['custom'] = 'shape--custom';
$btnShapeClasses['custom'] = 'btn--custom-shape';
$borderClasses['custom'] = 'border--custom';
$btnSize['custom'] = 'btn--custom-size';

$actionBtnClass = $btnClasses['general'] . $btnClasses[$config['ui']['button']];
$actionBtnClass .= ' ' . $btnShapeClasses[$config['ui']['button']];
$actionBtnClass .= ' ' . $borderClasses[$config['ui']['button']];
$actionBtnClass .= ' ' . $btnSize[$config['ui']['button']];

$btnClass = $btnClasses['general'] . $btnClasses['classic'];
$btnClass .= ' ' . $btnShapeClasses[$config['ui']['button']];
$btnClass .= ' ' . $borderClasses[$config['ui']['button']];

$uiShape = $shapeClasses[$config['ui']['style']];
$btnShape = $btnShapeClasses[$config['ui']['button']];

if (isset($photoswipe) && $photoswipe) {
    require_once $fileRoot . 'lib/db.php';

    $database = new DatabaseManager();
    $database->db_file = DB_FILE;
    $database->file_dir = IMG_DIR;
    if ($config['database']['enabled']) {
        $images = $database->getContentFromDB();
    } else {
        $images = $database->getFilesFromDirectory();
    }
    $imagelist = $config['gallery']['newest_first'] === true && !empty($images) ? array_reverse($images) : $images;
    if (isset($randomImage) && $randomImage && !empty($imagelist)) {
        shuffle($imagelist);
    }
}

?>
