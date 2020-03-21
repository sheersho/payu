


<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "tXjTgO ";
$SALT = "QYcSzlbk";
$txnid=genTransactionID();;
$name="sheersho";
$email="sheersho.p@classtrak.in";
$amount=100;
$phone="8700656915";
$surl="http://localhost/payu/myapp/suces.html";
$furl="http://localhost/payu/myapp/suces.html";
$productInfo="1 Month Tutor Subscription Plan";

function genTransactionID(){
            mt_srand((double)microtime()*10000);
            $charid = md5(uniqid(rand(), true));
            $c = unpack("C*",$charid);
            $c = implode("",$c);

            return substr($c,0,15);
    }

// Merchant Salt as provided by Payu

$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$hashString=$MERCHANT_KEY."|".$txnid."|".$amount."|".$productInfo."|".$name."|".$email."|||||||||||".$SALT;
   
$hash = strtolower(hash('sha512', $hashString));
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head >

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<h1>PayUMoney Test Form </h1>
<i><h3>alpha v0.0.1 by Sheersho</h3></i>
<form action="https://sandboxsecure.payu.in/_payment"  name="payuform" method=POST >
<td><b>ClassTrak Key: </b></td>
<input  name="key" value="<?php echo $MERCHANT_KEY;?>" />
</tr>
<td><b>Hash Function Output: </b></td>
<input  name="hash" 	 value="<?php echo $hash;?>" />
</tr>
<td><b>ClassTrak Transaction ID</b></td>
<input  name="txnid" value="<?php echo $txnid;?>"/>
</tr>
<table>
<tr>
<td>Amount: </td>
<td><input name="amount" value="<?php echo $amount;?>" /></td>
<br><br>

<td>First Name: </td>
<td><input name="firstname" id="firstname" value="<?php echo $name;?>" /></td>
</tr>
<tr>
<td>Email: </td>
<td><input name="email" id="email"  value="<?php echo $email;?>" /></td>
<td>Phone: </td>
<td><input name="phone" value="<?php echo $phone;?> " /></td>
</tr>
<tr>
<td>Product Info: </td>
<td colspan="3"><textarea name="productinfo" ><?php echo $productInfo;?></textarea></td>
</tr>
<tr>
<td>Success URI: </td>
<td colspan="3"><input name="surl"  size="64" value="<?php echo $surl;?> " /></td>
</tr>
<tr>
<td>Failure URI: </td>
<td colspan="3"><input name="furl"  size="64" value="<?php echo $furl;?> " /></td>
</tr>
<tr>
<td colspan="3"><input type="hidden" name="service_provider" value="" /></td>
</tr>
<tr>

<td colspan="4"><input style="background-color:#90ef12; color:white; border: none;width: 120px;height: 30px; margin-left:5px;margin-top:10px;" type="submit" value="Make Payment"  /></td>
</tr>
</table>
</form>
</body>
</html>