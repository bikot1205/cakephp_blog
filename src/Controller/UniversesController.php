<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Universes Controller
 *
 * @property \App\Model\Table\UniversesTable $Universes
 *
 * @method \App\Model\Entity\Universe[] paginate($object = null, array $settings = [])
 */
class UniversesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $universes = $this->paginate($this->Universes);

        $this->set(compact('universes'));
        $this->set('_serialize', ['universes']);
    }

    /**
     * View method
     *
     * @param string|null $id Universe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $universe = $this->Universes->get($id, [
            'contain' => []
        ]);
 
        $this->set('universe', $universe);
        $this->set('config_characteristics', Configure::read('characteristics'));
        $this->set('_serialize', ['universe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $universe = $this->Universes->newEntity();
        if ($this->request->is('post')) {
            $universe = $this->Universes->patchEntity($universe, $this->request->getData());
            $universe->created_at = date('Y-m-d H:i:s');
            $universe->updated_at = date('Y-m-d H:i:s');
            if ($this->Universes->save($universe)) {
                $this->Flash->success(__('The universe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The universe could not be saved. Please, try again.'));
            var_dump($this->request->getData());
        }
        $this->set('config_characteristics', Configure::read('characteristics'));
        $this->set(compact('universe'));
        $this->set('_serialize', ['universe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Universe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $universe = $this->Universes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $universe = $this->Universes->patchEntity($universe, $this->request->getData());
            $universe->updated_at = date('Y-m-d H:i:s');
            if ($this->Universes->save($universe)) {
                $this->Flash->success(__('The universe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The universe could not be saved. Please, try again.'));
        }
        $this->set('config_characteristics', Configure::read('characteristics'));
        $this->set(compact('universe'));
        $this->set('_serialize', ['universe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Universe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $universe = $this->Universes->get($id);
        if ($this->Universes->delete($universe)) {
            $this->Flash->success(__('The universe has been deleted.'));
        } else {
            $this->Flash->error(__('The universe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
