<?php
require_once 'dbClass.php';
require_once 'database.php';
include 'header.php';
?>
<html>
    <body>
<div>
<?php
if ( isset($_SERVER["REMOTE_ADDR"]) )    {
    		$ip = $_SERVER["REMOTE_ADDR"];
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
    		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    {
    		$ip = $_SERVER["HTTP_CLIENT_IP"];
		}

 //   session_start();
//$ip = $_SESSION['wl_ip'];
$sql = "SELECT tbl_advertisement.ad_id, tbl_advertisement.ad_title, tbl_advertisement.ad_image, tbl_advertisement.ad_price, tbl_ad_category.ad_category
FROM tbl_ad_category
INNER JOIN tbl_advertisement ON tbl_ad_category.ad_category_id = tbl_advertisement.ad_category_id
INNER JOIN wishlist ON tbl_advertisement.ad_id = wishlist.ad_id
WHERE wishlist.wl_ip ='$ip'";
$dbObj = new database();
$con = $dbObj->getConnection();
$result = $con->query($sql);
$result = $result -> fetchAll();?>
<table width="80%" style="text-align: center;">
        <tr><th>Product</th>
            <th>Category</th>
            <th>Image</th>
            <th>Price</th>
            <th>Delete</th></tr>
        <?php
foreach ($result as $row)
{
?>
    
    
        <tr><td><a href="display_ad.php?ad_id=<?php echo $row['ad_id']; ?>"><?php echo $row['ad_title']; ?></a>
                </td>
                <td><?php echo $row['ad_category']; ?></td>
                <td><img src='<?php echo $row['ad_image']; ?>' height="40"/></td>
                <td><?php echo $row['ad_price']; ?></td>
                <td><form method="POST" action="wishlist.php">
                        <input type="hidden" name="hidden_ad_id" value="<?php echo $row['ad_id'] ?>"/>
                        <input type="submit" name="delete" value="Delete"/>
                </form>
                </td>
    </tr>    
    
    <?php }?>
    </table>
    <?php
    if(isset($_POST['delete']))
    {
        $ad_id = $_POST['hidden_ad_id'];
        $dbObj = new database();
        $con = $dbObj->getConnection();
        $sql = "DELETE FROM wishlist WHERE ad_id=".$ad_id." and wl_ip='".$ip."'";
        $flag = $con->exec($sql);
        if($flag > 0)
        {
            header('Location:wishlist.php');
        }
    }
    
    ?>
    
    
    
    
    
    
</div>
        </body>
</html>

<?php include 'footer.php'; ?>
