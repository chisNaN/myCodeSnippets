<?php
$a2=['foo' => 'bar', 'ez', 'level 1' => ['titi', 'toto', 'level 2' => ['pouet','proute'],' merdik'], 'zef', 'ezfzef'];

function trimDatasPost(array $post, $a = [], $keys =[] ){
    static $recur, $strToEval, $strToEval2;
    $recur++;
    asort($post);
    foreach ($post as $k => $v): // $_POST = ['id' => 1, 'mult' => ['foo', 'bar]]
        if(is_array($v)) {
            $keys []= $k;
             return trimDatasPost($v, $a, $keys);
        } else {
            $trimValues = trim($v);
            if(empty($trimValues)) return false;
            if($recur === 1) {
                $a [$k] = $trimValues;
            } else{
                $i = count($keys);
                while($i--) {
                    echo '["'.$keys[$recur -(2 + $i)].'"]';
                } //$strToEval .= '["'.$keys[$recur -(2 + $i)].'"]';
                echo '[]="'.$v.'";';
                echo '<br>';
                $strToEval2 .= '<br>'.str_repeat('["'.$keys[$recur -2].'"]', $recur -1);
                @eval('$a["'.$keys[$recur -2].'"][]="'.$v.'";');
            }
        }
    endforeach;
    return $a;
}
var_dump(trimDatasPost($a2));
