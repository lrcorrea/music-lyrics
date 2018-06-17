<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CI</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'application/modules/professor/assets/css/professor.css?v=0.1'; ?>">
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body>

<div id="gradient">
	<div id="pin">
		<form action="<?php echo base_url('professor/entrar'); ?>" method="POST" class="form">
            <input type="email" name="EMAILPROFESSOR" placeholder="Insira seu E-mail" maxlength="255" required>
            <input type="password" name="SENHAPROFESSOR" placeholder="Insira sua Senha" maxlength="255" required>

			<button type="submit" class="submit"><span>Cadastrar</span></button>
		</form>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url() . 'application/modules/professor/assets/js/professor_login.js?v=0.4'; ?>"></script>
</body>
</html>