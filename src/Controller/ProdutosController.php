<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($pesquisa = null) {
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }

        $pesquisa == null ?: $pesquisa = strtolower($pesquisa);
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }
        $this->paginate = [
            'contain' => ['Sessaos'],
        ];
        empty($pesquisa) == false ?
                        $produtos = $this->paginate($this->Produtos, ['conditions' => ['produtos.nome like "%' . $pesquisa . '%" or produtos.descricao like"%' . $pesquisa . '%"']]) : $produtos = $this->paginate($this->Produtos);
        $_SESSION['pesquisa'] = $pesquisa;
        $this->set(compact('produtos'));
    }

    public function aquisicao($pesquisa = null) {
        if (empty($_SESSION['listadeprodutos']['id'])) {
            $this->Flash->error(__('Não há produtos no carrinho'));
            return $this->redirect(['action' => 'index']);
        }

        $pesquisa == null ?: $pesquisa = strtolower($pesquisa);
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {

        }
        $this->paginate = [
            'contain' => ['Sessaos'],
        ];
        $in = '(' . implode(',', $_SESSION['listadeprodutos']['id']) . ')';

        empty($pesquisa) == false ?
                        $produtos = $this->paginate($this->Produtos, ['conditions' => ['produtos.nome like "%' . $pesquisa . '%" or produtos.descricao like"%' . $pesquisa . '%" and produtos.id in ' . $in]]) : $produtos = $this->paginate($this->Produtos, ['conditions' => ' produtos.id in ' . $in]);
        $_SESSION['pesquisa'] = $pesquisa;
        $this->set(compact('produtos'));
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $conn = ConnectionManager::get('default');
        $produto = $this->Produtos->get($id, [
            'contain' => ['Sessaos', 'Vendaprodutos'],
        ]);
        if (empty($_SESSION['listadeprodutos']['id'])) {
            unset($_SESSION['listadeprodutos']);
        }
        $this->set('produto', $produto);


        if ($this->request->is(['patch', 'post', 'put'])) {
            if (empty($_SESSION['listadeprodutos'])) {
                $_SESSION['listadeprodutos']['id'][1] = $id;
                $_SESSION['listadeprodutos']['quantidade'][1] = $this->request->getData('quantidade');
                $_SESSION['listadeprodutos']['preco'][1] = $conn->execute('select preco from produtos where id = :id', [':id' => $id])->fetchall()[0][0];
            } else {

                $i = count($_SESSION['listadeprodutos']['id']) + 1;
                $_SESSION['listadeprodutos']['id'][$i] = $id;
                $_SESSION['listadeprodutos']['quantidade'][$i] = $this->request->getData('quantidade');
                $_SESSION['listadeprodutos']['preco'][$i] = $conn->execute('select preco from produtos where id = :id', [':id' => $id])->fetchall()[0][0];
            }

            $this->Flash->success(__('Adicionado a lista de compras'));

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $produto = $this->Produtos->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {



            $arquivo = $_FILES['foto']['tmp_name'];
            if (empty($arquivo)) {
                $this->Flash->error(__('Houve um erro'));
            } else {
                $dados = file($arquivo);
                $data = $this->request->getData();
                $data['foto'] = implode('', $dados);

                $produto = $this->Produtos->patchEntity($produto, $data);
                if ($this->Produtos->save($produto)) {
                    $this->Flash->success(__('Produto Cadastrado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The produto could not be saved. Please, try again.'));
            }

//Ler os dados do array
        }
        $sessaos = $this->Produtos->Sessaos->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'sessaos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {


            $arquivo = $_FILES['foto']['tmp_name'];
            if (empty($arquivo)) {
                $this->Flash->error(__('Houve um erro'));
            } else {
                $dados = file($arquivo);
                $data = $this->request->getData();
                $data['foto'] = implode('', $dados);

                $produto = $this->Produtos->patchEntity($produto, $data);
                if ($this->Produtos->save($produto)) {
                    $this->Flash->success(__('The produto has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The produto could not be saved. Please, try again.'));
            }
        }
        $sessaos = $this->Produtos->Sessaos->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'sessaos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('The produto has been deleted.'));
        } else {
            $this->Flash->error(__('The produto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function tirarcarrinho($i) {

        unset($_SESSION['listadeprodutos']['id'][$i]);
        unset($_SESSION['listadeprodutos']['quantidade'][$i]);
        return $this->redirect(['action' => 'aquisicao']);
    }

}
