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

        $page['pageContent']= view("admin/ExamSubjects/FormView",$page['data']);
        return $modal?$page['pageContent']:view(ADMIN."/template/page",$page);
    }
}