<?php
require_once("./libraries/core/controllers.php");

class Websitesetting extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('location:' . server_url . 'login');
        }
        getPermisos(11);
    }

    public function websitesetting()
    {
        if (empty($_SESSION['permisos_modulo']['r'])) {
            header('location:' . server_url . 'Errors');
        }
        $data["page_id"] = 11;
        $data["tag_pag"] = "Websitesetting";
        $data["page_title"] = "Sitio web | Configuracion";
        $data["page_name"] = "Listado de Categorias";
        $data['page'] = "websitesetting";
        $this->views->getView($this, "websitesetting", $data);
    }



    public function getWebsite()
    {
        if (empty($_SESSION['permisos_modulo']['r'])) {
            header('location:' . server_url . 'Errors');
            $data = array("status" => false, "msg" => "Error no tiene permisos");
        } else {
            $data = $this->model->selectWebsite();
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }



    public function setWebsite()
    {
        if ($_POST) {
            $id_website_setting = Intval(strclean($_POST['id_website_setting']));
            $website_title = strclean($_POST["website_title"]);
            $website_about = utf8_decode(strclean($_POST["website_about"]));
            $website_image = strtolower(strclean($_POST["website_image"]));
            $website_favicon = strtolower(strclean($_POST["website_favicon"]));
            $website_clients = Intval(strclean($_POST['website_clients']));
            $website_expirience = Intval(strclean($_POST['website_expirience']));
            $website_proyects = Intval(strclean($_POST['website_proyects']));

            if ($id_website_setting == 1) {
                if (empty($_SESSION['permisos_modulo']['w'])) {
                    header('location:' . server_url . 'Errors');
                    $data = array("status" => false, "msg" => "Error no tiene permisos");
                    $response_website   = 0;
                } else {
                    $response_website = $this->model->updateWebsiteSetting($id_website_setting, $website_title, $website_about, 
                                    $website_image, $website_favicon, $website_clients, $website_expirience, $website_proyects);
                    $option = 1;
                }
            }else{
                $data = array('status' => false, 'msg' => 'Hubo un error no se pudieron guardar los datos');
            }
            if ($response_website  > 0) {
                if ($option == 1) {
                    $data = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                }
            } else {
                $data = array('status' => false, 'msg' => 'Hubo un error no se pudieron guardar los datos');
            }
        } else {
            header('location:' . server_url . 'Errors');
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
