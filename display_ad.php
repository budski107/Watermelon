<?php include("header.php")?>
<?php include_once ("dbClass.php")?>
<?php include ("javascript.php")?>

<div id="main">
    <div id="faq">
        <?php
        include("conn.php");
        $ad_id = $_GET['ad_id'];
        $_SESSION['adid'] = $ad_id;
      
        $sql = ("SELECT adv.ad_id, adv.ad_title, adv.ad_category_id, 
                cat.ad_category, adv.ad_image, adv.ad_description, 
                adv.ad_price, adv.ad_city, adv.ad_addr, 
                adv.ad_province_id , adv.ad_zip, prov.province
                    FROM tbl_advertisement adv, tbl_provinces prov, tbl_ad_category cat
                    where prov.id = adv.ad_province_id 
                    and adv.ad_category_id = cat.ad_category_id
                    and adv.ad_id=:ad_id");
        //$sql = ("SELECT * FROM tbl_advertisement WHERE ad_id=:ad_id");                
        $query = $db->prepare($sql);
        $query -> execute(array(':ad_id'=>$ad_id));
        $res = $query ->fetch();    
        
        
        
        echo"
            ";?>
        <form method="POST" action="display_ad.php?ad_id=<?php echo $ad_id?>">
            <input type="hidden" name="hidden_ad_id" value="<?php echo $ad_id; ?>"/>
            <input type="submit" value="Add to Wishlist" name="add" />
                
        </form>
                <?php 
                    if(isset($_POST['add']))
                    {
                        $ad_id = $_POST['hidden_ad_id'];
                        $flag = dbClass::add_to_wishlist($ad_id);
                        if($flag == TRUE)
                        {
                            $_SESSION['adid']=$ad_id;
                            echo 'Item added to wishlist.';
                            dbClass::getwishlist();
                        }
                    }
                
                
                ?>
        <?php echo "
            <form action='sendemail.php' method='post' name='sendemail'>
            <table style='margin:0 auto;'>
            <tr>
                <td><input type='hidden' name='ad_id' value='" . $res['ad_id'] . "'/></td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><em>". $res['ad_title'] ."</em></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Rating :</td>
                <td>";?>            
            <?php echo dbClass::drawItemRating($res['ad_id']);?>
            <?php 
            echo "</td>
            </tr>

            <tr>
            <td>";?>
        
                
                
                
                <?php echo "</td><td>";?>
            <a href="markSpam.php?ad_id=<?php echo $_SESSION['adid'];?>">Mark as Spam</a>
            
            <?php echo "</td></tr>

            <tr>
                <td>Image : </td>
                <td>";?>
            <img src="adimage/<?php echo $res['ad_image'];?>" width="300" height="200" />               
                
            <?php echo "</td>
            </tr>
            <tr>
                <td>AD Description :&nbsp;&nbsp;&nbsp; </td><td>". $res['ad_description'] ."</td>
            </tr>
            <tr>
                <td><p>Price : </td><td>". $res['ad_price'] ."</p></td>
            </tr>
            <tr>
                <td><p>Location :</td><td> ". $res['ad_city'] .", ". $res['province'] ."</p></td>
            </tr>
            <tr>
                <td>Send Email : </td>
                <td><textarea name='emailtext' cols='50' rows='5' required='true'></textarea></td>
            </tr>
            <tr>
                <td>Rating : </td>
                <td>";?>            
            <?php echo dbClass::drawRatingSelection($res['ad_id']) ?>
            <?php 
            echo "
            </td>
            
            </tr>
            <tr>
                <td><input type='submit' name='submit' text='Send Email' /></td>
            </tr>
        </table>
    </form>"

?>   
           
    </div>
    
</div>
<?php include("footer.php")?>
