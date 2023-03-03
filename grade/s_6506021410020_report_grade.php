<?php session_start(); ?>
<a href="s_6506021410020_add_score.html">บันทึกคะแนน</a>
<br>
<?php 
    $stu_score = $_SESSION['score']; 
?>
<table border="1">
    <tr>
        <th width="100">ลำดับ</th><th width="100">คะแนน</th><th width="100">เกรด</th>
    </tr>
    <?php
        $grade = "";
        foreach($stu_score as $idx=> $score){
            if($score<50) $grade = "F";
            elseif ($score<60) $grade = "D";
            elseif ($score<70) $grade = "C";
            elseif ($score<80) $grade = "B";
            elseif ($score<100) $grade = "A";
            else $grade = "Failed";
            echo "<tr><th>".($idx+1)."</th>"."<th> $score </th>"."<th> $grade </th>"."</tr>";
        }
    ?>
</table>