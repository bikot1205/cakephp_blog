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
    <?= $this->Form->create($universe) ?>
    <fieldset>
        <legend><?= __('Edit Universe') ?></legend>
        <?php
            echo $this->Form->control('name');
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
