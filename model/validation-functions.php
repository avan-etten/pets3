<?php
/**
 * Created by PhpStorm.
 * User: A-VE
 * Date: 1/25/2019
 * Time: 10:39 AM
 */

function validColor($color){
    global $f3;
    return in_array($color, $f3->get('colors'));

}

function validString($string){

    return ((!empty($string)) && ctype_alpha($string));
}