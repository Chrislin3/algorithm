<?php
$totle = trim(fgets(STDIN));
$status_array = explode(' ',trim(fgets(STDIN)));
if($status_array[$totle - 1] == 1){
    echo "Alice";
}
else{
    echo "Bob";
}
?>