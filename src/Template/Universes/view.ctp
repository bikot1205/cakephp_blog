<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Universe $universe
  */
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= $this->Html->link(__('List Universes'), ['action' => 'index']) ?></li>
    <li class="breadcrumb-item active">View</li>
</ol>
<div class="row">
  <div class="col-md-12">
    <h3><?= h($universe->name) ?></h3>
    <p><?= $this->Time->format(
           $universe->created_at,
           \IntlDateFormatter::FULL) ?>
    <p>
    <table class="table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($universe->id) ?></td>
        </tr>
        <tr>
            <th class="col-md-2"><?= __('Name') ?></th>
            <td><?= h($universe->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= $this->Text->autoParagraph(h($universe->description)); ?></td>
        </tr>
        <tr>
            <th><?= __('Birthday') ?></th>
            <td><?= date('Y-m-d', strtotime($universe->birthday)) ?></td>
        </tr>
        <tr>
            <th><?= __('Characteristics') ?></th>
            <td>
              <?php if (!empty($universe->characteristics)): ?>
              <?= $config_characteristics[h($universe->characteristics)] ?>
              <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= date('Y-m-d H:i:s', strtotime($universe->created_at)) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated At') ?></th>
            <td><?= date('Y-m-d H:i:s', strtotime($universe->updated_at)) ?></td>
        </tr>
    </table>
  </div>  
</div>
