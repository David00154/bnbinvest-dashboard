<?php
// $dbhost = "172.18.0.1";
// $dbuser = "root";
// $dbpass = "00154abs"; // Gb-%%6hR[ku5
// $dbname = "bnbinvest";
$dbhost = "bqecyrmeuc4bp70j9ppd-mysql.services.clever-cloud.com";
$dbuser = "uivg0nk6ufnlkzxw";
$dbpass = "tht5rXf4KXqimV8kHJT5";
$dbname = "bqecyrmeuc4bp70j9ppd";

$royaldb = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($royaldb->connect_error) {
    die("Unable to connect to Database");
}
