<?php

class UserHelper {

    // other functions

    public static function fullname($user) {
        return ucwords(strtolower($user->first_name .' '.$user->middle_name .' '. $user->last_name));
    }
}