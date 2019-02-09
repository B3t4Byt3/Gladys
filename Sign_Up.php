<?php require_once '_Resources/Libs/Inc.Require.php'; ?>

<?php if($Auth->Is_Login()) {
        header('location: /My_Dashboard');
      }
?>

<?php
  if (isset($_POST['Submit'])) {
      if (empty($_POST['Username']) || (empty($_POST['Nickname'])) || (empty($_POST['Email'])) || (empty($_POST['Password'])) || (empty($_POST['Repeat_Password']))) {
        $Error = 'Please Fill in all fields';
      } elseif (!ctype_alnum($_POST['Username']) || (strlen($_POST['Username']) < 4) || (strlen($_POST['Username']) > 15)) {
          $Error = 'Username Invalid - 4Chars Minimum';
        } else {

          $SQL = $MyPDO -> prepare('SELECT COUNT(*) FROM users WHERE Username = :Username');
          $SQL -> execute(array(':Username' => $_POST['Username']));
          $COUNT = $SQL -> fetchColumn(0);
          if ($COUNT > 0) {
            $Error = 'Username Already Taken';
          } else {

          $SQL = $MyPDO -> prepare('SELECT COUNT(*) FROM users WHERE Email = :Email');
          $SQL -> execute(array(':Email' => $_POST['Email']));
          $COUNT = $SQL -> fetchColumn(0);
          if ($COUNT > 0) {
            $Error = 'Email Already Taken';
          } else {

          $SQL = $MyPDO -> prepare('SELECT COUNT(*) FROM users WHERE Nickname = :Nickname');
          $SQL -> execute(array(':Nickname' => $_POST['Nickname']));
          $COUNT = $SQL -> fetchColumn(0);
          if ($COUNT > 0) {
            $Error = 'Nickname Already Taken';
          } else {

          if ($_POST['Password'] != $_POST['Repeat_Password']) {
            $Error = 'Password do not match';
          } else {

          // if ($_POST['Password'] < 8 AND $_POST['Repeat_Password'] < 8) {
          //   $Error = 'Password 8 character';
          // } else {

          $Token = uniqid(sha1(mt_rand(0,30)));

          $Salt = "d(0_0)b GladysDashboard d(0_0)b";
          $Password = strtoupper(sha1(sha1($_POST['Password']).$Salt));
          $SQL = $MyPDO -> prepare('INSERT INTO users (Username, Nickname, Email, IP, Password, 
                                      Avatar, Token, Rank, Status, 
                                      Licence_Start, Licence_End)

                                    VALUES (:Username, :Nickname, :Email, :IP, :Password, :Avatar, 
                                      :Token, :Rank, :Status, :Licence_Start, :Licence_End)');

          $SQL -> execute(array(':Username' => $_POST['Username'], 
                                ':Nickname' => $_POST['Username'], 
                                ':Password' => $Password, 
                                ':Email' => $_POST['Email'],
                                ':IP' => $_SERVER['REMOTE_ADDR'],
                                ':Avatar' => '/_Resources/Assets/Images/Avatar/Member.png',
                                ':Token' => $Token,
                                ':Rank' => 'Member',
                                ':Status' => 'Inactivated',
                                ':Licence_Start' => '0',
                                ':Licence_End' => '0'));
              
          $Destinataire = $_POST['Email'];
          $Email_Expediteur = 'no-reply@flashstresser.com';
          $No_Reply = 'no-reply@flashstresser.com';
         
          $Sujet = 'FlashStresser Signing !';
          $Message_Texte = 'Hello '. $_POST['Username'] .'
                            Thank you for signing up for a FlashStresser.
                            <br/><br/>
                            Username : '. $_POST['Username'] .'<br/>
                            Password : '. $_POST['Password'] .'<br/>
                            Email : '. $_POST['Email'] .'

                            <br/><br/>
                            Click on the following link to verify your e-mail address:<br/>
                            <a href="http://www.flashstresser.com/Activation?verify='. $Token .'" style="display: block; width: 80px; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="readMoreBtn" width="80" height="26" border="0" style="display: block;" src="http://flashstresser.com/images/Email/readmore-btn.png"  /></a>
                            ';

        $Message_Html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="Copyright" content="FlashStresser © 2012-2014 SH3LIOS">
    <meta name="Generator" content="Sublime Text 3">
    <meta name="Description" content="Purchase All Hacks Games The Best Site For High Quality IH-Framework.">
    <meta name="Keywords" content="black ops 2 cheats, medal of honor warfighter cheats
    battlefield 3 cheats, combat arms hacks, Wolf Team, Doom 3, Doom, D3D, D3D9, C++, IH_Framework, Hacks,
    Hack, vb.Net, hacks, cheats, aimbot, purchase, features, network, call, duty, battlefield,
    warfare, black, bad, Ops, medal, company, honor, home, vietnam, crossfire hacks,
    crossfire cheats, medal of honor warfighter hacks, black ops 2 hacks, bad company 2 cheats">
    <meta name="Indentifier-URL" content="http://www.flashstresser.com/">
    <meta name="robots" content="index, nofollow">
    <meta name="Author" LANG="en" content="SH3LIOS">
    <meta name="Publisher" content="SH3LIOS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://flashstresser.com/_Resources/Assets/Images/favicon.ico" rel="shortcut icon">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/152x152.png" rel="apple-touch-icon-precomposed" sizes="152x152">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/144x144.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/120x120.png" rel="apple-touch-icon-precomposed" sizes="120x120">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/114x114.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/76x76.png" rel="apple-touch-icon-precomposed" sizes="76x76">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/72x72.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="http://flashstresser.com/_Resources/Assets/Images/Apple/57x57.png" rel="apple-touch-icon-precomposed" sizes="57x57">

    <title>FlashStresser Email Test</title>

    <style type="text/css">
      body {
         background-color: #262626;
         margin: 0;
         padding: 0;
      }
      a {
        color:#2d78d2;
        text-decoration:none;
      }
      a:hover {
        color:#2d78d2;
        text-decoration:underline;
      }
      img {
        border: none;
      }
    </style>

  </head>
<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#262626">
  <tr>
    <td valign="top">
    
      <table width="650" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#262626">
        <tr>
          <td>
          </td>
        </tr>
      </table>
      
      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#fcfcfc">
        <tr>
          <td>
            
            <table width="650" border="0" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc">
              <tr>
                <td align="left" valign="top" bgcolor="#ededed"><img src="http://flashstresser.com/_Resources/Assets/Images/Email/Logo.png" width="397" height="93" /></td>
                <td align="right" valign="middle" bgcolor="#ededed"><a href="#"><img src="http://flashstresser.com/_Resources/Assets/Images/Email/Facebook.png" width="30" height="22" border="0" /></a>
                <td align="right" valign="middle" bgcolor="#ededed"><a href="#"><img src="http://flashstresser.com/_Resources/Assets/Images/Email/Twitter.png" width="30" height="22" border="0" /></a>
                <td align="right" valign="middle" bgcolor="#ededed"><a href="#"><img src="http://flashstresser.com/_Resources/Assets/Images/Email/Google.png" width="30" height="22" border="0" /></a>
                </td>
                <td width="10" align="right" valign="top" bgcolor="#ededed">&nbsp;</td>
              </tr>
            </table>
            
            <table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="50" colspan="2" align="center" valign="middle" bgcolor="#fcfcfc" style="font-family: Helvetica, Arial, sans-serif; color: #313035; font-size: 22px; letter-spacing: -1px;"></td>
              </tr>
              <tr>
                <td width="630" align="center" valign="top" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #757887; line-height: 18px;">
                  Hello '. $_POST['Username'] .'

                  Thank you for signing up for a FlashStresser.
                  <br/><br/>
                  Username : '. $_POST['Username'] .'<br/>
                  Password : '. $_POST['Password'] .'<br/>
                  Email : '. $_POST['Email'] .'
                  <br/><br/>
                  Click to verify your Email<br/><br/>

                  <a href="http://flashstresser.com/Activation?Token='. $Token .'&Email='. $_POST['Email'] .'" style="display: block; width: 80px; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="readMoreBtn" width="80" height="26" border="0" style="display: block;" src="http://flashstresser.com/_Resources/Assets/Images/Email/BTN_Activated.png"/></a>

                </td>
              </tr>
            </table>

            <table width="650" border="0" cellspacing="0" celladding="0" bgcolor="#fcfcfc">
             <tr>
                <td height="58" colspan="4"  align="left" valign="top" bgcolor="#fcfcfc">&nbsp;</td>
              </tr>
              <tr>
                <td width="10" height="58"  align="left" valign="top" bgcolor="#ededed">&nbsp;</td>
                <td width="360"  align="left" bgcolor="#ededed" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #757887; line-height: 16px;"><strong>Copyright &copy; ' .date('Y'). ' flashstresser.com All Rights Reserved.</strong><br />
                <a href="mailto:you@yoursite.com" style="color:#2d78d2;">contact@flashstresser.com</a></td>
                <td align="right" bgcolor="#ededed"style="font-family: Helvetica, sans-serif; font-size: 11px; color: #2d78d2; line-height: 16px;"><a href="#" style="color:#2d78d2;">Unsubscribe</a> | <a href="#" style="color:#2d78d2;">Subscribe</a></td>
                <td height="58" align="right" valign="top" bgcolor="#ededed">&nbsp;</td>
              </tr>
            </table>
               
            <table width="650" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#262626">
              <tr>
                  <td width="58%" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #768390;"><p>Don t miss our emails, add <a href="#" style="color:#2d78d2; font-family: Helvetica, Arial, sans-serif;">no-reply@flashstresser.com</a> to your address book</p></td>
                  <td width="15%" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #768390;"><p>View Online <a href="#" style="color:#2d78d2; font-family: Helvetica, Arial, sans-serif;">Click Here</a></p></td>
              </tr>
            </table>

          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

</body>
</html>';

   $Frontiere = '-----=' . md5(uniqid(mt_rand()));

   $Headers = 'From: "flashstresser" <'.$Email_Expediteur.'>'."\n";
   $Headers .= 'Return-Path: <'.$No_Reply.'>'."\n";
   $Headers .= 'MIME-Version: 1.0'."\n";
   $Headers .= 'Content-Type: multipart/alternative; boundary="'.$Frontiere.'"';

   $Message = 'This is a multi-part message in MIME format.'."\n\n";

   $Message .= '--'.$Frontiere."\n";
   $Message .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n";
   $Message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
   $Message .= $Message_Texte."\n\n";

   $Message .= '--'.$Frontiere."\n";
   $Message .= 'Content-Type: text/html; charset="iso-8859-1"'."\n";
   $Message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
   $Message .= $Message_Html."\n\n";

   if(mail($Destinataire,$Sujet,$Message,$Headers)) {
      $Error = 'Your account has been created, but you must activate it with E-mail';
      header('location: /Login');
   }
   else {
      $Error = 'Your account has been created, please contact support for activation by E-mail';
      header('location: /Login');
   }

            }
          }
        }
      }
    }
  //}
}
?>
<?php require_once '_Resources/Template/Another_Header.php'; ?>

