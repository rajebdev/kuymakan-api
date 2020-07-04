<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Foods Controller
 *
 * @property \App\Model\Table\FoodsTable $Foods
 *
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $foods = $this->Foods->find('all')
            ->contain(['Foodtypes', 'Categories', 'Restaurants']);

        $this->viewBuilder()->setLayout('');
        $respond_code = 200;

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'response' => $respond_code,
                'data' => $foods
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
     * @param string|null $id Food id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.foods
     */
    public function view($id = null)
    {
        $food = $this->Foods->get($id);

        $this->viewBuilder()->setLayout('');
        $respond_code = 200;

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'response' => $respond_code,
                'data' => $food
            ]));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $food = $this->Foods->newEntity();
        if ($this->request->is('post')) {
            $food = $this->Foods->patchEntity($food, $this->request->getData());
            if ($this->Foods->save($food)) {
                $this->Flash->success(__('The food has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food could not be saved. Please, try again.'));
        }
        $foodtypes = $this->Foods->Foodtypes->find('list', ['limit' => 200]);
        $categories = $this->Foods->Categories->find('list', ['limit' => 200]);
        $restaurants = $this->Foods->Restaurants->find('list', ['limit' => 200]);
        $this->set(compact('food', 'foodtypes', 'categories', 'restaurants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $food = $this->Foods->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $food = $this->Foods->patchEntity($food, $this->request->getData());
            if ($this->Foods->save($food)) {
                $this->Flash->success(__('The food has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food could not be saved. Please, try again.'));
        }
        $foodtypes = $this->Foods->Foodtypes->find('list', ['limit' => 200]);
        $categories = $this->Foods->Categories->find('list', ['limit' => 200]);
        $restaurants = $this->Foods->Restaurants->find('list', ['limit' => 200]);
        $this->set(compact('food', 'foodtypes', 'categories', 'restaurants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $food = $this->Foods->get($id);
        if ($this->Foods->delete($food)) {
            $this->Flash->success(__('The food has been deleted.'));
        } else {
            $this->Flash->error(__('The food could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
