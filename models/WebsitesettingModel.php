<?php
require_once("./libraries/core/mysql.php");
class WebsitesettingModel extends Mysql
{

    public $intWebsite;
    public $strWebTitle;
    public $strWebAbout;
    public $strImagenWeb;
    public $strFaviconWeb;
    public $intClients;
    public $intExpierence;
    public $intProyects;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectWebsite()
    {
        $sql = "SELECT * FROM website_setting WHERE id_website_setting = 1";
        $request_website = $this->select_sql($sql);
        return $request_website;
    }

    public function selectContact()
    {
        $sql = "SELECT * FROM contact_setting WHERE id_contact_setting = 1";
        $request_website = $this->select_sql($sql);
        return $request_website;
    }


    public function updateWebsiteSetting(int $intWebsite, string $website_title, string $website_about, $website_image, $website_favicon, int $website_clients, int $website_expirience, int $website_proyects)
    {
        $this->intWebsite = $intWebsite;
        $this->strWebTitle = $website_title;
        $this->strWebAbout = $website_about;
        $this->strImagenWeb = $website_image;
        $this->strFaviconWeb = $website_favicon;
        $this->intClients = $website_clients;
        $this->intExpierence = $website_expirience;
        $this->intProyects = $website_proyects;
        $sql = "UPDATE website_setting SET website_title = ?, website_about = ?, website_image = ?, 
            website_favicon = ?, website_clients = ?, website_expirience = ?, website_proyects = ?, fecha_modifica = now() WHERE id_website_setting = $this->intWebsite";
        $data = array($this->strWebTitle, $this->strWebAbout, $this->strImagenWeb, $this->strFaviconWeb, $this->intClients, $this->intExpierence, $this->intProyects);
        $request_update = $this->update_sql($sql, $data);
        return $request_update;
    }
}