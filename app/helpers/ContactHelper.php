<?php

class ContactHelper {

    // other functions

    public static function fullname($contact) {
        return ucwords(strtolower($contact->first_name .' '.$contact->middle_name .' '. $contact->last_name));
    }
}