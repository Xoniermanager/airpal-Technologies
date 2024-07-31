<?php
function getRatingHtml($value)
{
    $html = '';
    if ($value == '0.5') {
        $html .= '<i class="fa fa-star-half text-warning"></i>';
    } elseif ($value == '1') {
        $html .= '<i class="fa fa-star text-warning"></i>';
    } elseif ($value == '1.5') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star-half text-warning"></i>';
    } elseif ($value == '2') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>';
    } elseif ($value == '2.5') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star-half text-warning"></i>';
    } elseif ($value == '3') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>';
    } elseif ($value == '3.5') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star-half text-warning"></i>';
    } elseif ($value == '4') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>';
    } elseif ($value == '4.5') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star-half text-warning"></i>';
    } elseif ($value == '5') {
        $html .= '<i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>';
    }
    return $html;
}
