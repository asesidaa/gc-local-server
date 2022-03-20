<?php

/**
 * certify.php of Nesys_at_Home.
 * User: Al_Bundy@breakingcades.info
 * Date: 8/24/2017
 * Time: 10:14 AM
 */


error_reporting(E_ALL);

require("../config/config.inc");

const ERROR_001 = 1; // database read error, could not get owner_if and/or ranking_addr
const ERROR_002 = 2; // hashing wrong
const ERROR_003 = 3; //
const ERROR_004 = 4; //
const ERROR_005 = 5; //
const ERROR_006 = 6; //
const ERROR_007 = 7; // Invalid mac address
const ERROR_008 = 8; // Invalid Hash
const ERROR_009 = 9; //
const ERROR_010 = 10; //
const ERROR_011 = 11; //
const ERROR_012 = 12; //
const ERROR_013 = 13; //
const ERROR_014 = 14; //
const ERROR_015 = 15; //
const ERROR_016 = 16; //
const ERROR_017 = 17; //
const ERROR_020 = 20; //
const ERROR_021 = 21; //
const ERROR_022 = 22; //

function ismacvalid($mac): bool
{
    return (preg_match('/([a-fA-F0-9]{2}){6}/', $mac) == 1);
}

function ismd5valid($hash): bool
{
    return (preg_match('/[a-fA-F0-9]{31}/', $hash) == 1);
}

$ip = $_SERVER["REMOTE_ADDR"];
$gid = isset($_GET["gid"]) ? intval($_GET["gid"]) : quit(ERROR_003);
$mac = isset($_GET["mac"]) ? ($_GET["mac"]) : quit(ERROR_004);
$r = isset($_GET["r"]) ? intval($_GET["r"]) : quit(ERROR_005); // random number from service
$md = $_GET["md"] ?? quit(ERROR_006); // hash of mac, random number and a key

if (!ismacvalid($mac)) quit(ERROR_007);
if (!ismd5valid($md)) quit(ERROR_008);

$host = "card_id=7020392000147361"; // ? Copied from OpenParrot
$id = "1337";
$t_name = "123";
$t_pref = "nesys";
$t_city = "@home";
$n_time = 15;
$n_url = "http://localhost/static/news.png";
$strRankServer = "http://localhost/ranking/2110/ranking.php";
$ticket = md5($gid);

$ans = implode("\n", array(//sprintf("remote=%s", $host),
    sprintf("host=%s", $host),
    sprintf("no=%d", $id),
    sprintf("name=%s", $t_name),
    sprintf("pref=%s", $t_pref),
    sprintf("addr=%s", $t_pref . $t_city),
    sprintf("x-next-time=%d", $n_time),
    sprintf("x-img=%s", $n_url),
    sprintf("x-ranking=%s", $strRankServer),
    sprintf("ticket=%s", $ticket),));
certifyOutput($ans);

exit;

function certifyOutput($strParam)
{
    header("Content-Type:text/plain; Charset=Shift_JIS");
    header(sprintf("Content-Length: %d", strlen($strParam)));
    print($strParam);
}

function certifyErrorOutput($strParam)
{
    header("Content-Type:text/plain; Charset=Shift_JIS");
    header(sprintf("Content-Length: %d", strlen($strParam)));
    print($strParam);
    exit();
}

function quit($error): bool
{
    certifyErrorOutput(sprintf("error=%d\n", $error));
    return true;
}
