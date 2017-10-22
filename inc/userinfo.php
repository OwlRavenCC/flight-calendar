<div class="container head-container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?php echo $_SESSION['data'][0]['name'] ." ". $_SESSION['data'][0]['last_name']  ?></h4>

                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $_SESSION['data'][0]['id_user']; ?>
                            <br />
                            <i class="glyphicon glyphicon-globe"></i> <strong>Total hours:</strong> <?php echo $_SESSION['data'][0]['hours']; ?>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i><?php echo $_SESSION['data'][0]['date_birth'] ?></p>
                        <!-- Split button -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
