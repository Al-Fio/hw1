<?php
    session_start();

    function authenticated() {
        if(isset($_SESSION['email'])) {
            return $_SESSION['ID'];
        } else {
            return false;
        }
    }
?>