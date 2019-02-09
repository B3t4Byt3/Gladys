<?php require_once '../../_Resources/Libs/Inc.Require.php'; ?>

<?php if(isset($_GET['Name']) || isset($_GET['Message']) || isset($_GET['Title'])) {
    } else {
        header('location: /');
    }
?>

<style type="text/css" translate="none">
    div.wrapper { margin: 0 auto; padding: 0; max-width: 736px; text-align: center; }
    img { width: 100%; }

    div.content { width: 100%; min-height: 300px; text-align: center; }
    div.content h1 { font-size: 2.5em; font-weight: 200; }
    div.content p { font-size: 1.5em; }

    hr { display: block; height: 0; font-size: 0; border: 0; border-bottom: solid 1px #FFFFFF; }
    .full { width: 100%; }
    table { width: 100%; }
    table tr td h3 { width: 100%; display: block; text-align: center; font-weight: 400; font-size: 1.7em; margin: 8px 0; line-height: 20px; }
    table tr td span { text-align: center; display: block; font-weight: 200; color: #FFFFFF; font-size: 1em; }

    div.item { margin: 0 auto; }
    div.item:last-child,
    div.item:nth-of-type(5n) { margin-right: 0; }
    div.item img { max-width: 78px; display: block; margin: 0 auto 10px auto; }
    div.item a { display: block; font-size: 1.2em; line-height: 1.4em; }

    @media screen and (max-width: 681px) {
        div.wrapper { padding: 0 8px; }
        table tr td h3 { font-size: 1em; }
        table tr td span { font-size: 0.8em; }
    }
</style>

<?php require_once '../../_Resources/Template/Another_Header.php'; ?>

<div id="cl-wrapper" class="error-container">
    <div class="page-error">
        <div class="wrapper">
            <span style="font-size: 3.7em; color: #FFFFFF; font-weight: 200"><?php echo $_GET['Name']; ?> </span><br>
            <span style="font-size: 3.7em; color: #FFFFFF; font-weight: 400"><?php echo $_GET['Title']; ?></span><br>
            <p style="font-weight: 200; font-size: 1.2em; line-height: 20px; color: #FFFFFF">
                Le site <span translate="none" style="font-weight: bold"><?php echo $_GET['Name']; ?></span> <?php echo $_GET['Message']; ?>
            </p>
            <br><br>
            <img src="../../_Resources/Assets/Images/Config.png" style="margin: 20px 0"><br>
            
            <div class="page-error">
                <table class="no-border">
                    <tbody class="no-border-x no-border-y">
                        <tr>
                            <td style="width:22%">
                                <h3 style="color: #FFFFFF">Vous</h3>
                                <span>Navigateur Internet</span>
                            </td>
                            <td style="width:15%"></td>
                            <td style="width:22%">
                                <h3 style="color: #FFFFFF">Hébergeur</h3>
                                <span>Server, cluster #006</span>
                            </td>
                            <td style="width:15%"></td>
                            <td style="width:24%">
                                <h3 style="color: #FFFFFF">Site web</h3>
                                <span>Accès au site</span>
                            </td>
                            <td style="width:3%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once '../../_Resources/Template/Another_Footer.php'; ?>