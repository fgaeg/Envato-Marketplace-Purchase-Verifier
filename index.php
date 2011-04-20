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
body {
background: none repeat scroll 0 0 #EEEEEE;
font-family: "Segoe UI", Segoe, Tahoma, Geneva, sans-serif;
}
h1 {
  color: #666666;
    font-weight: normal;
}
#wrapper {
text-align: center;
width:800px;margin:auto;
}
form {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 3px 3px 3px 3px;
    margin: 0 auto 10px auto;
    padding: 40px;
    text-align: left;
    width: 54%;
}

#results {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 3px 3px 3px 3px;
    margin: 0 auto;
    padding: 40px;
    text-align: left;
    width: 54%;
    color:#555555;
    font-size:13px;
}

input[type="text"] {
    border: 1px solid #CCCCCC;
    border-radius: 3px 3px 3px 3px;
    color: #555555;
    font-size: 12px;
    padding: 10px 5px;
    width: 97%;
}    
input[type="text"]:focus {
    background: none repeat scroll 0 0 #F9F9F9;
}
h5 {
   color: #666666;
    font-size: 11px;
    font-weight: normal;
}
a {
  color: #333;
    font-size: 11px;
    font-weight: normal;
}

label {
  color: #666666;
    display: inline-block;
    font-size: 12px;
    margin-bottom: 5px;
margin-top:10px
}
    </style>

</head>
<!-- End Head -->

<!-- Begin Body -->
<body>
<div id="wrapper">
<h1>Envato Marketplace Purchase Verifier</h1>
<h4 style="font-size:14px;color:#999;">Make sure that you have configured the script in config.php. Data will appear below if configured correctly.</h4>

<form action="#" method="post">
    <label for="purchase-code">Purchase Code</label>
    <input type="text" name="purchase-code" />
    <br/>
    <input type="hidden" name="submitted" value="true" />
    <br/> 
    <input type="submit" value="Submit" /> 
</form>
<div id="results">
<?php if (isset($_POST['submitted'])): ?>
<?php
if (isset($v->buyer)) {
    echo '<span style="color:green;font-weight:bold;font-size:16px;">Valid Purchase</span>';
} else {
    echo '<span style="color:red;font-weight:bold;font-size:16px;">Not a Valid Purchase</span>';
}
?>
<h3>Purchase Data</h3>
<?php if ($v==null) { echo 'No other data'; } else { ?>
<p><strong>Item Name:</strong> <?php echo $v->item_name; ?>
<br/><strong>Item ID:</strong> <?php echo $v->item_id; ?>
<br/><strong>Licence:</strong> <?php echo $v->licence; ?>
<br/><strong>Buyer:</strong> <?php echo $v->buyer; ?>
<br/><strong>Purchase Code:</strong> <?php echo $_POST['purchase-code']; ?>
<br/><strong>Purchase Time & Date:</strong> <?php echo $v->created_at; ?></p>
<?php } ?>
<hr/>
<?php endif; ?>

<h3>Your Data</h3>
<p><strong>Username:</strong> <?php echo $config['username']; ?>
<br/><strong>API Key:</strong> <?php echo $config['api_key']; ?></p>

</div>
<h5>Script by <a href="http://www.pexat.com/">Priyesh Patel</a> [<a href="http://activeden.net/user/Pexat?ref=Pexat">Profile Page</a>]. Wrapper class by Jeffrey Way. Source code on <a href="https://github.com/PriyeshPatel/Envato-Marketplace-Purchase-Verifier">GitHub</a></h5>
</div>
</body>
<!-- End Body -->

</html>

