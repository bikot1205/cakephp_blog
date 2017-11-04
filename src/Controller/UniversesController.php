<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
//use Cake\Chronos\Chronos;
//use Cake\Chronos\Date;
//use Cake\Chronos\ChronosInterface;
use Cake\I18n\Time;
use Cake\Utility\Xml;
use Cake\Error\Debugger;
use Cake\Log\Log;

use App\Error\MissingWidgetException;

use Cake\Mailer\Email;
use Cake\Network\Exception\NotFoundException;
use Cake\I18n\I18n;

use Cake\Collection\Collection;

/**
 * Universes Controller
 *
 * @property \App\Model\Table\UniversesTable $Universes
 *
 * @method \App\Model\Entity\Universe[] paginate($object = null, array $settings = [])
 */
class UniversesController extends AppController
{
    public $paginate = [
        'fields' => ['Universes.id', 'Universes.name', 'Universes.created_at'],
        'maxLimit' => 2,
        'sortWhitelist' => [
            'id', 'name'/*, 'Users.username'*/
        ],
        /*'order' => [
            'Universes.created_at' => 'desc'
        ]*/
    ];

    public function initialize()
    {
        parent::initialize();
        I18n::setLocale('ja_JP');
        $this->loadComponent('Math');

    }

    public function export($format = '')
    {
        $format = strtolower($format);

        // ビューマッピングの形式
        $formats = [
          'xml' => 'Xml',
          'json' => 'Json',
        ];

        // 未知の形式の時はエラー
        if (!isset($formats[$format])) {
            throw new NotFoundException(__('Unknown format.'));
        }

        // ビューをセットする
        $this->viewBuilder()->className($formats[$format]);

        // 強制ダウンロードを指定する
        $this->response->download('report-' . date('YmdHis') . '.' . $format);

        $universes = $this->Universes->find('all');
        $this->set(compact('universes'));
        $this->set('_serialize', ['universes']);
    }
    
