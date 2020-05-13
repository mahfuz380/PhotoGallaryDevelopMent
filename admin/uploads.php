<?php include("includes/header.php"); ?>
<?php if(!$session->isSignedIn()) { redirect("login.php"); } ?>

<?php
if(isset($_POST['submit'])) {
    $photo  = new Photo();
    
}
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">SB Admin</a>
    </div>
    
    <!-- Top Menu Items -->
    <?php include("includes/top_nav.php"); ?>


    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/side_nav.php"); ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Uploads
                    <small>Subheading</small>
                </h1>

                <div class="col-md-6">
                    <form action="uploads.php" method="post" enctype="mulipart/form-data">

                    <div class="form-group">
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="file" name="fileUpload">
                    </div>

                    <input type="submit" name="submit">


                </form>
            </div>

                
                



            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>