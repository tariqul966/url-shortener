<?php include 'db.php';
$code=$_GET['code']??'';
$q=$conn->query("SELECT * FROM urls WHERE short_code='$code'");
if($r=$q->fetch_assoc()){
$conn->query("UPDATE urls SET clicks=clicks+1 WHERE id=".$r['id']);
header("Location: ".$r['long_url']); exit;
}
echo 'Not found';
