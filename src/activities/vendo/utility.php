<?php 
function setValue($var){
    if(isset($var)){
        return $var;
    }else{
        return null;
    }
}