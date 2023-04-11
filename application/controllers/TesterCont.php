<?php 
class TesterCont  extends My_Controller{

    public function __construct(){
        parent::__construct();
        
    }

    public function index() {
        $user_id = 42;
        $currentTimestamp = time();
        // get from database lastRunTimestamp
        $users        = $this->MUser_db->getAncestory($user_id, [], 4);

        $total_amount = 10000; 
        // accept total amount to platform = getTotalPayments($user_id, $currentTimestamp) 
        // where : date >= $lastRunTimestamp & date < $currentTimestamp)

        if ($total_amount > 0) {
            // update database with lastRunTimestamp = $currentTimestamp

            // method to get ancestors up to 4th level, also expanded with corresponding pecentage
            $payables    = $this->MUser_db->getAncestoryPayable($user_id);

            // print_r($payables);
            // method that pays percentage to each ancestor
            // pseudo creditAncestor on percentage of total amount

            foreach ($payables as $payable) {
                $user_id = $payable['id'];
                $amount = $total_amount * ($payable['percentage']/100);
                // call database to credit ancestor wallet, remember to save user id somewhere for traciability
            }
        }
    }
}

/*
lastRun = 20230401
today = 20230411

date >= today and <= today | 20230401 - 20230411 15:46

today = nextrun = 20230423

date >= today and <= today | date >= 20230411 and date <= 20230423

*/