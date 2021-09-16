<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Sessaos Controller
 *
 * @property \App\Model\Table\SessaosTable $Sessaos
 * @method \App\Model\Entity\Sessao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SessaosController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }
        $sessaos = $this->paginate($this->Sessaos);

        $this->set(compact('sessaos'));
        if (strpos($_SERVER['REQUEST_URI'], 'index') == 0) {
            return $this->redirect(['action' => 'index/']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Sessao id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $sessao = $this->Sessaos->get($id, [
            'contain' => ['Produtos'],
        ]);

        $this->set('sessao', $sessao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $sessao = $this->Sessaos->newEmptyEntity();
        if ($this->request->is('post')) {
            $sessao = $this->Sessaos->patchEntity($sessao, $this->request->getData());
            if ($this->Sessaos->save($sessao)) {
                $this->Flash->success(__('The sessao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sessao could not be saved. Please, try again.'));
        }
        $this->set(compact('sessao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sessao id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $sessao = $this->Sessaos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sessao = $this->Sessaos->patchEntity($sessao, $this->request->getData());
            if ($this->Sessaos->save($sessao)) {
                $this->Flash->success(__('The sessao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sessao could not be saved. Please, try again.'));
        }
        $this->set(compact('sessao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sessao id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $sessao = $this->Sessaos->get($id);
        if ($this->Sessaos->delete($sessao)) {
            $this->Flash->success(__('The sessao has been deleted.'));
        } else {
            $this->Flash->error(__('The sessao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
