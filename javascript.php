<script language="javascript">
var ratingImageDir = '<?php echo RATING_IMAGES_DIR; ?>';

function highlightRatingStar(item, value) { 
	for(var y=1; y <= value; y++) {
		document.getElementById('image_' + item + '_' + y).src = ratingImageDir + "/star3.gif";
	}
}

function normalRatingStar(item, value) {
	for(var y=1; y <= value; y++)	{
		document.getElementById('image_' + item + '_' + y).src = ratingImageDir + "/star1.gif";
	}
}

function setItemRating(item, value) {
	document.getElementById('itemId').value = item;
	document.getElementById('rating').value = value;
	document.forms['itemRatingForm'].submit();
}
function add_to_wishlist(ad_id)
{
    document.getElementById('ad_id').value = ad_id;
    //alert ("You are in javascript"+ad_id);
    document.forms['add_wishlist'].submit();
}
</script>
<div style="display: none; width: 0px; height: 0px;">
<img src="<?php echo RATING_IMAGES_DIR; ?>/star3.gif">
<img src="<?php echo RATING_IMAGES_DIR; ?>/star2.gif">
</div>

<form name="itemRatingForm" method="post" action="set-item-rating.php" target="setRatingIFrame">
	<input name="rating" id="rating" type="hidden">
	<input name="itemId" id="itemId" type="hidden">
</form>
<form name="add_wishlist" method="POST" action="javascript.php">
    <input name="ad_id" id="ad_id" type="hidden">
</form>
<iframe style="display: none; width: 0px; height: 0px;" id="setRatingIFrame" name="setRatingIFrame"></iframe>

    
<?php
require_once 'dbClass.php';
if(isset($_POST['ad_id']))
{
    $ad_id = $_POST['ad_id'];
    dbClass::add_to_wishlist($ad_id);
    //header('Location : index.php');
}
?>