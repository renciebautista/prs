<?php

class CityHelper {

    // other functions

    public static function cityProvince($object) {
        return $object->city.' - '.$object->province;
    }
}