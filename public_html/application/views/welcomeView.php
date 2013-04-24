<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
  <h1>Welcome to the Refuge</h1>
  <h2>Login</h2>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifyLogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
</div>