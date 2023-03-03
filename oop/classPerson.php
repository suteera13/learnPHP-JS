<?php
    class Person{
        private $name;
        function __construct($name="Gor"){
            $this->name = $name;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
        public function print(){
            echo "Name : {$this->name}<br>";
        }
    }
?>