<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= $this->Html->link(__('List Universes'), ['action' => 'index']) ?></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
<div class="universes form large-9 medium-8 columns content">
    <?= $this->Form->create($universe, ['novalidate' => true]) ?>
    <fieldset>
        <legend><?= __('Edit Universe') ?></legend>
        <?php
            echo $this->Form->control('name');
            /*
            echo $this->Form->control('name', [
                'error' => ['_empty' => __('{0} cannot be empty', ["(View)名前"])]
            ]); */
            echo $this->Form->control('description');
            echo $this->Form->control('birthday');
            echo $this->Form->control('characteristics', [
            'options' => $config_characteristics,
            'empty' => true
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
