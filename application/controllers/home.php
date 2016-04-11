<?php class Home extends CI_Controller{


	public function __construct(){

		parent::__construct();

	}


	public function index(){

		$data = array(

					'allUserVsUnit' => $this->allUserVsUnit(),
					'allLocationVsUnit' => $this->allLocationUnit(),
					'allGarbageVsUnit'	=> $this->allGarbageVsUnit()
			);

		$this->load->view('includes/header');
		$this->load->view('home/index',$data);
		$this->load->view('includes/footer');

	}


	

	public function allGarbageVsUnit(){



		$garbageWithUnit = json_decode(file_get_contents("http://localhost:8000/api/getGarbageUnitAll"));

		return $garbageWithUnit;

	}


	public function allUserVsUnit(){

		//calls data of all users and their consumption unit

		$userWithUnit = json_decode(file_get_contents("http://localhost:8000/api/getUserUnitAll"));

		return $userWithUnit;

	}


	public function allLocationUnit(){

		$locationWithUnit = json_decode(file_get_contents("http://localhost:8000/api/getLocationUnitAll"));

		return $locationWithUnit;

	}




}