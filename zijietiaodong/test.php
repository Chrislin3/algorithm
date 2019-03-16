
<?php
header ( "content-type:text/html;charset=utf-8" );

$str = "aaaeeeeebbbbcd";
print_r(preg_match('/(.)\1{3}/',$str));