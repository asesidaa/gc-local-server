<?php

/**
 * config.inc of Nesys_at_Home.
 * User: Al_Bundy@breakingcades.info
 * Date: 8/24/2017
 * Time: 10:14 AM
 */
// $ip= $_SERVER["REMOTE_ADDR"];
// Hardcoding localhost for local usage
$ip = "127.0.0.1";
$strParam = implode("\n", array(
    "REMOTE ADDRESS: $ip\n",
    "SERVER NAME:nesys.home\n",
    "SERVER ADDR:239.1.1.1\n",
));
header("Content-Type:text/html; Charset=EUC-JP");
header(sprintf("Content-Length: %d", strlen($strParam)));
print($strParam);