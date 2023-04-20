<?php 

    require_once "../assets/php/model/AbstractModel.php";
    namespace model;

use AbstractModel;

    class GeographyModel extends AbstractModel{

        public function getVariables()
        {
            return array(
                'townName',
                'townHabitantsNumber',
                'townHigh'
            );

        }

    }

?> 