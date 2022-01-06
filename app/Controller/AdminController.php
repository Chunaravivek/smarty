<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');


class AdminController extends AppController {
    public $uses = array('Admin');
     
    public function index() {
        
        $description = 'Manage Admin';
        $keywords = 'Manage Admin';
        $this->set(compact('keywords', 'description'));
    }
    
    public function records() {
//        echo "<pre>";
//        print_r($this->params->query);
//        exit;
        
        if(isset($this->params->query['sidx']) && $this->params->query['sidx']!='') {
            $order="Admin.".$this->params->query['sidx']." ".$this->params->query['sord']."";
        } else {
            $order="Admin.modified_date DESC";
        }
        
        $i = 0;
        $result = array();
        
        if (isset($this->params->query['page']) && $this->params->query['page'] != '') {
            $result['page'] = (int) $this->params->query['page'];
        } else {
            $result['page'] = 1;
        }
        
        if (isset($this->params->query['rows']) && $this->params->query['rows'] != '') {
            $limit = (int) $this->params->query['rows'];
        } else {
            $limit = 30;
        }
        
        $offset = ($result['page'] - 1) * $limit;

        $keys = $this->Admin->find('all',array('order' => $order,'limit'=>$limit,'offset'=>$offset)); 
        $keys_count = $this->Admin->find('count',array('order' => $order)); 
        
        $result['total'] = count($keys);
       
        $result['records'] = $keys_count;
        
        foreach ($keys as $key){
            
            $result['rows'][$i]['id'] = $key['Admin']['id'];
            
            $result['rows'][$i]['cell']=array(
                '',
                $key['Admin']['id'],
                $key['Admin']['full_name'],
                $key['Admin']['email'],
                $key['Admin']['status'],
                date('d/m/Y', $key['Admin']['created_date']),
                date('d/m/Y h:i:s A', $key['Admin']['modified_date']),
            );
          
            $i++;
        }
     
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }
    
    
    public function login() {
       
        $this->layout = 'user';
        if($this->request->is('post')) {
            
            $email = $this->request->data['Admin']['email'];
            $pass = $this->request->data['Admin']['password'];

            $check= $this->Admin->find('first', array(
                'conditions' => array(
                    'AND' => array(
                        array('Admin.email' => $email),
                        array('Admin.password' => $pass)
                    )
                )
            ));

            if($check !=null)
            {
                $this->Session->write('admin_id',$check['Admin']['id']);
                $this->Session->write('email',$check['Admin']['email']);
                $this->Session->write('status',$check['Admin']['status']);
                $this->Session->write('full_name',$check['Admin']['full_name']);
                
                if (isset($this->request->query['returnURL'])) {
                    $controller = $this->request->query['returnURL'];
                    $this->redirect(array('controller' => $controller));
                } else {

                    $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
                }

//                $this->redirect(array('controller'=>'Dashboard','action'=>'index'));
            } else {
                $this->Session->setFlash(__('Invalid email or Password'), 'swift_failure');
            }
        }
    }
    
    
    public function logout() {
      
        $this->Session->delete('type');
        $this->Session->delete('status');
        $this->Session->delete('admin_id');
        $this->Session->delete('email');
        $this->Session->delete('full_name');
       
        $this->redirect(array('controller'=>'Admin','action'=>'login'));
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->Admin->create();
            $this->request->data['Admin']['status'] = 1;
//            $this->request->data['Admin']['created_date'] = date('Y-m-d H:i:s');
            $this->request->data['Admin']['created_date'] = time();
            $this->request->data['Admin']['modified_date'] = time();
            
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('Admin has been Add successfully'), 'swift_success');
                return $this->redirect(array('controller'=>'Admin','action'=>'index'));
            } else {
                $this->Session->setFlash(__("Unable to pasword Admin"), 'swift_failure');
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function edit() {
        
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id');
          
          
            if (!$this->Admin->exists($id)) {
                throw new NotFoundException(__('Invalid post'));
            }
            $options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
            $this->request->data = $this->Admin->find('first', $options);
            
           
            $this->set('id', $this->request->data['Admin']['id']);
            $this->set(array(
                '_serialize' => array('Admin')
            ));
        }
    }
    
    public function save($id = NULL) {
        
        $id = $this->request->params['pass'][0];
        $this->Admin->id = $id;

        if ($this->Admin->exists($this->Admin->id)) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->request->data['Admin']['modified_date'] = time();
             
           
                if ($this->Admin->save($this->request->data)) {
                    $this->Session->setFlash(__('Admin has been Updated successfully'), 'swift_success');
                    return $this->redirect(array('action' => 'index'));
                }   else {
                    $this->Session->setFlash(__("Unable to Add Admin"), 'swift_failure');
                    return $this->redirect(array('action' => 'add'));
                }
            }
        }
    }
    
    public function delete($id) {
        
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        
        $this->Admin->id = $id;
        
        if ($this->Admin->delete($this->Admin->id)) {
            $this->Session->setFlash(__("Admin has been deleted successfully"), 'swift_success');
        } else {
            $this->Session->setFlash(__("The Admin with id: %s could not be deleted", h($id)), 'swift_failure');
        }

        return $this->redirect(array('action' => 'index'));
    }
    
    public function deleteAll() {
        if($this->request->is('post')) {
            $get_ids = explode(',', $this->request->data['id']);
            
            if (count($get_ids) > 0) {
                foreach ($get_ids as $key => $value) {
                    $this->Admin->delete($value,true);
                }    
            }
        }
        exit;
    }
    
    function update_status() {
        $id = $this->request->data['id'];
        unset($this->request->data['id']);
        $this->request->data['Admin']['status'] = $this->request->data['status_val'];
        unset($this->request->data['status_val']);
        
        if (!$this->Admin->exists($id)) {
            throw new NotFoundException(__('Invalid Admin'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {   
            
            $this->request->data['Admin']['id'] = $id;
//            echo "<pre>";print_r($this->request->data);exit;
            if ($this->Admin->save($this->request->data)) {                
                echo 1;
            } else {
                echo 2;
            }
        }
        exit;
    }
}
