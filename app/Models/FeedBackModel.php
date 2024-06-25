<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Model;
use CodeIgniter\Session\Session;
use CodeIgniter\Validation\ValidationInterface;
use Config\Services;
class FeedBackModel extends UserModel{

    public function __construct(?ConnectionInterface $db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }

    public function saveFB($form):bool{
        $this->db->table("feedback")->insert($form);
        return true;
    }
    public function sendEmail($address,$form):bool{
        $subject = "Абитуриент МелГУ: задать вопрос";

        $message = "<h4>Форма \"Задать вопрос\"</h4>";
        $message.= "<p>
                    <b>Имя:</b><br>
                    ".$form['name']."
                </p>";
        $message.= "<p>
                    <b>Тел:</b><br>
                    ".$form['phone']."
                </p>";
        $message.= "<p>
                    <b>E-mail:</b><br>
                    ".$form['email']."
                </p>";
        $message.= "<p>
                    <b>Вопрос:</b><br>
                    ".$form['message']."
                </p>";

        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: ".$form['name']." <".$form['email'].">\r\n";
        $headers .= "Reply-To: ".$form['email']."\r\n";

        mail($address, $subject, $message, $headers);
        return true;
    }

}
