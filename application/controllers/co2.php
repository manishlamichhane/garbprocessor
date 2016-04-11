<?php class Co2 extends CI_Controller{

	private $carbonRate;

	public function __construct(){

		parent::__construct();

		# kg of co2 equivalent

		$this->carbonRate = array(

				'Plastic Bags' => '6.0',
				'Plastic Bottles' => '6.0',
				'Glass Bottle' => '0.6',
				'Glass Utensils' => '0.5',
				'Bio Waste' =>'1.2',
				'1 litre' => '0.875',
				'1.5 litre' => '0.562',
				'Large Pizza cover' => '0.972',
				'Medium Pizza cover' => '0.682',
				'Small Pizza cover' => '0.432',
				'Newspaper' => '0.35',
				'Office Paper'=> '0.25'

			);

	}


	public function index(){
	
		$data = array(

					'allUserVsUnit' => $this->allUserVsCarbonUnit(),
					'allLocationVsUnit' => $this->allLocationVsCarbonUnit(),
					'allGarbageVsUnit'	=> $this->allGarbageVsCarbonUnit()
			);

		$this->load->view('includes/header');
		$this->load->view('co2/index',$data);
		$this->load->view('includes/footer');		
		

	}


	public function allUserVsCarbonUnit(){

		//calls data of all users and their consumption unit

		$userWithUnit = json_decode(file_get_contents("http://localhost:8000/api/getUserUnitAll"));

		return $userWithUnit;

	}

	public function allLocationVsCarbonUnit(){

		//calls data of all users and their consumption unit

		$userWithUnit = json_decode(file_get_contents("http://localhost:8000/api/getLocationUnitAll"));

		return $userWithUnit;

	}

	public function allGarbageVsCarbonUnit(){

		$garbageWithUnit = json_decode(file_get_contents("http://localhost:8000/api/getGarbageUnitAll"));

		foreach($garbageWithUnit as $garb ){

			$garb->co2 = $this->carbonRate[$garb->garbage_type_name] * $garb->garbage_unit;

		}

		return $garbageWithUnit;


	}


}