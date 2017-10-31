<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Universe[]|\Cake\Collection\CollectionInterface $universes
  */
?>

<?php
//$this->Html->scriptStart(['block' => true]);
//echo "alert('I am in the JavaScript');";
//$this->Html->scriptEnd();

$list = [
    'Languages' => [
        'English' => [
            'American',
            'Canadian',
            'British',
        ],
        'Spanish',
        'German',
    ]
];
echo $this->Html->nestedList($list);
?>

<div class="row">
  <div class="col-md-12">
    <?= $this->Link->getElement('Element:このテキストはとても役に立つ。') ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h1><?= __('Universes') ?></h1>
    <div class="row">
      <div class="col-md-1">Total Weight:</div>
      <div class="col-md-1"><?= $totalWeight ?></div>
      <div class="col-md-1">Min Weight:</div>
      <div class="col-md-1"><?= h($minWeight->name) ?></div>
      <div class="col-md-1">Avg Weight:</div>
      <div class="col-md-2"><?= h($avgWeight) ?></div>
      <div class="col-md-1">Median Weight:</div>
      <div class="col-md-1"><?= h($medianWeight) ?></div>
      <div class="col-md-1">CountBy Weight:</div>
      <div class="col-md-2">
        <?php 
            foreach($countByWeight as $key => $value) {
                echo $key . ':' . $value . ' ';
            } 
        ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">IndexBy:</div>
        <div class="col-md-3">
            <?php 
                foreach($indexBy as $key => $value) {
                    echo $key . ':' . $value->name . ' ';
                } 
            ?>
        </div>
        <div class="col-md-1">SortBy:</div>
        <div class="col-md-3">
            <?php 
                foreach($sortBy_col as $value) {
                    echo $value->weight . ':' . $value->name . ' ';
                } 
            ?>
        </div>
        <div class="col-md-1">Sample:</div>
        <div class="col-md-3">
            <?php 
                foreach($sample_col as $value) {
                    echo $value->id . ':' . $value->name . ' ';
                } 
            ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-1">Take:</div>
        <div class="col-md-3">
            <?php 
                foreach($take_col as $value) {
                    echo $value->id . ':' . $value->name . ' ';
                } 
            ?>
        </div>
        <div class="col-md-1">First:</div>
        <div class="col-md-3"><?= $first_entity->name ?></div>
    </div>   
    
    <p>
        <span><?= $this->Html->link(__('Add Universe'), ['action' => 'add']) ?></span>
        <span style="float:right"><?= $this->Html->link(__('Customize Universe'), ['action' => 'customize']) ?></span>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID降順LOCK', ['direction' => 'desc', 'lock' => true]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('characteristics') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($universes as $universe): ?>
            <tr>
                <td><?= $this->Number->format($universe->id) ?></td>
                <td><?= h($universe->name) ?></td>
                <td><?= h($universe->characteristics) ?></td>
                <td><?= h($universe->created_at) ?></td>
                <td><?= h($universe->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $universe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $universe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $universe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $universe->id)]) ?>
                    <?= $this->Link->makeEdit('Customize Helper', '/universes/edit/' . $universe->id) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first(1) ?>
            <?= $this->Paginator->current() ?>/<?= $this->Paginator->total() ?>
            <?= $this->Paginator->generateUrl(['sort' => 'name']) ?>
            <?= $this->Paginator->limitControl() ?>
            <?= $this->Paginator->limitControl([25 => 25, 50 => 50]) ?>
            <?= $this->Paginator->limitControl([25 => 25, 50 => 50], $universe->perPage) ?> 

            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        <p><?= $this->Paginator->counter('{{page}} / {{pages}} ページ, {{current}} 件目 / 全 {{count}} 件,
             開始レコード番号 {{start}}, 終了レコード番号 {{end}}') ?></p>
        <p><?= $this->Paginator->counter(['format' => 'range']) ?></p>
    </div>
  </div>  
</div>
