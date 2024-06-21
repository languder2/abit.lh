<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
class ExamSubjectsController extends BaseController
{
    public function adminList($modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/examSubjects.css"],
        ];
        $page['data']["title"]= "Control Panel: Экзаменационные предметы";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['examSubjects']= $this->model->getExamSubjectsList();


        $page['pageContent']= view("admin/ExamSubjects/ListView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    public function form($op= "add",$modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));

        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/examSubjects.css"],
        ];
        $page['data']["title"] = "Экзаменационные предметы";
        $page['data']["title"].= ($op=="add")?": Добавить":": Редактирование";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['op']= $op;
        if($this->session->has("form")){
            $page['data']['form']= (object)$this->session->getFlashdata("form");
            $page['data']['validator']= $this->session->getFlashdata("validator");
            $page['data']['errors'] = $this->model->getFormErrors($page['data']['validator']);
        }
//        elseif($op=="edit")
//            $this->data['form']= $this->model->getResult($id);

        $page['pageContent']= view("admin/ExamSubjects/FormView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    public function formProcessing(){
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
    }
}