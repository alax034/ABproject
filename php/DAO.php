<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DAO{
     // Connection parammeters
    private $host_name;
    private $user;
    private $password;
    private $base_name;
    private $connection_string;
    private $dbh;
    private $sql;
    private $pdo_expression;
    private $array;
            
    public function __construct() {
        $this->user = "root";
        $this->password = "";
        $this->host_name = "localhost";
        $this->base_name = "abase";
        $this->connection_string = "mysql:host=$this->host_name;dbname=$this->base_name";                
    }
    
    public function getAppointments($day, $month, $year){        
        $dateFrom = "";
        $dateTo = "";
        //ako je jednocifren mesec dodaj 0 ispred
        if($month > 9){
            $dateFrom  = $dateTo = $year."-".$month."-";
        }
        else{
            $dateFrom  = $dateTo = $year."-0".$month."-";
        }        
        if($day != 0){         
            //ako je jednocifren dan dodaj 0
            if($day < 10)
                $dateFrom = $dateFrom."0".$day;
            else
                $dateFrom = $dateFrom.$day;
        }else{
            $dateFrom = $dateFrom."01";                    
            switch ($month) {
                case 10:
                case 12:
                    $dateTo = $year."-".$month."-31";                    
                    var_dump($dateTo);
                    break;
                case 1:
                case 3:
                case 5:
                case 7:
                case 8: 
                    $dateTo = $year."-0".$month."-31";                    
                    break;                
                case 2: 
                    if(($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0){
                        $dateTo = $year."-0".$month."-29";
                    }else{
                        $dateTo = $year."-0".$month."-28";
                    }                    
                    break;
                case 4: 
                case 6: 
                case 9:
                    $dateTo = $year."-0".$month."-30";
                    break;
                case 11:
                    $dateTo = $year."-".$month."-30";
                default:
                    break;
            }
        }
        try{
            $dbh = new PDO($this->connection_string, $this->user, $this->password);              
            //$sql = "SELECT * FROM `appointment` WHERE (`date` >= '".$dateFrom."' AND `date` <= '".$dateTo."')";                        
            $sql = "SELECT `client`.`first_name`, `client`.`last_name`, `appointment`.`date`, `appointment`.`start_time`, `appointment`.`end_time`, `appointment`.`type`, `appointment`.`id`".
            "FROM `appointment`".
            "JOIN `client` on `appointment`.`client_id_fk` = `client`.`id`".
            "WHERE (`appointment`.`date` >= '".$dateFrom."' AND `appointment`.`date` <= '".$dateTo."')";            
            //$dbh->query() vraca PDOStatement objekat
            $pdo_expression = $dbh->query($sql);
            
            //svi podaci se vracaju u obliku niza asocijativnih nizova
            $array = $pdo_expression->fetchAll(PDO::FETCH_ASSOC);
            //Closing connection
            $dbh = null;
            return $array;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}