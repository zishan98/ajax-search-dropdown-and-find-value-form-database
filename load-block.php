<?php

include_once('../config.php');

$search_term = $_POST['city'];
$sql = "SELECT `block` FROM `application` WHERE `block` LIKE '%{$search_term}%'";
$result = mysqli_query($con, $sql) or die("Query Unsuccessful.");

    $output = '<ul>';
    if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $output .= "<li>{$row['block']}</li>";
    }
}
    else {
        $output .="<li>record not found</li>";
    }
$output .= "</ul>";

echo $output;
    
