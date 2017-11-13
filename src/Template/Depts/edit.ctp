<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Dept'), ['action' => 'edit', $dept->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dept->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dept->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Dept'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Depts'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="depts form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($dept); ?>
    <fieldset>
        <legend><?= __('Edit Dept') ?></legend>
        <?php
            echo $this->Form->input('deptno');
            echo $this->Form->input('dname');
            echo $this->Form->input('loc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
