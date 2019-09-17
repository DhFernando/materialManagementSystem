<?php

class query2 extends CI_Model {

    public function form(){
        $areaName= $_GET['areaName'];
        return $this->db->query("SELECT * FROM resourcemaster WHERE areaName='$areaName'");
    }

    public function inputRecords($wId,$siteId,$areaName,$areaReference,$roadReference,$siteReference,$pavingType){
       $query = $this->db->query("SELECT * FROM resourcemaster WHERE areaName='$areaName' ");
      
       foreach($query->result() as $data){
        
        $inputs=array(
            'wId'=>$wId,
            'date'=> $this->input->post('date',TRUE),
            'siteId'=>$siteId,
            'areaName'=>$areaName,
            'areaReference'=> $areaReference,
            'roadReference'=> $roadReference,
            'siteReference'=> $siteReference,
            'pavingType'=> $pavingType,
            'resource'=>$data->resource,
            'qty'=>$this->input->post(str_replace(' ','',$data->resource),true),
            'type'=>$this->input->post(str_replace(' ','',$data->type),true)
        ); 
        if(!$this->input->post(str_replace(' ','',$data->resource),true)==""){
            $this->db->insert('report',$inputs);
        }
        
       } 
       return true;
      
    }

    

    public function inputWorkingActivities(){
        $rowCount = $this->input->post('rowCount');
        for($round=1;$round<=(int)$rowCount;$round++){
            $BillingItemNo = 'BillingItemNo'.($round);
            $DescriptionOfWork = 'DescriptionOfWork'.($round);
            $Remark = 'Remark'.($round);
            
            $inputs=array(
                'BillingItemNo'=>$this->input->post($BillingItemNo),
                'DescriptionOfWork'=>$this->input->post($DescriptionOfWork),
                'Remark'=>$this->input->post($Remark),
                'date'=>$this->input->post('date')
            );
            $this->db->insert('workactivities',$inputs);
        }                   
        return true;
    }

    function inputPipeLayingDetails($siteId,$wId,$areaName ){
        $rowCount = $this->input->post('rowCount');
        for($round=1;$round<=(int)$rowCount;$round++){
            
            
            $pipeSerialNo = 'pipeSerialNo'.($round);
            $pipeType = 'pipeType'.($round);
            $pipeLength = 'pipeLength'.($round);
            $startGL = 'startGL'.($round);
            $startIL = 'startIL'.($round);
            $EndGL = 'EndGL'.($round);
            $EndIL = 'EndIL'.($round);
            $bedType = 'bedType'.($round);
            $backfillType = 'backfillType'.($round);
            $tempRainType = 'tempRainType'.($round);
            $prmtReinstType = 'prmtReinstType'.($round);

            $inputs=array(
                'pipeSerialNo'=>$this->input->post($pipeSerialNo),
                'pipeType'=>$this->input->post($pipeType),
                'pipeLength'=>$this->input->post($pipeLength),
                'startGL'=>$this->input->post($startGL),
                'startIL'=>$this->input->post($startIL),
                'EndGL'=>$this->input->post($EndGL),
                'EndIL'=>$this->input->post($EndIL),
                'bedType'=>$this->input->post($bedType),
                'backfillType'=>$this->input->post($backfillType),
                'tempRainType'=>$this->input->post($tempRainType),
                'prmtReinstType'=>$this->input->post($prmtReinstType),
                'date'=>$this->input->post('date'),
                'siteId'=>$siteId,
                'areaName'=>$areaName,
                'wId'=>$wId 
            );
            $this->db->insert('pipeLaying',$inputs);
        }                   
        return true;
    }



    function inputManholePlacingDetails($siteId,$wId,$areaName ){
        $rowCountHM = $this->input->post('rowCountHM');
        for($round=1;$round<=(int)$rowCountHM;$round++){
            
            $mhType = 'mhType'.($round);
            $serialNumber = 'serialNumber'.($round);
            $resource = 'resource'.($round);

            $check = $this->input->post($serialNumber);
           
           if($check>0){
                $inputs=array(
                    'mhType'=>$this->input->post($mhType),
                    'serialNumber'=>$this->input->post($serialNumber),
                    'resource'=>$this->input->post($resource),
                    'date'=>$this->input->post('date'),
                    'siteId'=>$siteId,
                    'wId'=>$wId,
                    'areaName'=>$areaName 
                );
                $this->db->insert('manholePlacing',$inputs);
            }            
        }                   
        return true;
    }

    public function filterWorkingActivities(){

        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');

        $HalfDatas=array();
        $completeDatas=array();
        
        $query1= $this->db->query("SELECT DISTINCT date FROM workactivities WHERE date >= '$dateFrom' and date <= '$dateTo' and ORDER BY date");{
            foreach($query1->result() as $data){
                $query2 = $this->db->query("SELECT * FROM workactivities WHERE date='$data->date' ");
                foreach($query2->result() as $data2){
                    if($data2->date == $data->date){
                        $Datas = array(
                            'BillingItemNo'=>$data2->BillingItemNo,
                            'DescriptionOfWork'=>$data2->DescriptionOfWork,
                            'date'=>$data2->date,
                            'Remark'=>$data2->Remark,
                        );
                
                        array_push($HalfDatas,$Datas);  
                        
                    }    
                }
                $temp=array(
                    'date'=>$data->date,
                    'details'=>$HalfDatas
                );
                array_push($completeDatas,$temp);
                unset($Datas);
                $Datas=array(); 
                unset($temp);
                $temp=array(); 
                unset($HalfDatas);
                $HalfDatas=array(); 
            }
            return $completeDatas;
        }
    }

