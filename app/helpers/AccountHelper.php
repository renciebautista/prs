<?php

class AccountHelper {

    // other functions

    public static function address($account) {
    	$comma = ' ';
    	if((!empty($account->lot)) || (!empty($account->street)) || (!empty($account->brgy))){
    		$comma = ', ';
    	}
    	return ucwords(strtolower($account->lot .' '.$account->street .' '. $account->brgy.$comma.$account->city.' - '.$account->province));
    }
}