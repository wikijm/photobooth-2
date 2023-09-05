
<div class="stages" id="loader">
    <div class="loaderInner">
        <div class="spinner">
            <i class="<?php echo $config['icons']['spinner']; ?>"></i>
        </div>

        <div id="ipcam--view" class="<?php echo $config['preview']['style']; ?>"></div>

        <div id="counter">
            <canvas id="video--sensor"></canvas>
        </div>
        <div class="cheese"></div>
        <div class="loaderImage"></div>
        <div class="loading rotarygroup">
            <a class="<?= $btnClass ?> rotaryfocus ml-2 hidden" href="#" id="btnCollageNext"><span data-i18n="nextPhoto"></span></a>
            <a class="<?= $btnClass ?> rotaryfocus ml-2 hidden" href="#" id="btnCollageProcess""><span data-i18n="processPhoto"></span></a>
            <a class="<?= $btnClass ?> rotaryfocus ml-2 hidden" href="#" id="btnCollageRetake"><span data-i18n="retakePhoto"></span></a>
            <a class="<?= $btnClass ?> rotaryfocus ml-2 hidden" href="#" id="btnCollageAbort""><span data-i18n="abort"></span></a>
        </div>
    </div>
</div>
