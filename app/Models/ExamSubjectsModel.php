<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Model;
use CodeIgniter\Session\Session;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;
class ExamSubjectsModel extends GeneralModel{
    protected Session $session ;
    public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
        $this->session= Services::session();
    }
    public function ExamSubjectsAdd($form){
        $sql= [
            "name"=> trim($form->name),
        ];
        $this->db->table("examSubjects")->insert($sql);
        $this->session->setFlashdata("message",(object)["type"=>"success","class"=>"callout-success","message"=>"Экзаменационный предмет добавлен: #".$this->db->insertID().": ".$form->name]);
        return true;
    }
    public function ExamSubjectsChange($form){
        $sql= [
            "name"=> trim($form->name),
        ];
        $this->db->table("examSubjects")->update($sql,["id"=>$form->id]);
        $this->session->setFlashdata("message",(object)["type"=>"success","class"=>"callout-success","message"=>"Экзаменационный предмет изменен: #$form->id: $form->name"]);
        return true;
    }

    public function ExamSubjectsDelete($esID){
        if(!empty($esID)){
            $q= $this->db->table("examSubjects")->where(["id"=>$esID])->get();
            if($q->getNumRows()>0){
                $rec= $q->getFirstRow();
                $this->db->table("examSubjects")->delete(["id"=>$esID]);
                $this->session->setFlashdata("message",(object)["type"=>"success","class"=>"callout-success","message"=>"Экзаменационный предмет удален: #$rec->id: $rec->name"]);
            }
        }
        return true;

    }

}
