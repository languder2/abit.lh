<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RedirectResponse;
class FeedBackController extends BaseController
{
    public function processing():string{
        $form= $this->request->getVar("form");
        $this->model->saveFB($form);

        //$to = "<Languder1985@yandex.ru>";
        $to = "<priyomnaya_komissiya@mgu-mlt.ru>";
        $this->model->sendEmail($to,$form);

        return json_encode(true);
    }
}