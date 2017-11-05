<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	/**
     * Function to check if user already exists
     */
	
	function get_settings() {
		$query = $this->db->get('settings');
		return $query->row();
	}
	
	function update_settings() {
		$data = $this->input->post(null, true);
		$id = $data['id'];
		unset($data['id']);

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('settings');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		
		return true;
	}
	 
    function check_username($username){
        $this->db->where('username',$username);
        $res = $this->db->get('admins');
        if($res->num_rows() == 1){
            return true;
        }else return false;
    }
	
	function check_hash($hash){
		$this->db->where('hash', $hash);
		$query = $this->db->get('activation');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function set_ip_invalid_attempts(){
		$ip = $this->input->ip_address();
		$this->db->where('ip', $ip);
		$query = $this->db->get('ip_attempts');
		if($query->num_rows() > 0){
			$this->db->set('ip', $ip);
			$this->db->set('invalid_attempts','invalid_attempts + 1', false);
			$this->db->update('ip_attempts');
		}else{
			$this->db->set('ip', $ip);
			$this->db->set('invalid_attempts','1');
			$this->db->insert('ip_attempts');
		}
	}
	
	function get_ip_invalid_attempts(){
		$this->db->where('ip', $this->input->ip_address());
		$this->db->where('invalid_attempts >=', '3');
		$this->db->where('DAY(updated_at)', 'DAY(NOW())', false);
		$query = $this->db->get('ip_attempts');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function update_password() {
		$new_password = $this->input->post('new_password');
		$this->db->set('password', hash_password($new_password));
		$this->db->where('id', $this->session->userdata('admin')['id']);
		$this->db->update('admins');
		return true;
	}
	
	function forgot_password_update($hash, $password){
		$this->db->where('hash', $hash);
		$query = $this->db->get('activation');
		$user_hash = $query->row('user_hash');
		
		$this->db->set('password', $password);
		$this->db->where('sha1(concat(hex(id_bin),UNIX_TIMESTAMP(regdate),regip))',$user_hash);
		$this->db->update('admins');
		
		$this->db->where('hash', $hash);
		$this->db->delete('activation');
		return true;
	}
	
	function forgot_password_hash(){
		$this->db->select('*, sha1(concat(hex(id_bin),UNIX_TIMESTAMP(regdate),regip)) as hash');
		$this->db->where('username',$this->input->post('username'));
		$query = $this->db->get('admins');
		$result = $query->row();
		return array(
					'hash'=>$this->insert_activation_code($result->hash),
					'email'=>$result->email
				);
	}
	
	/**
     * Function to check if user already exists
     */
    function check_email($email){
        $this->db->where('email',$email);
        $res = $this->db->get('admins');
        if($res->num_rows() == 1){
            return true;
        }else return false;
    }
	
	/**
     * Function to check if user already exists
     */
    function is_banned($username){
        $this->db->where('username',$username);
        $query = $this->db->get('admins');
        if($query->num_rows() == 1){
            return $query->row('banned');
        }else return false;
    }
	
	function is_active($username){
        $this->db->where('username',$username);
        $query = $this->db->get('admins');
        if($query->num_rows() == 1){
            return $query->row('active');
        }else return false;
    }
	
	/**
     * Function to check if user already exists
     */
    function get_level($username){
        $this->db->where('username',$username);
        $query = $this->db->get('admins');
        if($query->num_rows() == 1){
            return $query->row('level');
        }else return false;
    }
	
	/**
     * Function to check if user already exists
     */
    function get_userdata($username){
        $this->db->where('username',$username);
        $query = $this->db->get('admins');
        if($query->num_rows() == 1){
            return $query->row_array();
        }else return false;
    }
	
	/**
     * Function to check if user already exists
     */
    function get_password_hash(){
        $this->db->where('id',$this->session->userdata('admin')['id']);
        $query = $this->db->get('admins');
        if($query->num_rows() > 0){
			return $query->row('password');
        }else return false;
    }
	
	/**
     * Function to check if user already exists
     */
    function login($username){
        $this->db->where('username',$username);
		$this->db->where('is_deleted','0');
        $query = $this->db->get('admins');
        if($query->num_rows() > 0){
			$result = $query->row();
			if($result->level == '1'){
				$this->db->where('user_id',$result->id);
				$this->db->where('is_deleted','0');
				if($this->db->get('reseller')->num_rows() > 0){
					return $result->password;
				}else return false;
			}else{
				return $result->password;
			}
        }else return false;
    }
	
	/**
     * Function to create user if user does not already exist
     */
    function create_user(){
        $user_info = array(
          'username' => $this->input->post('username'),  
          'password' => hash_password($this->input->post('password')),
          'email' => encrypt($this->input->post('email')),
          'icq' => '',
		  'balance' => '0.00',
		  'moneyspent' => '0.00',
		  'active'=>'1',
          'regip' => $this->input->ip_address(),
          'lastip' => $this->input->ip_address(),
          'level' => '0'
        );
		$this->db->set('regdate','now()',false);
		$this->db->set('lastlogin','now()',false);
		$this->db->set($user_info);
        $query = $this->db->insert('admins');
		
		$id = $this->db->insert_id();
		return $this->insert_activation_code($id);
    }
	
	function insert_activation_code($id){
		$uniqid = uniqid($id, true);
		$data = array(
					'user_id' => $id,
					'uniqid' => $uniqid,
					'hash' => sha1($uniqid)
				);
		$this->db->set($data);
		$this->db->set('date_added','now()',false);
		$query = $this->db->insert('activation');
		if($query){
			return sha1($uniqid);
		}else{
			return false;
		}
	}
	
	function activate_account($hash){
		$this->db->where('hash',$hash);
		$query = $this->db->get('activation');
		if($query->num_rows() > 0){
			$row = $query->row();
			$this->db->set('active','1');
			$this->db->where('sha1(concat(hex(id_bin),UNIX_TIMESTAMP(regdate),regip))',$row->user_hash);
			$this->db->update('admins');
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	/**
     * Function to create user if user does not already exist
     */
    function insert_login_activity($id){
        $data = array(
			'user_id' => $id,
			'ip' => $this->input->ip_address(),  
			'platform' => $this->agent->platform(),
			'referrer' => $this->agent->referrer(),
			'robot' => $this->agent->robot(),
			'mobile' => $this->agent->mobile(),
			'browser' => $this->agent->browser(),
			'version' => $this->agent->version(),
			'useragent' => $this->agent->agent_string()
        );
		$this->db->set($data);
        $query = $this->db->insert('activity_logs');
        
        if($query){
            return true;
        }else{
            return false;
        }   
    }
    
    /**
     * Function to authenticate user upon login request
     */
    function authenticate(){
        $data = array(
            "account_number" => $this->input->post('account_number'),
            "password" => encrypt_password($this->input->post('password')),
            "status >= " => 2
        );
        $select = 'account_number,status';
        $query = $this->db->select($select)->from('auth_details')->where( $data )
                      ->get();
        //echo "<pre>".$this->db->last_query(); var_dump($query->row()); die;
        if($query->num_rows == 1 ){
            // return user data instead of TRUE so that you don't query DB for data again from controller
            return $query->row(); 
        }else{
            return false;
        }
    }
    
    
    /**
     * Function to check if user already exists
     */
    function check_existence($id){
        $this->db->where('phone',$id);
        $res = $this->db->get('user_login');
        if($res->num_rows() == 1){
            return true;
        }else return false;
    }
    
      /**
     * Function to check if user does not exist
     */
    function check_existence2($id){
        $this->db->where('phone',$id);
        $res = $this->db->get('user_login');
        if($res->num_rows() == 1){
            return false;//it exist in the database
        }else return true;//phone does not exist in the database
    }
    
    /**
     * Function to assigns intiall sms credit of 5 for testing purpose by new user
     */
    function assign_test_credit($id){
        $data=array(
            'user_id'=>$id,
            'balance'=>5
        );
        if($this->db->insert('account_balance',$data)){
            return true;
        }else return false;
    }

    
       /**
     * Function to user's name which is used in the welcome message
     */
      function fetch_name(){
        $username = $this->input->post('username');
        //$query = $this->db->query('SELECT name, title, email FROM my_table');
        
        $this->db->select('firstname,lastname');
        $this->db->where('user_login.phone', $username);
        $this->db->from('user_info');
        
        $this->db->join('user_login','user_info.phone = user_login.phone');
        
        $query = $this->db->get();
        foreach($query->result() as $row){
            
            $name = $row->firstname ;
            
            return $name;
        }

    }
    
        /**
     * Function to fetch the user's email address
     */
        function fetch_email(){
            
            $phone = $this->input->post('phone');
            $this->db->select('email');
            $this->db->where('phone', $phone);
            $this->db->from('user_info');
            
            $query = $this->db->get();
            
            foreach($query->result() as $row){
            
            $email = $row->email ;
            
            return $email;
        } 
      }
      
           /**
     * Function to reset the user's password
     */
         function change_password(){
             $phone = $this->input->post('phone');
             //$password = 'hello'd95367              
             $password = substr(md5(time()), 10, 6);//get six characters for the password
             $n_passowrd = md5(crypt($password,  $this->salt));
             $data = array(
            'password' => $n_passowrd     
        );

      $this->db->where('phone', $phone);
      $this->db->update('user_login', $data);
      
      return $n_passowrd;  
    } 
    /**
     * Function to check if password fo ra particular email is in the database
     */
    function check_password($pass){
        //encrypt the password entered
        $encryted_pass =  md5(crypt($pass, $this->salt));
        $this->db->where('phone',$this->session->userdata('username'));
        $this->db->where('password',$encryted_pass);
        $res = $this->db->get('user_login');
        if($res->num_rows() == 1){
            return true;
        }else return false;
    }
    /**
     * Fetch the list of all system admins - Officers and clients
     */
    public function fetch_users(){
        $this->db->select('name,phone,email,address,access_level');
        $this->db->from('admins');
        $this->db->join('user_login','user_login.username = admins.username');
        $query = $this->db->get();
        return $query->result();
    }
     /**
     * Function to reset the user's password
     */
	function recover_password(){
		$phone = $this->input->post('phone');
		//$password = 'hello'd95367              
		$password = substr(md5(time()), 10, 6);//get six characters for the password
		$n_passowrd = md5(crypt($password,  $this->salt));
		$data = array(
					'password' => $n_passowrd     
				);

      $this->db->where('phone', $phone);
      $this->db->update('user_login', $data);
      
      return $n_passowrd;  
    } 
}
?>
