<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Procedure'), ['action' => 'edit', $procedure->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Procedure'), ['action' => 'delete', $procedure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procedure->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Procedures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Procedure'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="procedures view large-9 medium-8 columns content">
    <h3><?= h($procedure->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($procedure->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedure Name') ?></th>
            <td><?= $this->Number->format($procedure->procedure_name) ?></td>
        </tr>
    </table>
</div>
