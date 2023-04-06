<?php
class Cron_job extends My_Controller
{
    private $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI    = &get_instance();
        $this->CI->load->model('Admin_db');
    }

    public function match_partners($user, $partner,  $random_b, $get_random_prayer)
    {
        $user_id_x          = $user['user_id'];
        $user_id_y          = $partner['user_id'];
        $time               = time();
        $expire_date        = date('Y-m-d H:i:s', strtotime('+7 day'));

        $data_x     = array(
            'my_id' => $user_id_x,
            'partner_id' => $user_id_y,
            'date_created' => date('Y-m-d'),
            'month' => date('M'),
            'day' => date('d'),
            'year' => date('Y'),
            'time' => $time,
            'expire_date' => $expire_date,
        );
        $this->db->set($data_x);
        $this->db->insert('pb_partner');
        
        //history
        $data_x     = array(
            'my_id' => $user_id_x,
            'partner_id' => $user_id_y,
            'date_created' => date('Y-m-d'),
            'month' => date('M'),
            'day' => date('d'),
            'year' => date('Y'),
            'time' => $time,
            'expire_date' => $expire_date,
        );
        $this->db->set($data_x);
        $this->db->insert('partner_history');
        

        $this->notify_partner_match($user);
        //update user
        $this->update_user($user, $random_b, $get_random_prayer);

    }

    public function notify_partner_match($user)
    {
        $user_id_x           = $user['user_id'];
        $fname_x             = $user['full_name'];
        $email_x             = $user['email'];
        $fcm_token_x         = $user['fcm_token'];
        $apn_token_x         = $user['apn_token'];

        
        //drop message x
        $data  = array(
            'name' => $fname_x,
            'email' => $email_x,
            'message' => 'You have a new prayer partner, open app to see detail',
            'date' => date('Y-m-d'),
            'time' => time(),
            'status' => '0',
            'app_status' => '0',
            'fcm_token' => $fcm_token_x,
            'apn_token' => $apn_token_x,
            'user_id' => $user_id_x,
            'subject' => 'New Match',
            'image'=>'null',
            'is_image'=>'false',
        );
        
        $this->db->set($data);
        $this->db->insert('app_message');
    }

    public function update_user($user, $random_b, $get_random_prayer){
        $user_id_x           = $user['user_id'];
        $fname_x             = $user['full_name'];
        $email_x             = $user['email'];
        $fcm_token_x         = $user['fcm_token'];
        $apn_token_x         = $user['apn_token'];

                //drop message x
        $data  = array(
            'prayer' => $get_random_prayer,
            'channel' => $random_b,
        );
                
        $this->db->set($data);
        $this->db->where('user_id',$user_id_x);
        $this->db->update('user_detail');

        
    }

    public function system_auto_match($loop = 0)
    {
        //1) get top 1 umatched user
        $user =   $this->CI->Admin_db->get_unmatched_user();

        if (isset($user)) {
            //2) get top 1 umatched user excluding user from step 1
            $partner =   $this->CI->Admin_db->get_unmatched_user((int)$user['user_id']);

            if (isset($partner)) {
                //3) join partners

                $random_a         = random_string('alnum', 16);
                $random_b         = $user['user_id'].$random_a.$partner['user_id'];
                $get_random_prayer  = $this->Admin_db->get_random_prayer();


                $this->match_partners($user, $partner, $random_b, $get_random_prayer);
                $this->match_partners($partner, $user, $random_b, $get_random_prayer);

                //4) loop to search next match
                if ($loop <= 100) return $this->system_auto_match(++$loop);
            }
        }
    }


    public function system_auto_delete_match()
    {

        $result      = $this->Admin_db->get_all_matched_users();
        if (is_array($result)) {
            foreach ($result as $row) {
                $id              = $row['id'];
                $my_id           = $row['my_id'];
                $partner_id      = $row['partner_id'];
                $date_created    = $row['date_created'];
                $expire_date     = $row['expire_date'];
                $time            = $row['time'];
                
                $is_expired = time() >= strtotime($row['expire_date']);
                if ($is_expired) {
                    //delete association from the db
                    $this->Admin_db->remove_expired_user_from_list($id, $my_id, $partner_id);
                }
            }
        }
    }

    public function system_auto_match_email_notify()
    {

        $this->load->library('email');

        $site_email             = $this->Admin_db->get_site_email();
        $get_site_name          = $this->Admin_db->get_site_name();
        $get_site_g_name        = $this->Admin_db->get_site_g_name();
        $get_site_g_pass        = $this->Admin_db->get_site_g_pass();

        $current_domain         = $_SERVER['SERVER_NAME'];

        $config = array(
            'protocol' => 'ssmtp',
            'smtp_host'    => 'ssl://ssmtp.googlemail.com',
            'smtp_port'    => '465',
            'smtp_timeout' => '7',
            'smtp_user'    => $get_site_g_name,
            'smtp_pass'    => $get_site_g_pass,
            'charset'    => 'utf-8',
            'newline'    => "\r\n",
            'mailtype' => 'html', // or html
            'validation' => FALSE
        ); // bool whether to validate email or not      


        $this->email->set_mailtype("html");
        $this->load->initialize($config);

        $result      = $this->Admin_db->get_all_unread_message_by_limit_200(); //come back

        // print_r($result);
        if (is_array($result)) {
            foreach ($result as $row) {
                $this->email->clear();



                $id                 = $row['id'];
                $user_id            = $row['user_id'];
                $name               = $row['name'];
                $dis_email              = $row['email'];
                $subject            = $row['subject'];
                $message            = $row['message'];
                $time               = $row['time'];
                $date_created       = $row['date'];
                $fcm_token          = $row['fcm_token'];
                $apn_token          = $row['apn_token'];
                $email_status       = $row['status'];
                $image              = $row['image'];
                $is_image           = $row['is_image'];

                /**==========================Now Send Message**/



                $subject    = $get_site_name . ' | ' . $subject;
                $to         = $dis_email;




                $data['title']            = $subject;
                $data['message']        = $message;
                // $data['link']			=$link;
                // $data['link_title']		=$link_title;




                $current_domain 		= $_SERVER['SERVER_NAME'];
                $this->email->from("info@".$current_domain, $get_site_name);
                $this->email->to($to);
                if($is_image == 'true'){
                    $full_path    = base_url().'msg_file/images/'.$image;
                    $this->email->attach($full_path);
                }
                


                $this->email->subject($subject);

                $body   = $this->load->view($this->CI->layout_4, $data, TRUE);
                $this->email->message($body);
                if ($this->email->send()) {
                    //set email status to send

                    
                    $this->Admin_db->reset_user_email_status($id); //come back
                }
            }
        }
    }

    public function system_auto_match_app_notify()
    {


        $result      = $this->CI->Admin_db->get_all_unread_app_message_by_limit_200(); //come back
        if (is_array($result)) {
            foreach ($result as $row) {

                $id                 = $row['id'];
                $user_id            = $row['user_id'];
                $name               = $row['name'];
                $dis_email          = $row['email'];
                $subject            = $row['subject'];
                $message            = $row['message'];
                $time               = $row['time'];
                $date_created       = $row['date'];
                $fcm_token          = $row['fcm_token'];
                $apn_token          = $row['apn_token'];
                $email_status       = $row['status'];
                $image              = $row['image'];
                $is_image           = $row['is_image'];
                $img_link           = base_url().'msg_file/images/'.$image;

                /**==========================Now Send Message**/

                $url = 'https://fcm.googleapis.com/fcm/send';

                // Put your Server Response Key here
                $apiKey = "AAAAm1ge8E8:APA91bHx9_M8dV5mGZZ7wdLG5-bsOHGXNq51ABL7rpLnv-wgF9jHCdGDX251ngM8EAqnlHeBTfeRZPGd7cwrwa8BoxvJlakjBPEzlCliBg44v7-5CbN-CsA7XNhefltjpjn1Sn062Kr-";
                // Compile headers in one variable
                $headers = array(
                    'Authorization:key=' . $apiKey,
                    'Content-Type:application/json'
                );

                // Add notification content to a variable for easy reference
                $notifData = [
                    'title' => $subject,
                    'body' => $message,
                    'image' => $img_link,
                    'notifyType' => 'insight',
                    'isImage' => $is_image,
                    'click_action' => "FLUTTER_NOTIFICATION_CLICK",
                    "content_available" => true,
                ];

                $apnData  = array(
                    'headers' => array(
                        'apns-priority' => 5,
                        "apns-expiration" => 0,
                        "apns-collapse-id" => 5,
                    ),
                    'payload' => array(
                        'aps' => array(
                            'alert'  => array(
                                'title'     => 'het',
                                'body'      => 'move',
                                "content-available" => 1,
                            ),
                            // 'content-available' => true,
                            'category' => 'FLUTTER_NOTIFICATION_CLICK',

                            "mutable_content" => 1,
                            "sound" => 'default',
                            "badge" => 5,
                            "category" => "FLUTTER_NOTIFICATION_CLICK",
                            "content-available" => 1,
                        ),
                    ),
                );

                $android = array(
                    'priority' => 'high',
                    'ttl' => 0,
                    'collapseKey' =>  "5",

                );

                // Create the api body
                $apiBody = [
                    'notification' => $notifData,
                    'data' => $notifData,
                    'apns' => $apnData,
                    'android' => $android,
                    //'time_to_live' => 0, 
                    'to' => $fcm_token,
                ];



                // Initialize curl with the prepared headers and body
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

                // Execute call and save result
                $response = curl_exec($ch);

                // Close curl after call
                curl_close($ch);
                $return_msg  = json_decode($response, true);
                $status     = $return_msg['success'];

                if ($status == '1') {
                    //set app_status
                    $this->CI->Admin_db->reset_user_app_status($id); //come back
                }
            }
        }
    }



    ///usr/bin/curl https://legitcrypto.bigzhosting.website/v1/Calculate/system_auto_calculate
}