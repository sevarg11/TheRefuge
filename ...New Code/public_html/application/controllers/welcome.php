<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
      parent::__construct();
    }

	public function index()
	{
        $this->load->helper(array('form'));

		$this->load->view('header');
		$this->load->view('welcomeView');
		$this->load->view('footer');
	}
}

?>

