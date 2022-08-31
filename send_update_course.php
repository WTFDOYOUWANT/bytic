<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $name = $_POST["course_name_input"];
    $course_link = $_POST["course_link_input"];
    $course_id = $_POST["courses_select"];
    $group_query = mysqli_query($link, "UPDATE courses SET `name` = '$name', `link` = '$course_link' WHERE id = $course_id");
    
    header('Location: change_course.php');
    print_r($_POST);
?>