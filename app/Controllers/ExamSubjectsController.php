<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
class ExamSubjectsController extends BaseController
{
    public function adminList($modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $page['data']['includes']=(object)[
            'js'=>["/js/admin/examSubjects.js"],
            'css'=>["/css/admin/examSubjects.css"],
        ];
        $page['data']["title"]= "Control Panel: Экзаменационные предметы";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['examSubjects']= $this->model->getExamSubjectsList();
        if($this->session->has("message"))
            $page['data']['message']= $this->session->getFlashdata("message");
        $page['pageContent']= view("admin/ExamSubjects/ListView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    public function form($op= "add",$esID= false,$modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        if($op!=="add" && $esID===false) return redirect()->to(base_url("/admin/exam-subjects/"));
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/examSubjects.css"],
        ];
        $page['data']["title"] = "Экзаменационные предметы";
        $page['data']["title"].= ($op=="add")?": Добавить":": Редактирование";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['op']= $op;
        $page['data']['esID']= $esID;
        if($this->session->has("form")){
            $page['data']['form']= (object)$this->session->getFlashdata("form");
            $page['data']['validator']= $this->session->getFlashdata("validator");
            $page['data']['errors'] = $this->model->getFormErrors($page['data']['validator']);
        }
        elseif($op=="edit")
            $page['data']['form']= $this->model->getExamSubject($esID);
        $page['pageContent']= view("admin/ExamSubjects/FormView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    public function formProcessing(){
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $form= (object)$this->request->getVar('form');
        $rules= [
            'form.name' => 'required|is_unique[examSubjects.name]',
        ];
        if($form->op=="edit") $rules['form.name']= "required|is_unique[examSubjects.name, id, ".$form->id."]";
        $messages= [
            'form.name'=>[
                "required"=>"required",
                "is_unique"=>"Экзаменационный предмет с названием  $form->name уже существует"
            ],
        ];
        $inputs = $this->validate($rules,$messages);
        if (!$inputs) {
            $this->session->setFlashdata("form",$this->request->getVar('form'));
            $this->session->setFlashdata("validator",$this->validator);
            if($form->op=="add")
                return redirect()->to(base_url("/admin/exam-subjects/add"));
            else
                return redirect()->to(base_url("/admin/exam-subjects/edit/".$form->id));
        }
        if($form->op=="add") $this->model->ExamSubjectsAdd($form);
        if($form->op=="edit") $this->model->ExamSubjectsChange($form);
        return redirect()->to(base_url("/admin/exam-subjects/"));
    }
    public function delete($esID= false){
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        if(!$esID) return redirect()->to(base_url("/admin/exam-subjects/"));
        $this->model->ExamSubjectsDelete($esID);
        return redirect()->to(base_url("/admin/exam-subjects/"));
    }
}