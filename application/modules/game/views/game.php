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
		<audio controls src="<?php echo base_url('a.flac'); ?>" autoplay id="song">
		  O seu navegador não suporta o elemento <code>audio</code>.
		</audio>

		<div class="lyrics">
			<div class="content">
				Enquanto você<br>
				Se esforça pra ser<br>
				Um sujeito normal<br>
				E fazer tudo igual<br>
				Eu do meu lado<br>
				Aprendendo a ser louco<br>
				Um maluco total<br>
				Na loucura real<br>

				<!-- <br> -->

				Controlando<br>
				A minha ____<br>
				Misturada<br>
				Com minha ____<br>
				Vou ficar<br>
				Ficar com certeza<br>
				Maluco ____<br>
				Eu vou ficar<br>
				Ficar com certeza<br>
				Maluco beleza<br>

				<?php /* ?>
				Controlando<br>
				A minha (((maluquez)))
				Misturada<br>
				Com minha (((lucidez)))
				Vou ficar<br>
				Ficar com certeza<br>
				Maluco (((beleza)))
				Eu vou ficar<br>
				Ficar com certeza<br>
				Maluco beleza<br>
				<?php */ ?>

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