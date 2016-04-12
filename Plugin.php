<?php namespace Kocholes\BarcodeGenerator;

use Kocholes\BarcodeGenerator\Classes\BarcodeManager;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Kocholes\BarcodeGenerator\Components\Barcode' => 'barcode'
        ];
    }
    
    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'barcodeHTML' => function($data,$type,$width = 2,$height = 30,$color = 'black') {
                    $manager = new BarcodeManager();
                    return $manager->getBarcode('HTML',$data,strtoupper($type),$width,$height,$color);
                },
                'barcodeSVG' => function($data,$type,$width = 2,$height = 30,$color = 'black') {
                    $manager = new BarcodeManager();
                    return $manager->getBarcode('SVG',$data,strtoupper($type),$width,$height,$color);
                },
                'barcodePNG' => function($data,$type,$width = 2,$height = 30,$color = 'black') {
                    $manager = new BarcodeManager();
                    return $manager->getBarcode('PNG',$data,strtoupper($type),$width,$height,$color);
                },
            ]
        ];
    }

}
