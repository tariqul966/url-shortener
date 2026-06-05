<?php include 'db.php'; $short='';
if($_POST){
$url=$_POST['url'];
$alias=trim($_POST['alias']);
$code=$alias?:substr(md5(uniqid()),0,6);
$stmt=$conn->prepare("INSERT INTO urls(short_code,long_url) VALUES (?,?)");
$stmt->bind_param("ss",$code,$url);
$stmt->execute();
$short=((isset($_SERVER['HTTPS'])?'https':'http').'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$code);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>URL Shortener</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    min-height:100vh;
    background:#0f172a;
    background-image:
    radial-gradient(circle at top left,#2563eb 0%,transparent 40%),
    radial-gradient(circle at bottom right,#7c3aed 0%,transparent 40%);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.main-card{
    width:100%;
    max-width:750px;
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.1);
    border-radius:25px;
    box-shadow:0 20px 50px rgba(0,0,0,.4);
    color:white;
}

.logo{
    font-size:42px;
    font-weight:700;
}

.subtitle{
    color:#cbd5e1;
}

.form-control{
    height:55px;
    border-radius:14px;
}

.btn-create{
    height:55px;
    border-radius:14px;
    font-weight:600;
}

.result-box{
    background:rgba(255,255,255,.08);
    border-radius:18px;
    padding:20px;
}

.qr-box{
    background:white;
    display:inline-block;
    padding:12px;
    border-radius:15px;
}

.footer-text{
    color:#94a3b8;
    font-size:14px;
}

</style>

</head>

<body>

<div class="main-card p-4 p-md-5">

<div class="text-center mb-4">

<div class="logo">
🔗 URL Shortener
</div>

<p class="subtitle">
Fast • Secure • Modern URL Shortener
</p>

</div>

<form method="post">

<div class="mb-3">

<input
type="url"
class="form-control"
name="url"
placeholder="https://example.com/very-long-url"
required>

</div>

<div class="mb-3">

<input
type="text"
class="form-control"
name="alias"
placeholder="Custom Alias (optional)">

</div>

<button
class="btn btn-primary btn-create w-100">

Generate Short Link

</button>

</form>

<?php if($short){ ?>

<div class="result-box mt-4">

<h5 class="mb-3">
Your Short Link
</h5>

<div class="input-group mb-3">

<input
id="shortUrl"
type="text"
class="form-control"
value="<?=$short?>"
readonly>

<button
type="button"
class="btn btn-success"
onclick="copyLink()">

Copy

</button>

</div>

<div class="text-center mt-4">

<div class="qr-box">

<img
src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?=urlencode($short)?>"
class="img-fluid">

</div>

</div>

</div>

<?php } ?>

<div class="text-center mt-4 footer-text">

Powered by Rion Shortener

</div>

</div>

<script>

function copyLink(){

let copyText =
document.getElementById("shortUrl");

navigator.clipboard.writeText(
copyText.value
);

alert("Link Copied!");

}

</script>

</body>
</html>