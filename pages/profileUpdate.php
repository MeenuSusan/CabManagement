<?php

session_start();

if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:../index.php");
  die();
} else {
  include 'dbcon.php';
  $s_id = $_SESSION['session_id'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Hello, world!</title>
    <style>
      .pro-con {
        position: absolute;
        top: 7vw;
        left: 25vw;
        width: 50vw;
      }

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
        margin-left: 10vw;

        position: absolute;
        object-fit: cover;
        width: 165px;
        height: 165px;

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
    include "../assets/templates/adminsidebar.php";

    ?>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container pro-con">
      <div class="row flex-lg-nowrap">

        <form action="./updateProfileDetails.php" method="POST" enctype="multipart/form-data">
          <?php
          // echo "<script>alert('$taskId');</script>";
          $sql = "SELECT * FROM register WHERE id = $currentUserId";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_assoc($result);
          $name = $row['username'];
          $emails = $row['email'];
          $mobile = $row['mobile'];
          $propic = $row['profile_pic'];

          ?>
          <div class="col">
            <div class="row">
              <div class="col mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="e-profile">
                      <div class="row">
                        <div class="col-12 col-sm-auto mb-3">
                          <div class="account-settings">
                            <div class="user-profile col-12">
                              <div class="profile-pic">
                                <label class="-label" for="file">
                                  <span class="glyphicon glyphicon-camera"></span>
                                  <span>Change Image</span>
                                </label>
                                <?php
                                echo '
  <input id="file" type="file"name="uploadfile"  onchange="loadFile(event)"/>
  <img src="../assets/uploads/' . $propic . '" alt="" id="upload"accept="image/x-png,image/jpeg" width="200" />
</div><br>

				<h5 class="user-name">' . $name . '</h5>
				<h6 class="user-email">' . $emails . '</h6>
			</div>
			
		</div> ' ?>

                                <div class="tab-content pt-3">
                                  <div class="tab-pane active">
                                    <form class="form" novalidate="">
                                      <div class="row">
                                        <div class="col">
                                          <div class="row">
                                            <div class="col">
                                              <div class="form-group">
                                                <label>UserName</label>
                                                <?php echo '<input class="form-control" type="text" name="uname" value="' . $name . '"> ' ?>
                                              </div>
                                            </div>
                                            <div class="col">
                                              <div class="form-group">
                                                <label>Mobile Number</label>
                                                <?php echo '<input class="form-control" type="tel" name="mobile" value="' . $mobile . '"> ' ?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col">
                                              <div class="form-group">
                                                <label>Email</label>
                                                <?php echo '<input class="form-control" type="email" name="email" value="' . $emails . '"> ' ?>
                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                      <?php
                                      // if(isset($_POST['proUpdate'])){
                                      //   $name = $_POST['uname'];
                                      //   $emails= $_POST['email'];
                                      //   $mobile = $_POST['mobile'];
                                      //   $propic=$_FILES['uploadfile']['name'];
                                      //   move_uploaded_file($_FILES['uploadfile']['tmp_name'],"../assets/uploads/".$_FILES['uploadfile']['name']);
                                      //   $insertImg="INSERT INTO register(profile_pic) values('$propic')where id=$currentUserId";
                                      //   $result=mysqli_query($con,$insertImg);

                                      //   // upddate profile
                                      //   $sql6 = "UPDATE register SET username='$name', email='$email', mobile='$mobile',profile_pic='$propic' WHERE id='$currentUserId'";
                                      //   $result1 = mysqli_query($con, $sql6);
                                      //   if($result1){
                                      //     echo "<script>alert('Profile Updated Successfully');</script>";
                                      //   }
                                      //   else{
                                      //     echo "<script>alert('Profile Not Updated');</script>";
                                      //   }
                                      // }
                                      ?>
                                      <div class="row">
                                        <div class="col d-flex justify-content-end">
                                          <input type="submit" id="submit" name="proUpdate" value="Save All Changes" class="btn btn-primary"></input>
                                        </div>
                                      </div>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>

                    </div>

                  </div>
                </div>



                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  </html>
<?php

}
?>