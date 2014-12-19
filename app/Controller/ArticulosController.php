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
                throw new NotFoundException(__("Artículo inválido"));
            }
            $articulo = $this->Articulo->findByIdarticulo($id);
            if (!$articulo) {
                throw new NotFoundException(__("Artículo inválido"));
            } 
            $this->set("articulo", $articulo);
        }
        
        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is("post")) {
                $this->Articulo->create();
                
                $filename = $this->request->data["Articulo"]["foto"]["name"];
                move_uploaded_file($this->request->data['Articulo']['foto']['tmp_name'], WWW_ROOT. DS . "img" . DS . "novedades" . DS . $filename);  
                unset($this->request->data["Articulo"]["foto"]);
                $this->request->data["Articulo"]["foto"] = $filename;

                if ($this->Articulo->save($this->request->data)) {
                    $this->Session->setFlash(__("El grado ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el artìculo."), "flash_bootstrap");
            }
        }
        
        public function edit($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Artículo inválido"));
            }
            $articulo = $this->Articulo->findByIdarticulo($id);
            if (!$articulo) {
                throw new NotFoundException(__("Artículo inválido"));
            }
            
      
            if ($this->request->is(array("post", "put"))) {      
                
                $filename = $this->request->data["Articulo"]["foto"]["name"];
                unlink(WWW_ROOT . DS . "img" . DS . "novedades" . DS . $articulo["Articulo"]["foto"]);
                move_uploaded_file($this->request->data['Articulo']['foto']['tmp_name'], WWW_ROOT. DS . "img" . DS . "novedades" . DS . $filename);  
                unset($this->request->data["Articulo"]["foto"]);
                $this->request->data["Articulo"]["foto"] = $filename;

                $this->Articulo->id = $id;
                if ($this->Articulo->save($this->request->data)) {
                    $this->Session->setFlash(__("El artículo ha sido actualizado."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar el artìculo."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $articulo;
            }
        }
           
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Articulo->id = $id;
            if ($this->Articulo->saveField("estado", 2)) {
                $this->Session->setFlash(__("El artículo de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
        
        public function ultimos() {
            if(empty($this->request->params["requested"])) {
                throw new ForbiddenException();
            }
            return $this->Articulo->find("all", array(
                "order" => "Articulo.created DESC", "limit" => 10,
                'conditions' => array('Articulo.estado' => '1')
            ));
        }
}