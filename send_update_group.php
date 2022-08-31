<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $name = $_POST["group_name_input"];
    $course_link = $_POST["course_link_input"];
    $group_id = $_POST["group_select"];
    $group_query = mysqli_query($link, "UPDATE groups SET `name` = '$name' WHERE id = $group_id");
    
    header('Location: change_group.php');
    print_r($_POST);
?>