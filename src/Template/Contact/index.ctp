<?php

echo $this->Form->create($contact, ['novalidate' => true]);
echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->control('body');
echo $this->Form->button('Submit', ['class' => 'btn btn-primary']);
echo $this->Form->end();

?>