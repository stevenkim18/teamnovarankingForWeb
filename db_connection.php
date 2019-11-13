<?php
    @session_start();
    header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

    $db = new mysqli("13.124.64.187","teamnovaranking","teamnovaranking1234","RankData");
    $db->set_charset("utf8");

    function mq($sql)
    {
        global $db;
        return $db->query($sql);
    }
?>