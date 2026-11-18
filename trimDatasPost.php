<?php
function trimDatasPost(array $post, $keepIndexes = false) {
    $emptyField = false;
    $a = [];
    foreach ($post as $k => $v):
        if(is_array($v)) { // in case of select multiple or checkboxes
            foreach($v as $v2):
                $trimedVal2 = trim($v2);
                if (empty($trimedVal2) && $trimedVal2 !== '0') { // because '0' is treated as empty value
                    $emptyField = true;
                    break 2;
                } else $a[$k][] = $trimedVal2;
            endforeach;
        }else {
            $trimedVal = trim($v);
            if (empty($trimedVal) && $trimedVal !== '0') { // because '0' is treated as empty value
                $emptyField = true;
                break;
            } else $a[$k] = $trimedVal;
        }
    endforeach;
    return $emptyField ? false : ($keepIndexes ? $a : array_values($a));
}
