
<div class="jumbotron">
        <h1>Profile</h1>
        <img src="http://www.almostsavvy.com/wp-content/uploads/2011/04/profile-photo.jpg" alt="some_text">
        <h3>Profile for : <strong> <?php echo $member[0]->first; echo " "; echo $member[0]->last; ?> </strong></h3>
        <h3>Personal Information</h3>
        <dl class="dl-horizontal">
          <dt>ID Number</dt>
          <dd><?php echo $member[0]->id; ?></dd>
          <dt>First Name</dt>
          <dd><?php echo $member[0]->first; ?></dd>
          <dt>Middle Name</dt>
          <dd><?php echo $member[0]->middle; ?></dd>
          <dt>Last Name</dt>
          <dd><?php echo $member[0]->last; ?></dd>
          <dt>Date of Birth</dt>
          <dd><?php echo $member[0]->dateOfBirth; ?></dd>
          <dt>Address</dt>
          <dd><?php echo $member[0]->address; ?></dd>
          <dt>Phone Number</dt>
          <dd><?php echo $member[0]->phone; ?></dd>
          <dt>School</dt>
          <dd><?php echo $member[0]->school; ?></dd>
          <dt>Church</dt>
          <dd><?php echo $member[0]->church; ?></dd>
          <dt>Email</dt>
          <dd><?php echo $member[0]->email; ?></dd>
          <dt>Grade</dt>  
          <dd><?php echo $member[0]->grade; ?></dd>        
        </dl>
        <h3>Parent Information</h3>
        <dl class="dl-horizontal">
          <dt>Parent 1 Name</dt> 
          <dd><?php echo $member[0]->parent1; ?></dd>
          <dt>Parent 1 Phone</dt> 
          <dd><?php echo $member[0]->parent1Contact; ?></dd>
          <dt>Parent 2 Name</dt> 
          <dd><?php echo $member[0]->parent2; ?></dd>
          <dt>Parent 2 Phone</dt> 
          <dd><?php echo $member[0]->parent2Contact; ?></dd>          
        </dl>
</div>