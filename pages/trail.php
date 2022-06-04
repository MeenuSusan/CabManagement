<?php

session_start();

if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:home.php");
  die();
} else {
  include 'dbcon.php';
  $uname = $_SESSION['userName'];
  $email = $_SESSION['userEmail'];
  $photo = $_SESSION['proPic'];
  $currentUserId = $_SESSION['userId'];
  $res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
  while ($r = mysqli_fetch_array($res)) {
    $ademail = $r['email'];
    $adname = $r['username'];
  }
?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Payment History</title>
    <style>
      .profileupdate {
        width: 60vw;
        height: 50vh;
        position: absolute;
        top: 8vw;
        left: 25vw;
      }

      .profile-pic {

        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
      }

      .profile-pic input {
        display: none;
      }

      .profile-pic img {
        margin: 0vw;
        position: absolute;
        object-fit: cover;
        width: 150px;
        height: 150px;

        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
      }

      .profile-pic .-label {
        cursor: pointer;
        height: 150px;
        width: 150px;
      }

      .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
      }

      .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
      }
    </style>
  </head>

  <body>

    <?php
    include "../assets/templates/driversidebar.php";

    ?>
    <div class="profileupdate">
      <form action="#" method="POST" enctype="multipart/form-data">
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
  <img src="./assets/uploads/' . $propic . '" alt="" id="upload"accept="image/x-png,image/jpeg" width="200" />
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

            </div>' ?>


                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                              <!-- <?php
                                    if (isset($_POST['proUpdate'])) {
                                      $name = $_POST['uname'];
                                      $email = $_POST['email'];
                                      $mobile = $_POST['mobile'];
                                      $propic = $_FILES['uploadfile']['name'];
                                      move_uploaded_file($_FILES['uploadfile']['tmp_name'], "../assets/uploads/" . $_FILES['uploadfile']['name']);
                                      // upddate profile
                                      $sql6 = "UPDATE register SET username='$name', email='$email', mobile='$mobile',profile_pic='$propic' WHERE id='$currentUserId'";
                                      $result1 = mysqli_query($con, $sql6);
                                      if ($result1) {
                                        echo "<script>alert('Profile Updated Successfully');</script>";
                                      } else {
                                        echo "<script>alert('Profile Not Updated');</script>";
                                      }
                                    } ?> -->
                              <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                              <input type="submit" id="submit" name="proUpdate" class="btn btn-primary"></input>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
      </form>

    </div>


  </body>

  </html>
<?php
}
?>

<?php
function hoursandmins($time, $format = '%02d:%02d')
{
  if ($time < 1) {
    return;
  }
  $hours = floor($time / 60);
  $minutes = ($time % 60);
  return sprintf($format, $hours, $minutes);
}

?>