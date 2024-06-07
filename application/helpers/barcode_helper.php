<?php

use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorSVG;

function generate_barcode($code, $type = 'html', $widthFactor = 2, $height = 30)
{
    $generator = null;

    switch ($type) {
        case 'html':
            $generator = new BarcodeGeneratorHTML();
            break;
        case 'png':
            $generator = new BarcodeGeneratorPNG();
            break;
        case 'svg':
            $generator = new BarcodeGeneratorSVG();
            break;
        default:
            $generator = new BarcodeGeneratorHTML();
    }

    return $generator->getBarcode($code, $generator::TYPE_CODE_128, $widthFactor, $height);
}
