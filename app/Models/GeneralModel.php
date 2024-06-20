<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;
class GeneralModel extends UserModel{
    public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }
    public function getFlashdata($arg):array|object|string
    {
        return $this->session->getFlashdata($arg);
    }
    public function getMenu($section= "public",$parent= 0){
        $q= $this->db->table("menu")->where(["section"=>$section,"parent"=>$parent,"display"=>'1'])->orderBy("sort")->get();
        $results= [];
        foreach($q->getResult() as $record){
            $results[$record->id]= $record;
            $results[$record->id]->submenu= $this->getMenu($section,$parent= $record->id);
        }
        return $results;
    }
    public function getFormErrors($validator){
        $results= [];
        $errors= $validator->getErrors();
        if($errors){
            $results= array_diff($errors, ['required']);
            if(in_array("required",$errors))
                $results= $results+['required'=>"Заполните обязательные поля"];
        }
        return $results;
    }

    public function processingProfiles(){
        $this->db->table("edProfiles")->truncate();
        $q= $this->db->table("edProfilesOLD")->get();
        $fkeys= array_keys(self::getEdFormList());
        foreach($q->getResult() as $record){
            foreach ($fkeys as $form){
                $duration[$form]= $record->{"duration$form"};
                $places['budget'][$form]= $record->{"places$form"};
                $places['contract'][$form]= $record->{"contractPlaces$form"};
                $prices[$form]= $record->{"prices$form"};
                $forms[$form]= empty($record->{"prices$form"})?0:1;
            }
            $sql= [
                "code"=> $record->code,
                "name"=> $record->name,
                "level"=> $record->level,
                "forms"=>json_encode($forms),
                "duration"=>json_encode($duration),
                "places"=>json_encode($places),
                "prices"=>json_encode($prices),
                "display"=> '1',
                "type"=> 1,
            ];
            $this->db->table("edProfiles")->insert($sql);
        }
        dd([1,2]);
    }

    public function getEdLevelList():array{
        $q= $this->db->table("edLevels")->orderBy("sort")->get();
        $results= [];
        foreach($q->getResult() as $record)
            $results[$record->code]= $record;
        return $results;
    }
    public function getEdFormList():array{
        $q= $this->db->table("edForms")->orderBy("sort")->get();
        $results= [];
        foreach($q->getResult() as $record)
            $results[$record->code]= $record;
        return $results;
    }
    public function getEdTypeList():array{
        $q= $this->db->table("edTypes")->get();
        $results= [];
        foreach($q->getResult() as $record)
            $results[$record->id]= $record;
        return $results;
    }
    public function getEdProfileList():array{
        $q= $this->db->table("edProfiles")->get();
        $results= [];
        foreach($q->getResult() as $record){
            $record->places= json_decode($record->places);
            $record->prices= json_decode($record->prices);
            $record->forms= json_decode($record->forms);
            $record->duration= json_decode($record->duration);
            $results[$record->id]= $record;
        }
        return $results;
    }
    public function getExamSubjectsList(){
        $q= $this->db->table("examSubjects")->get();
        $results= [];
        foreach($q->getResult() as $record)
            $results[$record->id]= $record;
        return $results;

    }


}
