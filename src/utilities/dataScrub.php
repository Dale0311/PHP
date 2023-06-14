<?php 
    function dataScrub($var){
        $toReturn = htmlspecialchars(stripslashes(trim($var)));
        return $toReturn;
    }

?>