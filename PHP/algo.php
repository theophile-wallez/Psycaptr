<?php 
    function convertInput ($input) {
        $input = trim ($input);
        $input = Stripslashes ($input);
        $input = Htmlspecialchars ($input); 
        return $input;
    }
?>