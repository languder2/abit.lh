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
            'css'=>[],
        ];
        $page['data']["title"]= "Control Panel: Профили обучения";
        $page['data']['mainMenu']= view("admin/template/mainMenu",["menu"=>$this->model->getMenu("admin")]);
        $page['data']['edTypes']= $this->model->getEdTypeList();
        $page['data']['edLevels']= $this->model->getEdLevelList();
        $page['data']['edForms']= $this->model->getEdFormList();
        $page['data']['edFormsKeys']= array_keys($page['data']['edForms']);
        $page['data']['edProfiles']= $this->model->getEdProfileList();
        $page['pageContent']= view("admin/Profiles/ListView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }

    /*
    public function changeStatus():bool|string{
        $req= $this->request->getVar();        $this->model->appsChangeStatus($req);
        return false;
    }
    public function setFilter():RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $form= $this->request->getVar("filter");
        $this->session->set("appsFilter",$form);
        return redirect()->to(base_url(ADMIN."/apps/modal"));
    }
    public function detail($aid= false,$modal=false):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $data['includes']=(object)[
            'js'=>[
                "js/admin/appDetail.js",
            ],
            'css'=>[],
        ];
        if(!$modal){
            $data["title"]= "Control Panel: Заяка #$aid";
            $data['mainMenu']= view("admin/mainMenu",["menu4MainMenu"=>$this->model->getMenu("admin")]);
        }
        $data['statuses']= $this->model->getStatuses();
        if($this->session->has("message"))
            $data['message']= $this->session->getFlashdata("message");
        $data['appDetail']= $this->model->getAppByID($aid);
        if(!$data['appDetail'])
            return redirect()->to(base_url(ADMIN_MAIN_PAGE));
        $data['appDetail']->tabComments= view(ADMIN."/AppDetail/tabCommentsView",$data);
        $data['appDetail']->tabPresonal= view(ADMIN."/AppDetail/tabPersonalView",$data);
        $data['appDetail']->tabDuplicates= view(ADMIN."/AppDetail/tabDuplicatesView",$data);
        $data['appDetail']->tabNotifications= $this->model->getNotificationsByApp($data['appDetail']->appID);
        $data['pageContent']= view("admin/AppDetail/templateView",$data);

        return $modal?$data['pageContent']:view(ADMIN."/templateView",$data);
    }
    public function addComment():string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $req= $this->request->getVar('form');
        $this->model->addComment2App($req);
        $data['appDetail']= $this->model->getAppByID($req['appID']);
        return $data['appDetail']->tabComments= view(ADMIN."/AppDetail/tabCommentsView",$data);
    }
    public function removeComment($appID,$key):string|RedirectResponse{
        if(!$this->model->hasAuth()) return redirect()->to(base_url(ADMIN));
        $this->model->removeCommentByApp($appID,$key);
        $data['appDetail']= $this->model->getAppByID($appID);
        return $data['appDetail']->tabComments= view(ADMIN."/AppDetail/tabCommentsView",$data);
    }
    public function changeApp():bool|string{
        if(!$this->model->hasAuth()) return false;
        $req= $this->request->getVar("form");
        $this->model->changeApp($req);
        return false;
    }
    */

}