<?php
require_once 'spamDAO.php';
$adId = $_GET['ad_id'];

spamDAO::markSpam($adId);
?>
