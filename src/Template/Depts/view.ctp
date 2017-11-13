<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Dept'), ['action' => 'edit', $dept->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dept'), ['action' => 'delete', $dept->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dept->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Depts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dept'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="depts view col-lg-10 col-md-9 columns">
    <h2><?= h($dept->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Dname') ?></h6>
                    <p><?= h($dept->dname) ?></p>
                    <h6 class="subheader"><?= __('Loc') ?></h6>
                    <p><?= h($dept->loc) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($dept->id) ?></p>
                    <h6 class="subheader"><?= __('Deptno') ?></h6>
                    <p><?= $this->Number->format($dept->deptno) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
