<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'application/modules/lobby/assets/css/lobby.css'; ?>">
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body>

<div id="gradient">
	<div class="container">
		<div class="title">Olá, Lucas</div>
		
		<div class="list-items">
			<ul>
				<?php for ($i=0; $i < 100; $i++) { ?>
				<li>AAAAAAAAA</li>
				<li>BBBBBBBBB</li>
				<li>CCCCCCCCC</li>
				<li>DDDDDDDDD</li>
				<li>EEEEEEEEE</li>
				<?php } ?>
			</ul>
		</div>
	</div>	
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url() . 'application/modules/lobby/assets/js/lobby.js'; ?>"></script>
</body>
</html>