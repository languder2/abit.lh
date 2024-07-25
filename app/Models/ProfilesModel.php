<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Model;
use CodeIgniter\Session\Session;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;
class ProfilesModel extends ExamSubjectsModel{
    protected Session $session ;
    public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
        $this->session= Services::session();
    }
    public function ProfilesAdd($form){
        $forms= [];
        $formKeys= array_keys(self::getEdFormList());
        foreach ($formKeys as $fKey)
            $forms[$fKey]= (int)($form->forms[$fKey]??0);
        $sql=[
            "code"=>$form->code,
            "name"=>$form->name,
            "type"=>$form->type,
            "level"=>$form->level,
            "forms"=>json_encode($forms),
            "places"=>json_encode($form->places),
            "prices"=>json_encode($form->prices),
            "duration"=>json_encode($form->duration),
            "exams"=>json_encode($form->exams),
        ];
        $this->db->table("edProfiles")->insert($sql);
        $this->session->setFlashdata("message",(object)["type"=>"success","class"=>"callout-success","message"=>"Профиль добавлен: #".$this->db->insertID().": $form->code $form->name"]);
        return true;
    }
    public function ProfilesChange($form){
        $forms= [];
        $formKeys= array_keys(self::getEdFormList());
        foreach ($formKeys as $fKey)
            $forms[$fKey]= (int)($form->forms[$fKey]??0);
        $sql=[
            "code"=>$form->code,
            "name"=>$form->name,
            "type"=>$form->type,
            "level"=>$form->level,
            "forms"=>json_encode($forms),
            "places"=>json_encode($form->places),
            "prices"=>json_encode($form->prices),
            "duration"=>json_encode($form->duration),
            "exams"=>json_encode($form->exams),
        ];
        $this->db->table("edProfiles")->update($sql,["id"=>$form->id]);
        $this->session->setFlashdata("message",(object)["type"=>"success","class"=>"callout-success","message"=>"Профиль изменен: #$form->id: $form->code $form->name"]);
        return true;
    }

    function prepareExamList(&$profile,$exams):bool
    {
        $result= (object)["required"=>[],"variable"=>[]];
        if($profile->exams)
            foreach ($profile->exams as $key=>$exam){
                if(isset($exam->required) && isset($exams[$key]))
                    $result->required[$exams[$key]->name]= $exam->score;
                if(isset($exam->variable) && isset($exams[$key]))
                    $result->variable[$exams[$key]->name]= $exam->score;
            }
        $profile->exams= $result;
        return true;
    }

    public function getProfileCards($table= false,$assoc= false,$where= false, $jArr= [],$sort= false):bool|array{
        $exams= self::dbGetList("examSubjects","id",false,false,false);
        $profiles= self::dbGetList($table,$assoc,$where, $jArr,$sort);
        $types= self::dbGetList("edTypes","id");
        $formByDefault= self::dbGetRow("edForms",["byDefault"=>1])->code;
        if(count($profiles))
            foreach ($profiles as $key=>$profile){
                self::prepareExamList($profile,$exams);
                $profiles[$key]= view("public/profiles/card",[
                    "profile"=>$profile,
                    "types"=>$types,
                    "formByDefault"=>$formByDefault,
                ]);
            }
        return $profiles;
    }

    public function updateProfileForms($table= false,$assoc= false,$where= false, $jArr= [],$sort= false){
        $forms= self::dbGetList("edForms","code",false,false,"sort");
        $formByDefault= self::dbGetRow("edForms",["byDefault"=>1])->code;
        $profiles= self::dbGetList($table,$assoc,$where, $jArr,$sort);
        foreach ($profiles as $profile){
            $pForm= (object)[];
            foreach ($forms as $form=>$rec)
                if(
                    $profile->places->budget->{$form} or
                    $profile->places->contract->{$form} or
                    $profile->prices->{$form}
                )
                    $pForm->{$form}= 1;
                else
                    $pForm->{$form}= 0;
            self::dbUpdateFiled(
                "edProfiles",
                ["forms"=>json_encode($pForm)],
                ["id"=>$profile->id]
            );
        }
    }


}
