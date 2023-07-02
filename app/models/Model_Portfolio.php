<?php

namespace App\core;

class Model_Portfolio extends Model
{   
    public function get_data(){
        return array (
            array(
                'Pic' =>'<img src="\app\assets\images\star.jpg" width="150" height="130">',
                'Name' => 'Skittles',
                'Weight' => '1kg',
                'Description' => 'Попробуй слои радуги на вкус..!',
            ),
            array(
                'Pic' => '<img src="\app\assets\images\yerry.jpg" width="150" height="130">',
                'Name' => 'Wildberries',
                'Weight' => '3kg',
                'Description' => 'Самая вкусная доставка',
            ),
            array(
                'Pic' => '<img src="\app\assets\images\vamp.jpg" width="150" height="130">',
                'Name' => 'Vampire brownies',
                'Weight' => '1,5kg',
                'Description' => 'Твоя кровь на вкус сладкая как сахар',
            ),
            array(
                'Pic' =>'<img src="\app\assets\images\rose.jpg" width="150" height="130">',
                'Name' => 'Sorry',
                'Weight' => '5kg',
                'Description' => 'Шутки кончились',
            ),
        );
    }
}