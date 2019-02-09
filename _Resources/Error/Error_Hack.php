<?php require_once '../../_Resources/Libs/Inc.Require.php'; ?>

<?php
$SQL = $MyPDO -> prepare('INSERT INTO ip_banned (Ip_Banned) VALUES (:Ip_Banned)');
$SQL -> execute(array(':Ip_Banned' => GET_REAL_IP()));
?>

<?php session_destroy(); ?>

<?php require_once '../../_Resources/Template/Another_Header.php'; ?>

<div class="page-error">
    <h1 class="number text-center">Banned</h1>
    <h2 class="description text-center">You have been banned</h2>
    <h3 class="text-center">Redirection...</h3>
    <script language="javascript">
        window.setTimeout
        ('document.location.href="http://www.google.fr"',4000)
    </script>
</div>

<?php require_once '../../_Resources/Template/Another_Footer.php'; ?>