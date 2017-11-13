<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Doctor Procedure'), ['action' => 'edit', $doctorProcedure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor Procedure'), ['action' => 'delete', $doctorProcedure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorProcedure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Doctor Procedures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor Procedure'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Procedures'), ['controller' => 'Procedures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Procedure'), ['controller' => 'Procedures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="doctorProcedures view large-9 medium-8 columns content">
    <h3><?= h($doctorProcedure->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Doctor') ?></th>
            <td><?= $doctorProcedure->has('doctor') ? $this->Html->link($doctorProcedure->doctor->title, ['controller' => 'Doctors', 'action' => 'view', $doctorProcedure->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedure') ?></th>
            <td><?= $doctorProcedure->has('procedure') ? $this->Html->link($doctorProcedure->procedure->id, ['controller' => 'Procedures', 'action' => 'view', $doctorProcedure->procedure->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($doctorProcedure->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($doctorProcedure->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($doctorProcedure->modified) ?></td>
        </tr>
    </table>
</div>
