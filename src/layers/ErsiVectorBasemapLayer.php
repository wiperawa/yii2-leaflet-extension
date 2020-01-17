<?php
namespace dosamigos\leaflet\layers;

use \yii\web\JsExpression;

/**
 * Esri vector Leaflet extension basemap Layer wrapper.
 * Used to easily get different tile layers from ArcGIS withour having to setup TileLayer's with urlTemplates.
 * possible VECTOR Basemaps are:
 *
 * OpenStreetMap
 * Newspaper
 * Topographic
 * Navigation
 * Streets
 * StreetsNight
 * StreetsRelief
 *
 * Class EsriVectorBasemapLayer
 * @package dosamigos\leaflet\layers
 */
class EsriVectorBasemapLayer extends Layer {
    public $basemap = 'Streets';

    public function encode(){
        $name = $this->getName();
        $map = $this->map;
        $js = "L.esri.Vector.basemap('{$this->basemap}')" . ($map !== null? ".addTo({$map});":"");
        if (!empty($name)) {
            $js = "var $name = $js" . ($map !== null ? "" : ";");
            $js .= $this->getEvents();
        }
        return new JsExpression($js);
    }
}