<?php
$a2=['foo' => 'bar', 'ez', 'level 1' => ['titi', 'toto', 'level 2' => ['pouet','proute'],' merdik'], 'zef', 'ezfzef', 'last' => ['john', 'doe']];

function trimDatasPost(array $post, $a = [], $keys =[] ){
    static $recur, $a, $strToEval, $strToEval2;
    $recur++;
    asort($post);
    foreach ($post as $k => $v): // $_POST = ['id' => 1, 'mult' => ['foo', 'bar]]
        if(is_array($v)) {
            $keys []= $k;
              trimDatasPost($v, $a, $keys);
        } else {
            $trimValues = trim($v);
            if(empty($trimValues)) return false;
            if($recur === 1) {
                $a [$k] = $trimValues;
            } else{

                $i = count($keys);
                //echo '$a';
                $str = '$a';
                while($i--) {
                    //echo '["'.$keys[$recur -(2 + $i)].'"]';
                    //echo '[]';
                    $str .= '[]';
                } //$strToEval .= '["'.$keys[$recur -(2 + $i)].'"]';
                 //echo '[]="'.$v.'";';
                $str .= '[]="'.$v.'";';
                //echo '<br>'.$str;
                //$strToEval2 .= '<br>'.str_repeat('["'.$keys[$recur -2].'"]', $recur -1);
                //@eval('$a["'.$keys[$recur -2].'"][]="'.$v.'";');
                eval($str);
            }
        }
    endforeach;
    $recur--;
    return $a;
}
require_once '../../dump-5.6.php';
$d = new Dump;
echo $d->displayHTML(trimDatasPost($a2));
