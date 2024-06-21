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

}
