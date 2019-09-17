<?php

class query extends CI_Model {

    public function sites(){       
        $sitesArray=array();
        $temp = array();
        $temp2 = array();
        if($this->session->userdata('status')=='root'){
            $query= $this->db->query("SELECT DISTINCT areaName FROM site ");
            $query1= $this->db->query("SELECT DISTINCT roadReference FROM site ");
            $query2= $this->db->query("SELECT DISTINCT areaReference FROM site ");
            $query3= $this->db->query("SELECT DISTINCT siteReference FROM site ");
        }else{
            $userId = $this->session->userdata('userId');
            $query= $this->db->query("SELECT DISTINCT areaName FROM site WHERE userId='$userId' ");
            $query1= $this->db->query("SELECT DISTINCT roadReference FROM site WHERE userId='$userId' ");
            $query2= $this->db->query("SELECT DISTINCT areaReference FROM site WHERE userId='$userId' ");
            $query3= $this->db->query("SELECT DISTINCT siteReference FROM site WHERE userId='$userId' ");
        }
            

            foreach($query->result() as $data){
                if($this->session->userdata('status')=='root'){
                    $query4 = $this->db->query("SELECT * FROM site WHERE areaName='$data->areaName' ");
                }else{
                    $userId = $this->session->userdata('userId');
                    $query4 = $this->db->query("SELECT * FROM site WHERE areaName='$data->areaName' and userId='$userId' ");
                }
               
                    foreach($query4->result() as $data2){
                        $subProject = array(
                            'siteId'=>$data2->siteId,
                            'areaName'=>$data->areaName,
                            'location'=>$data2->location,
                            'roadReference'=>$data2->roadReference,
                            'areaReference'=>$data2->areaReference,
                            'siteReference'=>$data2->siteReference,
                            'pavingType'=>$data2->pavingType,
                            
                        );
                        array_push($temp,$subProject);
                    }
                    
                    $temp2 = array(
                        'areaName'=>$data->areaName,
                        'subSites'=>$temp
                    );


                    array_push($sitesArray,$temp2);

                    unset($temp);
                    $temp=array();
                    
                    unset($temp2);
                    $temp2=array();



            }
        return $sitesArray;
    }

    public function insertworkingCondition($siteId,$areaName){
        $varyfDateIsNew = !true;
        $query = $this->db->query("SELECT date FROM workingcondition WHERE siteId='$siteId'");
        foreach($query->result() as $data){
            if($data->date == $this->input->post('date',TRUE) ){
                $varyfDateIsNew = true;
            }
        }
        if(!$varyfDateIsNew){
            if($siteId==1){
                $insert=array(
                    'siteId'=>$siteId,
                    'date'=>$this->input->post('date',TRUE),
                    'TimeFrom'=>$this->input->post('TimeFrom',TRUE),
                    'TimeTo'=>$this->input->post('TimeTo',TRUE),
                    'Temp'=>$this->input->post('Temp',TRUE),
                    'Traffic'=>$this->input->post('Traffic',TRUE),
                    'Humidity'=>$this->input->post('Humidity',TRUE),
                    'Legend'=>$this->input->post('Legend',TRUE),
                    'PublicObligation'=>$this->input->post('PublicObligation',TRUE),
                    
                        
                );
            }else{
                $insert=array(
                    'siteId'=>$siteId,
                    'areaName'=>$areaName,
                    'date'=>$this->input->post('date',TRUE),
                    'TimeFrom'=>$this->input->post('TimeFrom',TRUE),
                    'TimeTo'=>$this->input->post('TimeTo',TRUE),
                    'waterTable'=>$this->input->post('waterTable',TRUE),
                    'groundCondition'=>$this->input->post('groundCondition',TRUE),
                    'rainFall'=>$this->input->post('rainFall',TRUE),     
                );
            }
            
                   $this->db->insert('workingCondition',$insert);
            return $this->db->query("SELECT wId FROM workingcondition ORDER BY wId DESC LIMIT 1");
        }else{
            echo "date alredy Exsist";
        }
        
    }
    
