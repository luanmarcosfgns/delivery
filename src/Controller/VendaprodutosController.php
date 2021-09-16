<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Vendaprodutos Controller
 *
 * @property \App\Model\Table\VendaprodutosTable $Vendaprodutos
 * @method \App\Model\Entity\Vendaproduto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendaprodutosController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($venda_id) {
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }
        $this->paginate = [
            'contain' => ['Produtos', 'Vendas'],
        ];

        $vendaprodutos = $this->paginate($this->Vendaprodutos, ['conditions' => 'venda_id=' . $venda_id]);
        $produto = $this->paginate($this->Produtos);

        $this->set(compact('vendaprodutos'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendaproduto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $vendaproduto = $this->Vendaprodutos->get($id, [
            'contain' => ['Produtos', 'Vendas'],
        ]);

        $this->set('vendaproduto', $vendaproduto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($data) {
        $vendaproduto = $this->Vendaprodutos->newEmptyEntity();

        $vendaproduto = $this->Vendaprodutos->patchEntity($vendaproduto, $data);
        if ($this->Vendaprodutos->save($vendaproduto)) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendaproduto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $vendaproduto = $this->Vendaprodutos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendaproduto = $this->Vendaprodutos->patchEntity($vendaproduto, $this->request->getData());
            if ($this->Vendaprodutos->save($vendaproduto)) {
                $this->Flash->success(__('The vendaproduto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendaproduto could not be saved. Please, try again.'));
        }
        $produtos = $this->Vendaprodutos->Produtos->find('list', ['limit' => 200]);
        $vendas = $this->Vendaprodutos->Vendas->find('list', ['limit' => 200]);
        $this->set(compact('vendaproduto', 'produtos', 'vendas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendaproduto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $vendaproduto = $this->Vendaprodutos->get($id);
        if ($this->Vendaprodutos->delete($vendaproduto)) {
            $this->Flash->success(__('The vendaproduto has been deleted.'));
        } else {
            $this->Flash->error(__('The vendaproduto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
