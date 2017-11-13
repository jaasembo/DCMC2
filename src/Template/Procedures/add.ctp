<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Procedures'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="procedures form large-9 medium-8 columns content">
    <?= $this->Form->create($procedure) ?>
    <fieldset>
        <legend><?= __('Add Procedure') ?></legend>
        <?php
            echo $this->Form->input('procedure_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
