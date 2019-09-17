<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller2 extends CI_Controller {
    public function newProject(){
        $this->load->model('query3');
        $response = $this->query3->getCurrentProject();
        if($response){
            $data['currentProject']=$response; 
                $this->load->view('newProject',$data); 
        }else{

        }
       
    }
    public function createProject(){
        $this->load->model('query3');
        $response = $this->query3->createProject();
        if($response){
            $this->load->model("query3");
            $response2 = $this->query3->getCreatedSiteDetails();
            if($response2){
                foreach($response2->result() as $sites){    
                    redirect(base_url('index.php').'/welcome/form?siteId='.$sites->siteId.'&areaName='.$sites->areaName.'&siteReference='.$sites->siteReference.'&areaReference='. $sites->areaReference.'&roadReference='.$sites->roadReference.'&pavingType='.$sites->pavingType);
                }  
            }  
        }else{
            $this->session->set_flashdata('createProjectError','The Site Al');
        }
    }
    public function inputKeyActivities(){
        $this->load->model('query3');
        $response = $this->query3->inputKeyActivities();
        if($response){
            redirect(base_url('index.php').'/'.$this->input->post('currentUrl'));
        }
    }
}   