<?php

class query3 extends CI_Model {
    public function createProject(){
        if($this->input->post('areaName',TRUE)==''){
            if($this->input->post('currentProjects',true)==''){
                return !true;
            }else{
                $areaName=$this->input->post('currentProjects',true);
            } 
        }else{
            $areaName=$this->input->post('areaReference',true);
        }

        if($this->session->userdata('status')=='root'){
            $userId = 0;
        }else{
            $userId = $this->session->userdata('userId');
        }

         $checkAreaName= !true; $checkAreaReference= !true; $checkRoadReference= !true; $checkSiteReference= !true;
         $q1 = $this->db->query("SELECT DISTINCT areaName FROM site ");
         $q2 = $this->db->query("SELECT DISTINCT areaReference FROM site ");
         $q3 = $this->db->query("SELECT DISTINCT roadReference FROM site ");
         $q4 = $this->db->query("SELECT DISTINCT siteReference FROM site ");

         foreach($q1->result() as $data){
            if($this->input->post('areaName',TRUE)==$data->areaName){
                $checkAreaName= true; 
            }
         }
         foreach($q2->result() as $data){
            if($this->input->post('areaReference',TRUE)==$data->areaReference){
                $checkAreaReference= true; 
            }
         }
         foreach($q3->result() as $data){
            if($this->input->post('roadReference',TRUE)==$data->roadReference){
                $checkRoadReference= true; 
            }
         }
         foreach($q4->result() as $data){
            if($this->input->post('siteReference',TRUE)==$data->siteReference){
                $checkSiteReference= true; 
            }
         }


        if($checkAreaName==true && $checkAreaReference==true && $checkRoadReference==true && $checkSiteReference==true){
            return !true;
        }else{
            $inserProjectdata=array(
                'areaName'=>$areaName,
                'location'=>$this->input->post('location',TRUE),
                'areaReference'=>$this->input->post('areaReference',TRUE),
                'roadReference'=>$this->input->post('roadReference',TRUE),
                'siteReference'=>$this->input->post('siteReference',TRUE),
                'pavingType'=>$this->input->post('pavingType',TRUE),
                'userId'=>$userId
            );
            return $this->db->insert('site',$inserProjectdata);
        }
    }

    public function form(){
        $areaName= $_GET['areaName'];
        return $this->db->query("SELECT * FROM resourcemaster WHERE areaName='$areaName' ");
    }
    public function inputKeyActivities(){
        $inputKeyActivities=array(
            'keyActivities'=>$this->input->post('keyActivity',TRUE),
        );
        return $this->db->insert('workingProgressValue',$inputKeyActivities);
    }

    public function getCurrentProject(){
        if($this->session->userdata('status')=='root'){
            return $this->db->query("SELECT DISTINCT areaName from site");
        }else{
            $userId = $this->session->userdata('userId');
            return $this->db->query("SELECT DISTINCT areaName from site WHERE userId='$userId' and siteId>1 ");
        }    
    }

    public function getCreatedSiteDetails(){
        return $this->db->query("SELECT * from site order by siteId desc limit 1");
    }
}