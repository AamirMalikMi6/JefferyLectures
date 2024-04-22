<?php

namespace Core;

class Container{

    protected $bindings = [];

    public function bind($key, $funct){

        $this->bindings[$key] = $funct;


    }

    public function resolve($key){

        if(!array_key_exists($key, $this->bindings)){

            throw new \Exception('No such key');
        }

            $resolver = $this->bindings[$key];

            return call_user_func($resolver);

    }

}