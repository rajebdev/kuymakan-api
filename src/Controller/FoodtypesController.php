<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Foodtypes Controller
 *
 * @property \App\Model\Table\FoodtypesTable $Foodtypes
 *
 * @method \App\Model\Entity\Foodtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodtypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $foodtypes = $this->Foodtypes->find('all');

        $this->viewBuilder()->setLayout('');
        $respond_code = 200;

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'response' => $respond_code,
                'data' => $foodtypes
            ]));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    /**
     * View method
     *
     * @param string|null $id Foodtype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodtype = $this->Foodtypes->get($id, [
            'contain' => ['Foods'],
        ]);

        $this->set('foodtype', $foodtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    private function add()
    {
        $foodtype = $this->Foodtypes->newEntity();
        if ($this->request->is('post')) {
            $foodtype = $this->Foodtypes->patchEntity($foodtype, $this->request->getData());
            if ($this->Foodtypes->save($foodtype)) {
                $this->Flash->success(__('The foodtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The foodtype could not be saved. Please, try again.'));
        }
        $this->set(compact('foodtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Foodtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    private function edit($id = null)
    {
        $foodtype = $this->Foodtypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodtype = $this->Foodtypes->patchEntity($foodtype, $this->request->getData());
            if ($this->Foodtypes->save($foodtype)) {
                $this->Flash->success(__('The foodtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The foodtype could not be saved. Please, try again.'));
        }
        $this->set(compact('foodtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Foodtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    private function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodtype = $this->Foodtypes->get($id);
        if ($this->Foodtypes->delete($foodtype)) {
            $this->Flash->success(__('The foodtype has been deleted.'));
        } else {
            $this->Flash->error(__('The foodtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
