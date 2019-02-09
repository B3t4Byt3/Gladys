<?php

require_once '../../_Resources/Libs/Inc.Require.php'; ?>

<?php if(isset($_GET['Titre']) || isset($_GET['Message']) || isset($_GET['Redirection'])) {
} else {
    header('location: /');
}
?>

<?php require_once '../../_Resources/Template/Header.php'; ?>
<?php require_once '../../_Resources/Template/Menu_Administration.php'; ?>

<div class="container-fluid" id="pcont">
<div class="page-head" align="center" style="font-size:25px">
    <strong><?php echo $_GET['Titre'] ?></strong>
</div>
<div class="cl-mcont">
<div class="row">
<div class="col-lg-12 pull-center">
<div class="block-flat" align="center">
<div class="table-responsive">

	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa fa-times-circle sign"></i><strong>Error!</strong> <?php echo $_GET['Message'] ?>
	</div>

<script language="javascript">
    window.setTimeout
    ('document.location.href="<?php echo $_GET['Redirection'] ?>"',4000)
</script>

</div>
</div>
</div>

<?php require_once '../../_Resources/Template/Footer.php'; ?>