<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;
class GeneralModel extends FeedBackModel {
    public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }
    public function getFlashdata($arg):array|object|string{
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

    public function getExamSubjects():array{
        $q= $this->db->table("examSubjects")->orderBy("name")->get();
        $results= [];
        foreach($q->getResult() as $record)
            $results[$record->id]= $record;
        return $results;
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
            $record->exams= json_decode($record->exams);
            $results[$record->id]= $record;
        }
        return $results;
    }
    public function getEdProfile($id= false):bool|object{
        if(!$id) return false;
        $q= $this->db->table("edProfiles")->where(["id"=>$id])->get();
        if(!$q->getNumRows()) return false;
        $record= $q->getFirstRow();
        $record->places= json_decode($record->places);
        $record->prices= json_decode($record->prices);
        $record->forms= json_decode($record->forms);
        $record->duration= json_decode($record->duration);
        $record->exams= json_decode($record->exams);
        return $record;
    }
    public function getExamSubjectsList(){
        $q= $this->db->table("examSubjects")->get();
        $results= [];
        foreach($q->getResult() as $record)
            $results[$record->id]= $record;
        return $results;
    }
    public function getExamSubject($esID= false):bool|object{
        if(!$esID) return false;
        $q= $this->db->table("examSubjects")->where(["id"=>$esID])->get();
        if(!$q->getNumRows()) return false;
        return $q->getFirstRow();
    }
    public function dbDelete($table= false,$where= false):bool{
        if($table === false or $where === false) return false;
        $this->db->table($table)->delete($where);
        return true;
    }
    public function dbGetList($table= false,$assoc= false,$where= false, $jArr= [],$sort= false):bool|array{
        if($table === false) return false;
        $q= $this->db->table($table);
        if($where)
            $q= $q->where($where);
        if($sort)
            $q= $q->orderBy($sort);
        $q= $q->get();
        if(!$q->getNumRows()) return false;
        $results= $q->getResult();
        if(!empty($jArr))
            foreach ($results as $key=>$result)
                self::rowJsonDecode($results[$key],$jArr);
        if($assoc){
            $tmp= [];
            foreach ($results as $key=>$result){
                $tmp[$result->{$assoc}]= $result;
            }
        }
        return $assoc?$tmp:$results;
    }
    public function dbGetRow($table= false,$where= false, $jArr= []):bool|object|NULL{
        if($table === false or $where === false) return false;
        $q= $this->db->table($table)->where($where)->get();
        if(!$q->getNumRows()) return false;
        $q= $q->getFirstRow();
        self::rowJsonDecode($q,$jArr);
        return $q;
    }

    function rowJsonDecode(&$row,$jArr):bool{
        if(!is_object($row) or count($jArr) === 0) return false;
        foreach ($jArr as $field)
            if(!empty($row->{$field}))
                $row->{$field}= json_decode($row->{$field});
        return true;
    }

    function dbUpdateFiled($table,$field,$where):bool{
        $this->db->table($table)->update($field,$where);
        return true;
    }

}
