<?php
/* vem de dna/page-simulador.php */
if( isset($_POST["email"]) && ( !isset( $_POST['nome'] ) || !isset( $_POST['solicitante'] ) )){
  $email = $_POST["email"];
  //send email
  $to = "contato.lafaetelocacao@gmail.com";//get_option( 'admin_email' );
  $subject = 'Newslater do site';
  $message = "Email: ".$email;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
?>
<script>
	alert("Seus dados foram enviados com sucesso");
</script>
<?php
}
?>
<form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="post" id="newslaterForm">
	<div class="container-fluid newsletter">
		<div class="container">
			<div class="row">
				<div class="col-md-6 texto">
					<?php if( isset($_POST["email"]) ){ ?>
					<h2>Em breve entraremos em contato.</h2>
					<?php }else{ ?>
					<p> Quer receber <span>novidades exclusivas</span> ?</p>
					<h2>Assine Nossa Newsletter</h2>
					<?php } ?>
				</div>
				<div class="col-md-6 formulario">
					<input type="text" value="" name="email" id="s" placeholder="Digite seu email" aria-required="true" aria-invalid="false" required>
					<input class="btn" type="submit" id="searchsubmit" value="Assinar">
				</div>
			</div>
		</div>
	</div>
</form>