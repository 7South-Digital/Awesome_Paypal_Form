<?php namespace Plugin;
require_once AFP_PLUGIN_INCLUDE_PATH ."settings.php";
require_once AFP_PLUGIN_VENDOR_PATH . "autoload.php";

use Plugin\Afp_Settings;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Refund;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;

if(! class_exists('AfpPayment')){
    class Afp_Payment{
        public $admin_email;
        public $client_email;
        public $amout;
        public $body;
        public $link_return;
        public $link_cancel;
        public $apiContext;

        function __construct($amout = null,$client_email = null){
            $this->amout = $amout;            
            $this->client_email = $client_email;

            $settings = new Afp_Settings();
            $this->apiContext = new ApiContext(
                new OAuthTokenCredential(
                    $settings->getPaypal_clientid(),
                    $settings->getPaypal_secret()
                )
            );
        }
        
        public function PayPaypal(){
            $this->amout;            
            $this->client_email;

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $amount = new Amount();     
            $amount->setTotal(floatval($this->amout));
            $amount->setCurrency('EUR');

            $transaction = new Transaction();
            $transaction->setAmount($amount);

            $callbackUrl = get_site_url();

            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl($callbackUrl)
                ->setCancelUrl($callbackUrl);

            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

            try {
                $payment->create($this->apiContext);
                echo "
                <script>
                    window.location.href = '".$payment->getApprovalLink()."';
                </script>
                ";
            } catch (PayPalConnectionException $ex) {
                echo $ex->getData();
            }
        }
        public function PaypalStatus($paymentId = null, $payerId = null, $token = null){

            if (!$paymentId || !$payerId || !$token) {
                echo '<div class="alert alert-warning" role="alert">
                This is a warning alert—check it out!
              </div>';
            }
            $payment = Payment::get($paymentId, $this->apiContext);
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);

            /** Execute the payment **/
            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() === 'approved') {
                self::SendEmailAdmin();
                self::SendEmailClient();
                echo '<div class="alert alert-success" role="alert">
                    This is a success alert—check it out!
                </div>';
            }            
        }

        private function SendEmailAdmin(){

            $transport = Transport::fromDsn('smtp://localhost');
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from($this->admin_email)
                ->to($this->admin_email)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);

        }
        private function SendEmailClient(){
            $transport = Transport::fromDsn('smtp://localhost');
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from($this->admin_email)
                ->to($this->client_email)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);
        }
        
    }
}