<?php 
	class Home extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home()
		{
            $data["page_id"] = 1;
            $data["page_title"] = "Inicio";
            $data["page"] = "home";
			$this->views->getView($this,"home",$data); 
		}

	}