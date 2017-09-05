<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Chronos\Chronos;
use Cake\Chronos\Date;
use Cake\Chronos\ChronosInterface;

/**
 * Universes Controller
 *
 * @property \App\Model\Table\UniversesTable $Universes
 *
 * @method \App\Model\Entity\Universe[] paginate($object = null, array $settings = [])
 */
class UniversesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Math');
    }
    
    public function customize()
    {
        $mathComponent = $this->Math->doComplexOperation(3, 5);
        $this->set(compact('mathComponent'));

        // Chronos
        $now = Chronos::now();
        $today = Chronos::today();
        $yesterday = Chronos::yesterday();
        $tomorrow = Chronos::tomorrow();
        // 相対式のパース
        $date = Chronos::parse('+2 days, +3 hours');
        // 日付と時間の整数値
        $date = Chronos::create(2015, 12, 25, 4, 32, 58);
        // 日付または時間の整数値
        $date = Chronos::createFromDate(2015, 12, 25);
        $date = Chronos::createFromTime(11, 45, 10);
        // 整形した値にパース
        $date = Chronos::createFromFormat('m/d/Y', '06/15/2015');
        
        $date = Date::create()
            ->year(2015)
            ->month(10)
            ->day(31)
            ->hour(20)
            ->minute(30);

        $date = Date::create()
            ->addYear(1)
            ->subMonth(2)
            ->addDays(15)
            ->addHours(20)
            ->subMinutes(2);

        $time = Chronos::create();
        /*
        $time->startOfDay();
        $time->endOfDay();
        $time->startOfMonth();
        $time->endOfMonth();
        $time->startOfYear();
        $time->endOfYear();
        $time->startOfWeek();
        $time->endOfWeek(); 
        $time->previous(ChronosInterface::MONDAY);
        */
        $time = $time->next(ChronosInterface::TUESDAY);

        Chronos::setTestNow(new Chronos('1975-12-25 00:00:00'));
        $time = new Chronos();        
        $this->set(compact('mathComponent', 'now', 'today', 'tomorrow', 'date', 'time'));
    }

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