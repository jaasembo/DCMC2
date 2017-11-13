<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $doctorProcedure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $doctorProcedure->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Doctor Procedures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Procedures'), ['controller' => 'Procedures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Procedure'), ['controller' => 'Procedures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorProcedures form large-9 medium-8 columns content">
    <?= $this->Form->create($doctorProcedure) ?>
    <fieldset>
        <legend><?= __('Edit Doctor Procedure') ?></legend>
        <?php
            echo $this->Form->input('doctor_id', ['options' => $doctors, 'empty' => true]);
            echo $this->Form->input('procedure_id', ['options' => $procedures, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
