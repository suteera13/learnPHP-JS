<?php session_start(); ?>
<hr>
<a href="s_6506021410020_report_grade.php">show_all_score</a>
<pre>
<?php
    print_r($GLOBALS);
    $_SESSION['score'][] = $_POST['score'];
?>
</pre>
<!-- <hr>
<a href="show_all_score.php">show_all_score</a> -->