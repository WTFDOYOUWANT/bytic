<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "byticinfo");
    $name = $_POST["course_name_input"];
    $course_link = $_POST["course_link_input"];
    $group = $_POST["group"];
    $group_query = mysqli_query($link, "INSERT INTO courses (`name`, `link`, `group_id`) VALUES ('$name', '$course_link', $group)");
    
    header('Location: add_course.php');
    print_r($_POST);
?>