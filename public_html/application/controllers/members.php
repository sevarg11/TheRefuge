<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

    function __construct(){
      parent::__construct();
      $this->load->model('member','',TRUE);
    }

    public function index() {

        $members = $this -> member -> getAllMembers();

        $data = array();
        $data['members'] = $members;

        $this->load->view('header');
        $this->load->view('viewMembers', $data);
        $this->load->view('footer'); 
    }

    public function addMember() {
        
        $this->load->view('header');
        $this->load->view('addMember');
        $this->load->view('footer');
    
    }

    public function addMemberVerify(){
        $first = $this->input->post('firstname');
        $middle = $this->input->post('middlename');
        $last = $this->input->post('lastname');
        $birth = $this->input->post('birth');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $school = $this->input->post('school');
        $grade = $this->input->post('grade');
        $email = $this->input->post('email');
        $church = $this->input->post('church');
        $p1 = $this->input->post('parent1');
        $p2 = $this->input->post('parent2');
        $pc1 = $this->input->post('p1phone');
        $pc2 = $this->input->post('p2phone');
        $points =  0;
        
        $this-> member -> addMember($first, $middle, $last, $birth, $address, $phone, $school, $grade, $email, $church, $p1, $p2, $pc1, $pc2, $points);
        redirect('members/addMember', 'refresh');
    }
 
    public function checkIn($id) {
        $member = $this->member->getMemberById($id);

        $data = array();
        $data['member'] = $member;

        $this->load->helper(array('form'));
        
        $this->load->view('header');
        $this->load->view('checkIn', $data);
        $this->load->view('footer');
    }

    public function profile($id) {
        $member = $this->member->getMemberById($id);

        $data = array();
        $data['member'] = $member;

        $this->load->view('header');
        $this->load->view('profile', $data);
        $this->load->view('footer');
    }
}

?>