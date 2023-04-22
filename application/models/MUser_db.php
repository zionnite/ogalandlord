<?php
class MUser_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

     public function getAllMuser(){
        $this->db->where('status','m_user');
        $query   = $this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        } 
        return false;
    }

     public function getDisMuserDownline($user_id){
        $this->db->where('m_ref', $user_id);
        $this->db->where('status','m_user');
        $query   = $this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result_array();
        } 
        return false;
    }

    public function dUser($user_id){
        $data       = array();

        
        
        $downId     = $this->getDescendant($user_id);
        if($downId != false){
            $this->dUser($downId);

            $data   = array('id'=>$downId);
        }else{
            $data   = array('id'=>$downId);
        }

        print_r($data);
    }

    public function getDescendant($user_id){
        $this->db->where('m_ref', $user_id);
        $this->db->where('status','m_user');
        $this->db->order_by('id','asc');
        $query   = $this->db->get('users');
       
        $i=0; 
        
        $desend = array();
        if($query->num_rows() > 0){
            // foreach(array_reverse($query->result_array()) as $row){
            foreach($query->result_array() as $row){
                $id         = $row['id'];
                $desend = array('id'=>$id);
                
                $this->getDescendant($id);                
            }
        } 
        return $desend;
    }

    public function getAncestory($user_id, $tree, $max_depth = 1000, $depth = 1) {

        $this->db->where('id', $user_id);
        $this->db->where('status','m_user');
        $query = $this->db->get('users');
               
        if ($query->num_rows() > 0) {
            $user = $query->result_array()[0];

            if (isset($user['m_ref']) && $depth <= $max_depth) {
                $user_id = $user['m_ref'];


                array_push($tree, $user_id);
                // this is why. either pass by reference &$tree or update the object each time it runs
                $tree = $this->getAncestory($user_id, $tree, $max_depth, $depth + 1);
            }// continue
        } //wait

        return $tree;
    }

    public function getAncestoryPayable($user_id) {
        $results = [];
        $ancestors = $this->getAncestory($user_id, [], 4);

        for ($i = 0; $i < 4 && $i < count($ancestors); $i++) {
            switch($i +  1) {
                case 1:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 20]);
                    break;
                case 2:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 10]);
                    break;
                case 3:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 5]);
                    break;
                case 4:
                    array_push($results, ['id'=>$ancestors[$i], 'percentage'=> 2]);
                    break;
            }
        }

        return $results;
    }


    //Start API
    public function getMPayableBalance($user_id){
        $this->db->where('id',$user_id);
        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['m_payable_balance'];
            }
        }
        return 0;
    }
    
    public function getMTotalBalance($user_id){
        $this->db->where('id',$user_id);
        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['m_total_balance'];
            }
        }
        return 0;
    }

    public function countDirectDownline($user_id){
        $this->db->where('m_ref',$user_id);
        return $this->db->from('users')->count_all_results();
    }


    public function check_if_i_subscribe($user_id,$plan_code){
        $this->db->where('user_id',$user_id);
        $this->db->where('plan_code',$plan_code);

        $query   =$this->db->get('subscriber_list');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }

    public function get_plan_image_by_plan_code($plan_code){
        $query      = $this->db->get('subscription_plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['plan_image'];
            }
        }
        return false;
    }

    public function totalAmountEarned($user_id){
        $query      = $this->db->get('users');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['m_total_balance'];
            }
        }
        return 0;
    }
}