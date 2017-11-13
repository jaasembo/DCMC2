<!-- Navigation -->
<nav class="navbar navbar-inverse" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="myNavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Radiology Services</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
               
				<li class="active"> <?= $this->Html->link('Add_Onschedule',array('controller'=>'Doctors','action'=>'index')) ?></li>
				<li class="active"> <?= $this->Html->link('Onschedule',array('controller'=>'Doctors','action'=>'Onschedule')) ?></li>
				<li class="active"> <?= $this->Html->link('Add_Procedure',array('controller'=>'Announcements','action'=>'Updates')) ?></li>
                   <li> <?= $this->Html->link('Department',array('controller'=>'depts','action'=>'add')) ?></li>
					<li> <?= $this->Html->link('Announcements',array('controller'=>'announcements','action'=>'add')) ?></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
			<li><span class="glyphicon glyphicon-user"><?= $this->Html->link('Sign Up',array('controller'=>'Users','action'=>'add')) ?></span></li>
			<li><span class="glyphicon glyphicon-log-in"><?= $this->Html->link('Login',array('controller'=>'Users','action'=>'login')) ?></span></li>
			<li><span class="glyphicon glyphicon-log-in"><?= $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout')) ?></span></li>
			</ul>
        </div>
    </div>
</nav>