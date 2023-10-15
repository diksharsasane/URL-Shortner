<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urlshortner";

$success = mysqli_connect($servername, $username, $password, $dbname);
$ans = $_POST['url_value'];

if (!$success) {
  die("Connection failed: " . mysqli_connect_error());
}

if (empty($_POST['url_value'])) {
  $success->close();
} else {
  $result = mysqli_query($success, "SELECT long_url, short_url FROM short_urls WHERE long_url = '$ans'");

  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    $long_url = $row['long_url'];
    $short_url = $row['short_url'];

    echo "URL already exists";
    echo "<br>";
    echo "Here is the code: ".$short_url;
    echo "<br>";
    //echo "Click the link above to visit the original page.";
  } else {
    $url = $_POST["url_value"];
   $short_url = substr(md5($url . mt_rand()), 0, 8);

    $sql = "INSERT INTO short_urls (long_url, short_url) VALUES ('$url', '$short_url')";

    if ($success->query($sql) === TRUE) {
      echo "The Short Code for the URL is: <a href='$short_url' target='_blank'>$short_url</a>";
    } else {
      echo "Error: " . $sql . "<br>" . $success->error;
    }
  }

  $success->close();
}
?>




<?php
//$result = mysqli_query($sucess, "SELECT long_url FROM short_urls WHERE long_url = '$ans'");
//$exist = mysqli_query($sucess, "SELECT short_url FROM short_urls WHERE long_url = '$ans'");
  
// if (mysqli_num_rows($result)) {
  //   echo "URL already exists";
  //   echo "<br>";
 // $row = mysqli_fetch_assoc($exist);
  //   echo " Here is the code: " . $row['short_url'];
?>