<?php

namespace App\MiBiblioteca;
//composer dump-autoload
class MySoapServerClass {
     /**
     * @param string $name
     * @return string
     */
    function sayHello(string $name): string
    {
        return "Hello $name!";
    }

    /**
     * @param string $name
     * @return string
     */
    public function sayGoodBye(string $name): string
    {
        return "Goodbye $name!";
    }
}
