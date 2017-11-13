<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Doctor Procedure'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Doctors'), ['controller' => 'Doctors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Doctor'), ['controller' => 'Doctors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Procedures'), ['controller' => 'Procedures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Procedure'), ['controller' => 'Procedures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="doctorProcedures index large-9 medium-8 columns content">
    <h3><?= __('Doctor Procedures') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('doctor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedure_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctorProcedures as $doctorProcedure): ?>
            <tr>
                <td><?= $this->Number->format($doctorProcedure->id) ?></td>
                <td><?= $doctorProcedure->has('doctor') ? $this->Html->link($doctorProcedure->doctor->title, ['controller' => 'Doctors', 'action' => 'view', $doctorProcedure->doctor->id]) : '' ?></td>
                <td><?= $doctorProcedure->has('procedure') ? $this->Html->link($doctorProcedure->procedure->id, ['controller' => 'Procedures', 'action' => 'view', $doctorProcedure->procedure->id]) : '' ?></td>
                <td><?= h($doctorProcedure->created) ?></td>
                <td><?= h($doctorProcedure->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $doctorProcedure->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorProcedure->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorProcedure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorProcedure->id)]) ?>
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
