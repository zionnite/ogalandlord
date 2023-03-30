<?php 
class Subscription extends My_Controller{
    public function __construct(){
        parent::__construct();
    }


        
    public function make_payment(){
        $data['alert']		=	$this->session->flashdata('alert');
        
        $data['email']         			=$this->session->userdata('email');
		$data['full_name']         		=$this->session->userdata('name');
		$data['phone_no']         		=$this->session->userdata('phone');
        
        $data['content']    ='make_donation_amount';
		$this->load->view($this->layout_2,$data);
	}
    
    
    public function verify_payment(){
        //http://localhost/ecard9jaPlus/Profile/verify_payment?status=successful&tx_ref=%2B2349034286339-1606327921&transaction_id=332165918
        $public_key   =$this->Admin_db->get_public_live_key();
        $secure_key   =$this->Admin_db->get_private_live_key();
        
        $p_status       =$this->input->get('status');
        $p_tx_ref       =$this->input->get('tx_ref');
        $p_trans_id     =$this->input->get('transaction_id');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$p_trans_id."/verify",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$secure_key
          ),
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 16 * 1000); // it's in milliseconds
        curl_setopt($curl, CURLOPT_TIMEOUT, 16 * 1000);
        $response = curl_exec($curl);
        $result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        curl_close($curl);
        //echo $response;
        
        $v_status           = $result['status'];
        $v_data             = $result['data'];
        $v_customer         = $v_data['customer'];
        
        if($v_status =='success'){
            $v_amount           = $v_data['amount'];
            
            $v_name             =$v_customer['name'];
            $v_phone            =$v_customer['phone_number'];
            $v_email            =$v_customer['email'];
            
            $action             =$this->Admin_db->donation_transaction($v_name,$v_phone,$v_email,$v_amount,$p_tx_ref,$p_trans_id);
            if($action == true){
                $data['alert']	='<div class="alert alert-success" role="alert"><strong>Success:</strong>Thanks, Your Donation was Recieved! </div>';
                $this->session->set_flashdata('alert',$data['alert']);
            }else{
                $data['alert']	='<div class="alert alert-warning" role="alert"><strong>Success:</strong>Oops!! Your Transaction was successful but we have not Recieved your Donation Yet, Thanks! </div>';
                $this->session->set_flashdata('alert',$data['alert']);
            }
        }else{
            $data['alert']	='<div class="alert alert-danger" role="alert"><strong>Success:</strong>Oops!! Transaction was not successful! </div>';
            $this->session->set_flashdata('alert',$data['alert']);
        }
        
        redirect('MakeDonation');
        
    }


    public function flutterwave_create_bulk_transfer(){
        $public_key   =$this->Admin_db->get_public_live_key();
        $secure_key   =$this->Admin_db->get_private_live_key();

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/bulk-transfers/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "title": "Test_SUBSCRIPTION_NG_Bulk_Transfers_1",
            "bulk_data": [
                {
                    "bank_code": "058",
                    "account_number": "0241459758",
                    "amount": 1900,
                    "currency": "NGN",
                    "narration": "Test transfer to F4B Developers",
                    "reference": "bulk_Transfers_0019_PMCK",
                    "meta": [
                        {
                        "first_name": "F4B",
                        "last_name": "Developers",
                        "email": "developers@flutterwavego.com",
                        "mobile_number": "+23457558595",
                        "recipient_address": "234 Kings road, Cape Town"
                        }
                    ]
                },
                {
                    "bank_code": "FNB",
                    "account_number": "0031625807099",
                    "amount": 3200,
                    "currency": "ZAR",
                    "narration": "Test transfer to Support",
                    "reference": "bulk_Transfers_0020_PMCK",
                    "meta": [
                        {
                        "first_name": "Flutterwave",
                        "last_name": "Support",
                        "email": "support@flutterwavego.com",
                        "mobile_number": "+23457558595",
                        "recipient_address": "234 Kings road, Cape Town"
                        }
                    ]
                },
                {
                    "bank_code": "FNB",
                    "account_number": "0031625807099",
                    "amount": 6950,
                    "currency": "ZAR",
                    "narration": "Test transfer to Flutterwave Developers",
                    "reference": "bulk_Transfers_0021_PMCK",
                    "meta": [
                        {
                        "first_name": "Flutterwave",
                        "last_name": "Developers",
                        "email": "developers@flutterwavego.com",
                        "mobile_number": "+23457558595",
                        "recipient_address": "234 Kings road, Cape Town"
                        }
                    ]
                },
                {
                    "bank_code": "FNB",
                    "account_number": "0031625807099",
                    "amount": 1500,
                    "currency": "ZAR",
                    "narration": "Test transfer to Wavers",
                    "reference": "bulk_Transfers_0022_PMCK",
                    "meta": [
                        {
                        "first_name": "Wavers",
                        "last_name": "N/A",
                        "email": "hi@flutterwavego.com",
                        "mobile_number": "+23457558595",
                        "recipient_address": "234 Kings road, Cape Town"
                        }
                    ]
                }
            ]
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            "Authorization: Bearer ".$secure_key
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function_flutter_wave_webhook(){

        // Retrieve the request's body
        $body = @file_get_contents("php://input");

        // retrieve the signature sent in the reques header's.
        $signature = (isset($_SERVER['verif-hash']) ? $_SERVER['verif-hash'] : '');

        /* It is a good idea to log all events received. Add code *
        * here to log the signature and body to db or file       */

        if (!$signature) {
            // only a post with rave signature header gets our attention
            exit();
        }

        // Store the same signature on your server as an env variable and check against what was sent in the headers
        $local_signature = getenv('SECRET_HASH');

        // confirm the event's signature
        if( $signature !== $local_signature ){
        // silently forget this ever happened
        exit();
        }

        http_response_code(200); // PHP 5.4 or greater
        // parse event (which is json string) as object
        // Give value to your customer but don't give any output
        // Remember that this is a call from rave's servers and 
        // Your customer is not seeing the response here at all

        $response = json_decode($body);
        if ($response->body->status == 'successful') {
            # code...
            // Update your database and set the transaction status to successful
        }
        exit();
    }
   
    public function_card_tokenization(){
        
    }

}