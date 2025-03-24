<?php

    require_once(BASE_PATH . '/app/config/database.php');
    require_once(BASE_PATH . '/app/models/NganhHocModel.php');

    class NganhHocController
    {
        private $nganhhocModel;
        private $db;

        public function __construct()
        {
            $this->db=(new Database())->getConnection();
            $this->nganhhocModel = new NganhHocModel($this->db);
        }

        public function list()
        {
            $nganhhoc = $this->nganhhocModel->getNganhHoc();
            include 'app/views/nganhhoc/list.php';
        }
    }
?>