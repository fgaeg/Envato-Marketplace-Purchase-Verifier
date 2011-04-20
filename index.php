<?php
if (isset($_POST['submitted'])) {
    require 'Envato_marketplaces.php';
    require 'config.php';
    $e = new Envato_marketplaces();
    $e->set_api_key($config['api_key']);
    $v = $e->verify_purchase($config['username'],$_POST['purchase-code']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 

<!-- Begin Head -->
<head>
    
    <!-- Page Title -->
    <title>Envato Marketplace Purchase Verifier</title>
    
    <style type="text/css">
        body { font-family: "Segoe UI", Segoe, Tahoma, Geneva, sans-serif; }
    </style>

</head>
<!-- End Head -->

<!-- Begin Body -->
<body>
<h1>Envato Marketplace Purchase Verifier</h1>
<h4>Make sure that you have configured the script in config.php</h4>

<form action="#" method="post">
    <label for="purchase-code">Purchase Code</label>
    <input type="text" name="purchase-code" />

    <input type="hidden" name="submitted" value="true" />

    <input type="submit" value="Submit" /> 
</form>

<?php if (isset($_POST['submitted'])): ?>
<h2>Results</h2>
<?php
if (isset($v->buyer)) {
    echo 'Valid Purchase';
} else {
    echo 'Not a Valid Purchase';
}
?>
<h3>Other Data</h3>
<pre>
<?php 
if ($v==null) { echo 'No other data'; } else { print_r($v); }
?>
</pre>
<?php endif; ?>
<hr/>

<h3>Your Data</h3>
<p>Username: <?php echo $config['username']; ?>
<br/>API Key: <?php echo $config['api_key']; ?></p>
<hr/>

<h5>Script by Priyesh Patel. Wrapper class by Jeffrey Way. Source code on GitHub @ <a href="https://github.com/PriyeshPatel/Envato-Marketplace-Purchase-Verifier">https://github.com/PriyeshPatel/Envato-Marketplace-Purchase-Verifier</a></h5>
</body>
<!-- End Body -->

</html>

