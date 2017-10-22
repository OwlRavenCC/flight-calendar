<?php
	require_once 'class/user.php';
	require_once 'class/event.php';
	require_once 'config.php';

	$userdash = new User();
	$userdash->dbConnect(conString, dbUser, dbPass);

	$event = new Event();
	$event->dbConnect(conString,dbUser,dbPass);

	$today =  date( ' l j F Y', strtotime( 'today' ) );


	if(!(isset($_SESSION['user']['id']))){
		header('Location: index.php');
	}

/**
*Navbar & Header
*/
 require_once("inc/navbar.php");

 ?>

 <h1 align="center">Flight Schedule </h1>

<div class="cd-schedule loading">
	<div class="timeline">
		<ul>
			<li><span>05:00</span></li>
			<li><span>05:30</span></li>
			<li><span>06:00</span></li>
			<li><span>06:30</span></li>
			<li><span>07:00</span></li>
			<li><span>07:30</span></li>
			<li><span>08:00</span></li>
			<li><span>08:30</span></li>
			<li><span>09:00</span></li>
			<li><span>09:30</span></li>
			<li><span>10:00</span></li>
			<li><span>10:30</span></li>
			<li><span>11:00</span></li>
			<li><span>11:30</span></li>
			<li><span>12:00</span></li>
			<li><span>12:30</span></li>
			<li><span>13:00</span></li>
			<li><span>13:30</span></li>
			<li><span>14:00</span></li>
			<li><span>14:30</span></li>
			<li><span>15:00</span></li>
			<li><span>15:30</span></li>
			<li><span>16:00</span></li>
			<li><span>16:30</span></li>
			<li><span>17:00</span></li>
			<li><span>17:30</span></li>
			<li><span>18:00</span></li>
		</ul>
	</div> <!-- .timeline -->

	<div class="events">
		<ul>
					<?php
					$color = 0;
					$day = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
					for ($i = 0; $i <= 6; $i++):
					?>
					<li class="events-group">
						<div class="top-info"><span><?php echo date( " l, M jS", strtotime( "this week $day[$i]" ) ); ?></span></div>
						<ul>
					<?php
							foreach ($event->GetEvent($day[$i]) as $key ):
								$color = ($color > 4 ? 0 : $color+ 1  );
								$timeout = explode(':',$key['time_out'],-1);
								$timein = explode(':',$key['time_in'],-1);
							?>
								<li class="single-event" data-start="<?php echo $timeout[0] .":". $timeout[1] ; ?>" data-end="<?php echo $timein[0] .":". $timein[1] ; ?>"  data-event="event-<?php echo $color; ?>" data-content="event-test">
									<a href="#0">
										<em class="event-name"><?php echo $key['title'] ?></em>
										<span style="display:none;" class="event-body"><?php echo $key['description'] ?></span>
									</a>
								</li>
						<?php endforeach; ?>
								</ul>
							</li>
					<?php endfor;  ?>
		</ul>
	</div>

	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="event-name"></h3>
			</div>

			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>

	<div class="cover-layer"></div>
</div> <!-- .cd-schedule -->
<script src="js/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
