<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Vendatituloentrega Controller
 *
 * @property \App\Model\Table\VendatituloentregaTable $Vendatituloentrega
 * @method \App\Model\Entity\Vendatituloentrega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendatituloentregaController extends AppController {

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
            'contain' => ['Vendas'],
        ];
        $vendatituloentrega = $this->paginate($this->Vendatituloentrega);

        $this->set(compact('vendatituloentrega'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendatituloentrega id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $vendatituloentrega = $this->Vendatituloentrega->get($id, [
            'contain' => ['Vendas'],
        ]);

        $this->set('vendatituloentrega', $vendatituloentrega);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->request->is('post')) {

            $conn = ConnectionManager::get('default');


            $conn->query('START TRANSACTION');
            $vendas = new VendasController();
            $vendalistaprodutos = new VendaprodutosController();

            $trvendas = $vendas->add(['user_id_cliente' => $_SESSION['Auth']['User']['id'], 'endereco_id' => $_SESSION['vendas']['endereco_id'], 'status' => 1]);
            if ($trvendas) {

                $venda_id = $conn->execute('select max(id) from vendas  where user_id_cliente= :user_id', [':user_id' => $_SESSION['Auth']['User']['id']])->fetchall()[0][0];
                $vendatituloentrega = $this->Vendatituloentrega->newEmptyEntity();
                for ($i = 1; $i <= count($_SESSION['listadeprodutos']['id']); $i++) {

                    $linhaconfirmada = $vendalistaprodutos->add(['produto_id' => $_SESSION['listadeprodutos']['id'][$i], 'venda_id' => $venda_id, 'quantidade' => $_SESSION['listadeprodutos']['quantidade'][$i], 'preco' => $_SESSION['listadeprodutos']['preco'][$i]]);

                    if ($linhaconfirmada) {

                        $data = $this->request->getData();
                        $data['preco'] = $_SESSION['totalprodutos'];
                        $data['venda_id'] = $venda_id;
                        $vendatituloentrega = $this->Vendatituloentrega->patchEntity($vendatituloentrega, $data);
                    } else {
                        $conn->query('ROLLBACK ');
                        $this->Flash->error(__('Problemas ao inserir a lista venda'));
                        return $this->redirect(['controller' => 'produtos', 'action' => 'index']);
                    }
                }

                if ($this->Vendatituloentrega->save($vendatituloentrega)) {
                    $this->Flash->success(__('Pedido Feito com sucesso aguarde o entregador chegar'));
                    $conn->query('commit');
                    unset($_SESSION['listadeprodutos']);
                    unset($_SESSION['totalprodutos']);
                    unset($_SESSION['vendas']);


                    return $this->redirect(['controller' => 'produtos', 'action' => 'index']);
                } else {
                    $conn->query('ROLLBACK ');
                    $this->Flash->error(__('Problemas ao inserir a fechamento de venda'));
                    return $this->redirect(['controller' => 'produtos', 'action' => 'index']);
                }
            } else {
                $conn->query('ROLLBACK ');
                $this->Flash->error(__('Problemas ao inserir a venda'));
                return $this->redirect(['controller' => 'produtos', 'action' => 'index']);
            }
        }



        $vendas = $this->Vendatituloentrega->Vendas->find('list', ['limit' => 200]);
        $this->set(compact('vendatituloentrega', 'vendas'));
    }

    /*

      public function add()
      {
      $vendatituloentrega = $this->Vendatituloentrega->newEmptyEntity();
      if ($this->request->is('post')) {
      $vendatituloentrega = $this->Vendatituloentrega->patchEntity($vendatituloentrega, $this->request->getData());
      if ($this->Vendatituloentrega->save($vendatituloentrega)) {
      $this->Flash->success(__('The vendatituloentrega has been saved.'));

      return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The vendatituloentrega could not be saved. Please, try again.'));
      }
      $vendas = $this->Vendatituloentrega->Vendas->find('list', ['limit' => 200]);
      $this->set(compact('vendatituloentrega', 'vendas'));
      }


     */

    public function edit($id = null) {
        $vendatituloentrega = $this->Vendatituloentrega->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendatituloentrega = $this->Vendatituloentrega->patchEntity($vendatituloentrega, $this->request->getData());
            if ($this->Vendatituloentrega->save($vendatituloentrega)) {
                $this->Flash->success(__('The vendatituloentrega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendatituloentrega could not be saved. Please, try again.'));
        }
        $vendas = $this->Vendatituloentrega->Vendas->find('list', ['limit' => 200]);
        $this->set(compact('vendatituloentrega', 'vendas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendatituloentrega id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $vendatituloentrega = $this->Vendatituloentrega->get($id);
        if ($this->Vendatituloentrega->delete($vendatituloentrega)) {
            $this->Flash->success(__('The vendatituloentrega has been deleted.'));
        } else {
            $this->Flash->error(__('The vendatituloentrega could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
