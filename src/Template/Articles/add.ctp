<h1>Add Article</h1>
<?php
    echo $this->Form->create($article, ['novalidate' => true]);
    // ここにカテゴリーのコントロールを追加
    echo $this->Form->control('category_id');
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Article'), ['class' => 'btn btn-primary']);
    echo $this->Form->end();
?>
