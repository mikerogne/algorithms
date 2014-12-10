<?php

trait Greetable
{
    public function sayHello()
    {
        echo "Hello, from the trait!";
    }
}

class BaseGreeter
{
    public function sayHello()
    {
        echo "Hello, there!";
    }
}

class CustomGreeter extends BaseGreeter {
    use Greetable;
}

$greeter = new CustomGreeter;
$greeter->sayHello(); // "Hello, from the trait!"
