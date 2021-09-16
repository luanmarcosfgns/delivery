<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Vendas Controller
 *
 * @property \App\Model\Table\VendasTable $Vendas
 * @method \App\Model\Entity\Venda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendasController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }

        $this->paginate = [
            'contain' => ['Enderecos'],
        ];
        $vendas = $this->paginate($this->Vendas, ['conditions' => 'user_id_cliente=' . $_SESSION['Auth']['User']['id'], 'order' => ['vendas.id'=>'desc']]);

        $this->set(compact('vendas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Enderecos', 'Vendaprodutos', 'Vendatituloentrega'],
        ]);

        $this->set('venda', $venda);


        $connection = ConnectionManager::get('default');

        $connection->execute('update vendas set lida=1 where id= :id ', [':id' => $id]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($data) {
        $venda = $this->Vendas->newEmptyEntity();

        $venda = $this->Vendas->patchEntity($venda, $data);
        if ($this->Vendas->save($venda)) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    /**
     * Edit method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $venda = $this->Vendas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['lida'] = 0;
            $venda = $this->Vendas->patchEntity($venda, $data);
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venda could not be saved. Please, try again.'));
        }
        $enderecos = $this->Vendas->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'enderecos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('The venda has been deleted.'));
        } else {
            $this->Flash->error(__('The venda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
