<div class="hero-unit">
  <h2>Checking in : <strong><?php echo $member[0]->first; echo " "; echo $member[0]->last; ?></strong></h2>
  <?php $attributes = array('class' => 'form-horizontal'); ?>
  <?php echo form_open('certifyCheckIn', $attributes); ?>
    <input type="hidden" name="id" value="<?php echo $member[0]->id; ?>" >
    <div class="control-group">
      <label class="control-label" for="checkin">Type &nbsp;</label>
      <select name="type">
        <option selected>None</option>
        <option value="1" >Class A – 5 points</option>
        <option value="2" >Class B – 10 points</option>
        <option value="3" >Class C – 15 points</option>
        <option value="4" >Class D Self Sacrifice – 25 Points</option>
      </select>
    </div>
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn">Check-In</button>
      </div>
    </div>
  </form>
</div>