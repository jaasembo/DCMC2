<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcements index large-9 medium-8 columns content">
    <h3><?= __('Announcements') ?></h3>
	<?=$this->Form->create('announcement');?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Holiday_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Image') ?></th>
				<th scope="col"><?= $this->Paginator->sort('IR_PROCEDURES') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Doctor') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Current_Procedures') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Perfoming_Doctor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reg_date') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
		   <?php  foreach ($announcements as $announcement): ?>
		
            <tr>
                <td><?= $this->Number->format($announcement->id) ?></td>
                <td><?= h($announcement->Holiday_name) ?></td>
                <td><?= h($announcement->Message) ?></td>
                <td><?= h($announcement->Image) ?></td>
                <td><?=$this->Form->select("field[".$announcement->id."]",['empty' => '(Select procedure)',$proc] )?></td>             </td>
				<td><?= h($announcement->doctor_id) ?>
				<?=$this->Form->select("doc[".$announcement->id."]",['empty' => '(Select Doctor)',$dept_dropdown] )?></td>
				   <td><?= h($announcement->IR_PROCEDURES) ?></td>
				    <td><?= h($announcement->doctor_id) ?></td>
				 <td><?= h($announcement->reg_date) ?></td>
				<td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $announcement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?>
                </td>
			<?php endforeach; ?>
			
             </tbody>
    </table>
	<?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
		<?= $this->Form->end() ?>
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
