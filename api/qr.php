<?php
// require_once '../lib/config.php';
// require_once '../lib/helper.php';
include '../vendor/phpqrcode/lib/full/qrlib.php';

class QrCodeClass {
    public function __construct() {
    }

    public function getWifiQrCode($config) {
        // hidden
        if ($config['qr']['wifi_ssid_hidden'] == true) {
            $hidden = (string) ',H:true';
        } else {
            $hidden = (string) '';
        }

        // secure
        if ($config['qr']['wifi_secure'] == 'WPA' || $config['qr']['wifi_secure'] == 'WPA2') {
            $sec = (string) 'T:WPA;';
        } elseif ($config['qr']['wifi_secure'] == 'WEP') {
            $sec = (string) 'T:WEP;';
        } else {
            $sec = (string) '';
        }

        // $ecLevel = "false";
        $ecLevel = $this->getEcLevel($config['qr']['ecLevel']);

        $wifi = 'WIFI:S:' . $config['qr']['wifi_ssid'] . ';' . $sec . 'P:' . $config['qr']['wifi_pass'] . $hidden . ';';
        $svg = QRcode::svg($wifi, false, $ecLevel, 8);
        echo $svg;
    }

    public function getImageQrCode($config, $filename) {
        if ($config['qr']['append_filename']) {
            $url = $config['qr']['url'] . $filename;
        } else {
            $url = $config['qr']['url'];
        }

        // $ecLevel = "false";
        $ecLevel = $this->getEcLevel($config['qr']['ecLevel']);

        $svg = QRcode::svg($url, false, $ecLevel, 8);
        echo $svg;
    }

    private function getEcLevel($configEcLevel) {
        switch ($configEcLevel) {
            case 'QR_ECLEVEL_L':
                $ecLevel = 'QR_ECLEVEL_L';
                break;
            case 'QR_ECLEVEL_M':
                $ecLevel = 'QR_ECLEVEL_M';
                break;
            case 'QR_ECLEVEL_Q':
                $ecLevel = 'QR_ECLEVEL_Q';
                break;
            case 'QR_ECLEVEL_H':
                $ecLevel = 'QR_ECLEVEL_H';
                break;
            default:
                $ecLevel = 'QR_ECLEVEL_M';
                break;
        }

        return $ecLevel;
    }
}

?>
