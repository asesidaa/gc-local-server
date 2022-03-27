<?php

/**
 * cardn.cgi of Nesys_at_Home.
 * User: Al_Bundy@breakingcades.info
 * Date: 8/24/2017
 * Time: 10:14 AM
 */

require("../../config/config.inc");
require("../../global_funcs/sec_functions.inc");

// Read requests
const card = '259';
const card_details = '260';
const card_details_records = '261';
const card_bdata = '264';
const session_get = '401';
const session_start = '402';
const avatar = '418';
const item = '420';
const skin = '422';
const title = '424';
const music = '428';
const event_reward = '441';
const navigator = '443';
const music_extra = '465';
const music_aou = '467';
const coin = '468';
const unlock_reward = '507';
const unlock_keynum = '509';
const sound_effect = '8458';
const get_message = '8461';
const cond = '8465';
const total_trophy = '8468';

// Write requests
const card_writer = '771';
const card_details_writer = '772';
const card_bdata_writer = '776';
const avatar_writer = '929';
const item_writer = '931';
const title_writer = '935';
const music_detail_writer = '941';
const navigator_writer = '954';
const coin_writer = '980';
const skin_writer = '933';
const unlock_keynum_writer = '1020';
const se_writer = '8969';


$gid = isset($_POST['gid']) ? intval($_POST['gid']) : NULL;
$mac_addr = isset($_POST['mac_addr']) ? $_POST['mac_addr'] : NULL;
$type = isset($_POST['type']) ? intval($_POST['type']) : NULL;
$card_no = isset($_POST['card_no']) ? ($_POST['card_no']) : NULL;
$tenpo_id = isset($_POST['tenpo_id']) ? intval($_POST['tenpo_id']) : NULL;
$v = isset($_POST['v']) ? intval($_POST['v']) : NULL;
$trid = isset($_POST['trid']) ? ($_POST['trid']) : NULL;
$cmd_str = isset($_POST['cmd_str']) ? intval($_POST['cmd_str']) : NULL;
$xml_in = isset($_POST['data']) ? ($_POST['data']) : NULL;


error_log("Card request: gid: $gid, type: $type");

$printString = "";

if ((string)$gid == "303801") {
    {
        if ($card_no != NULL) {
            require_once("2110/song_unlock.php");
            require_once("2110/card.php");
            switch ((string)$type) {

                case session_start:
                case session_get:
                {
                    $printString = getSession($card_no, $mac_addr);
                    strOutput($printString->saveXML());
                }

                case music:
                {
                    $printString = getSongUnlock();
                    strOutput($printString->saveXML());
                }

                case music_extra:
                {
                    $printString = getMusicExtra();
                    strOutput($printString->saveXML());
                }
                case music_aou:
                {
                    $printString = getMusicAou();
                    strOutput($printString->saveXML());
                }
                case card_writer:
                case avatar_writer:
                case navigator_writer:
                case title_writer:
                case item_writer:
                case skin_writer:
                case coin_writer:
                case music_detail_writer:
                case unlock_keynum_writer:
                case se_writer:
                {
                    //card_writer($card_no,$xml_in);
                    error_log("Get write request... Type: $type");
                    error_log("Data: $xml_in");
                    strOutput($xml_in);
                }
                case card_details_writer:
                {
                    $printString = write_card_detail($card_no, $xml_in);
                    strOutput($printString);
                }
                case card_bdata_writer:
                {
                    $printString = write_card_bdata($card_no, $xml_in);
                    strOutput($printString);
                }
                case card:
                case cond:
                case get_message:
                case event_reward:
                {
                    $printString = card($card_no);
                    strOutput($printString->saveXML());
                }
                case card_details_records:
                {
                    $printString = get_card_detail_records($card_no);
                    strOutput($printString->saveXML());
                }
                case item:
                {
                    $printString = get_item_data($card_no);
                    strOutput($printString->saveXML());
                }
                case navigator:
                {
                    $printString = get_navigator_data($card_no);
                    strOutput($printString->saveXML());
                }
                case avatar:
                {
                    $printString = get_avatar_data($card_no);
                    strOutput($printString->saveXML());
                }
                case title:
                {
                    $printString = get_title_data($card_no);
                    strOutput($printString->saveXML());
                }
                case skin:
                {
                    $printString = get_skin_data($card_no);
                    strOutput($printString->saveXML());
                }
                case sound_effect:
                {
                    $printString = get_se_data($card_no);
                    strOutput($printString->saveXML());
                }
                case coin:
                {
                    $printString = get_coin_data($card_no);
                    strOutput($printString->saveXML());
                }
                case unlock_reward:
                {
                    $printString = get_unlock_reward_data($card_no);
                    strOutput($printString->saveXML());
                }
                case unlock_keynum:
                {
                    $printString = get_unlock_keynum_data($card_no);
                    strOutput($printString->saveXML());
                }
                case total_trophy:
                {
                    $printString = get_total_trophy($card_no);
                    strOutput($printString->saveXML());
                }
                case card_details:
                {
                    $printString = get_card_detail_record($card_no, $xml_in);
                    strOutput($printString->saveXML());
                }
                case card_bdata:
                {
                    $printString = get_card_bdata($card_no);
                    strOutput($printString->saveXML());
                }
                default:
                {
                    error_log("Unhandled request type! Type=$type");
                    error_log("Data: $xml_in");
                    exit();
                }
            }
        }
    }
}


function strOutput($strParam)
{
    $strParam = "1\n10,10\n".$strParam;
    header("Content-Type:application/octet-stream");
    header(sprintf("Content-Length: %d", strlen($strParam)));
    print($strParam);
    exit();
}