    public function register(){
        $inserUserData=array(
            'status'=>$this->input->post('status',TRUE),
            'userName'=>$this->input->post('userName',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'password'=>$this->input->post('password',TRUE)
        );
        return $this->db->insert('users',$inserUserData);

    }
    public function login(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $this->db->where('email',$email);
        $this->db->where('password',sha1($password));

        $respond=$this->db->get('users');

        if($respond->num_rows()>0){
            return $respond->row(0);
                
        }else{
            return !true;
            
        }
    }

    public function inputResource($siteId,$areaName){    
        $input=array(
            'type'=>$this->input->post('type'),
            'resource'=>$this->input->post('resource'),
            'unit'=>$this->input->post('unit'),
            'siteId'=>$siteId,
            'areaName'=>$areaName,
        );
        return $this->db->insert('resourcemaster',$input);
    }

    public function filter(){
        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');
        $types=$this->input->get('type');
        $siteId=$this->input->get('siteId');
        $areaName = $this->input->get('areaName');
        
		
        $resultArray=array();
        foreach($types as $type){
            if(isset($siteId)){
                $query1= $this->db->query("SELECT DISTINCT resource FROM report WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' and type='$type' ");
            }else{
                $query1= $this->db->query("SELECT DISTINCT resource FROM report WHERE areaName='$areaName' and date >= '$dateFrom' and date <= '$dateTo' and type='$type' ");
            }
            foreach($query1->result() as $data){
                if(isset($siteId)){
                    $query = $this->db->query("SELECT SUM(qty) as total FROM report WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' and type='$type' and resource='$data->resource' ");
                }else{
                    $query = $this->db->query("SELECT SUM(qty) as total FROM report WHERE areaName='$areaName' and date >= '$dateFrom' and date <= '$dateTo' and type='$type' and resource='$data->resource' ");
                }
                
                    foreach($query->result() as $data2){
                        $singleResults = array(
                            'type'=>$type,
                            'resource'=>$data->resource,
                            'total'=>$data2->total,
                        );
                        array_push($resultArray,$singleResults);
                    }
            } 
        }
        return $resultArray;
        
    }

    public function filterPipeLayingConsumption(){
        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');
        $siteId=$this->input->get('siteId');
                
        return $this->db->query("SELECT SUM(pipeLength) as total FROM pipelaying WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' ");  
    }
    public function filterPipeLayingData(){
        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');
        $siteId=$this->input->get('siteId');

        return $this->db->query("SELECT * FROM pipelaying WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' ");
    }
  

    public function rowData(){
        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');
        $types=$this->input->get('type');
        $siteId=$this->input->get('siteId');
        $areaName = $this->input->get('areaName');

        $resultArray=array();
        $other=array();
        $resTypes = array();
        $sites = array();
        $siteReferenceArray = array();
        $roadReference = array();
        $roadReferenceArray = array();
        $areaReference = array();
        $areaReferenceArray = array();


        foreach($types as $type){
            if(isset($siteId)){
                $query1= $this->db->query("SELECT DISTINCT date FROM report WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' and type='$type'  ");
                foreach($query1->result() as $data){
                    $query2 = $this->db->query("SELECT * FROM report WHERE siteId='$siteId' and date='$data->date' and type='$type' ");
                    foreach($query2->result() as $data2){
                        if($data2->date == $data->date){
                            $otherData = array(
                                'type'=>$type,
                                'resource'=>$data2->resource,
                                'date'=>$data2->date,
                                
                                'qty'=>$data2->qty,
                            );
                            
                            array_push($other,$otherData);  
                            
                        }    
                        $restype =$type;
                        array_push($resTypes,$restype);
    
                    }
                    $singleDate = array(
                        'date'=>$data->date,
                       'other'=>$other,
                       'types'=>$resTypes
    
                    ); 
                    array_push($resultArray,$singleDate);
                    unset($other);
                    $other=array(); 
                    unset($resTypes);
                    $resTypes=array();   
                }
            }else{
                $query1= $this->db->query("SELECT DISTINCT date FROM report WHERE areaName='$areaName' and date >= '$dateFrom' and date <= '$dateTo' and type='$type'  ");
                       
                foreach($query1->result() as $data){
                    $query2 = $this->db->query("SELECT DISTINCT areaReference FROM report WHERE areaName='$areaName' and date='$data->date' and type='$type'");
                    foreach($query2->result() as $data2){
                        $query3 = $this->db->query("SELECT DISTINCT roadReference FROM report WHERE areaName='$areaName' and areaReference = '$data2->areaReference' and date='$data->date' and type='$type'");
                            foreach($query3->result() as $data3){
                                $query4 = $this->db->query("SELECT DISTINCT siteReference FROM report WHERE areaName='$areaName' and areaReference = '$data2->areaReference' and roadReference = '$data3->roadReference' and date='$data->date' and type='$type'");
                                    foreach($query4->result() as $data4){
                                        $query5 = $this->db->query("SELECT DISTINCT * FROM report WHERE areaName='$areaName' and areaReference = '$data2->areaReference' and date='$data->date' and siteReference='$data4->siteReference' and type='$type'");                                        
                                        foreach($query5->result() as $data5){
                                            if($data5->date == $data->date && $data5->areaReference == $data2->areaReference && $data5->roadReference == $data3->roadReference && $data5->siteReference == $data4->siteReference ){
                                                $otherData = array(
                                                    'type'=>$type,
                                                    'resource'=>$data5->resource,
                                                    'date'=>$data5->date,
                                                    'areaReference'=>$data5->areaReference,
                                                    'roadReference'=>$data5->roadReference,
                                                    'siteReference'=>$data5->siteReference,
                                                    'pavingType'=>$data5->pavingType,
                                                    'qty'=>$data5->qty,
                                                );
                                                
                                                array_push($other,$otherData);         
                                            }
                                           
                                        }
                                        $siteReference = array(
                                            'date'=>$data->date,
                                            'areaReference'=>$data2->areaReference,
                                            'roadReference'=>$data3->roadReference,
                                            'siteReference'=>$data4->siteReference,
                                            'other'=>$other
                                        );
                                        array_push($siteReferenceArray,$siteReference);
                                        unset($other);
                                        $other=array();
                                        unset($siteReference);
                                        $siteReference=array(); 

                                    }
                                   $roadReference = array(
                                        'roadReference'=>$data3->roadReference,
                                        'siteReference' => $siteReferenceArray
                                   );
                                   array_push($roadReferenceArray,$roadReference);
                                    unset($other);
                                    $other=array();
                                    unset($siteReference);
                                    $siteReference=array();
                                    unset($siteReferenceArray);
                                    $siteReferenceArray=array();
                                    unset($roadReference);
                                    $roadReference=array();
                            }
                            $areaReference =array(
                                'areaReference'=>$data2->areaReference,
                                'roadReference'=>$roadReferenceArray
                            );
                            array_push($areaReferenceArray,$areaReference);
                            unset($other);
                            $other=array();
                            unset($siteReference);
                            $siteReference=array();
                            unset($siteReferenceArray);
                            $siteReferenceArray=array();
                            unset($roadReference);
                            $roadReference=array();
                            unset($roadReferenceArray);
                            $roadReferenceArray=array();
                            unset($areaReference);
                            $areaReference=array();
       
                        
                    }
                    $restype =$type;
                        array_push($resTypes,$restype);
                    $singleDate = array(
                        'date'=>$data->date,
                        'areaReference'=>$areaReferenceArray,
                        'types'=>$resTypes
                    ); 
                    array_push($resultArray,$singleDate);
                    unset($other);
                    $other=array(); 
                    unset($resTypes);
                    $resTypes=array();
                    unset($sites);
                    $sites=array();
                    unset($other);
                            $other=array();
                            unset($siteReference);
                            $siteReference=array();
                            unset($siteReferenceArray);
                            $siteReferenceArray=array();
                            unset($roadReference);
                            $roadReference=array();
                            unset($roadReferenceArray);
                            $roadReferenceArray=array();
                            unset($areaReference);
                            $areaReference=array();
                            unset($singleDate);
                            $singleDate=array();
                            unset($areaReferenceArray);
                            $areaReferenceArray=array();
                    
                }
            }
        }   
        return $resultArray;
    }

    public function removeField($rId){
        return $this->db->query("DELETE FROM resourcemaster WHERE rId=$rId ");
    }

}