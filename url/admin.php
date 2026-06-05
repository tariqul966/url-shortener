<?php include 'db.php';
$r=$conn->query("SELECT * FROM urls ORDER BY id DESC");
?><html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class='container py-5'>
<h2>Admin Dashboard</h2>
<table class='table'><tr><th>ID</th><th>Code</th><th>URL</th><th>Clicks</th></tr>
<?php while($x=$r->fetch_assoc()){ ?>
<tr><td><?=$x['id']?></td><td><?=$x['short_code']?></td><td><?=$x['long_url']?></td><td><?=$x['clicks']?></td></tr>
<?php } ?></table></body></html>