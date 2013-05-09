<div id="search-bar-home">
    <form action="searchresult.php" name="searchform" method="post">
        <table style="margin: 0 auto;">
            <tr>
                <td>
                    Lets Get Started &nbsp; &nbsp; &nbsp;
                </td>
                <td>
                    <input type="text" id="search" name="search" placeholder="Put your Search keywords here..!!" />
                </td>
                <td>
                    <input type="submit" name="submit" id="search" value="Search" />
                </td>
            </tr>
        </table>

    </form>
</div>
<?php
require_once 'searchDAO.php';
if(isset($_POST['submit']))    
    {  
        if(!empty($_POST['search']))
            {
                
                //require_once('conn.php');   //commented by Jay and colin for optimising    
                $search=$_POST['search'];
                
                $rows = searchDAO::searchAd($search);
                //commented by Jay and colin for optimising
                //$searchDAOObj = new searchDAO();
                //$searchDAOObj->searchAd($searchTerm);
//                $sql="SELECT tbl_advertisement.ad_id, tbl_advertisement.ad_title, tbl_advertisement.ad_image, tbl_advertisement.ad_price, tbl_ad_category.ad_category FROM tbl_ad_category INNER JOIN tbl_advertisement
//                ON tbl_ad_category.ad_category_id = tbl_advertisement.ad_category_id WHERE ad_title LIKE '%" . $search . "%' OR ad_category LIKE '%".$search."%' ";
//                $query = $db->prepare($sql);
//                $query->execute();
            
                echo "<table style='margin:0 auto;line-height:2.6'>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Price</th>
                        </tr>
                    ";
                    
                foreach ($rows as $ad)
                //while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
                {    
                    $ad_title=$ad['ad_title'];
                    $ad_image=$ad['ad_image'];
                    //$ad_category=$row['ad_category'];
                    $ad_price=$ad['ad_price'];
                    $ad_id=$ad['ad_id'];
                    echo 
                        "<tr title='Click Here To View The Ad'>
                            <td class='search_result'><a href=\"display_ad.php?ad_id=$ad_id\">"  .$ad_title . "</a></td>
                            <td class='search_result'><a href=\"display_ad.php?ad_id=$ad_id\"><img src='" .$ad_image. "' width='300' /></a></td>
                            <td class='search_result'><a href=\"display_ad.php?ad_id=$ad_id\">" . $ad_price . "</a></td>
                        </tr>
                    ";
                }
                echo "</table>";
            }
            else
                {
                    echo "<p>Please enter a search query</p>";
                }
            }
?>