<?php
    $bgImage = $config['background']['defaults'];
    if (str_contains($bgImage, 'url(')) {
        $bgImage = substr($bgImage, 4, -1);
    }

    $logoClasses = 'w-full h-auto max-w-[155px] absolute';
    if( $config['logo']['position'] == "top_left" ) {
        $logoClasses .= ' top-4 left-4';
    } else if( $config['logo']['position'] == "top_right" ) {
        $logoClasses .= ' top-4 right-4';
    } else if( $config['logo']['position'] == "center" ) {
        $logoClasses .= ' my-auto top-1/2 -translate-y-1/2 -mt-12';
    } else if( $config['logo']['position'] == "bottom_left" ) {
        $logoClasses .= ' bottom-4 left-4';
    } else if( $config['logo']['position'] == "bottom_right" ) {
        $logoClasses .= ' bottom-4 right-4';
    }
?>

<div class="w-full h-screen flex flex-col items-center relative bg-red-200">

    <!-- bgImage -->
    <div class="w-full h-full absolute left-0 top-0">
        <img src="<?=$bgImage?>" alt="background" class="w-full h-full object-cover">
    </div>

    <!-- logo -->
    <?php 
        if ($config['logo']['enabled']) {
            echo '<div class="'. $logoClasses .'">
                <img class="w-full h-full object-contain" src="'. $config['logo']['path'].'" alt="logo">
            </div>';
        }
        echo $config['background']['defaults'];
    ?>


    <!-- controls -->
    <div class="w-full flex items-center justify-center mb-8 mt-auto">
        <?php 
            if ($config['button']['force_buzzer']) {
                echo '<div id="useBuzzer">
                        <span data-i18n="use_button"></span>
                    </div>';
            }
            else {
                if ($config['picture']['enabled']) {
                    echo getBoothButton("takePhoto", $config['icons']['take_picture'], "takePic");
                }
                if ($config['custom']['enabled']) {
                    echo getBoothButton($config['custom']['btn_text'], $config['icons']['take_custom'], "takeCustom");
                }
                if ($config['collage']['enabled']) {
                    echo getBoothButton("takeCollage", $config['icons']['take_collage'], "takeCollage");
                }
                if ($config['video']['enabled']) {
                    echo getBoothButton("takeVideo", $config['icons']['take_video'], "takeVideo");
                }
            }
            if($config['gallery']['enabled']) {
                echo getBoothButton("gallery", $config['icons']['gallery'], "gallery-button");
            }
            if($config['button']['show_fs']) {
                echo getBoothButton("toggleFullscreen", $config['icons']['fullscreen'], "fs-button");
            }
        ?>
    </div>

</div>










                    <?php if ($config['event']['enabled']): ?>
                    <div class="names">
                        <?php if ($config['ui']['decore_lines']): ?>
                        <hr class="small" />
                        <hr>
                        <?php endif; ?>
                        <div>
                            <h1>
                            <?=$config['event']['textLeft']?>
                            <i class="fa <?=$config['event']['symbol']?>" aria-hidden="true"></i>
                            <?=$config['event']['textRight']?>
                            <?php if ($config['start_screen']['title_visible']): ?>
                            <br>
                            <?=$config['start_screen']['title']?>
                            <?php endif; ?>
                            </h1>
                            <?php if ($config['start_screen']['subtitle_visible']): ?>
                            <h2><?=$config['start_screen']['subtitle']?></h2>
                            <?php endif; ?>
                        </div>
                        <?php if ($config['ui']['decore_lines']): ?>
                        <hr>
                        <hr class="small" />
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="names">
                        <?php if ($config['ui']['decore_lines']): ?>
                        <hr class="small" />
                        <hr>
                        <?php endif; ?>
                        <div>
                            <?php if ($config['start_screen']['title_visible']): ?>
                            <h1><?=$config['start_screen']['title']?></h1>
                            <?php endif; ?>
                            <?php if ($config['start_screen']['subtitle_visible']): ?>
                            <h2><?=$config['start_screen']['subtitle']?></h2>
                            <?php endif; ?>
                        </div>
                        <?php if ($config['ui']['decore_lines']): ?>
                        <hr>
                        <hr class="small" />
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>




                    <div class="rotarygroup">
                    <?php if($config['button']['show_cups']): ?>
                    <a id="cups-button" class="<?php echo $btnClass; ?> cups-button rotaryfocus" href="#" target="newwin"><i class="<?php echo $config['icons']['cups']; ?>"></i> <span>CUPS</span></a>
                    <?php endif; ?>

                        <div class="w-full flex items-center justify-center mb-8">
                            <?php 
                                if ($config['button']['force_buzzer']) {
                                    echo '<div id="useBuzzer">
                                            <span data-i18n="use_button"></span>
                                        </div>';
                                }
                                else {
                                    if ($config['picture']['enabled']) {
                                        echo getBoothButton("takePhoto", $config['icons']['take_picture'], "takePic");
                                    }
                                    if ($config['custom']['enabled']) {
                                        echo getBoothButton($config['custom']['btn_text'], $config['icons']['take_custom'], "takeCustom");
                                    }
                                    if ($config['collage']['enabled']) {
                                        echo getBoothButton("takeCollage", $config['icons']['take_collage'], "takeCollage");
                                    }
                                    if ($config['video']['enabled']) {
                                        echo getBoothButton("takeVideo", $config['icons']['take_video'], "takeVideo");
                                    }
                                }
                                if($config['gallery']['enabled']) {
                                    echo getBoothButton("gallery", $config['icons']['gallery'], "gallery-button");
                                }
                                if($config['button']['show_fs']) {
                                    echo getBoothButton("toggleFullscreen", $config['icons']['fullscreen'], "fs-button");
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($config['ui']['show_fork']): ?>
    <a href="https://github.com/<?=$config['ui']['github']?>/photobooth" class="github-fork-ribbon" data-ribbon="Fork me on GitHub">Fork me on GitHub</a>
    <?php endif; ?>
</div>


</div>