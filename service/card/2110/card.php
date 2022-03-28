<?php
/** @noinspection PhpUnhandledExceptionInspection */
/**
 * 2110/card.php of Nesys_at_Home.
 * User: Al_Bundy@breakingcades.info
 * Date: 12/12/2018
 * Time: 8:21 PM
 */

function card($card_id): DOMDocument
{
    $table = "card_main";
    $dsn_ranking = 'mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . RANKING_2110_CARD;
    $dbh = NULL;

    try {
        // Connect
        $dbh = new PDO($dsn_ranking, MYSQL_USERNAME, MYSQL_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // AutoCommit OFF
        $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    } catch (PDOException $e) {
        // Exception
        //quit(ERROR_009);
    }

    $hash_ref_rank_entry = NULL;
    $card_xml = new DOMDocument('1.0', 'UTF-8');
    $card_xml->formatOutput = true;
    $card_root = $card_xml->createElement("root");
    $card_xml->appendChild($card_root);
    $card_xml_main = $card_xml->createElement("card");
    $card_root->appendChild($card_xml_main);
    try {
        $columns = implode(',', array('card_id',
            'player_name',
            'score_i1',
            'fcol1',
            'fcol2',
            'fcol3',
            'achieve_status',
            'created',
            'updated',));
        $query = "SELECT $columns FROM $table WHERE card_id=:card_id";
        $sth = $dbh->prepare($query);
        $sth->bindParam(':card_id', $card_id, PDO::PARAM_INT);
        $sth->execute();
        $hash_ref_rank_entry = $sth->fetch(PDO::FETCH_ASSOC);
        $sth = NULL;
    } catch (PDOException $e) {
        // Exception
        quit(ERROR_010);
    }
    $card_xml_main->appendChild($card_xml->createElement('card_id', $hash_ref_rank_entry['card_id']));
    $card_xml_main->appendChild($card_xml->createElement('player_name', $hash_ref_rank_entry['player_name']));
    $card_xml_main->appendChild($card_xml->createElement('score_i1', $hash_ref_rank_entry['score_i1']));
    $card_xml_main->appendChild($card_xml->createElement('achieve_status', $hash_ref_rank_entry['achieve_status']));
    $card_xml_main->appendChild($card_xml->createElement('fcol1', $hash_ref_rank_entry['fcol1']));
    $card_xml_main->appendChild($card_xml->createElement('fcol2', $hash_ref_rank_entry['fcol2']));
    $card_xml_main->appendChild($card_xml->createElement('fcol3', $hash_ref_rank_entry['fcol3']));
    $card_xml_main->appendChild($card_xml->createElement('created', $hash_ref_rank_entry['created']));
    $card_xml_main->appendChild($card_xml->createElement('updated', $hash_ref_rank_entry['updated']));

    $card_root->appendChild($card_xml->createElement('event_reward'));

    $card_root->appendChild($card_xml->createElement('get_message'));

    $card_root->appendChild($card_xml->createElement('cond'));


    return $card_xml;
}

function get_unlock_reward_data($card_id): DOMDocument
{
    $unlock_reward_xml = new DOMDocument('1.0', 'UTF-8');
    $unlock_reward_xml->formatOutput = true;
    $unlock_reward_root = $unlock_reward_xml->createElement("root");
    $unlock_reward_xml->appendChild($unlock_reward_root);
    $unlock_reward_items = $unlock_reward_xml->createElement("unlock_reward");
    $unlock_reward_root->appendChild($unlock_reward_items);
    $count = 1;

    for ($i = 1; $i <= $count; $i++) {
        $unlock_reward_record = $unlock_reward_xml->createElement("record");
        $unlock_reward_record->setAttribute("id", $i);
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("card_id"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("reward_id", $i));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("reward_type", "1"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("open_date", "2021-05-30"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("close_date", "2030-05-30"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("open_time", "00:00:01"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("close_time", "23:59:59"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("target_id", "1"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("target_num", "1"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("key_num", "3"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("use_flag", "1"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("display_flag", "1"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("created", "2021-05-30 00:00:01"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("modified", "2021-05-30 00:00:01"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("limited_flag", "0"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("open_unixtime", "1622304001"));
        $unlock_reward_record->appendChild($unlock_reward_xml->createElement("close_unixtime", "1906387199"));
        $unlock_reward_items->appendChild($unlock_reward_record);
    }

    return $unlock_reward_xml;
}

function get_unlock_keynum_data($card_id): DOMDocument
{
    $unlock_keynum_xml = new DOMDocument('1.0', 'UTF-8');
    $unlock_keynum_xml->formatOutput = true;
    $unlock_keynum_root = $unlock_keynum_xml->createElement("root");
    $unlock_keynum_xml->appendChild($unlock_keynum_root);
    $unlock_keynum_items = $unlock_keynum_xml->createElement("unlock_keynum");
    $unlock_keynum_root->appendChild($unlock_keynum_items);
    $count = 1;

    for ($i = 1; $i <= $count; $i++) {
        $unlock_keynum_record = $unlock_keynum_xml->createElement("record");
        $unlock_keynum_record->setAttribute("id", $i);
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("card_id", $card_id));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("reward_id", $i));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("key_num", "0"));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("reward_count", "1"));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("expired_flag", "0"));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("cash_flag", "0"));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("use_flag", "1"));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("created", "2021-05-30 00:00:01"));
        $unlock_keynum_record->appendChild($unlock_keynum_xml->createElement("modified", "2021-05-30 00:00:01"));
        $unlock_keynum_items->appendChild($unlock_keynum_record);
    }

    return $unlock_keynum_xml;
}

function get_coin_data($card_id): DOMDocument
{

    $coin_xml = new DOMDocument('1.0', 'UTF-8');
    $coin_xml->formatOutput = true;
    $coin_root = $coin_xml->createElement("root");
    $coin_xml->appendChild($coin_root);

    $coin_data = $coin_xml->createElement('coin');
    $coin_data->appendChild($coin_xml->createElement("card_id", $card_id));
    $coin_data->appendChild($coin_xml->createElement("current", "999999"));
    $coin_data->appendChild($coin_xml->createElement("total", "999999"));
    $coin_data->appendChild($coin_xml->createElement("monthly", "999999"));
    $coin_data->appendChild($coin_xml->createElement("created", "1"));
    $coin_data->appendChild($coin_xml->createElement("modified", "0"));
    $coin_root->appendChild($coin_data);

    return $coin_xml;
}

function get_item_data($card_id): DOMDocument
{
    $item_xml = new DOMDocument('1.0', 'UTF-8');
    $item_xml->formatOutput = true;
    $item_root = $item_xml->createElement("root");
    $item_xml->appendChild($item_root);
    $item_items = $item_xml->createElement("item");
    $item_root->appendChild($item_items);
    $count = ITEM_COUNT;

    for ($i = 1; $i <= $count; $i++) {
        $item_record = $item_xml->createElement("record");
        $item_record->setAttribute("id", $i);
        $item_record->appendChild($item_xml->createElement("card_id", $card_id));
        $item_record->appendChild($item_xml->createElement("item_id", $i));
        // Max at 99, so if all 99 and don't use safe, the unlocking page will refuse to unlock for safes.
        //Change to 90 to make unlocking page work
        $item_record->appendChild($item_xml->createElement("item_num", "90"));
        $item_record->appendChild($item_xml->createElement("created", "1"));
        $item_record->appendChild($item_xml->createElement("modified", "1"));
        $item_record->appendChild($item_xml->createElement("new_flag", "1"));
        $item_record->appendChild($item_xml->createElement("use_flag", "1"));
        $item_items->appendChild($item_record);
    }

    return $item_xml;
}

function get_navigator_data($card_id): DOMDocument
{
    $navigator_xml = new DOMDocument('1.0', 'UTF-8');
    $navigator_xml->formatOutput = true;
    $navigator_root = $navigator_xml->createElement("root");
    $navigator_xml->appendChild($navigator_root);
    $navigator_records = $navigator_xml->createElement("navigator");
    $navigator_root->appendChild($navigator_records);

    $count = NAVIGATOR_COUNT;

    for ($i = 1; $i <= $count; $i++) {
        $navigator_record = $navigator_xml->createElement("record");
        $navigator_record->setAttribute("id", $i);
        $navigator_record->appendChild($navigator_xml->createElement("card_id", $card_id));
        $navigator_record->appendChild($navigator_xml->createElement("navigator_id", $i));
        $navigator_record->appendChild($navigator_xml->createElement("created", "1"));
        $navigator_record->appendChild($navigator_xml->createElement("modified", "1"));
        $navigator_record->appendChild($navigator_xml->createElement("new_flag", "1"));
        $navigator_record->appendChild($navigator_xml->createElement("use_flag", "1"));
        $navigator_records->appendChild($navigator_record);
    }

    return $navigator_xml;
}

function get_title_data($card_id): DOMDocument
{
    $title_xml = new DOMDocument('1.0', 'UTF-8');
    $title_xml->formatOutput = true;
    $title_root = $title_xml->createElement("root");
    $title_xml->appendChild($title_root);
    $title_records = $title_xml->createElement("title");
    $title_root->appendChild($title_records);

    $count = TITLE_COUNT;

    for ($i = 1; $i <= $count; $i++) {
        $title_record = $title_xml->createElement("record");
        $title_record->setAttribute("id", $i);
        $title_record->appendChild($title_xml->createElement("card_id", $card_id));
        $title_record->appendChild($title_xml->createElement("title_id", $i));
        $title_record->appendChild($title_xml->createElement("created", "1"));
        $title_record->appendChild($title_xml->createElement("modified", "1"));
        $title_record->appendChild($title_xml->createElement("new_flag", "1"));
        $title_record->appendChild($title_xml->createElement("use_flag", "1"));
        $title_records->appendChild($title_record);
    }

    return $title_xml;
}


function get_avatar_data($card_id): DOMDocument
{
    $avatar_xml = new DOMDocument('1.0', 'UTF-8');
    $avatar_xml->formatOutput = true;
    $avatar_root = $avatar_xml->createElement("root");
    $avatar_xml->appendChild($avatar_root);
    $avatar_records = $avatar_xml->createElement("avatar");
    $avatar_root->appendChild($avatar_records);

    $count = AVATAR_COUNT;

    for ($i = 1; $i <= $count; $i++) {
        $avatar_record = $avatar_xml->createElement("record");
        $avatar_record->setAttribute("id", $i);
        $avatar_record->appendChild($avatar_xml->createElement("card_id", $card_id));
        $avatar_record->appendChild($avatar_xml->createElement("avatar_id", $i));
        $avatar_record->appendChild($avatar_xml->createElement("created", "1"));
        $avatar_record->appendChild($avatar_xml->createElement("modified", "1"));
        $avatar_record->appendChild($avatar_xml->createElement("new_flag", "1"));
        $avatar_record->appendChild($avatar_xml->createElement("use_flag", "1"));
        $avatar_records->appendChild($avatar_record);
    }

    return $avatar_xml;
}

function get_skin_data($card_id): DOMDocument
{
    $skin_xml = new DOMDocument('1.0', 'UTF-8');
    $skin_xml->formatOutput = true;
    $skin_root = $skin_xml->createElement("root");
    $skin_xml->appendChild($skin_root);
    $skin_records = $skin_xml->createElement("skin");
    $skin_root->appendChild($skin_records);

    $count = SKIN_COUNT;

    for ($i = 1; $i <= $count; $i++) {
        $skin_record = $skin_xml->createElement("record");
        $skin_record->setAttribute("id", $i);
        $skin_record->appendChild($skin_xml->createElement("card_id", $card_id));
        $skin_record->appendChild($skin_xml->createElement("skin_id", $i));
        $skin_record->appendChild($skin_xml->createElement("created", "1"));
        $skin_record->appendChild($skin_xml->createElement("modified", "1"));
        $skin_record->appendChild($skin_xml->createElement("new_flag", "1"));
        $skin_record->appendChild($skin_xml->createElement("use_flag", "1"));
        $skin_records->appendChild($skin_record);
    }

    return $skin_xml;
}

function get_se_data($card_id): DOMDocument
{
    $se_xml = new DOMDocument('1.0', 'UTF-8');
    $se_xml->formatOutput = true;
    $se_root = $se_xml->createElement("root");
    $se_xml->appendChild($se_root);
    $se_records = $se_xml->createElement("sound_effect");
    $se_root->appendChild($se_records);

    $count = SE_COUNT;

    for ($i = 1; $i <= $count; $i++) {
        $se_record = $se_xml->createElement("record");
        $se_record->setAttribute("id", $i);
        $se_record->appendChild($se_xml->createElement("card_id", $card_id));
        $se_record->appendChild($se_xml->createElement("sound_effect_id", $i));
        $se_record->appendChild($se_xml->createElement("created", "1"));
        $se_record->appendChild($se_xml->createElement("modified", "1"));
        $se_record->appendChild($se_xml->createElement("new_flag", "1"));
        $se_record->appendChild($se_xml->createElement("use_flag", "1"));
        $se_records->appendChild($se_record);
    }

    return $se_xml;
}

function getSession($card_id, $mac_addr): DOMDocument
{
    $session_xml = new DOMDocument('1.0', 'UTF-8');
    $session_xml->formatOutput = true;
    $session_root = $session_xml->createElement("root");
    $session_xml->appendChild($session_root);
    $session_session = $session_xml->createElement("session");
    $session_card_id = $session_xml->createElement("card_id", $card_id);
    $session_mac_addr = $session_xml->createElement("mac_addr", $mac_addr);
    $session_session_id = $session_xml->createElement("session_id", "12345678901234567890123456789012");
    $session_expires = $session_xml->createElement("expires", "9999");
    $session_player_id = $session_xml->createElement("player_id", "123456");
    $session_session->appendChild($session_card_id);
    $session_session->appendChild($session_mac_addr);
    $session_session->appendChild($session_session_id);
    $session_session->appendChild($session_expires);
    $session_session->appendChild($session_player_id);

    $session_root->appendChild($session_session);
    return $session_xml;
}

function get_total_trophy($card_id): DOMDocument
{
    $trophy_xml = new DOMDocument('1.0', 'UTF-8');
    $trophy_xml->formatOutput = true;
    $trophy_root = $trophy_xml->createElement("root");
    $trophy_xml->appendChild($trophy_root);
    $trophy_data = $trophy_xml->createElement("total_trophy");
    $trophy_data->appendChild($trophy_xml->createElement("card_id", $card_id));
    $trophy_data->appendChild($trophy_xml->createElement("total_trophy_num", "9"));
    $trophy_root->appendChild($trophy_data);

    return $trophy_xml;
}

function get_card_detail_records($card_id): DOMDocument
{
    $table = "card_detail";
    $card_table = 'mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . RANKING_2110_CARD;
    $dbh = NULL;

    try {
        // Connect
        $dbh = new PDO($card_table, MYSQL_USERNAME, MYSQL_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // AutoCommit OFF
        $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    } catch (PDOException $e) {
        // Exception
        //quit(ERROR_009);
    }

    $card_details = NULL;
    $card_detail_xml = new DOMDocument('1.0', 'UTF-8');
    $card_detail_xml->formatOutput = true;
    $card_detail_root = $card_detail_xml->createElement("root");
    $card_detail_xml->appendChild($card_detail_root);
    $card_detail_xml_main = $card_detail_xml->createElement("card_detail");
    $card_detail_root->appendChild($card_detail_xml_main);
    try {
        $query_str = "SELECT * FROM $table WHERE card_id=$card_id";
        $query = $dbh->prepare($query_str);
        $query->execute();
        $card_details = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = NULL;
    } catch (PDOException $e) {
        // Exception
        quit(ERROR_010);
    }

    $i = 1;
    foreach ($card_details as $card_detail) {
        $card_detail_record = $card_detail_xml->createElement("record");
        $card_detail_record->setAttribute("id", $i);
        $card_detail_xml_main->appendChild($card_detail_record);

        $card_detail_record->appendChild($card_detail_xml->createElement("card_id", $card_detail["card_id"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("pcol1", $card_detail["pcol1"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("pcol2", $card_detail["pcol2"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("pcol3", $card_detail["pcol3"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_i1", $card_detail["score_i1"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_ui1", $card_detail["score_ui1"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_ui2", $card_detail["score_ui2"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_ui3", $card_detail["score_ui3"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_ui4", $card_detail["score_ui4"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_ui5", $card_detail["score_ui5"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_ui6", $card_detail["score_ui6"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("score_bi1", $card_detail["score_bi1"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("last_play_tenpo_id", $card_detail["last_play_tenpo_id"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("fcol1", $card_detail["fcol1"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("fcol2", $card_detail["fcol2"]));
        $card_detail_record->appendChild($card_detail_xml->createElement("fcol3", $card_detail["fcol3"]));

        $i++;
    }


    return $card_detail_xml;
}

function get_card_detail_record($card_id, $data): DOMDocument
{
    $xml = new SimpleXMLElement($data);
    $pcol1 = $xml->data->pcol1;
    $pcol2 = $xml->data->pcol2;
    $pcol3 = $xml->data->pcol3;

    $table = "card_detail";
    $card_table = 'mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . RANKING_2110_CARD;
    $dbh = NULL;

    try {
        // Connect
        $dbh = new PDO($card_table, MYSQL_USERNAME, MYSQL_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // AutoCommit OFF
        $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    } catch (PDOException $e) {
        // Exception
        //quit(ERROR_009);
    }

    $card_detail = NULL;
    $card_detail_xml = new DOMDocument('1.0', 'UTF-8');
    $card_detail_xml->formatOutput = true;
    $card_detail_root = $card_detail_xml->createElement("root");
    $card_detail_xml->appendChild($card_detail_root);
    $card_detail_xml_main = $card_detail_xml->createElement("card_detail");
    $card_detail_root->appendChild($card_detail_xml_main);
    try {
        $query_str = "SELECT * FROM $table WHERE card_id=$card_id and pcol1=$pcol1 and pcol2=$pcol2 and pcol3=$pcol3";
        error_log($query_str);
        $query = $dbh->prepare($query_str);
        $query->execute();
        $card_detail = $query->fetch(PDO::FETCH_ASSOC);
        $query = NULL;
    } catch (PDOException $e) {
        // Exception
        quit(ERROR_010);
    }

    $card_detail_xml_main->appendChild($card_detail_xml->createElement("card_id", $card_detail["card_id"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("pcol1", $card_detail["pcol1"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("pcol2", $card_detail["pcol2"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("pcol3", $card_detail["pcol3"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_i1", $card_detail["score_i1"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_ui1", $card_detail["score_ui1"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_ui2", $card_detail["score_ui2"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_ui3", $card_detail["score_ui3"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_ui4", $card_detail["score_ui4"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_ui5", $card_detail["score_ui5"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_ui6", $card_detail["score_ui6"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("score_bi1", $card_detail["score_bi1"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("last_play_tenpo_id", $card_detail["last_play_tenpo_id"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("fcol1", $card_detail["fcol1"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("fcol2", $card_detail["fcol2"]));
    $card_detail_xml_main->appendChild($card_detail_xml->createElement("fcol3", $card_detail["fcol3"]));


    return $card_detail_xml;
}

function get_card_bdata($card_id): DOMDocument
{
    $table = "card_bdata";
    $dsn_ranking = 'mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . RANKING_2110_CARD;
    $dbh = NULL;

    try {
        // Connect
        $dbh = new PDO($dsn_ranking, MYSQL_USERNAME, MYSQL_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // AutoCommit OFF
        $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    } catch (PDOException $e) {
        // Exception
        //quit(ERROR_009);
    }

    $hash_ref_rank_entry = NULL;
    $card_xml = new DOMDocument('1.0', 'UTF-8');
    $card_xml->formatOutput = true;
    $card_root = $card_xml->createElement("root");
    $card_xml->appendChild($card_root);
    $card_xml_main = $card_xml->createElement("card_bdata");
    $card_root->appendChild($card_xml_main);
    try {
        $query = "SELECT * FROM $table WHERE card_id=$card_id";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $hash_ref_rank_entry = $sth->fetch(PDO::FETCH_ASSOC);
        $sth = NULL;
    } catch (PDOException $e) {
        // Exception
        quit(ERROR_010);
    }
    if (!empty($hash_ref_rank_entry)) {
        $card_xml_main->appendChild($card_xml->createElement('card_id', $hash_ref_rank_entry['card_id']));
        $card_xml_main->appendChild($card_xml->createElement('bdata', $hash_ref_rank_entry['bdata']));
        $card_xml_main->appendChild($card_xml->createElement('bdata_size', $hash_ref_rank_entry['bdata_size']));
    }


    return $card_xml;
}

function init_connection(): mysqli
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = null;
    try {
        $connection = new mysqli(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, RANKING_2110_CARD);
    } catch (mysqli_sql_exception $e) {
        error_log("Connection to DB fail! Error: " . $e->getMessage());
    }

    if ($connection == null) {
        error_log("Error connecting database, error: " . $connection->connect_error);
        exit();
    }
    return $connection;
}

function write_card_bdata($card_id, $data)
{
    $xml = new SimpleXMLElement($data);
    $bdata = $xml->data->bdata;
    $bdata_size = $xml->data->bdata_size;

    $table = "card_bdata";
    // Connect
    $connection = init_connection();

    try {
        $query = "REPLACE INTO $table VALUES ($card_id, '$bdata', $bdata_size)";
        $connection->query($query);
        $connection->close();
    } catch (mysqli_sql_exception $e) {
        // Exception
        error_log("Error updating record: " . $e->getMessage());
    }
    return $data;
}

function write_card_detail($card_id, $data)
{
    $xml = new SimpleXMLElement($data);
    $pcol1 = $xml->data->pcol1;
    $pcol2 = $xml->data->pcol2;
    $pcol3 = $xml->data->pcol3;
    $score_i1 = $xml->data->score_i1;
    $score_ui1 = $xml->data->score_ui1;
    $score_ui2 = $xml->data->score_ui2;
    $score_ui3 = $xml->data->score_ui3;
    $score_ui4 = $xml->data->score_ui4;
    $score_ui5 = $xml->data->score_ui5;
    $score_ui6 = $xml->data->score_ui6;
    $score_bi1 = $xml->data->score_bi1;
    $fcol1 = $xml->data->fcol1;
    $fcol2 = $xml->data->fcol2;
    $fcol3 = $xml->data->fcol3;

    $table = "card_detail";
    // Connect
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = init_connection();

    try {
        $query = "REPLACE INTO $table VALUES ($card_id, $pcol1, $pcol2, $pcol3, $score_i1, $score_ui1, $score_ui2,  $score_ui3, $score_ui4, $score_ui5, $score_ui6, $score_bi1, '1337', $fcol1, $fcol2, $fcol3)";
        $connection->query($query);
        $connection->close();
    } catch (mysqli_sql_exception $e) {
        // Exception
        error_log("Error updating record: " . $e->getMessage());
    }
    return $data;
}