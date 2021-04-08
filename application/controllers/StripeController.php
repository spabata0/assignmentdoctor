<?php

class StripeController extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');

       $this->load->model('Member_model');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        
        $this->load->view('frontend/my_stripe');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function createCheckoutSession()
    {
        require_once('application/libraries/stripe-php/init.php');

        $data =  array (
                    "amount" => $this->input->post('amount'),
                    "currency" => $this->input->post('currency'),
                    "product" => $this->input->post('product'), 
                    "quantity" => $this->input->post('quantity')
                );
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        header('Content-Type: application/json');

        $YOUR_DOMAIN = base_url();
     
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'], 
            'line_items' => [['price_data' => ['currency' => $data['currency'],'unit_amount' => $data['amount'], 'product_data'=> ['name' => $data['product']]],'quantity' => $data['quantity']]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . 'stripe/success/?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
          ]);
            
        $this->session->set_flashdata('success', 'Payment made successfully.');
             
        echo json_encode(['id' => $checkout_session->id]);
    }


    public function success() 
    {
        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $sid = $this->input->get('session_id');
        
        $sess = \Stripe\Checkout\Session::retrieve($sid);
     
        header('Content-Type: application/json');


        $trans_id = $this->session->userdata['has_order']['trans_id'];
        $stripe_session_id = $sess['id'];

        $this->Member_model->save_trans_details($trans_id, $stripe_session_id);

        $url = base_url() . "confirmation?sid=" .  $stripe_session_id;

        redirect($url);

        //print "<pre>";
        //print_r($sess);
        //print "</pre>";

    }

    public function retrive() 
    {

        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $sess = $this->input->get('sid');

        $data = \Stripe\Checkout\Session::retrieve($sid);



    }

    public function listen()
    {

        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                        json_decode($payload, true)
                    );

        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            echo '⚠️  Webhook error while parsing basic request.';
            http_response_code(400);
            exit();
        }

        // Handle the event
        switch ($event->type) {
             case 'payment_intent.succeeded':
            $paymentSession = $event->data->object;
            print_r($paymentSession);
            // contains a \Stripe\PaymentIntent
        // Then define and call a method to handle the successful payment intent.
        // handlePaymentIntentSucceeded($paymentIntent);
            break;
            case 'payment_method.attached':
            $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        // Then define and call a method to handle the successful attachment of a PaymentMethod.
        // handlePaymentMethodAttached($paymentMethod);
            break;
            default:
        // Unexpected event type
        echo 'Received unknown event type';
        }

    http_response_code(200);

}


}

?>