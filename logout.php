<?php
    session_start();
    if (isset($_SESSION['user_session'])) {
        session_destroy();
        header('location:index.php?success=logged_out');
    }
    elseif (isset($_SESSION['stylist_session'])) {
        session_destroy();
        header('location:index.php?success=logged_out');
    }
    elseif (isset($_SESSION['admin_session'])) {
        session_destroy();
        header('location:index.php?success=logged_out');
    }
    elseif (isset($_SESSION['super_admin_session'])) {
        session_destroy();
        header('location:index.php?success=logged_out');
    }
    else {
        header('location:index.php?success=not_logged_in');
    }
