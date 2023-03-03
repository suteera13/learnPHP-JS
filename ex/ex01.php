<?php
require_once "person.php";
    class revisedperson extends Person{
        public function show(){
            $this->display();
        }
    }
    $arryName[] = new Person("Suteera","Sunakorn");
    $arryName[] = new revisedperson("Lily","GG");
    $arryName[] = new revisedperson("johan","GG");
    $arryName[] = new revisedperson("josef","GG");
    $arryName[] = new revisedperson("etan","GG");
    $arryName[] = new revisedperson("evan","GG");
    // $arryName = arry($name,$lily,$johan,$josef,$etan){
        foreach($arryName as $name){
            echo $name->show();
        }
    // }
?>