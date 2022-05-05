
<form action="#"method="POST" enctype="multipart/form-data">
<?php
                                    // echo "<script>alert('$taskId');</script>";
                                    $sql = "SELECT * FROM register WHERE id = $currentUserId";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $name = $row['username'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
									?>
<div class="container-profile">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-70 w-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
			<div class="profile-pic pr-4">
  <label class="-label" for="file">
    <span class="glyphicon glyphicon-camera"></span>
    <span>Change Image</span>
  </label>
  <?php
   echo '
  <input id="file" type="file"name="uploadfile"  onchange="loadFile(event)"/>
  <img src="./assets/uploads/' . $proPic . '" alt="" id="output" width="200" />
</div><br>

				<h5 class="user-name">' . $name . '</h5>
				<h6 class="user-email">' . $email . '</h6>
			</div>
			
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-70 w-50">
	<div class="card-body">
	
			<div class="form-group">
              <label for="location">UserName</label>
              <input type="text" name="uname" id="uname" value="' . $name . '" class="form-control" autocomplete="off">

            </div>
			<div class="form-group">
              <label for="location">Email_ID</label>
			  <input type="email" name="email" id="email" value="' . $email . '" class="form-control" autocomplete="off">

            </div>
			<div class="form-group">
              <label for="location">Mobile Number</label>
			  <input type="text" name="mobile" id="mob" value="' . $mobile . '" class="form-control" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">

            </div>'?>

		
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="button" id="submit" name="proUpdate" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
	<?php
	if(isset($_POST['proUpdate'])){
		//$t=$_POST['vehicle_id'];
		//$s_id=$_SESSION['session_id'];
		
		echo "<script>alert('$s_id')</script>";
			$approve="UPDATE `register` SET `username`='uname',`email`='email',`mobile`='mobile',`profile_pic`='uploadfile'Where `id`='$currentUserId'";
			$approveResult=mysqli_query($con,$approve);
			 
			if($approveResult){
			   
				//$_SESSION['loginMessage']="User Approved";
				//header("Location:./viewVehicleRequest.php");
			   die();
			}
			else{
				echo "<script>alert('hh')</script>";
				echo mysqli_errno($con);
				//$_SESSION['loginMessage']="User Approved Failed";
				//header("Location:./adminDashboard.php");
				// die();
			}
	}
	?>
</div>
</div>
</div>
</div>
</form>