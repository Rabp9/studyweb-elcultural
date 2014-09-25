<!-- File: /app/Controller/GruposController.php -->

<?php
    class GruposController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("add");
        }
        
        public function index() {
            $this->layout = "admin";
            
            $this->Grupo->recursive = 0;
            $this->set('grupos', $this->paginate());
        }

        public function view($id = null) {
            $this->layout = "admin";
            
            $this->Grupo->id = $id;
            if (!$this->Grupo->exists()) {
                throw new NotFoundException(__('Grupo inválido'));
            }
            $this->set('grupo', $this->Grupo->read(null, $id));
        }

        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is('post')) {
                $this->Grupo->create();
                if ($this->Grupo->save($this->request->data)) {
                    $this->Session->setFlash(__('El grupo ha sido registrado correctamente'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__("No fue posible registrar al grupo."), "flash_bootstrap");
            }
        }

        public function edit($id = null) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.')
                );
            } else {
                $this->request->data = $this->User->read(null, $id);
                unset($this->request->data['User']['password']);
            }
        }

        public function delete($id = null) {
            $this->request->onlyAllow('post');

            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            }
            if ($this->User->delete()) {
                $this->Session->setFlash(__('User deleted'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('User was not deleted'));
            return $this->redirect(array('action' => 'index'));
        }
}