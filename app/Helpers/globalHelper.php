<?php
function getRatingHtml($value)
{
    $html = '';
    $star_1 = '"fa fa-star"';
    $star_2 = '"fa fa-star"';
    $star_3 = '"fa fa-star"';
    $star_4 = '"fa fa-star"';
    $star_5 = '"fa fa-star"';
    if ($value >= '0.5') {
        $star_1 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '1') {
        $star_1 = '"fa fa-star text-warning"';
    }

    if ($value >= '1.5') {
        $star_2 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '2') {
        $star_2 = '"fa fa-star text-warning"';
    }

    if ($value >= '2.5') {
        $star_3 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '3') {
        $star_3 = '"fa fa-star text-warning"';
    }

    if ($value >= '3.5') {
        $star_4 = '"fa fa-star-half text-warning"';
    }

    if ($value >= '4') {
        $star_4 = '"fa fa-star text-warning"';
    }

    if ($value >= '4.5') {
        $star_5 = '"fa fa-star-half text-warning"';
    }

    if ($value > '4.5') {
        $star_5 = '"fa fa-star text-warning"';
    }
    $html .=       "<i class=$star_1></i>
                    <i class=$star_2></i>
                    <i class=$star_3></i>
                    <i class=$star_4></i>
                    <i class=$star_5></i>";
    return $html;
}
