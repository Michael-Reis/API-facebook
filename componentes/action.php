<?php 

    class Action {
        public $conexao;
        public $ad_id;
        public $action;
        public $action_type;
        public $actionvalue;

        public function OrganizaArray($dados , $ad_id, $action){
            $qtditems = count($dados);
            for ($i=0; $i < $qtditems ; $i++) { 
                $actiontype = $dados[$i]->action_type; 
                $actionvalor = $dados[$i]->value;

                $qry = "SELECT * FROM facebookdetail 
                    WHERE ad_id = '${ad_id}' 
                    AND action = '${action}'
                    AND actiontype = '${actiontype}'  
                ";
                echo $qry;
                echo "<br><br>";
                $result = mysqli_query($this->conexao, $qry);
                $num_rows = mysqli_num_rows($result);

                if($num_rows < 1){
                    $qrys = "INSERT INTO facebookdetail(ad_id, action, actiontype, actionvalue) VALUES('${ad_id}', '${action}', '${actiontype}','${actionvalor}')";
                    mysqli_query($this->conexao, $qrys);
                    echo $qrys;
                    echo "<br><br>"; 
                }else{
                    $qryupdate = "UPDATE facebookdetail SET ad_id = '${ad_id}', action = '${action}', actiontype = '${actiontype}', '${actionvalor}'
                                WHERE ad_id = '${ad_id}'
                                AND action = '${action}'
                                AND actiontype = '${actiontype}'"; 

                    mysqli_query($this->conexao, $qryupdate);
                    echo $qryupdate;  
                }
               
            }    
            
        }

    
    }