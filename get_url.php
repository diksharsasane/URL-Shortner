<?php
include("connect.php");



if(isset($_POST['sc']))

//if(isset($_POST['orignial_url']))
{


$url=$_POST['sc'];
//echo $url;

//$query="select long_url from short_urls where short_url='$short_url'";

$sql="select long_url from short_urls where short_url='$url'";
   
$result=$conn->query($sql);


  //  while($row=mysql_fetch_array($result)){
    //    echo $row['long_url'];


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<a href='" . $row['long_url'] . "' target='_new'>" . $row['long_url'] . "</a>";
        }
      } else {
        echo "URL not found";
      }
    } else {
      echo "Invalid request";

/* while($row=$result->fetch_assoc())
echo "<a href=".$row["long_url"]." target=_new >".$row["long_url"]."</a>";
     */
    
    
}
?>