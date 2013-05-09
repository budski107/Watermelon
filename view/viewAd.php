<? ob_start() ?>
<?php
include("header.php");
require_once '../model/ad.php';
require_once '../db/adDAO.php';
session_start();
?>

<?php
    $userID = $_SESSION['userId'];//get it from session
    //echo $userID;
    $adDAOObj = new adDAO();
    
    $ads = $adDAOObj->getAdByUser($userID);
 ?>
<table>
 <?php
    foreach ($ads as $singleAd)
        {
 ?>
    <tr>
        <td class="searchclass">
            <?php     
                echo $singleAd['ad_title'].'<br/>';?>
        </td>
        <td class="searchclass"><img src="adimage/<?php
                echo $singleAd['ad_image'].'<br/>';
                ?>" />
        </td>
        <td class="searchclass"><?php
                echo $singleAd['ad_description'].'<br/>';
                ?>
        </td>
    </tr>
 <?php
}

    
 ?>
</table>
<?php include("footer.php")?>
<? ob_flush() ?>