<?php
namespace App\Controllers;
class Ratings extends BaseController
{
    public function Results()
    {
        $page['data']['meta']= [
            "title"=>"Абитуриент МелГУ - информация о поступлении в государственный университет МелГУ в Мелитополе",
            "description"=>"Абитуриент МелГУ - информация о поступлении в государственный университет МелГУ в Мелитополе",
            "keywords"=>"Вступительная кампания, Поступить в мелитополе, Мелитополь, Без ЕГЭ, Бесплатное обучения",
        ];

        $page['data']['includes']=(object)[
            'js'    => [
                "public/ratings.js"
            ],
            'css'   => [
                'public/ratings.css',
                'public/forms.css',
            ],
        ];

        $page['data']['menuTop']= view("public/template/menuTop.php",["menu"=>$this->model->getMenu("public"),"mainPage"=>true]);

        $page['data']['profilesEdLevelsMenu']= view("public/profiles/levelsMenu",$page['data']);

        $page['pageContent']= view("public/Ratings/Results",[]);

        return view("public/template/page",$page);
    }
}