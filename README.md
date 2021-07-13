# Php-Checkout-Demo

Create and pay orders through PaymentUI IFrame (Same page payment kashier popup) or Hosted Payment Page (Payment redirection).

#### Running the demo

- Clone the github project `git@github.com:Kashier-payments/Php-PaymentUI-demo.git`

- On your cloned project root `run php -S localhost:8000` if you are using php Built-in web server

- Navigate to `localhost:8000` to make sure things are working.

- Begin configuring your merchant.

#### Obtain MID

- To begin testing on your account you need to update your config.php -> live-test credentials

- Login or Sign up on kashier.io https://merchant.kashier.io/

- Copy Merchant ID visible under your user name "MID-xx-xx" in `config.php` -> `"test" -> mid`


#### Obtain Test API Key Credentials

- In merchant portal, navigate to Integrate now section > Payment Api Keys.

- Generate a new api key with your prefered name that describes your payment channel, there is 1 default api key you could use that is created when signing up.

- Copy and paste your API key in `config.php` -> `"test" -> apiKey `


#### Setting Your Payment Method 

- you can select your payment method by setting on `allowedMethods` variable in `backend.php` 
- Add the following options separated by comma remove or leave empty for all allowed methods. `allowedMethods="card,wallet,bank_installments"`

#### Setting your payment callback & signature calculation

- Every payment callback comes with a signature key, you should be chcking against it using the used api key. `iFrameCallback.php` / `hppCallback.php` should have the code needed to verify the integrity of kashier transactions callback, we dont want any one to hack his way to your callback url and begin faking payments on your order.

- IFrame Callback URL should be set on `data-merchantRedirect` variable in `index.php` and should be referring to your running server.

- HPP Callback URL should be set on `$callbackUrl` variable in `backend.php` and should be referring to your running server.

- Make sure your callbacks are referring to your running server in case of using the demo project.


#### Test Cards

- index.phpSuccess - `5111 1111 1111 1118` - `06/22` - `100`

- Success 3dsecure - `5123 4500 0000 0008` - `06/22` - `100`

- Failure card - `5111 1111 1111 1118` - `05/20` - `102`


#### Going live

- After you've contacted our sales and onboarded to live mode you should repeat the same steps in Obtaining credentials section 

- Make sure you are on Live mode on merchant portal 

- If you are still on the php demo you should paste the credentials to `config.php` -> `"live"` array

- Change your mode to `config.php` -> `"mode" => "live"`.

- Rerun the project !


