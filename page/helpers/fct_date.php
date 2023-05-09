<?php

function date_us2fr($date){
    list($year,$month,$day) = explode('-',$date);
    return $day.'/'.$month.'/'.$year;
}