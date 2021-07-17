<div class="navigation">
    <ul>
        <li><a href="http://localhost/salon/"> Home</a></li>
        <li><a href="http://localhost/salon/salons"> All Salons</a></li>
        <?php
            if (isset($_SESSION['user_session'])) {
                echo '<li><a href="http://localhost/salon/user/user_dashboard.php">Dashboard</a></li>';
                echo '<li><a href="http://localhost/salon/user/profile.php"> Profile</a></li>';
                echo '<li><a href="http://localhost/salon/logout.php"> Log Out</a></li>';
                echo '<li>Welcome: '
                    .$_SESSION['user_session']['first_name']
                    .$_SESSION['user_session']['last_name'].
                    '</li>';
            }
            elseif (isset($_SESSION['admin_session'])) {
                echo '<li><a href="http://localhost/salon/admin/admin_dashboard.php"> Dashboard</a></li>';
                echo '<li><a href="http://localhost/salon/admin/profile.php"> Profile</a></li>';
                echo '<li><a href="http://localhost/salon/logout.php"> Log Out</a></li>';
                echo '<li>Welcome: '
                    .$_SESSION['admin_session']['first_name']
                    .$_SESSION['admin_session']['last_name'].
                    '</li>';
            }
            elseif (isset($_SESSION['super_admin_session'])) {
                echo '<li><a href="http://localhost/salon/super_admin/super_admin_dashboard.php"> Dashboard</a></li>';
                echo '<li><a href="http://localhost/salon/super_admin/profile.php"> Profile</a></li>';
                echo '<li><a href="http://localhost/salon/logout.php"> Log Out</a></li>';
                echo '<li>Welcome: '
                    .$_SESSION['super_admin_session']['first_name']
                    .$_SESSION['super_admin_session']['last_name'].
                    '</li>';
            }
            elseif (isset($_SESSION['stylist_session'])) {
                echo '<li><a href="http://localhost/salon/stylist/stylist_dashboard.php"> Dashboard</a></li>';
                echo '<li><a href="http://localhost/salon/stylist/profile.php"> Profile</a></li>';
                echo '<li><a href="http://localhost/salon/logout.php"> Log Out</a></li>';
                echo '<li>Welcome: '
                    .$_SESSION['stylist_session']['username'].'</li>';
            }
            else {
                echo '<li><a href="http://localhost/salon/login.php"> Log In</a></li>';
                echo '<li><a href="http://localhost/salon/signup.php"> Sign Up</a></li>';
            }
        ?>
    </ul>
</div>