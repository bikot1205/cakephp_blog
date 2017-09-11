<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Universe[]|\Cake\Collection\CollectionInterface $universes
  */
?>

<div class="row">
  <div class="col-md-12">
    <h1><?= __('Universes') ?></h1>
    <p>
        <span><?= $this->Html->link(__('Add Universe'), ['action' => 'add']) ?></span>
        <span style="float:right"><?= $this->Html->link(__('Customize Universe'), ['action' => 'customize']) ?></span>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
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
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
  </div>  
</div>