    public function filterPipeLaying(){

        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');
        $siteId = $this->input->get('siteId');

        $HalfDatas=array();
        $completeDatas=array();
        
        $query1= $this->db->query("SELECT DISTINCT date FROM pipelaying WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' ");{
            foreach($query1->result() as $data){
                $query2 = $this->db->query("SELECT * FROM pipelaying WHERE siteId='$siteId' and date='$data->date' ");
                foreach($query2->result() as $data2){
                    if($data2->date == $data->date){
                        $Datas = array(
                            'pipeId'=>$data2->pipeId,
                            'siteId'=>$data2->siteId,
                            'wId'=>$data2->wId,
                            'date'=>$data2->date,
                            'pipeSerialNo'=>$data2->pipeSerialNo,
                            'pipeType'=>$data2->pipeType,
                            'pipeLength'=>$data2->pipeLength,
                            'startGL'=>$data2->startGL,
                            'startIL'=>$data2->startIL,
                            'EndGL'=>$data2->EndGL,
                            'EndIL'=>$data2->EndIL,
                            'bedType'=>$data2->bedType,
                            'backfillType'=>$data2->backfillType,
                            'tempRainType'=>$data2->tempRainType,
                            'prmtReinstType'=>$data2->prmtReinstType,
                        );
                
                        array_push($HalfDatas,$Datas);  
                        
                    }    
                }
                $temp=array(
                    'date'=>$data->date,
                    'details'=>$HalfDatas
                );
                array_push($completeDatas,$temp);
                unset($Datas);
                $Datas=array(); 
                unset($temp);
                $temp=array(); 
                unset($HalfDatas);
                $HalfDatas=array(); 
            }
            return $completeDatas;
        }
    }


    public function filterManhole(){

        $dateFrom = $this->input->get('dateFrom');
        $dateTo = $this->input->get('dateTo');
        $siteId = $this->input->get('siteId');
        $areaName = $this->input->get('areaName');
        
        $HalfDatas=array();
        $completeDatas=array();
        if(isset($siteId)){
            $query1= $this->db->query("SELECT DISTINCT date FROM manholeplacing WHERE siteId='$siteId' and date >= '$dateFrom' and date <= '$dateTo' ");
        }else{
            $query1= $this->db->query("SELECT DISTINCT date FROM manholeplacing WHERE areaName='$areaName' and date >= '$dateFrom' and date <= '$dateTo'"); 
        }
       
            foreach($query1->result() as $data){
                if(isset($siteId)){
                    $query2 = $this->db->query("SELECT * FROM manholeplacing WHERE siteId='$siteId' and date='$data->date' and ORDER BY date ");
                }else{
                    $query2 = $this->db->query("SELECT * FROM manholeplacing WHERE areaName='$areaName' and date='$data->date' and ORDER BY date ");
                }
                
                foreach($query2->result() as $data2){
                    if($data2->date == $data->date){
                        $Datas = array(
                            'mhId'=>$data2->mhId,
                            'siteId'=>$data2->siteId,
                            'wId'=>$data2->wId,
                            'date'=>$data2->date,
                            'mhType'=>$data2->mhType,
                            'serialNumber'=>$data2->serialNumber,
                            'resource'=>$data2->resource,
                        );
                        array_push($HalfDatas,$Datas);       
                    }    
                }
                $temp=array(
                    'date'=>$data->date,
                    'details'=>$HalfDatas
                );
                array_push($completeDatas,$temp);
                unset($Datas);
                $Datas=array(); 
                unset($temp);
                $temp=array(); 
                unset($HalfDatas);
                $HalfDatas=array(); 
            }
            return $completeDatas;
        
    }

    public function ReportGenerator(){
        
        if($this->session->userdata('status')=='root'){
            $areaNames =  $this->db->query("SELECT DISTINCT areaName FROM site WHERE siteId>1");
            $areaReference =  $this->db->query("SELECT DISTINCT areaReference FROM site WHERE siteId>1");
            $roadReference =  $this->db->query("SELECT DISTINCT roadReference FROM site WHERE siteId>1");
            $siteReference =  $this->db->query("SELECT DISTINCT siteReference FROM site WHERE siteId>1");
            $pavingType =  $this->db->query("SELECT DISTINCT pavingType FROM site WHERE siteId>1");
        }else{
            $userId = $this->session->userdata('userId');
            $areaNames =  $this->db->query("SELECT DISTINCT areaName FROM site WHERE userId='$userId' and siteId>1");
            $areaReference =  $this->db->query("SELECT DISTINCT areaReference FROM site WHERE userId='$userId' and siteId>1");
            $roadReference =  $this->db->query("SELECT DISTINCT roadReference FROM site WHERE userId='$userId' and siteId>1");
            $siteReference =  $this->db->query("SELECT DISTINCT siteReference FROM site WHERE userId='$userId' and siteId>1");
            $pavingType =  $this->db->query("SELECT DISTINCT pavingType FROM site WHERE userId='$userId' and siteId>1");
        }

         return $resArray=[
             'areaNames'=>$areaNames->result(),
             'areaReference'=>$areaReference->result(),
             'roadReference'=>$roadReference->result(),
             'siteReference'=>$siteReference->result(),
             'pavingType'=>$pavingType->result()
         ];
    }

}