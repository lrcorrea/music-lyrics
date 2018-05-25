<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'application/modules/home/assets/css/home.css?v=0.1'; ?>">
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body>

<div id="gradient">
	<div id="pin">
		<form action="" method="" class="form">
			<input type="tel" name="pin" placeholder="Insira o PIN" maxlength="5" required>
			<input type="text" name="name" placeholder="Informe seu nominho" class="input-hide">
			<button type="submit" class="submit"><span>Entrar</span></button>
		</form>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url() . 'application/modules/home/assets/js/home.js?v=0.2'; ?>"></script>
</body>
</html>