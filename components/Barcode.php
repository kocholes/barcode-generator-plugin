<?php namespace Kocholes\BarcodeGenerator\Components;

use Kocholes\BarcodeGenerator\Classes\BarcodeManager;
use Cms\Classes\ComponentBase;

class Barcode extends ComponentBase
{
    public $format, $type, $data, $width, $height, $color;
    
    private $barcode_manager;
    
    /**
     * Returns details about this component.
     * 
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'kocholes.barcodegenerator::lang.barcode.name',
            'description' => 'kocholes.barcodegenerator::lang.barcode.description'
        ];
    }
    
    public function defineProperties()
    {
        return [
            "format" => [
                'title'             => 'kocholes.barcodegenerator::lang.barcode.format_title',
                'description'       => 'kocholes.barcodegenerator::lang.barcode.format_desc',
                'default'           => 'HTML',
                'type'              => 'dropdown',
                'options'           => ['HTML' => 'HTML','PNG' => 'PNG', 'SVG' => 'SVG']
            ],
            "type" => [
                'title'             => 'kocholes.barcodegenerator::lang.barcode.type_title',
                'description'       => 'kocholes.barcodegenerator::lang.barcode.type_desc',
                'default'           => 'C39',
                'type'              => 'dropdown'
            ],
            "data" => [
                'title'             => 'kocholes.barcodegenerator::lang.barcode.data_title',
                'description'       => 'kocholes.barcodegenerator::lang.barcode.data_desc',
                'type'              => 'string'
            ],
            "width" => [
                'title'             => 'kocholes.barcodegenerator::lang.barcode.width_title',
                'description'       => 'kocholes.barcodegenerator::lang.barcode.width_desc',
                'type'              => 'string',
                'default'           => '2',
            ],
            "height" => [
                'title'             => 'kocholes.barcodegenerator::lang.barcode.height_title',
                'description'       => 'kocholes.barcodegenerator::lang.barcode.height_desc',
                'type'              => 'string',
                'default'           => '30',
            ],
            "color" => [
                'title'             => 'kocholes.barcodegenerator::lang.barcode.color_title',
                'description'       => 'kocholes.barcodegenerator::lang.barcode.color_desc',
                'type'              => 'dropdown',
                'options'           => [
                    'black'     => 'kocholes.barcodegenerator::lang.barcode.color_black',
                    'red'       => 'kocholes.barcodegenerator::lang.barcode.color_red',
                    'green'     => 'kocholes.barcodegenerator::lang.barcode.color_green',
                    'blue'      => 'kocholes.barcodegenerator::lang.barcode.color_blue',
                    'yellow'    => 'kocholes.barcodegenerator::lang.barcode.color_yellow',
                    'gray'      => 'kocholes.barcodegenerator::lang.barcode.color_gray'
                ],
                'default'           => 'black',
            ],
        ];
    }
    
    public function getTypeOptions()
    {
        return array_merge(BarcodeManager::$TYPES_1D, BarcodeManager::$TYPES_2D);
    }
    
    public function onRun() {
        $this->barcode_manager = new BarcodeManager();
        $this->format = $this->property('format');
        $this->type = $this->property('type');
        $this->data = $this->property('data');
        $this->width = $this->property('width');
        $this->height = $this->property('height');
        $this->color = $this->property('color');
    }
    
    public function getBarcode() {
        return $this->barcode_manager->getBarcode($this->format, $this->data, $this->type, $this->width, $this->height, $this->color);
    }
    
}