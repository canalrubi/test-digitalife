<?php

namespace App\Helpers;

use Session;
use Redirect;


class MessagesHelper {

    const LOCATION  = "/products";

    public static function getMessage($status, $message){
        Session::flash($status, $message);
        return Redirect::to(self::LOCATION);
     }

}

