<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Orderstatus Controller
 *
 * @property \App\Model\Table\OrderstatusTable $Orderstatus
 *
 * @method \App\Model\Entity\Orderstatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderstatusController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $orderstatus = $this->paginate($this->Orderstatus);

        $this->set(compact('orderstatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Orderstatus id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderstatus = $this->Orderstatus->get($id);

        $respond_code = 200;

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'response' => $respond_code,
                'data' => $orderstatus
            ]));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderstatus = $this->Orderstatus->newEntity();
        if ($this->request->is('post')) {
            $orderstatus = $this->Orderstatus->patchEntity($orderstatus, $this->request->getData());
            if ($this->Orderstatus->save($orderstatus)) {
                $this->Flash->success(__('The orderstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('orderstatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orderstatus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderstatus = $this->Orderstatus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderstatus = $this->Orderstatus->patchEntity($orderstatus, $this->request->getData());
            if ($this->Orderstatus->save($orderstatus)) {
                $this->Flash->success(__('The orderstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('orderstatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orderstatus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderstatus = $this->Orderstatus->get($id);
        if ($this->Orderstatus->delete($orderstatus)) {
            $this->Flash->success(__('The orderstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The orderstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
