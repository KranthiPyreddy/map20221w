<?php
	class register extends Controller{
		public function index() {
			$this ->view('register/registerIndex');
			die;
		}

		public function verify () {
       	 	$username = $_POST['username'];
        	$password = $_POST['password'];
			
			$model = $this->model('User');
			$numberRows = $model->user_exists($username);
			if($numberRows > 0){
			echo 'Sorry Username already taken <br><br>';

  			$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  			echo "<a href='$url'>Previous Page</a>"; 
			}
			else if(!empty($username) && !empty($password) && !is_numeric($username))
			{
			$password = password_hash("$password", PASSWORD_DEFAULT);
			$model->insert_new_user($username,$password);
 			$this->view('login/index');
 			die;
    		}
			else {
				echo "<b>You shoud not enter numeric values for Username 
				🤡 Please Check and try again</b>";
			}
	
	}
	}
	
	
