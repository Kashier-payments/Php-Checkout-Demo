

<?php

include  'backend.php';

?>

<html>

<head>
<script>
  function responseCallBack(e){ 
  if(e.data.message== "success"){
      console.log("Success payment", e.data )
  }else if(e.data.message == "failure"){
      console.log("Failure payment", e.data )
  }else{
      console.log("Other Actions", e.data )
  }
}
     if (window.addEventListener) {
       console.log("if");
       addEventListener("message", responseCallBack, false)
   } else {
    console.log("else");     
       attachEvent("onmessage", responseCallBack)
   }
</script>
</head>​

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

data-merchantRedirect="http://localhost/phpIFrame/iFrameCallback.php"

data-store = "Qassat"

data-type = "external"

data-display="en"  > </script>

</body>

</html>