<div id="cl-wrapper" class="sign-up-container">
  <div class="middle-sign-up">
    <div class="block-flat">
      <div class="header">              
        <h3 class="text-center"><img class="logo-img" style="max-width:100%;" src="_Resources/Assets/Images/Logo/50x50.png" alt="logo"/>GladysDashboard</h3>
      </div>
      <div>
        <form style="margin-bottom: 0px !important;" class="form-horizontal" method="POST">
          <div class="content">
            <h2 class="title text-center"><strong>Sign Up</strong></h2>
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
                    <input type="text" name="Username" placeholder="Username" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="Nickname" placeholder="Nickname" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="Email" placeholder="E-mail" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6 col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="Password" placeholder="Password" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="Repeat_Password" placeholder="Repeat Password" class="form-control">
                  </div>
                </div>
              </div>
             <p class="spacer">By creating an account, you agree with the <a href="Terms">Terms</a> and <a href="Conditions">Conditions</a>.</p>
            <button type="submit" name="Submit" class="btn btn-block btn-primary btn-rad btn-lg">Sign Up</button>
          </div>
          <div class="foot">
            <a href="Login"><button type="submit" class="btn btn-block btn-primary btn-rad btn-lg" data-dismiss="modal">Login</button></a>
            <a href="Forgot_Password"><button type="submit" class="btn btn-block btn-primary btn-rad btn-lg" data-dismiss="modal">Reset Password</button></a>
          </div>
          <p class="spacer"></p>
        </form>
      </div>

</div>

<?php require_once '_Resources/Template/Another_Footer.php'; ?>