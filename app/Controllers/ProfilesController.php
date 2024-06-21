<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
class ProfilesController extends BaseController
{
    public function saveResult():bool|string{
        $form= (object)$this->request->getVar("form");
        $this->model->addApp($form);
        return false;
    }
    public function adminList($modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/profiles.css"],
        ];
        $page['data']["title"]= "Control Panel: Профили обучения";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['edTypes']= $this->model->getEdTypeList();
        $page['data']['edLevels']= $this->model->getEdLevelList();
        $page['data']['edForms']= $this->model->getEdFormList();
        $page['data']['edFormsKeys']= array_keys($page['data']['edForms']);
        $page['data']['edProfiles']= $this->model->getEdProfileList();
        if($this->session->has("message"))
            $page['data']['message']= $this->session->getFlashdata("message");

        $page['pageContent']= view("admin/Profiles/ListView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }
    public function form($op= "add",$pID= false,$modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        if($op!=="add" && $pID===false) return redirect()->to(base_url("/admin/profiles/"));
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/profiles.css"],
        ];
        $page['data']["title"] = "Профиль обучения: ".(($op=="add")?"Создать":": Редактирование");
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['op']= $op;
        $page['data']['pID']= $pID;
        $page['data']['edTypes']= $this->model->getEdTypeList();
        $page['data']['edLevels']= $this->model->getEdLevelList();
        $page['data']['examSubjects']= $this->model->getExamSubjects();
        $page['data']['edForms']= $this->model->getEdFormList();
        $page['data']['edFormsKeys']= array_keys($page['data']['edForms']);
        if($this->session->has("form")){
            $page['data']['form']= (object)$this->session->getFlashdata("form");
            $page['data']['validator']= $this->session->getFlashdata("validator");
            $page['data']['errors'] = $this->model->getFormErrors($page['data']['validator']);
        }
        elseif($op=="edit")
            $page['data']['form']= $this->model->getEdProfile($pID);
        $page['pageContent']= view("admin/Profiles/FormView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    public function formProcessing(){
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $form= (object)$this->request->getVar('form');
        $rules= [
            'form.code' => 'required|is_unique[edProfiles.code]',
            'form.name' => 'required',
        ];
        if($form->op=="edit") $rules['form.code']= "required|is_unique[edProfiles.code, id, ".$form->id."]";
        $messages= [
            'form.code'=>[
                "required"=>"required",
                "is_unique"=>"Профиль с кодом $form->code уже существует"
            ],
        ];
        $inputs = $this->validate($rules,$messages);
        if (!$inputs) {
            $this->session->setFlashdata("form",$this->request->getVar('form'));
            $this->session->setFlashdata("validator",$this->validator);
            if($form->op=="add")
                return redirect()->to(base_url("/admin/profiles/add"));
            else
                return redirect()->to(base_url("/admin/profiles/edit/".$form->id));
        }
        if($form->op=="add") $this->model->ProfilesAdd($form);
        if($form->op=="edit") $this->model->ExamSubjectsChange($form);
        return redirect()->to(base_url("/admin/profiles/"));
    }




}