<?php
    class Person{
        private $FirstName;
        private $SurName;
        public function __construct($FirstName,$SurName){
            $this->setDisplayFirstSur($FirstName,$SurName);
        }
        public function setFirstName($strFirstName){
            $this->FirstName = $strFirstName;
        }
        public function setSurName($strSurName){
            $this->SurName = $strSurName;
        }
        public function getName(){
            return $this->FirstName;
        }
        public function getSurName(){
            return $this->SurName;
        }
        protected function display(){
            echo "<pre>FirstName : ".$this->FirstName;
            echo ", SurName : ".$this->SurName."</pre>";
        }
        public function setDisplayFirstSur($strFirstName="A", $strSurName="T"){
            $this->setFirstName($strFirstName);
            $this->setSurName($strSurName);
            $this->display();
        }
    }
    // $p1 = new Person();
    // $p1->setDisplayFirstSur("Suteera","Sunakorn");
?>