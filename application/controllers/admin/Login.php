<?php 
/**
  * 
  */
 class Login extends MY_Controller
 {
 	
 	function index()
 	{
 		$this->load->library('form_validation');
 		$this->load->helper('form');
 		if($this->input->post())
 		{
 			$this->form_validation->set_rules('login','login','callback_check_login');
 			if($this->form_validation->run())
 			{
 				$this->session->set_userdata('login',true);
 				
 				redirect(admin_url('home'));
 			}

 		}
 		$this->load->view('admin/login/index');
 	}

 	//Kiểm tra username va password co chinhxac ko

 	function check_login()
 	{
 		$username=$this->input->post('username');
 		$password=$this->input->post('password');
 		$password=md5($password);

 		$this->load->model('admin_model');
 		// $where = array('username' =>$username,'password'=>$password);
 		// if($this->admin_model->check_exists($where))
 		// {
 		// 	return true;
 		// }
 		$where=array(
 			'username'=>$username,
 			'password'=>$password,
 		);
 		$admin=$this->admin_model->get_info_rule($where);
 		if($admin)
 		{
 			$this->session->set_userdata('permissions',json_decode($admin->permissions));
 			$this->session->set_userdata('admin_id',$admin->id);
 			return true;
 		}
 		$this->form_validation->set_message(__FUNCTION__,'Không đăng nhập thành công');
 		return false;
 	}
 } ?>