    public function customize()
    {
        /*$universes = $this->Universes
            ->find()
            ->select(['id', 'name', 'weight'])
            ->where(['id !=' => 2])
            ->order(['weight' => 'DESC'])
            ->map(function ($row) { // map() は Collection のメソッドで、クエリーを実行します
                $row->weight = $row->weight * 2;
                return $row;
             });
        */
        $query = $this->Universes->find();
        $universes = $query->select(['slug' => $query->func()->concat(['id' => 'identifier', '-', 'name' => 'identifier'])])
        ->select(['id', 'name', 'weight']);
 
        $this->set(compact('universes'));

        $mathComponent = $this->Math->doComplexOperation(3, 5);
        $this->set(compact('mathComponent'));
        // Chronos
        /*
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
        $time = $time->next(ChronosInterface::TUESDAY);

        Chronos::setTestNow(new Chronos('1975-12-25 00:00:00'));
        $time = new Chronos();        
        $this->set(compact('now', 'today', 'tomorrow', 'date', 'time'));
        */
        //$now = Time::now();
        //Time::setToStringFormat(\IntlDateFormatter::SHORT);
        Time::setToStringFormat('yyyy-MM-dd HH:mm:ss'); 
        $now = Time::parse('now');
        $now = $now->modify('+5 days');
        //$now  = $now->i18nFormat('yyyy-MM-dd HH:mm:ss');
        $time = Time::now();
        $this->set(compact('now', 'time'));

        $data = [
            'post' => [
                'id' => 1,
                'title' => 'Best post',
                'body' => 'post content'
            ]
        ];

        // XML->Array  
        /*
        $xmlString = '<?xml version="1.0"?><root><child>value</child></root>';
        $xmlArray = Xml::toArray(Xml::build($xmlString));
        $this->set(compact('xmlArray')); 
        */

        $xmlArray = ['root' => ['child' => 'value']];
        // Xml::build() を使うこともできます
        $xmlObject = Xml::fromArray($xmlArray, ['format' => 'tags']);
        $xmlString = $xmlObject->asXML();
        $this->set(compact('xmlString'));

        // デバッグ
        // pr(Debugger::trace());
        // debug($xmlString);
        // pr(Debugger::getType($xmlArray));
        // pr(Debugger::excerpt(CONFIG . 'paths.php', 52, 2));
        // Log::debug($xmlString);
        // Log::error($xmlString);
        // Log::special($xmlString);
        // Log::error($xmlString, ['scope' => ['universes']]);
        // Log::debug($xmlString);

        //throw new MissingWidgetException(['widget' => 'Pointy']);
        // Email
        /*
        $email = new Email('default');
        $email->from(['xxx@gmail.com' => 'My Site'])
              ->to('yyy@gmail.com')
              ->subject('Angle正念')
              ->send('Message From Gold. 正行');
        */
        // Email Template      
        /*
        $email = new Email();
        $email->template('welcome', 'default')
              ->emailFormat('html')
              ->to('yyy@gmail.com')
              ->from('xxx@gmail.com')
              ->subject('Angle正念')
              ->viewVars(['mail_params' => 'fine day'])
              ->attachments([
                'photo.png' => [
                'file' => WWW_ROOT . 'img/cake.power.gif',
                'mimetype' => 'image/png',
                'contentId' => 'my-unique-id'
                ]
              ])
              ->send();
        */
        //Email::deliver('yyy@gmail.com', 'Angle***正念', 'Message From Gold. 正行', 
        //    ['from' => 'xxx@gmail.com']);

        $session = $this->request->session();
        $session->write([
            'Config.theme' => 'blue',
            'Config.language' => 'ja',
        ]);
        $session->consume('Config.theme');

        // Collection
        // ->each
        $items = ['a' => 1, 'b' => 2, 'c' => 3];
        $collection = new Collection($items);
        // ->map
        $map_col = $collection->map(function ($value, $key) {
            return $value * 2;
        });
        // ->extract
        $items = [
            [
            'name' => 'James',
            'phone_numbers' => [
                ['number' => 'number-1'],
                ['number' => 'number-2'],
                ['number' => 'number-3'],
            ]
            ],
            [
            'name' => 'James',
            'phone_numbers' => [
                ['number' => 'number-4'],
                ['number' => 'number-5'],
            ]
            ]
        ];
        $extract_col = (new Collection($items))->extract('phone_numbers.{*}.number');
        $extract_list = $extract_col->toList();

        $items = [
            ['id' => 1, 'name' => 'foo', 'parent' => 'a'],
            ['id' => 2, 'name' => 'bar', 'parent' => 'b'],
            ['id' => 3, 'name' => 'baz', 'parent' => 'a'],
        ];
        $combine_col = (new Collection($items))->combine('id', 'name', 'parent');
        // 配列に変換すると、結果は次のようになります。
        /*
        [
            'a' => [1 => 'foo', 3 => 'baz'],
            'b' => [2 => 'bar']
        ];*/
        
        // ->stopWhen
        $items = [10, 20, 50, 1, 2];
        $collection = new Collection($items);
        $stopWhen_col = $collection->stopWhen(function ($value, $key) {
            // 30 より大きい最初の値で停止します。
            return $value > 30;
        });
        $stopWhen_arr = $stopWhen_col->toArray();
        
        // ->unfold
        $items = [[1, 2, 3], [4, 5]];
        $collection = new Collection($items);
        $unfold_col = $collection->unfold();

        // $result には [1, 2, 3, 4, 5] が含まれています。
        $unfold_list = $unfold_col->toList();
        
        $oddNumbers = [1, 3, 5, 7];
        $collection = new Collection($oddNumbers);
        $unfold_col2 = $collection->unfold(function ($oddNumber) {
            yield $oddNumber;
            yield $oddNumber + 1;
        });

        // $result には [1, 2, 3, 4, 5, 6, 7, 8] が含まれています。
        $unfold_list2 = $unfold_col2->toList();
        
        // ->chunk
        $items = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
        $collection = new Collection($items);
        $chunk_col = $collection->chunk(2);
        // [[1, 2], [3, 4], [5, 6], [7, 8], [9, 10], [11]] 
        $chunk_list = $chunk_col->toList();
        
        // ->chunkWithKeys
        $items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => [4, 5]];
        $collection = new Collection($items);
        $chunk_list2 = $collection->chunkWithKeys(2)->toList();
        // 作成物
        /*
        [
            ['a' => 1, 'b' => 2],
            ['c' => 3, 'd' => [4, 5]]
        ]*/

        // ->filter
        $items = [10, 20, 50, 1, 2];
        $collection = new Collection($items);
        $filter_col = $collection->filter(function ($value, $key) {
            return $value < 20;
        });
        $filter_arr = $filter_col->toArray();
        // $result には [10, 1, 2] が含まれています。

        // ->reject
        $reject_col = $collection->reject(function ($value, $key) {
            return $value < 20;
        });
        $reject_arr = $reject_col->toArray();
        // $result には [20, 50] が含まれています。

