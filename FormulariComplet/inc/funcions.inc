<?php

    function varName( $v ) {
        $trace = debug_backtrace();
        $vLine = file( __FILE__ );
        $fLine = $vLine[ $trace[0]['line'] - 1 ];
        preg_match( "#\\$(\w+)#", $fLine, $match );
        print_r( $match );
    }
    
    function doSelectFromArray($option)
    {
        
        $codiSelect = "<label for='" . $option . "'>" . $option . "</label>
        <select name='" . $option . "'>";
        
        foreach ($option as $key) {
            
            $codiSelect .= "<option value='" . $key . "'>" . $key . "</option>";
        }
        
        $codiSelect .= "</select>";
        
        echo ($codiSelect);
    }
    
        function doCheckboxFromArray($option){
            
            foreach ($option as $key ) {
                
                

            }

        }

?>