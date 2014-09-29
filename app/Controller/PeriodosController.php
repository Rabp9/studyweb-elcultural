<!-- File: /app/Controller/PeriodosController.php -->

<?php
    class PeriodosController extends AppController {              
        public function index() {
            $this->layout = "admin";
            $this->set("periodos", $this->Periodo->find("all", array(
                "conditions" => array("Periodo.estado" => "1")
            )));
        }
        
        public function view($id = null) {
        }
                
        public function add() {
        }
        
        public function edit($id = null) {
        }
           
        public function delete($id) {
        }
}