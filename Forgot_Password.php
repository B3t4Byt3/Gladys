<?php require_once '_Resources/Libs/Inc.Require.php'; ?>

<?php if($Auth->Is_Login()) {
        header('location: /My_Dashboard');
      }
?>

<?php
  if (isset($_POST['Submit'])) {
      if (empty($_POST['Username']) || empty($_POST['Nickname']) || empty($_POST['Email']) || empty($_POST['Password']) || empty($_POST['Repeat_Password'])) {
        $Error = 'Please Fill in all fields';
      }

          $longueur = 8;
          $New_Password = "";
          $uniqid = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
           
          $longueurMax = strlen($uniqid);
           
          if ($longueur > $longueurMax) {
            $longueur = $longueurMax;
          }
           
          $i = 0;
           
          while ($i < $longueur) {
            $caractere = substr($uniqid, mt_rand(0, $longueurMax-1), 1);
           
            if (!strstr($New_Password, $caractere)) {
              $New_Password .= $caractere;
              $i++;
            }
          }
          
          $Salt = "d(0_0)b ILLUMINATYHACK.COM d(0_0)b";
          $Password = strtoupper(sha1(sha1($New_Password).$Salt));

          $SQL = $MyPDO -> prepare('UPDATE users SET IP = :IP, Password = :Password WHERE Email = :Email');
          $SQL -> execute(array(':Email' => $_POST['Email'],
                                ':IP' => GET_REAL_IP(),
                                ':Password' => $Password));

          $SQL = $MyPDO -> prepare('SELECT * FROM users WHERE Email = :Email');
          $SQL -> execute(array(':Email' => $_POST['Email']));
          $DATA = $SQL -> fetch();

          $SQL->closeCursor();


          $Destinataire = $_POST['Email'];
          $Email_Expediteur = 'no-reply@illuminatyhack.com';
          $No_Reply = 'no-reply@illuminatyhack.com';
         
          $Sujet = 'IlluminatyHack Forgotten Password !';
          $Message_Texte = 'Hello '. $DATA['Username'] .'
                            This is your new password.
                            <br/><br/>
                            Username : '. $DATA['Username'] .'<br/>
                            Nickname : '. $DATA['Nickname'] .'<br/>
                            New Password : '. $New_Password .'<br/>
                            Email : '. $_POST['Email'] .'';

          $Message_Html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="Copyright" content="Illuminaty Hack © 2012-2014 SH3LIOS">
    <meta name="Generator" content="Sublime Text 3">
    <meta name="Description" content="Purchase All Hacks Games The Best Site For High Quality IH-Framework.">
    <meta name="Keywords" content="black ops 2 cheats, medal of honor warfighter cheats
    battlefield 3 cheats, combat arms hacks, Wolf Team, Doom 3, Doom, D3D, D3D9, C++, IH_Framework, Hacks,
    Hack, vb.Net, hacks, cheats, aimbot, purchase, features, network, call, duty, battlefield,
    warfare, black, bad, Ops, medal, company, honor, home, vietnam, crossfire hacks,
    crossfire cheats, medal of honor warfighter hacks, black ops 2 hacks, bad company 2 cheats">
    <meta name="Indentifier-URL" content="http://www.illuminatyhack.com/">
    <meta name="robots" content="index, nofollow">
    <meta name="Author" LANG="en" content="SH3LIOS">
    <meta name="Publisher" content="SH3LIOS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://illuminatyhack.com/_Resources/Assets/Images/favicon.ico" rel="shortcut icon">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/152x152.png" rel="apple-touch-icon-precomposed" sizes="152x152">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/144x144.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/120x120.png" rel="apple-touch-icon-precomposed" sizes="120x120">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/114x114.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/76x76.png" rel="apple-touch-icon-precomposed" sizes="76x76">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/72x72.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="http://illuminatyhack.com/_Resources/Assets/Images/Apple/57x57.png" rel="apple-touch-icon-precomposed" sizes="57x57">

    <title>Illuminaty Hack Email Test</title>

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
                <td align="left" valign="top" bgcolor="#ededed"><img src="http://illuminatyhack.com/_Resources/Assets/Images/Email/Logo.png" width="397" height="93" /></td>
                <td align="right" valign="middle" bgcolor="#ededed"><a href="#"><img src="http://illuminatyhack.com/_Resources/Assets/Images/Email/Facebook.png" width="30" height="22" border="0" /></a>
                <td align="right" valign="middle" bgcolor="#ededed"><a href="#"><img src="http://illuminatyhack.com/_Resources/Assets/Images/Email/Twitter.png" width="30" height="22" border="0" /></a>
                <td align="right" valign="middle" bgcolor="#ededed"><a href="#"><img src="http://illuminatyhack.com/_Resources/Assets/Images/Email/Google.png" width="30" height="22" border="0" /></a>
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
                  Hello '. $DATA['Username'] .'
                  This is your new password.
                  <br/><br/>
                  Username : '. $DATA['Username'] .'<br/>
                  Nickname : '. $DATA['Nickname'] .'<br/>
                  New Password : '. $New_Password .'<br/>
                  Email : '. $_POST['Email'] .'
                </td>
              </tr>
            </table>

            <table width="650" border="0" cellspacing="0" celladding="0" bgcolor="#fcfcfc">
             <tr>
                <td height="58" colspan="4"  align="left" valign="top" bgcolor="#fcfcfc">&nbsp;</td>
              </tr>
              <tr>
                <td width="10" height="58"  align="left" valign="top" bgcolor="#ededed">&nbsp;</td>
                <td width="360"  align="left" bgcolor="#ededed" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #757887; line-height: 16px;"><strong>Copyright &copy; ' .date('Y'). ' IlluminatyHack.com All Rights Reserved.</strong><br />
                <a href="mailto:you@yoursite.com" style="color:#2d78d2;">contact@illuminatyhack.com</a></td>
                <td align="right" bgcolor="#ededed"style="font-family: Helvetica, sans-serif; font-size: 11px; color: #2d78d2; line-height: 16px;"><a href="#" style="color:#2d78d2;">Unsubscribe</a> | <a href="#" style="color:#2d78d2;">Subscribe</a></td>
                <td height="58" align="right" valign="top" bgcolor="#ededed">&nbsp;</td>
              </tr>
            </table>
               
            <table width="650" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#262626">
              <tr>
                  <td width="58%" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #768390;"><p>Don t miss our emails, add <a href="#" style="color:#2d78d2; font-family: Helvetica, Arial, sans-serif;">no-reply@illuminatyhack.com</a> to your address book</p></td>
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

  $Headers = 'From: "IlluminatyHack" <'.$Email_Expediteur.'>'."\n";
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
?>

<?php require_once '_Resources/Template/Another_Header.php'; ?>

<div id="cl-wrapper" class="sign-up-container">
  <div class="middle-sign-up">
    <div class="block-flat">
      <div class="header">              
        <img class="logo-img" style="max-width:100%;" src="_Resources/Assets/Images/Logo/Banniere.png" alt="logo"/>
      </div>
      <div>
        <form style="margin-bottom: 0px !important;" class="form-horizontal" method="POST">
          <div class="content">
            <h5 class="title text-center"><strong>Forgotten Password</strong></h5>
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
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" parsley-trigger="change" placeholder="Your Email" class="form-control">
                  </div>
                  <div id="email-error"></div>
                </div>
              </div>
             <p class="spacer text-center">Don't remember your email? <a href="#">Contact Support</a>.</p>
            <button type="submit" name="Submit" class="btn btn-block btn-primary btn-rad btn-lg">Reset Password</button>
          </div>
          <div class="foot">
            <a href="Sign_Up"><button type="submit" class="btn btn-block btn-primary btn-rad btn-lg">Register</button></a>
            <a href="Login"><button type="submit" class="btn btn-block btn-primary btn-rad btn-lg">Login</button></a>
          </div>
        </form>
      </div>
</div>

<?php require_once '_Resources/Template/Another_Footer.php'; ?>