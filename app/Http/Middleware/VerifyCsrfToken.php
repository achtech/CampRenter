<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //Requred for PayPal
        "/rentOut/calcule_main",
        "/rentOut/calcule_off",
        "/rentOut/calcule_winter",
        "receivepost",
        "savedataPost",
    ];
}
