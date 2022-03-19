<?php
/**
 * 2110/cardn.php of Nesys_at_Home.
 * User: Al_Bundy@breakingcades.info
 * Date: 9/9/2018
 * Time: 10:32 PM
 */

// defines
require("../../config/config.inc");


//require("../../global_funcs/sec_functions.inc");



$gid = isset($_GET['gid']) ? intval($_GET['gid']) : NULL;
$mac_addr = isset($_GET['mac_addr']) ? $_GET['mac_addr'] : NULL;
$type = isset($_GET['type']) ? intval($_GET['type']) : NULL;
$card_no = isset($_GET['card_no']) ? ($_GET['card_no']) : NULL;
$tenpo_id = isset($_GET['tenpo_id']) ? intval($_GET['tenpo_id']) : NULL;
$v = isset($_GET['v']) ? intval($_GET['v']) : NULL;
$trid = isset($_GET['trid']) ? ($_GET['trid']) : NULL;
$cmd_str = isset($_GET['cmd_str']) ? intval($_GET['cmd_str']) : NULL;
$xml_in = isset($_GET['data']) ? ($_GET['data']) : NULL;

//if ($mac_addr != NULL && checkmac($mac_addr)) exit;
//if ($trid != NULL && checkMD5($trid)) exit;

function fnc_card_writer($data,$mac,$card_id)
{
    $xml=simplexml_load_string($data) or die("Error: Cannot create object");
    print($xml->data->pcol2);
}