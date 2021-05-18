<?php 
    function convertInput ($input) {
        $input = trim ($input);
        $input = Stripslashes ($input);
        $input = Htmlspecialchars ($input); 
        return $input;
    }

    /**
     * Check if a string contains at least one word.
     *
     * @param string $input_string
     * @return boolean
     *  true if there is at least one word, false otherwise.
     */   
    function contains_at_least_one_word($input_string) {
        foreach (explode(' ', $input_string) as $word) {
          if (!empty($word)) {
            return true;
          }
        }
        return false;
      }
?>