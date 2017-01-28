<?php
        include ("conn.inc.php");

        $un = mysqli_real_escape_string($con, $_POST['username']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);
        $pass2 = md5($pass);

        $query = mysqli_query($con, "SELECT * FROM users WHERE usercode = '".$un."' AND password = '".$pass2."'");
        $numrows = mysqli_num_rows($query);

        if ($un == "" or $pass == "") {
            echo "0";

        } else {
            if ($numrows !=0) {
                if (mysqli_num_rows($query) == 1) {
                    $get = mysqli_fetch_assoc($query);
                    $type = $get['type'];
                    $dbun = $get['usercode'];
                    $dbpass = $get['password'];
                }

                if ($un == $dbun && $pass2 == $dbpass) {

                    if($type == "Admin") {
                        session_start();
                        $_SESSION['user_log'] = $un;

                        echo "a";

                    } else if ($type == "User") {
                        session_start();
                        $_SESSION['user_log'] = $un;

                        echo "s";

                    }
                }

        } else {
            echo "1";
            }
        }
?>