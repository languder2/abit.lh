<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
class PublicPagesController extends BaseController
{
    public function main():string{
        $page['data']['includes']=(object)[
            'js'=>[
                "public/edProfiles.js",
            ],
            'css'=>[],
        ];
        $page['data']['meta']= [
            "title"=>"Абитуриент МелГУ - информация о поступлении в государственный университет МелГУ в Мелитополе",
            "description"=>"Абитуриент МелГУ - информация о поступлении в государственный университет МелГУ в Мелитополе",
            "keywords"=>"Вступительная кампания, Поступить в мелитополе, Мелитополь, Без ЕГЭ, Бесплатное обучения",
        ];

        $page['data']['menuTop']= view("public/template/menuTop.php",["menu"=>$this->model->getMenu("public"),"mainPage"=>true]);

        $page['data']['edLevels']= $this->model->dbGetList("edLevels","code",false,false,"sort");
        $page['data']['edForms']= $this->model->dbGetList("edForms","code",false,false,"sort");
        $page['data']['edProfileCards']= $this->model->getProfileCards("edProfiles",false,['display'=>"1"],['forms','prices',"duration","places","exams"]);
        $page['data']['currentLevel']= $this->request->getVar('edLevel')??false;

        $page['data']['profilesEdLevelsMenu']= view("public/profiles/levelsMenu",$page['data']);
        $page['data']['profilesEdFormsMenu']= view("public/profiles/formsMenu",$page['data']);
        $page['data']['profiles']= view("public/profiles/section",$page['data']);
        $page['data']['fb']= view("public/template/fb");
        $page['pageContent']= view("public/indexPage",$page['data']);
        return view("public/template/page",$page);
    }
    public function contacts():string{
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>[],
        ];

        $page['data']['meta']= [
            "title"=>"Контакты",
            "description"=>"Контакты вступительной кампании МелГУ",
            "keywords"=>"Контакты, Контакты вступительной кампании, Контакты МелГУ"
        ];
        $page['data']['fb']= view("public/template/fb.php");

        $page['data']['menuTop']= view("public/template/menuTop.php",["menu"=>$this->model->getMenu("public")]);
        $page['pageContent']= view("public/contactsPage.php",$page['data']);
        return view("public/template/page",$page);
    }
    public function whyMelGU():string{
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>[],
        ];
        $page['data']['meta']= [
            "title"=>"Почему МелГУ?",
            "description"=>"Почему МелГУ?",
            "keywords"=>"Поступить в МелГУ. Бакалавриат, специалитет, аспирантура. Подать документы. Бюджет, целевое, платное"
        ];
        $page['data']['fb']= view("public/template/fb.php");

        $page['data']['menuTop']= view("public/template/menuTop.php",["menu"=>$this->model->getMenu("public")]);
        $page['pageContent']= view("public/whyMelGUPage.php",$page['data']);
        return view("public/template/page",$page);
    }
    public function whyMelitopol():string{
        $page['data']['includes']=(object)[
            'js'=>[],
            'css'=>[],
        ];
        $page['data']['meta']= [
            "title"=>"Почему Мелитополь?",
            "description"=>"Почему Мелитополь",
            "keywords"=>"Мелитополь, Запорожская область, Поступить в мелитополь"
        ];
        $page['data']['fb']= view("public/template/fb.php");

        $page['data']['menuTop']= view("public/template/menuTop.php",["menu"=>$this->model->getMenu("public")]);
        $page['pageContent']= view("public/whyMelitopolPage.php",$page['data']);
        return view("public/template/page",$page);
    }
}