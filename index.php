

<?php

include  'backend.php';

?>

<html>

​

<body>

<a target="_blank" href="<?php echo $hppUrl ?>"> Click to check Hosted Payment Page Form </a>

<script id="kashier-iFrame"

src="<?php echo $order->baseUrl ?>/js/kashier-checkout.js"

data-amount="<?php echo $order->amount ?>"

data-description="some description"

data-hash="<?php echo $hash ?>"

data-currency="<?php echo $order->currency ?>"

data-orderId="<?php echo $order->merchantOrderId ?>"

data-merchantId="<?php echo $order->mid ?>"

data-merchantRedirect="http://localhost/phpIFrame/callback.php"

data-store = "Qassat"

data-type = "external"

data-display="en"  > </script>

</body>

</html>

