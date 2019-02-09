<?php require_once '../../_Resources/Libs/Inc.Require.php'; ?>

<?php if(isset($_GET['Titre']) || isset($_GET['Message']) || isset($_GET['Redirection'])) {
} else {
    header('location: /');
}
?>

<?php require_once '../../_Resources/Template/Another_Header.php'; ?>
<?php require_once '../../_Resources/Template/Menu_Administration.php'; ?>

<div class="container-fluid" id="pcont">
<div class="page-head" align="center" style="font-size:25px">
    <strong><?php echo $_GET['Titre'] ?></strong>
</div>
<div class="cl-mcont">
<div class="row">
<div class="col-lg-12 pull-center">
<div class="block-flat" align="center">

<div align="center">
<strong>
<p><?php echo $_GET['Message'] ?></p>
<br />

Redirection...
</strong>
<br />
<br />

<script language="javascript">
    window.setTimeout
    ('document.location.href="<?php echo $_GET['Redirection'] ?>"',4000)
</script>

</div>
</div>

<?php require_once '../../_Resources/Template/Another_Footer.php'; ?>
