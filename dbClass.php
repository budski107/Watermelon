<?php
define('RATING_DATABASE_NAME', 'johnland_watermelon');
define('RATING_TABLE_NAME', 'items_ratings');
define('RATING_SCALE', 5);
define('RATING_IMAGES_DIR', 'images');
require_once 'database.php';
class dbClass {
		
	private function __construct() {}
        public static function getwishlist()
        {
            if ( isset($_SERVER["REMOTE_ADDR"]) )    {
    		$ip = $_SERVER["REMOTE_ADDR"];
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
    		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    {
    		$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
                session_start();
                $_SESSION['wl_ip'] = $ip;
             $dbObj = new database();   
             $sql = "SELECT * from wishlist where wl_ip = '$ip'";
             $con = $dbObj->getConnection();
             $res=$con->query($sql);
             $row = $res->rowCount();
             
             return $row;             
        }
        
        public static function fetchCurrentRating($itemID) {
		
		$sql = "SELECT sum(rating) sum, count(ID) count from " . RATING_TABLE_NAME . " WHERE item_id = $itemID";
		
		
		$dbObj = new database();
                $con = $dbObj->getConnection();
                $result = $con->query($sql);
		$result = $result->fetch(PDO::FETCH_OBJ);	
		
		
		$sum = $result->sum;
		$count = $result->count;
		
		if ($count == 0) {
			return array('rating' => 0, 'count' => $count);
		}
		
		$rating = $sum / $count;
		
		return array('rating' => $rating, 'count' => $count);
		
	}
        
	
        
        public static function drawRatingSelection($itemID) {
								
		for($i = 1; $i <= RATING_SCALE; $i++) {
			echo dbClass::drawRatingImage($itemID, $i);
		}
		require 'javascript.php';
		
	}
	
	
	private static function drawRatingImage($itemID, $value) {
		$image = '<img id="image_'.$itemID.'_'.$value.'" src="'.RATING_IMAGES_DIR.'/star1.gif"  onmouseover="highlightRatingStar('.$itemID.','.$value.')" onmouseout="normalRatingStar('.$itemID.','.$value.')" onclick="setItemRating('.$itemID.','.$value.')">';
		return $image;
	}
	
	
	public static function drawItemRating($itemID, $drawContainer = true) {
				
		$ratings = dbClass::fetchCurrentRating($itemID);
		
		$rating = $ratings['rating'];
		$totalRatings = $ratings['count'];
		
		if ($drawContainer) {
			echo '<div id="itemRating_' . $itemID . '">';
		}
		
		for($i = 0; $i <= $rating - 1; $i++) {
			echo '<img src="' . RATING_IMAGES_DIR . '/star3.gif">';			
		}
		
		
		if ($rating == RATING_SCALE) {
			if ($drawContainer) {
				echo "</div>";
			}
			return;
		}
		
		
		if ($i != $rating) {
			echo '<img src="' . RATING_IMAGES_DIR . '/star2.gif">';
			$i++;
		}
		
		for($i; $i < RATING_SCALE; $i++) {
			echo '<img src="' . RATING_IMAGES_DIR . '/star1.gif">';			
		}
		
		if ($drawContainer) {
			echo "</div>";
		}
	}
	
        public static function add_to_wishlist($ad_id)
        {
            
            
		           
                if ( isset($_SERVER["REMOTE_ADDR"]) )    {
    		$ip = $_SERVER["REMOTE_ADDR"];
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
    		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    {
    		$ip = $_SERVER["HTTP_CLIENT_IP"];
		} 
                $sql = "INSERT INTO wishlist (ad_id,wl_ip) values($ad_id,'$ip');";
                
                $dbObj = new database();
                $con = $dbObj->getConnection();
                $result = $con->query($sql);
                
                
                if($result)
                {
                    //echo '<script type="text/javascript">alert("added to wishlist"); </script>';
                    return true;
                    //header("Location: http://$host$uri/$file");
                                        
                }
                
        }
	
	public static function saveRating($itemID, $rating) {
		
		if ( isset($_SERVER["REMOTE_ADDR"]) )    {
    		$ip = $_SERVER["REMOTE_ADDR"];
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
    		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    {
    		$ip = $_SERVER["HTTP_CLIENT_IP"];
		} 

		$dbObj = new database();
                
                $check = "select * from ".RATING_TABLE_NAME." where rater_ip='".$ip."' and item_id='".$itemID."'";
                $con = $dbObj->getConnection();
                $res = $con->query($check);
                $res1 = $res->rowCount();
                
                
                    if($res1 == 0)
                        {
                            $sql = "INSERT INTO " . RATING_TABLE_NAME . " (item_id, rating, rater_ip) VALUES ($itemID, $rating, '$ip')";
                            $result = $con->exec($sql);
                            return true;
                        }
                    else {
                       echo '<script type="text/javascript">alert("You already rated for this Ad."); </script>';
                        return false;
                       }
                

	}
}
?>