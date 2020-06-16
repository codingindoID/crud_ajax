
  <div class="col-md-12">
      <form action="<?php echo site_url('Login/proses') ?>" method="POST">
        <div class="form-group">
          <label for="Username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" id="bt_login" class="btn btn-primary">Login</button>
      </form>
  </div>