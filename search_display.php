


<?php include("header.php")?>
<div id="main">
    <div id="lbar">
    <!--<div id="accordion">-->
    <div>

<p>Please enter your search term:</p>
<form method="post" action="search_display4.php?go" id="searchform">
<input type="text" name="search" placeholder="Search by Keywords">
<input type="submit" name="submit" value="Search">
</form>
<?php

if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/[A-Z | a-z]+/", $_POST['search'])){
$search=$_POST['search'];

//connect to the database
$db=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("php");

//-query the database table
$sql="SELECT tbl_advertisement.ad_id, tbl_advertisement.ad_title, tbl_advertisement.ad_image, tbl_advertisement.ad_price, tbl_ad_category.ad_category FROM tbl_ad_category INNER JOIN tbl_advertisement
ON tbl_ad_category.ad_category_id = tbl_advertisement.ad_category_id WHERE ad_title LIKE '%" . $search . "%' OR ad_category LIKE '%".$search."%'  ";

//-run the query against the mysql query function
$result=mysql_query($sql);

//-create while loop and loop through result set
while($row=mysql_fetch_array($result)){

	$ad_title=$row['ad_title'];
	$ad_image=$row['ad_image'];
	$ad_category=$row['ad_category'];
	$ad_price=$row['ad_price'];
	$ad_id=$row['ad_id'];
		
//-display the result of the array

//echo "<ul>\n"; 
//echo "<li>" . "<a href=\"search_display.php?id=$ID\">"  .$FirstName . " " . $LastName . " " . $Email . " " . $PhoneNumber . "</a></li>\n";
//echo "</ul>";

echo "<table>
		<tr>
			<td class='search_result'><a href=\"display_ad.php?ad_id=$ad_id\">"  .$ad_title . "</a></td>
			<td class='search_result'>".$ad_title."</td>
			<td class='search_result'>
                        
                ";?>

                        <img src="adimage/<?php echo $ad_image;?>" width="300" height="200" /> 
                        <? echo "
                        </td>
                        <td class='search_result'>".$ad_price."</td>
			
			
		</tr>
	  </table>
";

}
}
else{
echo "<p>Please enter a search query</p>";
}
}
}
?>
    </div>
</div>
<?php include("footer.php")?>

