<?php 
    include("header.php");
    require_once 'model/ip2locationlite.class.php';
    require_once 'db/paidAdDAO.php';
?>
<?php include'searchfeature.php'; ?>
<div id="main">
    <div id="lbar">
     <div id="tagcloud">
<div class="tags_container">
 <ul class="tags">

<?php 
                include("conn.php");
					//Using PDO for select statement 
                $query = $db -> prepare("SELECT DISTINCT search_tags FROM tbl_advertisement");
                $query -> execute();
                $row = $query ->fetchAll();
				 	
					foreach($row as $res)
					{
						$row = $res['search_tags'];
						list($search_tags1, $search_tags2, $search_tags3, $search_tags4) = explode(",", $row);
						echo "$search_tags1 $search_tags2 $search_tags3 $search_tags4";
					}
					
					
    				?>
 </ul>
</div>
</div>
    </div>
    <div id="rbar">
        <div id="thirdPartyAd">
          <?php  //$ip=0;
          if ( isset($_SERVER["REMOTE_ADDR"]) )    {
    		$ip = $_SERVER["REMOTE_ADDR"];
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
    		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    
                {
    		$ip = $_SERVER["HTTP_CLIENT_IP"];
		} 
                //echo "<br/>IP : ".$ip;        
                echo "<br/><span style={font-weight:bold;}>Featured Ads:</span><br/>";
                
                //Load the class
                $ipLite = new ip2location_lite;
                $ipLite->setKey('c7d63440603c7b0abc15354b0e1b901115bc760507f4a9c697f68dc8fb57711e');

                //Get errors and locations
                $locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
                $errors = $ipLite->getError();


                $paidAdDAOObj = new paidAdDAO();

                //Getting the result
                //echo "<p>\n";
                //echo "<strong>First result</strong><br />\n";
                if (!empty($locations) && is_array($locations)) {
                    $provi = "";
                foreach ($locations as $field => $val) {
                    $provi = $val;
                   // echo $field . ' : ' . $val . "<br />\n";
                    /**/
                    }
                    $ads = $paidAdDAOObj->getAdByIP($val);
                    ?>
                   
                    <table>
                        <tr><td class='search_result'>Title</td><td class='search_result'>Description</td></tr>
                    <?php
                    foreach ($ads as $singleAd){
                        //$adId = $singleAd['ad_id'];
                        //echo '<br/>'.$adId.'<br/>';
                        ?>
                                
                                            <tr>
                                                
                                                <td class='search_result'>
                                                    <a href="display_ad.php?ad_id=<?php echo $singleAd['ad_id'];?>" >
                                                    <?php
                                                    echo $singleAd['ad_title'].'<br/>';
                                                    ?>
                                                    </a>
                                                </td>
                                               <td class='search_result'>
                                                    <?php
                                                    echo $singleAd['ad_description'].'<br/>';
                                                    ?>
                                               </td>
                                               
                                            </tr>
                                    <?php
                                    }
                        }
                        ?>
                    </table>
                <?
                //echo "</p>\n";

                //Show errors
                /*echo "<p>\n";
                echo "<strong>Dump of all errors</strong><br />\n";
                if (!empty($errors) && is_array($errors)) {
                foreach ($errors as $error) {
                    echo var_dump($error) . "<br /><br />\n";
                }
                } else {
                echo "No errors" . "<br />\n";
                }
                echo "</p>\n";*/
                    ?>
        </div>
    </div>
</div>
<?php include("footer.php")?>