<?php
function trimDatasPost(array $post, $keepIndexes = false) {
    $emptyField = false;
    $i = 0;
    $a = [];
    foreach ($post as $k => $v):
        if(is_array($v)) { // in case of select multiple or checkboxes
            $j = 0;
            foreach($v as $k2 => $v2):
                $trimedVal2 = trim($v2);
                if (empty($trimedVal2) && $trimedVal2 !== '0') { // because '0' is treated as empty value
                    $emptyField = true;
                    break 2;
                } else{
                    //echo '<br> $a['.($keepIndexes ? $k : $i).']['.($keepIndexes ? $k2 : $j).'] = '.$trimedVal2;
                    $a[$keepIndexes ? $k : $i][$keepIndexes ? $k2 : $j++] = $trimedVal2;
                }
            endforeach;
            $j = 0;
            $i++; // otherwise next value which is NOT an array will replace this one
        }else {

            $trimedVal = trim($v);
            if (empty($trimedVal) && $trimedVal !== '0') { // because '0' is treated as empty value
                $emptyField = true;
                break;
            } else{
                //echo '<br>$a['.($keepIndexes ? $k : $i).'] = '.$trimedVal;
                $a[$keepIndexes ? $k : $i++] = $trimedVal;
            }
        }
    endforeach;

    return $emptyField ? false : $a;
}
