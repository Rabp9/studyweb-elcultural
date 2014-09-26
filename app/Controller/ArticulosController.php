<!-- File: /app/Controller/ArticulosController.php -->

<?php
    class ArticulosController extends AppController {    
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("ultimos");
        }
        
        public function index() {
            $this->layout = "admin";
            $this->set("articulos", $this->Articulo->find("all", array(
                'conditions' => array('Articulo.estado' => '1')
            )));
        }
        
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Articulo inválido"));
            }
            $grado = $this->Articulo->findByIdarticulo($id);
            if (!$grado) {
                throw new NotFoundException(__("Articulo inválido"));
            } 
            $this->set("articulo", $articulo);
        }
        
        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is("post")) {
                $this->Articulo->create();
                $filename = $this->request->data["Articulo"]["foto"]["name"];
                unset($this->request->data["Articulo"]["foto"]);
                $this->request->data["Articulo"]["foto"] = $filename;
                if ($this->Articulo->save($this->request->data)) {
                    debug($this->request->data);
                    $this->Session->setFlash(__("El grado ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el artìculo."), "flash_bootstrap");
            }
        }
        
        public function edit($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Articulo inválido"));
            }
            $grado = $this->Articulo->findByIdgrado($id);
            if (!$grado) {
                throw new NotFoundException(__("Articulo inválido"));
            }
            if ($this->request->is(array("post", "put"))) {
                $this->Articulo->id = $id;
                if ($this->Articulo->save($this->request->data)) {
                    $this->Session->setFlash(__("El artìculo ha sido actualizado."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar el artìculo."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $grado;
            }
        }
           
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Articulo->id = $id;
            if ($this->Articulo->saveField("estado", 2)) {
                $this->Session->setFlash(__("El artìxulo de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
        
        public function ultimos() {
            if(empty($this->request->params["requested"])) {
                throw new ForbiddenException();
            }
            return $this->Articulo->find("all", array("order" => "Articulo.created DESC", "limit" => 10));
        }
}