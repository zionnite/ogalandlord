<?php
class Chat_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }


   public function add_to_chat_online_tracker($user_id){
        $data       = array('user_id'=>$user_id,'time'=>time());
        $this->db->set($data);
        $this->db->insert('chat_tracker');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

   public function remove_from_chat_online_tracker($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->delete('chat_tracker');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }

    public function check_if_user_exist_in_chat_tracker($user_id){
        $this->db->where('user_id',$user_id);
        $query  =$this->db->get('chat_tracker');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
   }


   public function get_chat($sender_id,$reciever_id){
        $this->db->where('sender',$sender_id);
        $this->db->where('reciever',$reciever_id);

        $this->db->or_where('sender',$reciever_id);
        $this->db->where('reciever',$sender_id);

        $this->db->order_by('id','desc');

        $query      =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function check_if_user_head_exist($sender_id,$reciever_id,$props_id){
        $this->db->where('my_id',$sender_id);
        $this->db->where('user_id',$reciever_id);
        $this->db->where('props_id',$props_id);

        // $this->db->or_where('my_id',$reciever_id);
        // $this->db->where('user_id',$sender_id);

        $query      =$this->db->get('chat_head');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
   }

   //delete_chat_head
   public function remove_from_chat_head($my_id,$user_id,$props_id){
        $this->db->where('my_id',$my_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('props_id',$props_id);

        $this->db->or_where('my_id',$user_id);
        $this->db->where('user_id',$my_id);
        $this->db->where('props_id',$props_id);

        $this->db->delete('chat_head');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
   }
   public function create_chat_head($sender_id,$reciever_id,$props_id){
        if($this->check_if_user_head_exist($sender_id,$reciever_id,$props_id) == false){
            $data       =array('my_id'=>$sender_id,'user_id'=>$reciever_id,'props_id'=>$props_id);
            $this->db->set($data);
            $this->db->insert('chat_head');
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
        }else{
            //delete
            $this->remove_from_chat_head($sender_id,$reciever_id,$props_id);
            $this->create_chat_head($sender_id,$reciever_id,$props_id);
        }

   }
   public function add_to_chat($sender_id,$reciever_id,$msg_body,$props_id){
        $data       =array('sender'         =>$sender_id,
                           'reciever'       =>$reciever_id,
                           'message'        =>$msg_body,
                           'time'           =>time(),
                           'date_created'   =>date('Y-m-d H:i:s'),
                           'props_id'       =>$props_id,
                           'sender_status'  => 'read',
        );

        $this->db->set($data);
        $this->db->insert('chat_box');
        if($this->db->affected_rows() > 0){

            //create chat head
            $this->create_chat_head($sender_id,$reciever_id,$props_id);
            $this->create_chat_head($reciever_id,$sender_id,$props_id);
            return true;
        }
        return false;
   
   }

   public function count_unread_message($user_id){
        return $this->db->from('chat_box')
            ->where('reciever',$user_id)
            ->where('reciever_status','unread')
            ->count_all_results();
   }



   public function get_unread_chat($sender_id){
        $this->db->where('reciever',$sender_id);
        $this->db->where('reciever_status','unread');

        $this->db->order_by('id','desc');

        $query      =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function get_unread_chat_limit_by_1($sender_id){
        $this->db->where('reciever',$sender_id);
        $this->db->where('reciever_status','unread');

        $this->db->limit(1);
        $this->db->order_by('id','desc');

        $query      =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['message'];
            }
        }
        return false;
   }

   public function count_message($sender_id,$reciever_id){
        $this->db->where('sender',$sender_id);
        $this->db->where('reciever',$reciever_id);

        $this->db->or_where('sender',$reciever_id);
        $this->db->where('reciever',$sender_id);
        return $this->db->from('chat_box')->count_all_results();
   }

   public function get_chat_message($sender_id,$reciever_id,$offset,$per_page){
        $this->db->where('sender',$sender_id);
        $this->db->where('reciever',$reciever_id);

        $this->db->or_where('sender',$reciever_id);
        $this->db->where('reciever',$sender_id);

        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);
        $query  =$this->db->get('chat_box');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
   }

   public function update_my_read_count($user_id){
        if($this->check_if_user_exist_in_chat_tracker($user_id)){

            $data   = array('reciever_status' => 'read');
            $this->db->set($data);
            $this->db->where('reciever',$user_id);
            $this->db->update('chat_box');
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
        }
        return false;
   }

   public function count_chat_head($user_id){
        $this->db->where('my_id',$user_id);

        return $this->db->from('chat_head')->count_all_results();
   }
   public function get_chat_head($user_id,$offset,$per_page){
        $this->db->where('my_id',$user_id);

        $this->db->order_by('id','desc');
        $this->db->limit($per_page,$offset);
        $query      =$this->db->get('chat_head');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;

   }

}