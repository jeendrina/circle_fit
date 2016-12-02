<?php

    session_destroy();
    //echo "All session variables are now removed, and the session is distroyed."; 
    //redirect to home
    header('Location: index.php');


