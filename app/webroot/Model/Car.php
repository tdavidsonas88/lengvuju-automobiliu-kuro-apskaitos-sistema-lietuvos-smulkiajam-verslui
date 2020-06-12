<?php

    class Car extends AppModel{

        //put your code here
        
        var $virtualFields = array(    
            'car_unique_name' => 'CONCAT(Car.car, " ", Car.car_number)'
        );
    }
?>
