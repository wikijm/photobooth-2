<div id="newQrModal" class="w-full h-full fixed top-0 left-0 hidden place-items-center p-4 [&.isOpen]:grid" style="z-index:9999">
    <div class="w-full h-full absolute top-0 left-0 z-10 bg-black/60 cursor-pointer" onclick="closeQrCodeModal();"></div>
    <div class="max-w-lg bg-white px-6 py-8 relative z-20 flex rounded text-lg">

    
        <?php 
            if($config['qr']['wifi_enabled']) {
                echo '<div class="mr-8 flex flex-col items-center justify-center">
                    <h2 class="flex flex-col text-brand-1 font-bold text-2xl">Schritt 1:</h2>
                    <div class="flex flex-col max-w-[250px] text-center mb-4">Verbinde dich zuerst mit dem WLAN der Fotobox.</div>
                    <div class="flex flex-col mt-auto">
                        <div class="w-52 h-52 border-4 border-solid border-brand-1 rounded-t">
                            <div id="wifiQrCode"></div>
                        </div>
                        <h2 class="w-full bg-brand-1 rounded-b text-white text-center pb-1">Wifi</h2>
                    </div>
                </div>';
            }
        ?>

        <div class="flex flex-col items-center justify-center">
            <?php if($config['qr']['wifi_enabled']) { echo '<h2 class="flex flex-col text-brand-1 font-bold text-2xl">Schritt 2:</h2>';} ?>
            <div class="flex flex-col max-w-[250px] text-center mb-4">Scanne den QR-Code um das Foto herunterzuladen.</div>
            <div class="flex flex-col mt-auto">
                <div class="w-52 h-52 border-4 border-solid border-brand-1 rounded-t">
                    <div id="imageQrCode"></div>
                </div>
                <h2 class="w-full bg-brand-1 rounded-b text-white text-center pb-1">Dein Foto</h2>
            </div>
        </div>

    </div>
</div>