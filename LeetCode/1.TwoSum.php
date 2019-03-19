<?php
function twoSum($nums, $target) {

    for($i = 0;$i<count($nums);$i++){
        $retain = $target - $nums[$i];
        if(in_array($retain,$nums)){
            if($i == array_search($retain,$nums)){
                continue;
            }
            else{
                return [$i,array_search($retain,$nums)];
            }

        }
        else{
            continue;
        }
    }
}

$nums =[3,2,4];

$target = 6;
print_r(twoSum($nums, $target));
?>