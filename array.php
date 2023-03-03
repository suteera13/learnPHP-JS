<?php
    include "style.css";
    $majors = [
        ["IT"=>"Information technology","years"=>4]
        ,["ITI"=>"Information technology (2y)","years"=>2]
        ,["INE"=>"Information Network Engineering","years"=>4]
    ];
?>
<?php
    foreach(["IT","ITI","INE"] as $idx => $value){
        get_info($idx,$value);
    }
    function get_info($i,$key){
        global $majors;
        echo "<fieldset><legend>".$key."</legend>";
        echo "<lable>Major Program : </lable>";
        echo $majors[$i][$key]."<br>";
        echo "<lable>Time : </lable>";
        echo $majors[$i]["years"];
        echo "</fieldset>";
    }
?>