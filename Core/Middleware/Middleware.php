<?php

namespace Core\Middleware;

// use Core\Guest;
// use Core\Auth;

class Middleware{

     public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key){

        if(!$key){
            return;

        }

        $middleware = static::MAP[$key] ?? false;

        if(!$middleware){

            throw new \Exception("no matching middleware found for key '{$key}'.");

        }

        (new $middleware)->handle();

    }
}