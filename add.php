<?php
	require_once 'class/user.php';
	require_once 'class/event.php';
	require_once 'config.php';

	if(!(isset($_SESSION['user']['id']))){  //CHECKS IF THE USERS LOGGED IN CORRECTLY
		header('Location: index.php');
	}

	$event = new Event();
	$event->dbConnect(conString,dbUser,dbPass);

	$today =  date( ' l j F Y', strtotime( 'today' ) );


if ($_SERVER["REQUEST_METHOD"] == "POST") {
unset($_POST['search_instructor']); // NOT NEEDED VARIABLES
unset($_POST['search_student']);
unset($_POST['search_plane']);
unset($_POST['submit_event']);
$event_inputs = array();
$index = 0;
	foreach ($_POST as $key => $value){
			$event_inputs[$index] = $event->test_input($value);
			$index++;
	}

	$event->CreateEvent($event_inputs[0],$event_inputs[1],$event_inputs[2],$event_inputs[3],$event_inputs[4],$event_inputs[5],$event_inputs[6],$event_inputs[7],$event_inputs[8],$event_inputs[9]);

	print_r($event_inputs);

}


/** Navbar & Header */
 require_once("inc/navbar.php");
 ?>
 <h1 align="center">Create new Event </h1>

<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="form-app">
			<!--id_instructor -->
			<div class="form-group row">
				<span class="label label-default">Instructor</span>
				<input type="text" name="search_instructor" required id="search_instructor"  class="form-control" />
				<input type="hidden" name="instructor_id" id="instructor_id">
				<ul class="list-group" id="result_instructor"></ul>
			</div>
			<!--id_student -->
			<div class="form-group row">
				<span class="label label-default">Student</span>
				<input type="text" name="search_student" id="search_student"  class="form-control" />
				<input type="hidden" name="student_id" id="student_id">
				<ul class="list-group" id="result_student"></ul>
			</div>

			<hr>

			<!--id_plane & tach_out -->
			<div class="form-group row">
				<span class="label label-default">Airplane</span>
				<input type="text" name="search_plane" id="search_plane"  class="form-control" />
				<input type="hidden" name="plane_id" id="plane_id">
				<ul class="list-group" id="result_plane"></ul>
				<span class="label label-default">Tach Out</span>
				<input type="text" readonly name="plane_tach" id="plane_tach"  class="form-control" />

			</div>

			<hr>

			<!--Time in-->
			<div class="form-group row">
				<span class="label label-default">Start Time</span>
				<input type="time" name="time_in" required id="time_in"  class="form-control" />
			</div>
			<!--Time out-->
			<div class="form-group row">
				<span class="label label-default">End Time</span>
				<input type="time" name="time_out" required id="time_out"  class="form-control" />
			</div>
			<!--TIMESTAMP-->
			<div class="form-group row">
				<span class="label label-default">Event Date</span>
				<input type="date" name="timestamp" id="timestamp"  class="form-control" />
			</div>

			<hr>
			<!--TITLE-->
			<div class="form-group row">
				<span class="label label-default">Title</span>
				<input type="text" name="event_title" id="event_title"  class="form-control" />
			</div>
			<!--DESCRIPTION-->
			<div class="form-group row">
				<span class="label label-default">Description</span>
				<textarea name="event_description" id="event_description"  class="form-control"> </textarea>
			</div>
			<!--COLOR-->
			<div class="form-group row">
				<span class="label label-default">Color</span>
				<input type="color" value="#563d7c" name="event_color" id="event_color"  class="form-control">
			</div>

			<div class="form-group row">
				<input type="submit" name="submit_event" id="submit_event"  class="btn btn-default">
			</div>
	 	</form>
	 </div> <!-- Main Col -->
</div> <!--Container -->

<script src="js/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script src="js/app.js"></script>
<script>
SearchUser('#search_instructor','#result_instructor',2,'#instructor_id');
SearchUser('#search_student','#result_student',3,'#student_id');
SearchPlane('#search_plane','#result_plane','#plane_tach','#plane_id');
</script>
</body>
</html>
