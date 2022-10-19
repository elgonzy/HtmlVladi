<?php

    function getVariavleName($var) {
        foreach($GLOBALS as $varName => $value) {
            if ($value === $var) {
                return $varName;
            }
        }
        return;
    }
    
    function doSelectFromArray($option)
    {
        
        $codiSelect = "<label for='" . getVariavleName($option) . "'>" . getVariavleName($option) . "</label>
        <select name='" . getVariavleName($option) . "'>";
        
        foreach ($option as $key) {
            
            $codiSelect .= "<option value='" . $key . "'>" . $key . "</option>";
        }
        
        $codiSelect .= "</select>";
        
        echo ($codiSelect);
    }
    
        function doCheckboxFromArray($option){
            
            foreach ($option as $key ) {
                
                echo "<label for='" . $key . "'>" . $key . 
                "</label><input type='checkbox' name='" . $key . "' id='" . $key . "'>";
                
            }

        }
