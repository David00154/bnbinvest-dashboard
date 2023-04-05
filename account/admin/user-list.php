<?php

include "../../core/config.php";
if (!isLogged()) {
    header("location: ../../login.php");
    exit;
}
$mErr = "";


if (isset($_GET['del'])) {
    $where = $_GET['del'];
    $del = $royaldb->query("DELETE FROM user WHERE id='$where'") or die($royaldb->error);
    $mErr = '<div class="alert-box alert-danger">
                            <div class="alert-txt"><em class="ti ti-alert"></em>User Deleted Successfully!</div>
                        </div>';
}

$userSet = "";
if ($Users->num_rows > 0) {
    while ($load = $Users->fetch_object()) {
        $id = $load->id;
        $full_name = $load->full_name;
        $username = $load->username;
        $password = $load->password;
        $email = $load->email;
        // $balance = $load->balance;
        // $deposit = $load->deposit;
        // $earnings = $load->earnings;
        $btc = $load->btc;
        $bnb = $load->bnb;
        $blur = $load->blur;
        $pi = $load->pi;
        $ada = $load->ada;
        $eth = $load->eth;
        $usdt = $load->usdt;
        $xrp = $load->xrp;
        $op = $load->op;

        $userSet .= "
       <tr>
            <th scope=\"row\">$id</th>
            <td>$full_name</td>
            <td>$username</td>
            <td>$password</td>
            <td>$email</td>
            <td>$btc</td>
            <td>$bnb</td>
            <td>$blur</td>
            <td>$pi</td>
            <td>$ada</td>
            <td>$eth</td>
            <td>$usdt</td>
            <td>$xrp</td>
            <td>$op</td>
            <td><a class='btn btn-xs btn-primary' href='?del=$id'>Delete</a></td>
        </tr>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>BnbInvest Fx Trade</title>
    <link rel="stylesheet" href="assets/css/ac.vendor.bundle.css">
    <link rel="stylesheet" href="assets/css/ac.style.css">
    <!-- Start of  Zendesk Widget script -->

    <!-- End of  Zendesk Widget script -->
</head>

<body class="user-dashboard" style="width: 100%;">
    <?php

    include "header.php";
    ?>
    <!-- TopBar End -->


    <div class="user-wraper">
        <div class="container">
            <div class="d-flex">
                <?php
                include "sidebar.php";
                ?>
                <script>
                    function checkform() {
                        if (document.editform.wallet.value == '') {
                            alert("Input your wallet!");
                            document.editform.wallet.focus();
                            return false;
                        }
                        // console.log(document.editform.wallet_type.value)
                        // return false;
                    }
                </script>
                <div class="user-content">
                    <div class="user-panel">

                        <h2 class="user-panel-title">Users</h2>
                        <hr class="linie">

                        <?= $mErr ?>
                        <div class="gaps-3x"></div>
                        <div class="srcbox" style="overflow-x: auto; border: none; width: 100%;">
                            <div class="row">
                                <!-- <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;"> -->

                                    <table cellpadding="0" class="table">
                                        <thead class="">
                                            <tr>
                                                <th>#</th>
                                                <th>Full name</th>
                                                <th>User name</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>Btc</th>
                                                <th>Bnb</th>
                                                <th>Blur</th>
                                                <th>Pi</th>
                                                <th>Ada</th>
                                                <th>Eth</th>
                                                <th>Usdt</th>
                                                <th>Xrp</th>
                                                <th>Op</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr> -->
                                            <?= $userSet ?>
                                            <!-- </tr> -->
                                        </tbody>

                                    </table>
                                </div>


                            </div>
                        <!-- </div> -->

                        <div class="gaps-2x"></div>


                    </div>
                </div><!-- .user-content -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- UserWraper End -->

    <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="footer-copyright">Copyright &copy; 2020. All Rights Reserved</span>
                </div><!-- .col -->
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="">Terms & Conditions</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div>
    <!-- FooterBar End -->
    <script src="assets/js/ac.jquery.bundle.js"></script>
    <script src="assets/js/ac.script.js"></script>
</body>

</html>