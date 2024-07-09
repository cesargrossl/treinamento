<?php
    session_start();
    session_destroy();
    echo "<script type='text/javascript'>
            window.location.href = 'p_login.php';
          </script>";
    exit;
?>