<?php 
    
    require_once "../assets/php/model/AbstractModel.php";
    namespace model;

    use AbstractModel;

    class WeatherModel extends AbstractModel {

        public function getVariables()
        {
            return array(
                'townName',
                'townTemp',
                'townMinTemp',
                'townMaxTemp',
                'townHumidity',
                'townWind',
                'townStatus'
            );

        }

    }


?> 