<?php require_once '_Resources/Libs/Inc.Require.php'; ?>

<?php 
  if($Auth->Is_Login()) {
    echo "<script> window.location.replace('/My_Dashboard.php') </script>";
  }
?>

<?php 
if(isset($_POST['Submit_Login'])) {
  $Password = $_POST['Password'];
  $Username = $_POST['Username'];
  $Password = strtoupper(sha1(sha1($Password).$Config['Salt']));

  $SQL = $MyPDO -> prepare('SELECT * FROM members WHERE Username = :Username AND Password = :Password');
  $SQL -> execute(array('Username' => $Username, 'Password' => $Password));
  $DATA = $SQL -> fetch();

  if($DATA['Status'] == 'Activated') {
    $_SESSION['Auth'] = array('ID' => $DATA['ID'],
                              'Username' => $DATA['Username'],
                              'Nickname' => $DATA['Nickname'],
                              'Email' => $DATA['Email'],
                              'IP' => $DATA['IP'],
                              'Password' => $DATA['Password'],
                              'Rank' => $DATA['Rank'],
                              'Avatar' => $DATA['Avatar'],
                              'Status' => $DATA['Status']);
    $SQL -> closeCursor();
    echo "<script> window.location.replace('/My_Dashboard.php') </script>";
  } else {
    echo "<script> window.location.replace('location: /Show_Error?Titre=Error Compte Inactif&Message=Error your account is inactive check your email.&Redirection=/') </script>";
  }
}
?>

<?php require_once '_Resources/Template/Another_Header.php'; ?>

<div id="cl-wrapper" class="login-container">
  <div class="middle-login">
    <div class="block-flat">
      <div class="header">
        <h3 class="text-center"><img class="logo-img" style="max-width:100%;" src="_Resources/Assets/Images/Logo/50x50.png" alt="logo"/>GladysDashboard</h3>
      </div>
      <div>
        <form style="margin-bottom: 0px !important;" class="form-horizontal" method="POST">
          <div class="content">
            <h2 class="title text-center"><strong>Login</strong></h2>
              <hr/>
                <?php if(isset($Success)) { echo '
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fa fa-check sign"></i><strong>Success! </strong> ' .$Success. '
                  </div>';
                } ?>

                <?php if(isset($Error)) { echo '
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fa fa-times-circle sign"></i><strong>Error!</strong> ' .$Error. '
                  </div>';
                } ?>

                <?php if(isset($Info)) { echo '
                  <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fa fa-info-circle sign"></i><strong>Info! </strong> ' .$Info. '
                  </div>';
                } ?>

                <?php if(isset($Warning)) { echo '
                  <div class="alert alert-warning ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fa fa-warning sign"></i><strong>Alert! </strong>' .$Warning. '
                  </div>';
                } ?>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Username" name="Username" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" placeholder="Password" name="Password" class="form-control">
                  </div>
                </div>
              </div>
                <button class="btn btn-block btn-primary btn-rad btn-lg" data-dismiss="modal" type="submit" name="Submit_Login">Login</button>
          </div>
          <p class="spacer"></p>
        </form>
      </div>
</div>

<?php require_once '_Resources/Template/Another_Footer.php'; ?>