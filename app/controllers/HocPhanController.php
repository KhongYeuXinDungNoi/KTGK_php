<?php

    require_once(BASE_PATH . '/app/config/database.php');
    require_once(BASE_PATH . '/app/models/HocPhanModel.php');

    class HocPhanController
    {
        private $hocphanModel;
        private $db;

        public function __construct()
        {
            $this->db=(new Database())->getConnection();
            $this->hocphanModel = new HocPhanModel($this->db);
        }

        public function list()
        {
            $hocphans = $this->hocphanModel->getHocPhan();  
            include BASE_PATH . '/app/views/hocphan/list.php';
        }
    }
?>