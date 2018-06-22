<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'application/modules/game/assets/css/game.css'; ?>">
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body>

<div id="gradient">
	<div class="container">
		<audio controls src="http://developer.mozilla.org/@api/deki/files/2926/=AudioTest_(1).ogg" autoplay id="song">
		  O seu navegador não suporta o elemento <code>audio</code>.
		</audio>

		<div class="lyrics">
			<div class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quia itaque officia qui, ratione voluptatibus ad aut, temporibus illo blanditiis quis. Id laborum deleniti culpa officia provident numquam cum labore.
				Lorem ipsum dolor _____ sit amet, consectetur adipisicing elit. Ipsam quia itaque officia qui, ratione voluptatibus ad aut, temporibus illo blanditiis quis. Id laborum deleniti culpa officia provident numquam cum labore.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quia itaque officia qui, ratione voluptatibus ad aut, temporibus illo blanditiis quis. Id laborum deleniti culpa officia provident numquam cum labore.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quia itaque officia qui, ratione voluptatibus ad aut, temporibus illo blanditiis quis. Id laborum deleniti culpa officia provident numquam cum labore.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quia itaque officia qui, ratione voluptatibus ad aut, temporibus illo blanditiis quis. Id laborum deleniti culpa officia provident numquam cum labore.
			</div>
		</div>

		<form action="<?php echo site_url('game/verify-word'); ?>" method="POST" id="input">
			<input type="text" name="res">
			<button type="submit">></button>
		</form>
	</div>	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url() . 'application/modules/game/assets/js/game.js?v=0.01'; ?>"></script>
</body>
</html>