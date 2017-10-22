<div class="container cover-page">
  <div class="row">
    <div class="col-sm-5 col-sm-offset-4">
    <img src="img/logo/cea-airspace.png" alt="CEA-app-logo" class="img-responsive logo-cea">
    <form id="login-form" method="post" role="form" class="form-group" >
      <input name="username" id="username" type="text" class="form-control input-login"  placeholder="User" required>
      <input name="password" id="password1" type="password"  class="form-control input-login"  placeholder="Password" required>
      <input type="button" name="login-submit" id="login-submit" value="Log In" class="btn btn-default button-cea" >
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(function() {
		$("#login-submit").click(function(){
			if($("#username").val() != "" && $("#password1").val() != "" && validateEmail($("#username").val())){
				$.ajax({
				  method: "POST",
				  url: "<?=loginfile?>",
				  data: { username: $("#username").val(), password: $("#password1").val() }
				}).done(function( msg ) {
				    if(msg !== ""){
				    	alert(msg);
				    }else{
				    	window.location = "<?=userPage?>";
				    }
				});
			}else{
				alert("Please fill all fields with valid data!");
			}
		});
	});
</script>
