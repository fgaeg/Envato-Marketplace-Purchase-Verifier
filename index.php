<?php
require 'Envato_marketplaces.php';
require 'config.php';
$e = new Envato_marketplaces();
$e->set_api_key($config['api_key']);
if (isset($_POST['submitted'])) {
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
<h4>Make sure that you have configured the script in config.php. Data will appear below if configured correctly.</h4>

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
    echo '<span style="color:green;font-weight:bold;font-size:16px;">Valid Purchase</span>';
} else {
    echo '<span style="color:red;font-weight:bold;font-size:16px;">Not a Valid Purchase</span>';
}
?>
<h3>Other Data</h3>
<?php if ($v==null) { echo 'No other data'; } else { ?>
<p><strong>Item Name:</strong> <?php echo $v->item_name; ?>
<br/><strong>Item ID:</strong> <?php echo $v->item_id; ?>
<br/><strong>Licence:</strong> <?php echo $v->licence; ?>
<br/><strong>Buyer:</strong> <?php echo $v->buyer; ?>
<br/><strong>Purchase Code:</strong> <?php echo $_POST['purchase-code']; ?>
<br/><strong>Purchase Time & Date:</strong> <?php echo $v->created_at; ?></p>
<?php } ?>
<?php endif; ?>
<hr/>

<h3>Your Data</h3>
<p><strong>Username:</strong> <?php echo $config['username']; ?>
<br/><strong>API Key:</strong> <?php echo $config['api_key']; ?></p>
<hr/>

<h5>Script by Priyesh Patel. Wrapper class by Jeffrey Way. Source code on GitHub @ <a href="https://github.com/PriyeshPatel/Envato-Marketplace-Purchase-Verifier">https://github.com/PriyeshPatel/Envato-Marketplace-Purchase-Verifier</a></h5>
</body>
<!-- End Body -->

</html>

