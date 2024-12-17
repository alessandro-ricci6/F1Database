<?php

function isSelected($driverId, $id)
{
    if ($driverId == $id) {
        return 'selected';
    } else {
        return '';
    }
}