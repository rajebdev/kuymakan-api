<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Tokens');
        $this->loadModel('Foods');
        $this->loadModel('Foodorders');
    }

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
    public function list($token = null)
    {
        $this->viewBuilder()->setLayout('');
        if ($token) {
            $user_id = $this->Tokens->findByCode($token)->first()->user_id;
            $orders = $this->Orders->findByUserId($user_id)
                ->contain([
                    'FoodOrders'
                ]);

            $respond_code = 200;

            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode([
                    'response' => $respond_code,
                    'data' => $orders
                ]));
        }
        $respond_code = 403;

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'response' => $respond_code,
                'data' => []
            ]));
    }


    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $token = null)
    {
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function checkout($token = null)
    {
        $this->viewBuilder()->setLayout('');
        if ($this->request->is(['post'])) {
            if ($token) {
                $user_id = $this->Tokens->findByCode($token)->first()->user_id;

                $order = $this->Orders->newEntity();
                $data = json_decode(file_get_contents('php://input'));
                $order->code = "KMF" . uniqid();
                $order->created = date('Y-m-d H:i:s');
                $order->orderstatus_id = 1;
                $order->user_id = $user_id;
                $order->location_send = $data->location_send;
                $order->restaurant_id = $data->restaurant_id;
                $error = true;
                $order_save = $this->Orders->save($order);
                if ($order_save) {
                    $error = false;
                    $foodorders = [];
                    foreach ($data->foodorders as $food) {
                        $foodorder = [];
                        $foodorder['food_id'] = $food->id;
                        $foodorder['order_id'] = $order_save->id;
                        $foodorder['amount'] = 1;
                        $foodorders[] = $foodorder;
                    }

                    $foodorders = $this->Foodorders->newEntities($foodorders);

                    foreach ($foodorders as $entity) {
                        $this->Foodorders->save($entity);
                    }
                }
                $status = 0;
                $respond_code = 500;
                if (!$error) {
                    $respond_code = 200;
                    $status = 1;
                }
                return $this->response
                    ->withType('application/json')
                    ->withStringBody(json_encode([
                        'response' => $respond_code,
                        'status' => $status
                    ]));
            }

            $respond_code = 403;

            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode([
                    'response' => $respond_code,
                    'status' => 0
                ]));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $orderstatus = $this->Orders->Orderstatus->find('list', ['limit' => 200]);
        $buyers = $this->Orders->Buyers->find('list', ['limit' => 200]);
        $restaurants = $this->Orders->Restaurants->find('list', ['limit' => 200]);
        $this->set(compact('order', 'orderstatus', 'buyers', 'restaurants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
