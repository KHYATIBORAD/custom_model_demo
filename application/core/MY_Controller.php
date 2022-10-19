<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $css;
	protected $js;

	public function __construct(){
		parent::__construct();
		$data['css'] = load_css(['bootstrap.min.css']);
		$data['js'] = load_js(['jquery-3.6.1.js','bootstrap.min.js']);
		$this->load->vars($data);
	}

	public function index()
	{	
	}
}

/* End of file mY_Controll.php */
/* Location: ./application/controllers/mY_Controll.php */