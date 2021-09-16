<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Notas Controller
 *
 * @property \App\Model\Table\NotasTable $Notas
 * @method \App\Model\Entity\Nota[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotasController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Usersnotas'],
        ];
        $usersnotas = $this->paginate($this->Usernotas);
        $_SESSION['Auth']['User']['role_id'] !== 1 ?
                $notas = $this->paginate($this->Notas, ['conditions' => ['notas.datafim <= now() and notas.datainicio >= now()']]) : $notas = $this->paginate($this->Notas, ['order' => ['notas.created'=> 'desc']]);



        $this->set(compact('notas'));
    }

    /**
     * View method
     *
     * @param string|null $id Nota id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $nota = $this->Notas->get($id, [
            'contain' => [],
        ]);
        $connection = ConnectionManager::get('default');
        if ($connection->execute('select count(id) from usersnotas where nota_id=:nota_id and user_id=:user_id', [':user_id' => $_SESSION['Auth']['User']['id'], 'nota_id' => $id])->fetchall() [0][0] == 0) {

            $connection->execute('insert usersnotas (user_id, nota_id) values(:user_id,:nota_id) ', [':nota_id' => $id, ':user_id' => $_SESSION['Auth']['User']['id']]);
        }
        $this->set('nota', $nota);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $nota = $this->Notas->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $arquivo = $_FILES['imagem']['tmp_name'];
            $tparquivo = strstr($_FILES['imagem']['type'], '/');
            if (empty($arquivo)) {
                $this->Flash->error(__('Houve um erro'));
            } else {
                $dados = file($arquivo);
                $data['tipo'] = str_replace('/', '.', $tparquivo);
                $data['imagem'] = implode('', $dados);
                $nota = $this->Notas->patchEntity($nota, $data);
            }



            if ($this->Notas->save($nota)) {
                $this->Flash->success(__('The nota has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nota could not be saved. Please, try again.'));
        }
        $this->set(compact('nota'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nota id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $nota = $this->Notas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nota = $this->Notas->patchEntity($nota, $this->request->getData());
            if ($this->Notas->save($nota)) {
                $this->Flash->success(__('The nota has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nota could not be saved. Please, try again.'));
        }
        $this->set(compact('nota'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nota id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $nota = $this->Notas->get($id);
        if ($this->Notas->delete($nota)) {
            $this->Flash->success(__('The nota has been deleted.'));
        } else {
            $this->Flash->error(__('The nota could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
