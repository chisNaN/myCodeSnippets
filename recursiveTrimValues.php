<?php
$a2=['foo' => 'bar', 'ez', 'level 1' => ['titi', 'toto', 'level 2' => ['pouet','proute'],' merdik'], 'zef', 'ezfzef', 'last' => ['john', 'doe']];

function trimDatasPost(array $post, $keys =[] ){
    static $recur, $a;
    $recur++;
    asort($post);
    foreach ($post as $k => $v): // $_POST = ['id' => 1, 'mult' => ['foo', 'bar]]
        if(!is_array($v)) {
            $trimValues = trim($v);
            if(empty($trimValues)) return false;
            if($recur > 1) {
                /*echo '<br>----keys<br>';
                var_dump($keys);
                echo '-----';
                $i = count($keys);
                */
                //echo '$a';
                $str = '$a';
                //echo '<br>'.str_repeat('["'.$keys[$recur -1].'"]', $recur -1);
                 $str .= str_repeat('[]', $recur -1);
                /*while($i--) {
                    //echo '["'.$keys[$recur -(2 + $i)].'"]';
                    //echo '[]';
                    $str .= '[]';
                } //$strToEval .= '["'.$keys[$recur -(2 + $i)].'"]';
                */
                //echo '[]="'.$v.'";<br>';
                $str .= '[]="'.$v.'";';
                //echo '<br>'.$str;
                //$strToEval2 .= '<br>'.str_repeat('["'.$keys[$recur -2].'"]', $recur -1);
                //@eval('$a["'.$keys[$recur -2].'"][]="'.$v.'";');
                eval($str);
            } else $a [$k] = $trimValues;

        } else {
            $keys []= $k;
            trimDatasPost($v, $keys);
        }
    endforeach;
    $recur--;
    return $a;
}
require_once '../../dump-5.6.php';
$d = new Dump;
echo $d->displayHTML(trimDatasPost($a2));