        // ->every
        $every_under20= $collection->every(function ($value) {
            return $value < 20;
        });
        // false

        // ->match
        $items = [
            ['id' => 1, 'name' => 'foo', 'parent' => 'a'],
            ['id' => 2, 'name' => 'bar', 'parent' => 'b'],
            ['id' => 3, 'name' => 'baz', 'parent' => 'a'],
        ];
        $collection = new Collection($items);
        $match_col = $collection->match(['parent' => 'a']);
        $match_arr = $match_col->toArray();  
        
        $odds = new Collection([1, 3, 5]);
        $pairs = new Collection([2, 4, 6]);
        $zip_list = $odds->zip($pairs)->toList(); 

        $items = [
            2014 => ['jan' => 100, 'feb' => 200],
            2015 => ['jan' => 300, 'feb' => 500],
            2016 => ['jan' => 400, 'feb' => 600],
        ];

        // jan と feb のデータを取得
        $firstYear = new Collection(array_shift($items));
        $zip_list2 = $firstYear->zip($items[0], $items[1])->toList();

        // ->nest 
        $items = [
            ['id' => 1, 'parent_id' => null, 'name' => 'Birds'],
            ['id' => 2, 'parent_id' => 1, 'name' => 'Land Birds'],
            ['id' => 3, 'parent_id' => 1, 'name' => 'Eagle'],
            ['id' => 4, 'parent_id' => 1, 'name' => 'Seagull'],
            ['id' => 5, 'parent_id' => 6, 'name' => 'Clown Fish'],
            ['id' => 6, 'parent_id' => null, 'name' => 'Fish'],
        ];
        $collection = new Collection($items);
        $nest_arr = $collection->nest('id', 'parent_id')->toArray();

        $collection = new Collection(['a' => 1, 'b' => 2, 'c' => 3]);
        $shuffle_arr = $collection->shuffle()->toArray();

        $items = [
           ['Products', '2012', '2013', '2014'],
           ['Product A', '200', '100', '50'],
           ['Product B', '300', '200', '100'],
           ['Product C', '400', '300', '200'],
        ];
        $transpose_list = (new Collection($items))->transpose()->toList();

        $users = [
            ['username' => 'mark'],
            ['username' => 'juan'],
            ['username' => 'jose']
        ];
        $languages = [
            ['PHP', 'Python', 'Ruby'],
            ['Bash', 'PHP', 'Javascript']
        ];
        $insert_arr = (new Collection($users))->insert('skills', $languages)->toArray();

        $this->set(compact('map_col', 'extract_list', 'combine_col', 'stopWhen_arr',
            'unfold_list', 'unfold_list2', 'chunk_list', 'chunk_list2',
            'filter_arr', 'reject_arr', 'every_under20', 'match_arr',
            'zip_list', 'zip_list2', 'nest_arr', 'shuffle_arr', 'transpose_list',
            'insert_arr'
        ));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        try {
            $universes = $this->paginate($this->Universes);
            $this->set(compact('universes'));
            $this->set('_serialize', ['universes']);

            $all_universes = $this->Universes->find();
            $collection = new Collection($all_universes);
            $totalWeight = $collection->reduce(function ($accumulated, $universe) {
                return $accumulated + $universe->weight;
            }, 0);

            $minWeight = $collection->min('weight');
            $avgWeight = $collection->avg('weight');
            $medianWeight = $collection->median('weight');
            $countByWeight = $collection->countBy(function ($universe) {
                return $universe->weight > 15 ? 'large' : 'small';
            });
            $indexBy = $collection->indexBy('id');
            $sortBy_col = $collection->sortBy('weight', SORT_DESC);
            $sample_col = $collection->sample(2);
            $take_col = $collection->sortBy('weight', SORT_DESC)->take(2, 1);
            $first_entity = $collection->first();

            $this->set(compact('totalWeight', 'minWeight', 'avgWeight', 'medianWeight',
                'countByWeight', 'indexBy', 'sortBy_col', 'sample_col', 'take_col',
                'first_entity'));

        } catch (NotFoundException $e) {
        // こちらで最初や最後のページにリダイレクトするような何かをします。
        // $this->request->getParam('paging') に要求された情報が入ります。
        }
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
            $universe->created_at = Time::parse('now');
            $universe->updated_at = Time::parse('now');
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
            $universe = $this->Universes->patchEntity($universe, 
                $this->request->getData(), ['validate' => 'update']);
            $universe->updated_at = Time::parse('now');
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
