<?php
function format($string)
{   
    $celular = 11;
    $fixo = 10;
    $cep = 8;

    switch (strlen($string)) {
        case $celular:
            return  vsprintf('(%s%s)%s%s%s%s%s-%s%s%s%s', str_split($string));
            break;
        case $fixo:
            return  vsprintf('(%s%s)%s%s%s%s-%s%s%s%s', str_split($string));
            break;
        case $cep:
            return  vsprintf('%s%s%s%s%s-%s%s%s', str_split($string));
            break;
        default:
            return $string;
    }

    
    
} 
?>