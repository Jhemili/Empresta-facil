<?php
function format($mask,$string)
{   
    if(strlen($string) < 11){
        return '('.$string;
    } else {
        return  vsprintf($mask, str_split($string));
    }
    
} 

$celularMask = '(%s%s)%s%s%s%s%s-%s%s%s%s';
$fixoMask = '(%s%s)%s%s%s%s-%s%s%s%s';
$cepMask = '%s%s%s%s%s-%s%s%s';




?>