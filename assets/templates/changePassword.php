



    
    <div class="change_password">
            <form action="./changePassword.php"method="POST">
                <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password"
                     class="form-control"
                      id="exampleInputPassword1"
                      name="current_password"
                      placeholder="Password">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password"
                   class="form-control" 
                   name="new_password"
                   id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" 
                  class="form-control" 
                  id="exampleInputPassword1"
                  name="confirm_password"
                  placeholder="Password">
                <button type="submit"
                 class="btn btn-secondary mt-4 btn-lg btn-block"
                 name="change_password">Submit</button>
              </form>
    </div>



