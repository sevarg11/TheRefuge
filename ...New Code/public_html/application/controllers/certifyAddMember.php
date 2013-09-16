<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CertifyAddMember extends CI_Controller {

 function __construct(){
    parent::__construct();
    $this->load->model('member','',TRUE);
  }

 function index(){

  $userId = $this->input->post('id');
  $checkInType = $this->input->post('type');

  $this->checkin->addCheckIn($userId, $checkInType);

  redirect('members', 'refresh');
 }

 function check_database($password){
   $username = $this->input->post('username');
   $result = $this->admin->login($username, $password);

   if($result){
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
