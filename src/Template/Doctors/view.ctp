<div class="container">
 <div class="row">
<div <div class="col-md-6 ">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Doctor'), ['action' => 'edit', $doctor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Doctor'), ['action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Doctors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Doctor'), ['action' => 'add']) ?> </li>
    </ul>
</div>


   
        <div class="col-md-6">
		<h3><?= __('Doctor') ?></h3>
			   <div>
                <a href="#">
                  <?php  echo  $this->html->image($doctor['photo'],array('width'=>'94px','class'=>"img-circle img-responsive")); ?>
				  <strong><br /><h7>Title:</h7><?= h($doctor->title) ?></strong>
				  <strong><br /><h7>Firstname:</h7><?= h($doctor->firstname) ?></strong>
				  <strong><br /><h7>Lastname:</h7><?= h($doctor->lastname) ?></strong>
				  <strong><br /><h7>Pager:</h7><?= h($doctor->pager) ?></strong>
				  <strong><br /><h7>Ext.:</h7><?= h($doctor->Office_extension) ?></strong>
                </a>
				<hr>
              </div>
        </div>
		
		
    
</div>
</div>

        
				 
                   
		
		
