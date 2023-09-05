<?php
function getBoothButton($label, $icon, $command, $type = 'md') {
    global $config;
    global $actionBtnClass;
    $thisBtnClass = $actionBtnClass;
    $thisBtnClass .= ' ' . $command;

    if (($command != 'deletebtn' && $label != 'cups-button') || ($command == 'deletebtn' && $config['delete']['no_request'])) {
        $thisBtnClass .= ' rotaryfocus';
    }

    if (($config['ui']['style'] == 'classic' || $config['ui']['style'] == 'classic_rounded') && $type == 'xs') {
        $thisBtnClass .= ' btn--small';
    }

    if ($label == 'cups-button') {
        $thisBtnClass .= '" target="newwin';
    }

    if ($command == 'reload') {
        $thisBtnClass .= '" onclick="window.location.reload();';
    }

    $iconPosition = $config['ui']['button'] == 'classic' || $config['ui']['button'] == 'classic_rounded' ? 'mr-2' : ($config['ui']['button'] == 'modern' ? '' : 'mb-2');

    $iconElement = '<i class="' . $icon . ' ' . $iconPosition . '"></i>';
    $spanElement = $config['ui']['button'] == 'modern' ? '' : '<span class="text-sm whitespace-nowrap" data-i18n="' . $label . '"></span>';

    return '<a href="#" class="' . $thisBtnClass . '">' . $iconElement . $spanElement . '</a>';
} ?>

