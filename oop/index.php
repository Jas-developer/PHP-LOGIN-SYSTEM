<!-- this is oop in php -->

<?php 

class Fruit {

    //properties that you can access/modify later on
    public $name;
    public $color;

    //method its like a controller of a class
    function set_name($name){
        $this->name = $name;
    }

    function get_name(){  // this is just simply getting an info from our class property 
        return $this->name;
    }
}

// this is a how to create an object from that class
$fruit = new Fruit();
$set_fruit_name = $fruit->set_name();
$set_fruit_name("orange")