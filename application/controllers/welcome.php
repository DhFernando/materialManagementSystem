<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	// page routers
	public function registerperson()
	{
		$this->load->view('registerperson');
	}
	
	public function loginpage(){
		$this->load->view('loginpage');
	}
	
	// end page routers
	public function home(){
		$this->load->view('home');
	}

	public function sites(){
		$this->load->model('query');
		$response=$this->query->sites();
		if($response){
			$data['sitesArray']=$response;
			$this->load->view('sites',$data);
		}
	}

	public function form(){
		if($_GET['siteId']==1){
			$this->load->model('query2');
			$response = $this->query2->form();
			if($response){
				$data['form']=$response;
				$this->load->view('forms/form',$data);
			}
		}else{
			$this->load->model('query3');
			$response = $this->query3->form();
			if($response){
				$data['form']=$response;
				$this->load->view('forms/pipeLayingForm',$data);
			}
		}
		
	}

	public function fromInput(){
		$this->form_validation->set_rules('date','date','required');
		
		if(!$this->form_validation->run()){
            
        }else{
			$this->load->model('query');
			if(isset($_GET['areaName'])){
				$response=$this->query->insertworkingCondition($_GET['siteId'],$_GET['areaName'],$_GET['areaReference'],$_GET['roadReference'],$_GET['siteReference'],$_GET['pavingType']);
			}else{
				$_GET['areaName']= "";
				$_GET['areaName']= "";
				$_GET['areaReference']= "";
				$_GET['roadReference']= "";
				$_GET['siteReference']= "";
				$_GET['pavingType']= "";
				$response=$this->query->insertworkingCondition($wId,$_GET['siteId'],$_GET['areaName'],$_GET['areaReference'],$_GET['roadReference'],$_GET['siteReference'],$_GET['pavingType']);
			}
			
			if($response){
				foreach($response->result() as $data){$wId = $data->wId;}
				$this->load->model('query2');
				if(isset($_GET['areaName'])){
					$response2=$this->query2->inputRecords($wId,$_GET['siteId'],$_GET['areaName'],$_GET['areaReference'],$_GET['roadReference'],$_GET['siteReference'],$_GET['pavingType']);
				}else{
					$_GET['areaName']= "";
					$_GET['areaName']= "";
					$_GET['areaReference']= "";
					$_GET['roadReference']= "";
					$_GET['siteReference']= "";
					$_GET['pavingType']= "";
					$response2=$this->query2->inputRecords($_GET['siteId'],$_GET['areaName'],$_GET['areaReference'],$_GET['roadReference'],$_GET['siteReference'],$_GET['pavingType']);
				}
				if($response2){
					if($_GET['siteId']==1){
						$this->load->model('query2');
						$response3 = $this->query2->inputWorkingActivities();
						if($response3){
							redirect(base_url('index.php').'/'.$this->input->post('currentUrl'));
						}
					}else{
						$this->load->model('query2');
						$response3 = $this->query2->inputPipeLayingDetails($_GET['siteId'],$wId ,$_GET['areaName']);
						
						if($response3){
							$this->load->model('query2');
							$response4 = $this->query2->inputManholePlacingDetails($_GET['siteId'],$wId,$_GET['areaName']);
							if($response4){
								redirect(base_url('index.php').'/'.$this->input->post('currentUrl'));
							}
						}
					}
				}
			}
		}
	}

	public function inputResource(){
		$this->form_validation->set_rules('type','type','required');
		$this->form_validation->set_rules('unit','unit','required');
		$this->form_validation->set_rules('resource','resource','required');

		if(!$this->form_validation->run()){

		}else{
			$this->load->model('query');
			$response = $this->query->inputResource($_GET['siteId'],$_GET['areaName']);
			if($response){
				redirect(base_url('index.php').'/'.$this->input->post('currentUrl'));
			}
		}

	}
	

	
	public function register(){
		$this->form_validation->set_rules('userName','userName','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('checkpassword','checkpassword','required');

		if(!$this->form_validation->run()){
			redirect('welcome/signup');
		}else{
			$this->load->model('query');
			$response=$this->query->register();
			if($response){
				redirect('welcome/loginpage');
			}else{
				echo "Undone";
			}
		}
	}

	public function login(){
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
		if(!$this->form_validation->run()){
			redirect('welcome/loginpage');
		}else{
			$this->load->model('query');
			$response=$this->query->login();
			if($response){
				$userData=array(
					'userId'=>$response->userId,
					'status'=>$response->status,
					'userName'=>$response->userName,
					'email'=>$response->email,
					'loggedIn'=>TRUE
				);
				$this->session->set_userdata($userData);
				redirect('welcome/home');
			}else{
				$this->session->set_flashdata('logInErrorMzg','Enter Valid Login Details');
				redirect('welcome/home');
			}
		}
	}
	public function logout(){
		$this->session->unset_userdata('userId');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('loggedIn');
		 
		redirect('welcome/home');
	}

	public function siteDirectory(){
		
	}

	public function filter(){
		$this->load->model('query');
		$response=$this->query->filter();

		$data['dateFrom'] = $this->input->get('dateFrom');
        $data['dateTo'] = $this->input->get('dateTo');
		$data['types']=$this->input->get('type');
		
		if($response){
			$data['results']=$response;
			$this->load->model('query');
			$response2 = $this->query->rowData();
			if($response2){
				$data['rowDatas'] = $response2;
				if(!isset($_GET['typeOfRep'])){
					$this->load->view('reports',$data);
				}else{
					$this->load->view('reportsForProject',$data);
				}
				
			}
		}else{
			$this->session->set_flashdata('reportGeneratorErrors','no records yet!!');
			redirect('welcome/ReportGenerator');
		}
	}

	public function filterWorkingActivities(){
		$this->load->model('query2');
		$response=$this->query2->filterWorkingActivities();
		if($response){
			$data['results']=$response;
			$this->load->view('activitiesWork',$data);
		}else{

		}
	}

	public function filterPipeLaying(){
		if($this->input->get('pipeConsumption')==!'checked'){
			$this->load->model('query2');
			$response=$this->query2->filterPipeLaying();
			if($response){
				$data['results']=$response;
				$this->load->view('pipeLaying',$data);
			}else{

			}
		}else{
			$this->load->model('query');
			$response=$this->query->filterPipeLayingConsumption();
			if($response){
				$data['total']=$response;
				$response2=$this->query->filterPipeLayingData();
				if($response2){
					$data['results']=$response2;
					$this->load->view('pipeLayingConsumptionReport',$data);
				}
			}
		}
	}

	public function filterManhole(){
		$this->load->model('query2');
		$response=$this->query2->filterManhole();
		if($response){
			$data['results']=$response;
			$this->load->view('manholeplacingReport',$data);
		}else{

		}
	}

	public function removeField(){
		$this->load->model('query');
		$response = $this->query->removeField($_GET['rId']);
		if($response){
			//redirect(base_url('index.php').'/'.$_GET['prevUrl']);
			echo $_GET['prevUrl']."<br>";
			echo uri_string().'?'.$_SERVER['QUERY_STRING']."<br>";
			echo $_GET['areaName']."<br>";

			redirect(base_url('index.php/welcome/form?siteId='.$_GET['siteId'].'&areaName='.$_GET['areaName'].'&siteReference='.$_GET['siteReference'].'&areaReference='. $_GET['areaReference'].'&roadReference='.$_GET['roadReference'].'&pavingType='.$_GET['pavingType']));
		}
	}
	public function ReportGenerator(){
		$this->load->model('query2');
		$response = $this->query2->ReportGenerator();
		if($response){
			$data['results']=$response;
			$this->load->view('ReportGenerator',$data);
		}else{
			
		}
	}

}
