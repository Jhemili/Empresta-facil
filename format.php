<?php
function format($mask,$string)
{
    return  vsprintf($mask, str_split($string));
} 

$celularMask = '(%s%s)%s%s%s%s%s-%s%s%s%s%s';
$fixoMask = '(%s%s)%s%s%s%s-%s%s%s%s%s';




?>