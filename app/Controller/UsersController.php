<!-- File: /app/Controller/UsersController.php -->

<?php
    class UsersController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
            // $this->Auth->allow("add", "logout", "login", "edit");
            $this->Auth->allow("index", "initDB", "preAdd", "add");
        }
        
        public function initDB() {
            $grupo = $this->User->Grupo;

            // Administrador
            $grupo->id = 1;
            $this->Acl->deny($grupo, 'controllers');
            $this->Acl->allow($grupo, 'controllers/Pages/admin');
            $this->Acl->allow($grupo, 'controllers/Alumnos');
            $this->Acl->allow($grupo, 'controllers/Docentes');
            $this->Acl->allow($grupo, 'controllers/Articulos');
            $this->Acl->allow($grupo, 'controllers/Grados');
            $this->Acl->allow($grupo, 'controllers/Secciones');
            $this->Acl->allow($grupo, 'controllers/Cursos');
            $this->Acl->allow($grupo, 'controllers/Aulas');
            $this->Acl->allow($grupo, 'controllers/Users');
            $this->Acl->allow($grupo, 'controllers/Periodos');
            $this->Acl->allow($grupo, 'controllers/Horarios');
            $this->Acl->deny($grupo, 'controllers/Horarios/horarioAlumno');
            $this->Acl->allow($grupo, 'controllers/Matriculas/index');
            
            // Alumno
            $grupo->id = 2;
            $this->Acl->allow($grupo, 'controllers/Pages/alumno');
            $this->Acl->allow($grupo, 'controllers/Mensajes/registrar');

            // Docente
            $grupo->id = 3;
            $this->Acl->deny($grupo, 'controllers');
            $this->Acl->allow($grupo, 'controllers/Pages/docente');
/*
            // allow basic users to log out
            $this->Acl->allow($group, 'controllers/users/logout');
*/
            // we add an exit to avoid an ugly "missing views" error message
            echo "all done";
            exit;
        }
        
        public function index() {
            $this->layout = "admin";
            
            $this->User->recursive = 0;
            $this->set('users', $this->paginate());
        }

        public function view($id = null) {
            $this->layout = "admin";
            
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Usuario inválido'));
            }
            $this->set('user', $this->User->read(null, $id));
        }

        public function add() {
            $this->layout = "admin";
            $this->set("grupos", $this->User->Grupo->find("list", array(
                "fields" => array("Grupo.idGrupo", "Grupo.descripcion")
            )));
            
            if ($this->request->is('post')) {
                $this->User->create();
                $this->request->data["User"]["idUser"] = $this->User->getIdUser();
                if ($this->User->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__('El usuario ha sido registrado correctamente'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__("No fue posible registrar el usuario."), "flash_bootstrap");
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
      
        public function login() {
            $this->layout = false;
            
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $grupo = $this->Auth->user()["Grupo"]["descripcion"];
                    switch ($grupo) {
                        case "Administrador":
                            return $this->redirect("/Pages/admin");
                            break;
                        case "Alumno":
                            return $this->redirect("/Pages/alumno/");
                            break;
                        case "Docente":
                            return $this->redirect("/Pages/docente");
                            break;
                    }
                }
                $this->Session->setFlash(__('Nombre de Usuario o password incorrecto, inténtelo nuevamente'), "flash_bootstrap");
            }
        }

        public function logout() {
            return $this->redirect($this->Auth->logout());
        }
        
        public function preAdd() {
            $this->layout = "admin";
        }
}