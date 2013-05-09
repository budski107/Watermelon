<?php
$itemID = $_POST['itemId'];
$rating = $_POST['rating'];
require_once('dbClass.php');

$status = dbClass::saveRating($itemID, $rating);

if ($status === false) {
	exit;
}
?>
<html>
<head>
<script type="text/javascript">
function bodyLoaded() {
    
	if (!parent.document.getElementById('itemRating_<?php echo $itemID; ?>')) {
		return;
	}
	parent.document.getElementById('itemRating_<?php echo $itemID; ?>').innerHTML = document.getElementById('bodyContainer').innerHTML;
	document.getElementById('bodyContainer').innerHTML = '';
}
</script>

</head>
<body onLoad="return bodyLoaded();" id="bodyContainer">
<?php
dbClass::drawItemRating($itemID, false);
?>
</body>
</html>