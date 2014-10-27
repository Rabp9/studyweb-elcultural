<!-- File: /app/Controller/ReportesController.php -->

<?php
    class ReportesController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("estadisticas");
        }
        
        public function estadisticas() {
            $this->layout = "docente";
        }
    }
?>