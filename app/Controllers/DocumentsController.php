<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
class DocumentsController extends BaseController
{
    protected array $page;
    protected int $countInPage = 20;
    public function adminList($modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        //dd($this->model->createPassword("aRf8zKl1s1"));
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/profiles.css",
                "/css/admin/publications.css"],
        ];
        $page['data']["title"]= "Control Panel: Документы";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);

        $page['data']['publications']= $this->model->getPublications();

        if($this->session->has("profileFilter"))
            $page['data']['filter']= $this->session->get("profileFilter");
        $page['data']['filterSection']= view("admin/Document/FilterSection",$page['data']);

        if($this->session->has("message"))
            $page['data']['message']= $this->session->getFlashdata("message");

        $page['pageContent']= view("admin/Document/ListView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }
    public function form($op= "add",$pID= false,$modal= false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        if($op!=="add" && $pID===false) return redirect()->to(base_url("/admin/documents/"));
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>["/css/admin/profiles.css"   ],
        ];
        $page['data']["title"] = "Профиль обучения: ".(($op=="add")?"Создать":": Редактирование");
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['op']= $op;
        $page['data']['pID']= $pID;

        $page['data']['publications']= $this->model->getPublications();

        if($this->session->has("form")){
            $page['data']['form']= (object)$this->session->getFlashdata("form");
            $page['data']['validator']= $this->session->getFlashdata("validator");
            $page['data']['errors'] = $this->model->getFormErrors($page['data']['validator']);
        }
        elseif($op=="edit")
            $page['data']['form']= $this->model->dbGetRow("publications",["id"=>$pID]);
        $page['pageContent']= view("admin/Document/FormView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    public function formProcessing(){
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $form= (object)$this->request->getVar('form');
        $rules= [
            //'form.code' => 'required|is_unique[edProfiles.code]',
            'form.name' => 'required',
        ];
//        if($form->op=="edit") $rules['form.code']= "required|is_unique[edProfiles.code, id, ".$form->id."]";
        $messages= [

        ];
        $inputs = $this->validate($rules,$messages);
        if (!$inputs) {
            $form= json_decode(json_encode($form), FALSE);
            $this->session->setFlashdata("form",$form);
            $this->session->setFlashdata("validator",$this->validator);
            if($form->op=="add")
                return redirect()->to(base_url("/admin/documents/add"));
            else
                return redirect()->to(base_url("/admin/documents/edit/".$form->id));
        }
        if($form->op=="add") $this->model->PublicationsAdd($form);
        if($form->op=="edit") $this->model->PublicationsChange($form);
        return redirect()->to(base_url("/admin/documents/"));
    }

    public function delete($id= false){
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        if(!$id) return redirect()->to(base_url("/admin/documents/"));
        $publication= $this->model->dbGetRow("publications",["id"=>$id]);
        $this->session->setFlashdata("message",(object)["type"=>"success","class"=>"callout-success","message"=>"Файл удален: #$publication->id: $publication->name"]);
        $this->model->dbDelete("documents",["id"=>$id]);
        return redirect()->to(base_url("/admin/documents/"));
    }
    public function changeVisible():string|bool{
        if(!$this->model->hasAuth()) return json_encode(['message'=>"success denied"]);
        $form= $this->request->getVar();
        $this->model->dbUpdateFiled("publications",["display"=>(string)$form->display],["id"=>$form->id]);
        return true;
    }
    public function setFilter(){
        if(!$this->model->hasAuth()) return json_encode(['message'=>"success denied"]);
        $filter= (object)$this->request->getVar('filter');
        $this->session->set("profileFilter",$filter);
        return redirect()->to(base_url("/admin/publications/"));
    }


}