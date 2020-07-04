<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Restaurant Controller
 *
 *
 * @method \App\Model\Entity\Restaurant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RestaurantController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $restaurants = $this->Restaurant->find('all');

        $this->viewBuilder()->setLayout('');
        $respond_code = 200;

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'response' => $respond_code,
                'data' => $restaurants
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
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restaurant = $this->Restaurant->get($id, [
            'contain' => [],
        ]);

        $this->set('restaurant', $restaurant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $restaurant = $this->Restaurant->newEntity();
        if ($this->request->is('post')) {
            $restaurant = $this->Restaurant->patchEntity($restaurant, $this->request->getData());
            if ($this->Restaurant->save($restaurant)) {
                $this->Flash->success(__('The restaurant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
        }
        $this->set(compact('restaurant'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $restaurant = $this->Restaurant->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $restaurant = $this->Restaurant->patchEntity($restaurant, $this->request->getData());
            if ($this->Restaurant->save($restaurant)) {
                $this->Flash->success(__('The restaurant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
        }
        $this->set(compact('restaurant'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $restaurant = $this->Restaurant->get($id);
        if ($this->Restaurant->delete($restaurant)) {
            $this->Flash->success(__('The restaurant has been deleted.'));
        } else {
            $this->Flash->error(__('The restaurant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
