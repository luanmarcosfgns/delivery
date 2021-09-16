<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Enderecos Controller
 *
 * @property \App\Model\Table\EnderecosTable $Enderecos
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnderecosController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id = null) {
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }
        if (empty($id) == false and empty($_SESSION['listadeprodutos']) == false) {
            $_SESSION['vendas']['endereco_id'] = $id;
            $this->redirect(['action' => 'add ', 'controller' => 'Vendatituloentrega']);
        }
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $enderecos = $this->paginate($this->Enderecos, ['conditions' => 'enderecos.user_id=' . $_SESSION['Auth']['User']['id']]);

        $this->set(compact('enderecos'));
    }

    public function lista($id = null) {
        if (empty($id) == false and empty($_SESSION['listadeprodutos']) == false) {
            $_SESSION['vendas']['endereco_id'] = $id;
            $this->redirect(['action' => 'add ', 'controller' => 'Vendatituloentrega']);
        }
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $enderecos = $this->paginate($this->Enderecos, ['conditions' => 'enderecos.user_id=' . $_SESSION['Auth']['User']['id']]);

        $this->set(compact('enderecos'));
    }

    /**
     * View method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $endereco = $this->Enderecos->get($id, [
            'contain' => ['Users', 'Vendas'],
        ]);

        $this->set('endereco', $endereco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $endereco = $this->Enderecos->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $_SESSION['Auth']['User']['id'];
            $endereco = $this->Enderecos->patchEntity($endereco, $data);
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Salvo com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Houve um problema'));
        }
        $users = $this->Enderecos->Users->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'users'));
    }

    public function adicionar() {
        $endereco = $this->Enderecos->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $_SESSION['Auth']['User']['id'];
            $endereco = $this->Enderecos->patchEntity($endereco, $data);
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Salvo com sucesso'));

                return $this->redirect(['controller' => 'users', 'action' => 'view']);
            }
            $this->Flash->error(__('Houve um problema'));
        }
        $users = $this->Enderecos->Users->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null) {
        $endereco = $this->Enderecos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['user_id'] = $_SESSION['Auth']['User']['id'];
            $endereco = $this->Enderecos->patchEntity($endereco, $data);
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Salvo com sucesso'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('Houve um problema'));
        }
        $users = $this->Enderecos->Users->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $endereco = $this->Enderecos->get($id);
        if ($this->Enderecos->delete($endereco)) {
            $this->Flash->success(__('The endereco has been deleted.'));
        } else {
            $this->Flash->error(__('The endereco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
