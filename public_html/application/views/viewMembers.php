<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
    <h1>List of Members</h1>
    <a class="btn btn-primary" type="button" href="/members/addMember">Add Member</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <td><strong>ID Number</strong></td>
        <td><strong>First Name</strong></td>
        <td><strong>Last Name</strong></td>
        <td><strong>Birthday</strong></td>
        <td><strong>Check-In</strong></td>
      </tr>
    </thead>
    <?php
    foreach ($members as $member) {
        echo '<tr>';
        echo '<td><a href="/members/profile/'; echo $member->id; echo '/">'; echo $member->id; echo '</td>';
        echo '<td><a href="/members/profile/'; echo $member->id; echo '/">'; echo $member->first; echo '</td>';
        echo '<td><a href="/members/profile/'; echo $member->id; echo '/">'; echo $member->last; echo '</td>';
        echo '<td>'; echo $member->dateOfBirth; echo '</td>';
        echo '<td><a href="/members/checkIn/'; echo $member->id; echo '/">Check-In</a></td>';
        echo '</tr>';
    }
    
    ?>
  </table>
</div>