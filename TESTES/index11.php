<?php
require_once('dashboard/_php/iniatilizer.php'); 
$include = $route->routing($_SERVER['REQUEST_URI']);
$param = $route->parameters($_SERVER['REQUEST_URI']);
$metapages=array('imovel'=>'ppt_properties');

function getPhrase($session, $field){
	global $pdo;
	$qPh=$pdo->query("SELECT * FROM cfg_phrases WHERE status='Y' AND section='$session' ORDER BY id DESC");
	$phrase=$qPh->fetch();
	return $phrase->$field;
}

function getIconSocial($net, $url){
	switch($net){
		case 'facebook' : return
		'<li>
		  <a href="'.$url.'" target="_blank" class="icon-text">
			<i class="fab fa-facebook-square"></i>
		  </a>
		</li>'; break;
		case 'twitter' : return
		'<li>
		  <a href="'.$url.'" target="_blank" class="icon-text">
			<i class="fab fa-twitter"></i>
		  </a>
		</li>'; break;
		case 'youtube' : return
		'<li>
		  <a href="'.$url.'" target="_blank" class="icon-text">
			<i class="fab fa-youtube fa-lg"></i>
		  </a>
		</li>'; break;
		case 'pinterest' : return
		'<li>
		  <a href="'.$url.'" target="_blank" class="icon-text">
			<i class="fab fa-pinterest fa-lg"></i>
		  </a>
		</li>'; break;
		case 'linkedin' : return
		'<li>
		  <a href="'.$url.'" target="_blank" class="icon-text">
			<i class="fab fa-linkedin fa-lg"></i>
		  </a>
		</li>'; break;
		case 'instagram' : return
		'<li>
		  <a href="'.$url.'" target="_blank" class="icon-text">
			<i class="fab fa-instagram fa-lg"></i>
		  </a>
		</li>'; break;
	}
}

$now_hours = date("Y-m-d H:i:s", strtotime('-5 hours'));
$now = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?=$config->metatags(@$param[0], $metapages, @$param[1]);?>
<!-- jQuery library -->
<script src="<?=JS;?>jquery-3.2.1.min.js"></script>
<script src="<?=JS;?>jquery.center.js"></script>
<script src="https://kit.fontawesome.com/e27117b0a2.js" crossorigin="anonymous"></script>

<link rel="apple-touch-icon" sizes="57x57" href="<?=ROOT;?>apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?=ROOT;?>apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=ROOT;?>apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?=ROOT;?>apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=ROOT;?>apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?=ROOT;?>apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?=ROOT;?>apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?=ROOT;?>apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?=ROOT;?>apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?=ROOT;?>android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=ROOT;?>favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?=ROOT;?>favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=ROOT;?>favicon-16x16.png">
<link rel="manifest" href="<?=ROOT;?>manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?=ROOT;?>ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" href="<?=CSS;?>bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=JS;?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=JS;?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?=JS;?>plugins/OwlCarousel2-2.2.1/animate.css">
<link href="<?=JS;?>plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=CSS;?>main_style3.css">
<link rel="stylesheet" type="text/css" href="<?=CSS;?>responsive.css">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
<?php
$analytics=$config->config_info('analytics', 'cfg_general_information', " status='Y' ");
if(!empty($analytics)){ ?>
    var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?=$analytics;?>']); // <== PUT YOUR OWN CODE HERE
        _gaq.push(['_trackPageview']);
        _gaq.push(['_setDomainName', 'none']);
        _gaq.push(['_setAllowLinker', true]);
    (function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript';
		  ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0];
		  s.parentNode.insertBefore(ga, s);
    })();
<?php } ?>

<?=$popup->popUpBannerJquery(@$param[0]);?>

var _path="<?=ROOT;?>";

<?=$banner->cycle_link();?>
</script>

<style type="text/css">
#martinDigital{
	position: fixed;
	bottom: 10%;
	right: 0px;
	background: #FFF;
	z-index: 999;
	padding: 5px;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	border-top-left-radius: 5px;
	border-bottom-left-radius: 5px;
	-webkit-box-shadow: -4px 0px 4px -3px #000000; 
	box-shadow: -4px 0px 4px -3px #000000;
	width: 55px;
}

#tagMateriais{
	position: fixed;
	top: 10%;
	right: 0px;
	z-index: 999;
display: none;
}
.gabaritosas{
	position: fixed;
	top: 30%;
	right: 0px;
	padding:10px 20px;;
	background: #ff8a00;
	text-align: center;
	z-index: 999;
	line-height: 14px;
	font-size: 1.2em;
}
.gabaritosas a{
	text-decoration: none;
	color: #FFFFFF;
	font-weigth: 600;
}
.gabaritosas a small{
	font-weigth: 400;
}
.gabaritosas .icosas{
	position:relative;
	float: left;
	margin-right: 10px;
color: #FFFFFF;
}

/*TESTE 2 FERA DO VOLEI - Bruno C.A.*/
#barra_feras_volei {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    flex-wrap: wrap;
}

#barra_feras_volei .content-wrapper {
    display: flex;
    align-items: center;
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 10px;
    flex-direction: column; 
}

#barra_feras_volei img {
    max-width: 100px;
    height: auto;
    margin-bottom: 20px;
}

#barra_feras_volei .text-content {
    flex: 1;
    text-align: center;
    margin: 0 20px;
}

#barra_feras_volei h4 {
    margin: 0 0 10px 0;
    font-size: 1.5em;
}

#barra_feras_volei p {
    margin: 0;
    line-height: 1.5;
}

@media (min-width: 600px) {
    #barra_feras_volei .content-wrapper {
        flex-direction: row; 
    }

    #barra_feras_volei img {
        margin-bottom: 0; 
    }
}

<?=$popup->popUpBannerCSS(@$param[0]);?>
</style>

</head>
<body>

<div class="super_container">
<!-- Header -->
<header class="header">
	<!-- Top Bar -->
	<div class="top_bar">
		<div class="top_bar_container">
			<div class="container">
				<div class="row">
				  <div class="col">
					<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
						<ul class="top_bar_contact_list">
						  <li>
							<div><i class="far fa-envelope"></i> <?=$config->config_info('email', 'cfg_general_information', " status='Y' ");?></div>
						  </li>
						  <li>
							<div><a href="<?=ROOT;?>martin-digital.html"><img src="<?=IMG;?>martindigitalw.svg" class="img-fluid" style="height:35px"></a></div>
						  </li>
						</ul>

						<div class="top_bar_login ml-auto">
						  <ul>
							<li style="float: right; line-height: 25px;"><a href="https://mail.google.com/a/martinluther.com.br" target="_blank" style="color: #FFF"><i class="far fa-envelope"></i> E-mail</a></li>
							<li style="float: right; line-height: 25px; padding: 0px 15px;">Ligue <strong><?=$config->config_info('callcenter', 'cfg_general_information', " status='Y' ");?></strong></li>		
						  </ul>
						</div>

					</div>
				  </div>
				</div>
			</div>
		</div>				
	</div>

	<!-- Header Content -->
	<div class="header_container">
	  <div class="container">
		<div class="row">
		  <div class="col">
			<div class="header_content d-flex flex-row align-items-center justify-content-start">
			  <div class="logo_container col col-md-4 col-xs-12">
				<a href="<?=ROOT;?>" alt="<?=$config->config_info('title', 'cfg_general_information', " status='Y' ");?>" title="<?=$config->config_info('title', 'cfg_general_information', " status='Y' ");?>">
					<img src="<?=IMG;?>logo.svg" alt="<?=$config->config_info('title', 'cfg_general_information', " status='Y' ");?>" class="img-fluid">
				</a>
			  </div>
<!--
			  <nav class="main_nav_contaner ml-auto">
				<ul class="main_nav">
					<li <?=((empty($param[0]))?'class="active"':NULL);?>><a href="<?=ROOT;?>">HOME</a></li>
					<li <?=(($param[0]=='o_colegio')?'class="active"':NULL);?>><a href="#">O COL&Eacute;GIO</a>
						<ul class="submenu">
							<li><a href="<?=ROOT;?>o_colegio.html">CONHE&Ccedil;A</a></li>
							<li><a href="<?=ROOT;?>niveis.html">N&iacute;VEIS</a></li>
							<li><a href="<?=ROOT;?>programa_bilingue.html">PROGRAMA BIL&Iacute;NGUE</a></li>
							<li><a href="<?=ROOT;?>projetos.html">PROJETOS</a></li>
							<li><a href="<?=ROOT;?>atividades-extras.html" target="_blank">ATIVIDADES EXTRAS</a></li>
							<li><a href="<?=ROOT;?>protocolo_sanitario.pdf" target="_blank">PROTOCOLO SANIT&Aacute;RIO</a></li>
							<li><a href="<?=ROOT;?>termo-de-compromisso.pdf" target="_blank">TERMO DE COMPROMISSO</a></li>
						</ul>
					</li> 

					<!-- <li <?=(($param[0]=='ensino')?'class="active"':NULL);?>><a href="#">ENSINO</a>
						<ul class="submenu">
							<li><a href="<?=ROOT;?>download/calendario.html">CALEND&Aacute;RIO</a></li>
						</ul>
					</li>
					<li <?=(($param[0]=='projetos')?'class="active"':NULL);?>><a href="<?=ROOT;?>projetos.html">PROJETOS</a></li>-- >
					<li <?=(($param[0]=='digital')?'class="active"':NULL);?>><a href="#">MARTIN DIGITAL</a>
						<ul class="submenu">
							<li><a href="<?=ROOT;?>portais-educacionais.html">PORTAIS EDUCACIONAIS</a></li>
							<li><a href="<?=ROOT;?>ferramentas-educacionais.html">FERRAMENTAS EDUCACIONAIS</a></li>
							<li><a href="<?=ROOT;?>aplicativos.html">APLICATIVOS</a></li>
							<li><a href="<?=ROOT;?>tutoriais.html">TUTORIAIS</a></li>
						</ul>
					</li> 
					<li><a href="<?=ROOT;?>matricula.html">MATR&Iacute;CULAS</a>
						<ul class="submenu">
							<li><a href="https://enrollment.gennera.com.br/public/#!/campaigns/4d9d4ffbc478a612db1bd517f55867f91dfdbe14/enrollments/new" target="_blank">EDUCA&Ccedil;&Atilde;O INFANTIL</a></li>
							<li><a href="https://enrollment.gennera.com.br/public/#!/campaigns/8c7f02c4391d8b3f54e65f4d658f2ca765717042/enrollments/new" target="_blank">OUTROS N&Iacute;VEIS</a></li>
						</ul>
					</li> 


					<li <?=(($param[0]=='blog' || $param[0]=='post')?'class="active"':NULL);?>><a href="<?=ROOT;?>blog.html">NOT&Iacute;CIAS</a></li>
					<li <?=(($param[0]=='contato')?'class="active"':NULL);?>><a href="<?=ROOT;?>contato.html">CONTATO</a></li>
				</ul>
				<div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

				<!-- Hamburger -- >

				<div class="hamburger menu_mm">
					<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
				</div>
			  </nav> -->

			  <nav class="main_nav_contaner ml-auto">
				<ul class="main_nav">
					<li <?=((empty($param[0]))?'class="active"':NULL);?>><a href="<?=ROOT;?>">HOME</a></li>
					<li <?=(($param[0]=='o_colegio')?'class="active"':NULL);?>><a href="#">O COL&Eacute;GIO</a>
						<ul class="submenu">
							<li><a href="<?=ROOT;?>o_colegio.html">CONHE&Ccedil;A</a></li>
							<li><a href="<?=ROOT;?>niveis.html">N&iacute;VEIS</a></li>
							<li><a href="<?=ROOT;?>programa_bilingue.html">PROGRAMA BIL&Iacute;NGUE</a></li>
							<li><a href="<?=ROOT;?>diferenciais.html">NOSSOS DIFERENCIAIS</a></li>
							<!--<li><a href="<?=ROOT;?>protocolo_sanitario.pdf" target="_blank">PROTOCOLO SANIT&Aacute;RIO</a></li>
							<li><a href="<?=ROOT;?>termo-de-compromisso.pdf" target="_blank">TERMO DE COMPROMISSO</a></li>-->
						</ul>
					</li> 

					<li class="megamenu <?=(($param[0]=='alunos')?'active':NULL);?>"><a id="showmenu" href="#">ALUNOS</a> </li>

					<li <?=(($param[0]=='blog' || $param[0]=='post')?'class="active"':NULL);?>><a href="<?=ROOT;?>blog.html">NOT&Iacute;CIAS</a></li>
					<li <?=(($param[0]=='contato')?'class="active"':NULL);?>><a href="<?=ROOT;?>contato.html">CONTATO</a></li>
				</ul>
				<div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

				<!-- Hamburger -->

				<div class="hamburger menu_mm">
					<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
				</div>
			  </nav>

			</div>

			<div id="bigMenu" class="megaMenuBox">
				<div class="innerMM">
					<div class="col col-md-3 box-menu  float-left">
						<h4>ATIVIDADES</h4>
						<ul class="box-itens-menu">
							<li><a href="<?=ROOT;?>atividades-extras.html" target="_blank">ATIVIDADES EXTRAS</a></li>
							<li><a href="<?=ROOT;?>projetos.html">PROJETOS</a></li>
						</ul>
<div class="clearfix"><br> </div>
						<h4>VIAGENS DE ESTUDOS</h4>
						<ul class="box-itens-menu">
							<li><a href="<?=ROOT;?>viagens-de-estudos/infantil.html">Educa&ccedil;&atilde;o Infantil</a></li>
							<li><a href="<?=ROOT;?>viagens-de-estudos/fundamentali.html">Fundamental I</a></li>
							<li><a href="<?=ROOT;?>viagens-de-estudos/fundamentalii.html">Fundamental II</a></li>
							<li><a href="<?=ROOT;?>viagens-de-estudos/ension-medio.html">Ensino M&eacute;dio</a></li>
						</ul>

					</div>
<!--
					<div class="col col-md-3 box-menu  float-left">
						<h4>ATIVIDADES EXTRAS</h4>
						<ul class="box-itens-menu">
						
						<?php
							$qae=$pdo->query("SELECT * FROM ctd_extraactivities WHERE status='Y' ORDER BY priority DESC");
							while($extra=$qae->fetch()){
								echo '<li><a href="'.$extra->url.'" target="_blank">  '.$extra->title.'</a><li>';
							}
						?>
						</ul>
					</div> -->
					<div class="col col-md-3 box-menu  float-left">
						<h4>MARTIN DIGITAL</h4>
						<ul class="box-itens-menu">
							<li><a href="<?=ROOT;?>alunos/portais-educacionais.html">Portais Educacionais</a></li>
							<li><a href="<?=ROOT;?>alunos/ferramentas-educacionais.html">Ferramentas Educacionais</a></li>
							<li><a href="<?=ROOT;?>alunos/aplicativos.html">Aplicativos</a></li>
							<li><a href="<?=ROOT;?>tutoriais.html">Tutoriais</a></li>
						</ul>
					</div>
					<div class="col col-md-3 box-menu  float-left">
						<h4>INFORMA&Ccedil;&Otilde;ES</h4>
						<ul class="box-itens-menu">
							<li><a href="<?=ROOT;?>calendario.html">Calend&aacute;rio</a></li>
							<li><a href="<?=ROOT;?>alunos/horarios.html">Hor&aacute;rios</a></li>
						</ul>

					</div>

					<div class="col col-md-3 box-menu float-left">
						<h4>DOWNLOADS</h4>
						<ul class="box-itens-menu">
							<li><a href="<?=ROOT;?>lista_de_materiais.html">Listas de Materiais</a></li>
							<li><a href="<?=ROOT;?>alunos/uniformes.html">Uniformes</a></li>
						</ul>
					</div>
					<div class="col col-md-3 box-menu float-left">
						<h4>CARD&Aacute;PIOS</h4>
						<ul class="box-itens-menu">
							<li><a href="<?=ROOT;?>alunos/cantina.html">Card&aacute;pio Cantina</a></li>
							<li><a href="<?=ROOT;?>alunos/cardapios.html">Card&aacute;pios Lanches</a></li>
						</ul>
					</div>
					<div class="col col-md-3 box-menu float-left">
						<h4>MATR&Iacute;CULAS PARA NOVOS ALUNOS</h4>
						<ul class="box-itens-menu">
							<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/c42aa3c4ae072b9e655e03d40a40cc6bd6bb3967/enrollments/new" target="_blank" style="font-weight: 400;">Educa&ccedil;&atilde;o Infantil</a></li>
							<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/9fb617a570ae19776fe3cca1963795f09eaacead/enrollments/new" target="_blank" style="font-weight: 400;">Findamental 1&ordm; ao 5&ordm;</a></li>
							<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/9fb617a570ae19776fe3cca1963795f09eaacead/enrollments/new" target="_blank" style="font-weight: 400;">Findamental 6&ordm; ao 9&ordm;</a></li>
							<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/9fb617a570ae19776fe3cca1963795f09eaacead/enrollments/new" target="_blank" style="font-weight: 400;">Ensino M&eacute;dio</a></li>
							<li class="menu_mm"><a href="https://forms2.gennera.com.br/public/#!/forms/a0a46ee996b5fdaad7786a4bfcfaa92de127ce29/responses/new" target="_blank" style="font-weight: 400;">Col&ocirc;nia de F&eacute;rias</a></li>
						</ul>
					</div>


				</div>
			</div>


		  </div>
		</div>
	  </div>
	</div>

	<!-- Header Search Panel -->
    <div class="header_search_container">
	  <div class="container">
		<div class="row">
		  <div class="col">
			<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
			  <form action="<?=ROOT;?>resultado.html" method="post" class="header_search_form">
				<input type="search" class="search_input" placeholder="Procurar..." required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			  </form>
			</div>
		  </div>
		</div>
	  </div>			
    </div>

</header>

<!-- Menu -- >
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
	<div class="search">
	  <form action="<?=ROOT;?>resultado.html" method="post" class="header_search_form menu_mm">
		<input type="search" class="search_input menu_mm" placeholder="Procurar..." required="required">
		<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
			<i class="fa fa-search menu_mm" aria-hidden="true"></i>
		</button>
	  </form>
	</div>
	<nav class="menu_nav">
	  <ul class="menu_mm">
		<li class="menu_mm"><a href="<?=ROOT;?>">HOME</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>o_colegio.html">O COL&Eacute;GIO</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>niveis.html">N&iacute;VEIS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>portais-educacionais.html">PORTAIS EDUCACIONAIS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>ferramentas-educacionais.html">FERRAMENTAS EDUCACIONAIS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>aplicativos.html">APLICATIVOS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>tutoriais.html">TUTORIAIS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>projetos.html">PROJETOS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>blog.html">NOT&Iacute;CIAS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>contato.html">CONTATO</a></li>
	  </ul>
	</nav>
	<div class="menu_extra">
<div class="menu_phone"><a href="https://mail.google.com/a/martinluther.com.br" target="_blank"><img src="<?=IMG;?>gmaillogod.png" border="0" height="25px"></a></div>
	<div class="menu_phone"><span class="menu_title">Ligue <strong><?=$config->config_info('callcenter', 'cfg_general_information', " status='Y' ");?></strong></div>
	  <div class="menu_social">
		<span class="menu_title">Siga-nos</span>
		<ul>
		<?php
			 $qsn=$pdo->query("SELECT * FROM mkt_socialnet WHERE status='Y' ORDER BY priority DESC");
			 while($socialnet=$qsn->fetch()){
				 echo getIconSocial($socialnet->website, $socialnet->url);
			 }
		?>
		</ul>
	  </div>
	</div>
</div>


<!-- Menu -->
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
	<div class="search">
	  <form action="<?=ROOT;?>resultado.html" method="post" class="header_search_form menu_mm">
		<input type="search" class="search_input menu_mm" placeholder="Procurar..." required="required">
		<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
			<i class="fa fa-search menu_mm" aria-hidden="true"></i>
		</button>
	  </form>
	</div>
	<nav class="menu_nav">
	  <ul id="menu_nav" class="menu_mm">
		<li class="menu_mm"><a href="<?=ROOT;?>">HOME</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>o_colegio.html">O COL&Eacute;GIO</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>niveis.html">N&iacute;VEIS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>destaques.html">NOSSOS DESTAQUES</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>blog.html">NOT&Iacute;CIAS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>atividades-extras.html" target="_blank">ATIVIDADES EXTRAS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>projetos.html">PROJETOS</a></li>
		<li class="menu_mm"><a href="<?=ROOT;?>contato.html">CONTATO</a></li>

<!--
		<li>
			<div data-toggle="collapse" data-target="#mextras" aria-expanded="false" aria-controls="extras" style="color: #2c2b31"><strong>ATIVIDADES EXTRAS <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="mextras" class="collapse" aria-labelledby="mextras" data-parent="#menu_nav">
				<li class="menu_mm"><a href="<?=ROOT;?>projetos.html" style="font-weight: 400;">PROJETOS</a></li>
				<?php
					$qae=$pdo->query("SELECT * FROM ctd_extraactivities WHERE status='Y' ORDER BY priority DESC");
					while($extra=$qae->fetch()){
						echo '<li class="menu_mm"><a href="'.$extra->url.'" target="_blank"  style="font-weight: 400;">  '.$extra->title.'</a><li>';
					}
				?>
			</ul>
		</li>
-->
		<li>
			<div data-toggle="collapse" data-target="#mtravel" aria-expanded="false" aria-controls="menutravel" style="color: #2c2b31"><strong>VIAGENS DE ESTUDOS <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="mtravel" class="collapse" aria-labelledby="mtravel" data-parent="#menu_nav">
				<li class="menu_mm"><a href="<?=ROOT;?>viagens-de-estudos/infantil.html" style="font-weight: 400;">Educa&ccedil;&atilde;o Infantil</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>viagens-de-estudos/fundamentali.html"  style="font-weight: 400;">Fundamental I</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>viagens-de-estudos/fundamentalii.html" style="font-weight: 400;">Fundamental II</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>viagens-de-estudos/ension-medio.html" style="font-weight: 400;">Ensino M&eacute;dio</a></li>
			</ul>
		</li>
		
		<li>
			<div data-toggle="collapse" data-target="#mdigital" aria-expanded="false" aria-controls="menudigital" style="color: #2c2b31"><strong>MARTIN DIGITAL <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="mdigital" class="collapse" aria-labelledby="mdigital" data-parent="#menu_nav">
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/portais-educacionais.html" style="font-weight: 400;">Portais Educacionais</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/ferramentas-educacionais.html" style="font-weight: 400;">Ferramentas Educacionais</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/aplicativos.html" style="font-weight: 400;">Aplicativos</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>tutoriais.html" style="font-weight: 400;">Tutoriais</a></li>
			</ul>
		</li>
		<li>
			<div data-toggle="collapse" data-target="#minfo" aria-expanded="false" aria-controls="info" style="color: #2c2b31"><strong>INFORMA&Ccedil;&Otilde;ES <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="minfo" class="collapse" aria-labelledby="minfo" data-parent="#menu_nav">
				<li class="menu_mm"><a href="<?=ROOT;?>calendario.html" style="font-weight: 400;">Calend&aacute;rio</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/horarios.html" style="font-weight: 400;">Hor&aacute;rios</a></li>
			</ul>
		</li>
		<li>
			<div data-toggle="collapse" data-target="#mdownloads" aria-expanded="false" aria-controls="downloads" style="color: #2c2b31"><strong> DOWNLOADS <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="mdownloads" class="collapse" aria-labelledby="mdownloads" data-parent="#menu_nav">
				<li class="menu_mm"><a href="<?=ROOT;?>lista_de_materiais.html" style="font-weight: 400;">Listas de Materiais</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/uniformes.html" style="font-weight: 400;">Uniformes</a></li>
				<li>
			</ul>
		</li>
		<li>		
			<div data-toggle="collapse" data-target="#mcardapios" aria-expanded="false" aria-controls="cardapios" style="color: #2c2b31"><strong>CARD&Aacute;PIOS <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="mcardapios" class="collapse" aria-labelledby="mcardapios" data-parent="#menu_nav">
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/cantina.html" style="font-weight: 400;">Card&aacute;pio Cantina</a></li>
				<li class="menu_mm"><a href="<?=ROOT;?>alunos/cardapios.html" style="font-weight: 400;">Card&aacute;pios Lanches</a></li>
			</ul>
		</li>
		<li>
			<div data-toggle="collapse" data-target="#mmatriculas" aria-expanded="false" aria-controls="matriculas" style="color: #2c2b31"><strong>MATR&Iacute;CULAS PARA NOVOS ALUNOS <i class="fas fa-caret-down"></i></strong> </div>
			<ul id="mmatriculas" class="collapse" aria-labelledby="mmatriculas" data-parent="#menu_nav">
				<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/c42aa3c4ae072b9e655e03d40a40cc6bd6bb3967/enrollments/new" target="_blank" style="font-weight: 400;">Educa&ccedil;&atilde;o Infantil</a></li>
				<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/9fb617a570ae19776fe3cca1963795f09eaacead/enrollments/new" target="_blank" style="font-weight: 400;">Findamental 1&ordm; ao 5&ordm;</a></li>
				<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/9fb617a570ae19776fe3cca1963795f09eaacead/enrollments/new" target="_blank" style="font-weight: 400;">Findamental 6&ordm; ao 9&ordm;</a></li>
				<li class="menu_mm"><a href="https://enrollment.gennera.com.br/public/#!/campaigns/9fb617a570ae19776fe3cca1963795f09eaacead/enrollments/new" target="_blank" style="font-weight: 400;">Ensino M&eacute;dio</a></li>
				<li class="menu_mm"><a href="https://forms2.gennera.com.br/public/#!/forms/a0a46ee996b5fdaad7786a4bfcfaa92de127ce29/responses/new" target="_blank" style="font-weight: 400;">Col&ocirc;nia de F&eacute;rias</a></li>
			</ul>
		</li>
	  </ul>
	</nav>
	<div class="menu_extra"><br><br>
	<div class="menu_phone"><span class="menu_title">Ligue <strong><?=$config->config_info('callcenter', 'cfg_general_information', " status='Y' ");?></strong></div>
	  <div class="menu_social">
		<span class="menu_title">Siga-nos</span>
		<ul>
		<?php
			 $qsn=$pdo->query("SELECT * FROM mkt_socialnet WHERE status='Y' ORDER BY priority DESC");
			 while($socialnet=$qsn->fetch()){
				 echo getIconSocial($socialnet->website, $socialnet->url);
			 }
		?>
		</ul>
	  </div>
	</div>
</div>
	
<!-- Home -->
<div class="home">
  <div class="home_slider_container" style="max-height: 650px">
	
	<!-- Home Slider -->
	<div class="owl-carousel owl-theme home_slider" style="max-height: 650px">
	  <?php
		$qmbanner = $pdo->query("SELECT * FROM mkt_masterbanner WHERE status='Y' ORDER BY RAND()");
		while($mbanner = $qmbanner->fetch()){
			echo '
			  <!-- Slider Item -->
			  <div class="owl-item" style="max-height: 650px">
			  	<a href="'.$mbanner->url.'" target="'.$mbanner->target.'">
				<div class="home_slider_background" style="background-image:url('.UPLOAD.$mbanner->archive.')"></div>
				'.(($mbanner->showtext=='Y')?'
				<div class="home_container">
				  <div class="container">
					<div class="row">
					  <div class="col">
						<div class="home_content text-center">
						  <div class="home_text">
							<div class="home_title">'.$mbanner->title.'</div>
							<div class="home_subtitle">'.$mbanner->text.'</div>
						  </div>
						'.((!empty($mbanner->textbutton))?'
						  <div class="home_buttons">
							<div class="button home_button"><a href="'.$mbanner->url.'" target="'.$mbanner->target.'">'.$mbanner->textbutton.'<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
						  </div>':'').'
						</div>
					  </div>
					</div>
				  </div>
				</div>':'').'
				</a>
			  </div>';
		}
	  ?>
	</div>
				<!-- Home Slider Nav -->
				<div class="home_slider_nav_container d-flex flex-row align-items-start justify-content-between">
					<div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
					<div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
				</div>

  </div>
</div>

<!--
Featured Course
<div class="results">
	<div class="container">
		<a href="<?=ROOT;?>somar/" target="_blank"><img src="<?=IMG;?>somar.png" class="img-fluid img-responsive"></a>
	</div>
</div>
-->

<div style="clear: both;"></div>

<div class="featured">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
					$qhl = $pdo->query("SELECT * FROM ctd_highlight WHERE status='Y' ORDER BY RAND() LIMIT 1");
					$highlight = $qhl->fetch();
				?>
				<div class="featured_container">
					<div class="row">
						<div class="col-lg-6 featured_col">
						  <div class="featured_content">
							<div class="featured_title">
								<h3><a href="<?=$highlight->url;?>" target="<?=$highlight->target;?>"><?=$highlight->title;?></a></h3>
							</div>
							<div class="featured_text"><?=$highlight->text;?></div>

							<div class="featured_footer d-flex">
							  <a href="<?=$highlight->url;?>" target="<?=$highlight->target;?>"><div class="featured_author_name"> <?=$highlight->infodate;?> </div></a>
							  <div class="featured_sales ml-auto"> <?=$highlight->infolocal;?></div>
							</div>

						  </div>
						</div>
						<div class="col-lg-6 featured_col">
							<a href="<?=$highlight->url;?>" target="<?=$highlight->target;?>"><div class="featured_background" style="background-image:url(<?=UPLOAD.$highlight->archive;?>)"></div></a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Courses -->
<?php
$qcnews = $pdo->query("SELECT * FROM ctd_news  WHERE status='Y' ORDER BY RAND()");
if($qcnews->rowCount()>0 ){
?>
<div class="courses">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="section_title text-center"><h2><?=@getPhrase('blog', 'title');?></h2></div>
				<div class="section_subtitle"><?=@getPhrase('blog', 'text');?></div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				
				<!-- Courses Slider -->
				<div class="courses_slider_container">
					<div class="owl-carousel owl-theme courses_slider">
						<?php
						$qnews = $pdo->query("SELECT * FROM ctd_news WHERE status='Y' ORDER BY postedin DESC LIMIT 5");
						while($news = $qnews->fetch()){
							$qnimg = $pdo->query("SELECT * FROM ctd_news_gallery WHERE status='Y' AND  principal='Y' AND idmaster='".$news->id."' LIMIT 1");
							$imgn = $qnimg->fetch();

							echo $diff->title.'<!-- Slider Item -->
							<div class="owl-item">
							  <div class="course">
								<div class="course_image"><a href="'.ROOT.'post/'.$news->keyaccess.'.html">'.$midia->insert('image', @$imgn->archive, array(600, 400),'adaptar', $news->title, 'img-responsive').'</a></div>
								<div class="course_body" style="padding: 10px;">
								  <div class="course_title"><h3><a href="'.ROOT.'post/'.$news->keyaccess.'.html">'.$news->title.'</a></h3></div>
								  <div class="course_text">'.$news->call.'</div>
								  <div class="course_header d-flex flex-row align-items-center justify-content-start">
									<div class="course_tag"><a href="'.ROOT.'post/'.$news->keyaccess.'.html">Leia mais <i class="fas fa-long-arrow-alt-right"></i></a></div>
								  </div>
								</div>
							  </div>
							</div>';

						}

						?>

					</div>
					
					<!-- Courses Slider Nav -->
					<div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
					<div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Courses -->
<?php
$qccl = $pdo->query("SELECT * FROM ctd_calendar WHERE status='Y' AND datein>='".$now."'");
if($qccl->rowCount()>0){
?>
<div class="calendar">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="section_title text-center"><h2><?=@getPhrase('calendar', 'title');?></h2></div>
				<div class="section_subtitle"><?=@getPhrase('calendar', 'text');?></div>
			</div>
		</div>

		<div class="row">

				<div class="calendar_slider_container">
					<div class="owl-carousel owl-theme calendar_slider">
						<?php
						$qcalendar = $pdo->query("SELECT *, DATE_FORMAT(datein, '%d') AS day, DATE_FORMAT(datein, '%m') AS month, DATE_FORMAT(datein, '%Y') AS year FROM ctd_calendar WHERE status='Y' ORDER BY datein ASC");
						while($calendar = $qcalendar->fetch()){

							echo '
							<div class="col-lg-12 col">
								  <div class="calendar_date">
									<div class="day">'.$calendar->day.'</div>
									<div class="year">'.getMonth($calendar->month).'</div>
								  </div>
								  <div class="calendar_title"><h3>'.$calendar->title.'</h3></div>
							</div>';

						}
						?>
					</div>
					
					<!-- Courses Slider Nav -->
					<div class="carousel-control">
					  <div class="calendar_slider_nav calendar_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
					  <div class="calendar_slider_nav calendar_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</div>
				</div>

		</div>
	</div>
</div>		
<?php } ?>

<!-- Milestones -->
<?php
	$qbl = $pdo->query("SELECT * FROM ctd_callbilingual WHERE status='Y' ORDER BY id DESC LIMIT 1");
	$bilingual = $qbl->fetch();
?>

<div class="milestones">
	<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?=UPLOAD.$bilingual->archive;?>" data-speed="0.8" style="background: url(<?=UPLOAD.$bilingual->archive;?>) center;"></div>
	<div class="container">
		<div class="row">
						
			<h1><?=$bilingual->title;?></h1>
			<h3><?=$bilingual->text;?></h3>
			<div class="button join_button"><a href="<?=ROOT;?>programa_bilingue.html"><?=$bilingual->textbutton;?><div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
		</div>
	</div>
</div>

<!-- Video -->

<div class="video">
	<div class="container">
		<div class="row">
			<div class="col">
				
			</div>
		</div>
	</div>
</div>


<!-- Courses -->
<?php /*
$qcdiff = $pdo->query("SELECT * FROM ctd_differencial WHERE status='Y' ORDER BY RAND()");
if($qcdiff->rowCount()>0 ){
?>
<div class="courses">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="section_title text-center"><h2><?=@getPhrase('differentials', 'title');?></h2></div>
				<div class="section_subtitle"><?=@getPhrase('differentials', 'text');?></div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				
				<!-- Courses Slider -->
				<div class="courses_slider_container">
					<div class="owl-carousel owl-theme courses_slider">
						<?php
						$qdiff = $pdo->query("SELECT * FROM ctd_differencial WHERE status='Y' ORDER BY RAND()");
						while($diff = $qdiff->fetch()){
							$qdimg = $pdo->query("SELECT * FROM ctd_differencial_gallery WHERE status='Y' AND  principal='Y' AND idmaster='".$diff->id."' LIMIT 1");
							$imgd = $qdimg->fetch();

							echo $diff->title.'<!-- Slider Item -->
							<div class="owl-item">
							  <div class="course">
								<div class="course_image">'.$midia->insert('showbox', @$imgd->archive, array(600, 400),'adaptar', $diff->title, 'img-responsive').'</div>
								<div class="course_body">
								  <div class="course_title"><h3><a href="'.ROOT.'diferenciais/'.$diff->keyaccess.'.html">'.$diff->title.'</a></h3></div>
								  <div class="course_text">'.$diff->call.'</div>
								  <div class="course_header d-flex flex-row align-items-center justify-content-start">
									<div class="course_tag"><a href="'.ROOT.'diferenciais/'.$diff->keyaccess.'.html">Saber mais <i class="fas fa-long-arrow-alt-right"></i></a></div>
								  </div>
								</div>
							  </div>
							</div>';

						}

						?>

					</div>
					
					<!-- Courses Slider Nav -->
					<div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
					<div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php  } */ ?>
<!-- Join -->


<div class="join">
  <div class="container">
	<div class="row">
	  <div class="col-lg-10 offset-lg-1">
		<div class="section_title text-center"><h2><?=@getPhrase('video', 'title');?></h2></div>
		<div class="normal-text" style="text-align: center;"><?=@getPhrase('video', 'text');?></div>
	  </div>
	  <div class="video_container_outer">
	  	<?php
			$qvideo = $pdo->query("SELECT * FROM ctd_videos WHERE status='Y' LIMIT 1");
			$video = $qvideo->fetch();
			if(strpos($video->url, 'youtube')>0){
		?>
		<div class="video_container">
			<video id="vid1" class="video-js vjs-default-skin" controls data-setup='{ "poster": "<?=UPLOAD.$video->archive;?>", "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?=$video->url;?>"}], "youtube": { "iv_load_policy": 1 } }'>
			</video>
		<?php }else{ ?>
				<a href="<?=$video->url;?>" target="_blank"><video id="vid1" class="video-js vjs-default-skin" controls data-setup='{ "poster": "<?=UPLOAD.$video->archive;?>", "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?=$video->url;?>"}], "youtube": { "iv_load_policy": 1 } }'>
			</video></a>
		<?php } ?>
		</div>
	  </div>
	</div>
  </div>
  <div class="button join_button"><a href="<?=ROOT;?>matricula.html">FA&Ccedil;A SUA PR&Eacute;-MATR&Iacute;CULA<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
</div>

<!-- Footer -->

<div class="bannerpartner" style="margin-bottom: 20px">
	<div class="container text-center">
	<div id="barra_feras_volei">
        <div class="content-wrapper">
            <img src="<?=ROOT;?>municipio.png" alt="">
            <div class="text-content">
                <h4>PROJETO SOCIAL FERAS DO VÔLEI</h4>
                <p>
                    Parceria ASSEAMAL e Prefeitura Municipal de Marechal Cândido Rondon/PR <br>
                    <strong>ASSEAMAL - CNPJ 77.603.041/0001-05</strong><br>
                    Assinatura 28/02/2024 -- Data de início 01/03/2024 -- Execução até 31/12/2024 <br>
                    Data fim de execução 01/02/2025 -- Data fim de vigência 01/03/2025 <br>
                    Prestação de contas final 31/01/2025 -- Aprovação até 28/02/2025 <br>
                    Termo de colaboração n⁰ 013/2024 -- Valor total R$ 276.000,00
                </p>
            </div>
            <img src="<?=ROOT;?>martin.png" alt="">
        </div>
    </div>
</div>

<footer class="footer">
	<div class="container">
		<div class="row">

			<!-- About -->
			<div class="col-lg-4 col-xs-12 col footer_col">
				<div class="footer_about"  style="top: 30px;">
					<div class="logo_container text-center">
						<a href="<?=ROOT;?>">
							<img src="<?=IMG;?>logo.png" alt="" class="img-fluid" style="max-width: 80%">
						</a>
					</div>
					<div class="footer_about_text">
						<p class="text-center">Educa&ccedil;&atilde;o para AUTONOMIA!</p><br>
						<table align="center"  cellpadding="4" border="0"  style="position: relative; margin: auto;">
							<tr><td colspan="2" align="center" style="font-size: .9em">Baixe o ClipEscola</td></tr>
							<tr><td  align="center" ><a href="https://play.google.com/store/apps/details?id=clipescola.android" target="_blank"><img src="<?=IMG;?>playstore.png"></a></td>
							<td  align="center"><a href="https://itunes.apple.com/br/app/clipescola/id1061679567?mt=8" target="_blank"><img src="<?=IMG;?>appstore.png"></a></td></tr>
						</table>
					</div>

					<div class="footer_social text-center">
						<ul>
						<?php
							 $qsn=$pdo->query("SELECT * FROM mkt_socialnet WHERE status='Y' ORDER BY priority DESC");
							 while($socialnet=$qsn->fetch()){
								 echo getIconSocial($socialnet->website, $socialnet->url, $socialnet->title);
							 }
						?>
						</ul>
					</div>
					<div class="copyright text-center" style="margin-top: 5px; color: #555;">Encarregado de Dados: Lilian J. Faccin Levistki<br>E-mail: dpo@martinluther.com.br</div>
					<div class="copyright text-center" style="margin-top: 15px"><?=($config->config_info('copyright', 'cfg_general_information', " status='Y' "));?> &copy;  <?=date('Y');?> <br> Developed by  <a href="https://iccons.com.br/" target="_blank">ICCons</a><br><a href="<?=ROOT;?>termo-de-uso.pdf" target="_blank">Termos de uso</a></div>
				</div>
			</div>

			<div class="col-lg-2 col-xs-12 footer_col">
				<div class="footer_links">
					<div class="footer_title">MENU R&Aacute;PIDO</div>
					<ul class="footer_list">
						<li><a href="<?=ROOT;?>">HOME</a></li>
						<li><a href="<?=ROOT;?>o_colegio.html">O COL&Eacute;GIO</a></li>
						<li><a href="<?=ROOT;?>niveis.html">N&iacute;VEIS</a></li>
						<li><a href="<?=ROOT;?>programa_bilingue.html">PROGRAMA BIL&Iacute;NGUE</a></li>
						<li><a href="<?=ROOT;?>projetos.html">PROJETOS</a></li>
						<li><a href="<?=ROOT;?>atividades-extras.html" target="_blank">ATIVIDADES EXTRAS</a></li>
						<li><a href="<?=ROOT;?>protocolo_sanitario.pdf" target="_blank">PROTOCOLO SANIT&Aacute;RIO</a></li>
						<li><a href="<?=ROOT;?>blog.html">BLOG</a></li>
						<li><a href="<?=ROOT;?>trabalhe_conosco.html">TRABALHE CONOSCO</a></li>
						<li><a href="<?=ROOT;?>contato.html">CONTATO</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-xs-12 footer_col">
			  <div class="footer_links footer-spacer">
				<div class="footer_title">LINKS &Uacute;TEIS</div>
				<ul class="footer_list">
					<?php
						 $qlu=$pdo->query("SELECT * FROM ctd_linksuseful WHERE status='Y' ORDER BY priority DESC");
						 while($links=$qlu->fetch()){
							 echo '<li><a href="'.$links->url.'" target="'.$links->target.'">'.$links->title.'</a></li>';
						 }
					?>
					<li><a href="<?=ROOT;?>downloads.html">DOWNLOADS</a></li>
					<li><a href="<?=ROOT;?>documentos.html">DOCUMENTOS</a></li>
					<li><a href="<?=ROOT;?>lista_de_materiais.html">LISTA DE MATERIAIS</a></li>
					<li><a href="<?=ROOT;?>cardapios.html">CARD&Aacute;PIOS</a></li>
					<li><a href="<?=ROOT;?>calendario.html">CALEND&Aacute;RIO</a></li>
					<li><a href="<?=ROOT;?>cantina.html">CANTINA</a></li>

				</ul>
				<ul class="footer_list">
					<li><a href="<?=ROOT;?>reservas/">RESERVAS</a></li>
				</ul>

			  </div>
			</div>

			<div class="col-lg-4 col-xs-12 footer_col">
				<div class="footer_contact">
					<div class="footer_title">ENTRE EM CONTATO</div>
					<div class="footer_contact_info">
						<div class="footer_contact_item">
							<div class="footer_contact_title">Endere&ccedil;o:</div>
							<div class="footer_contact_line">
								<?=$analytics=$config->config_info('address', 'cfg_general_information', " status='Y' ");?></br>
								<?=$analytics=$config->config_info('zipcode', 'cfg_general_information', " status='Y' ");?> - <?=$analytics=$config->config_info('district', 'cfg_general_information', " status='Y' ");?></br>
								<?=$analytics=$config->config_info('city', 'cfg_general_information', " status='Y' ");?>/<?=$analytics=$config->config_info('state', 'cfg_general_information', " status='Y' ");?></br>
							</div>
						</div>
						<div class="footer_contact_item">
							<div class="footer_contact_title">Telefone:</div>
							<div class="footer_contact_line"><?=$analytics=$config->config_info('phone', 'cfg_general_information', " status='Y' ");?> <br>
<?=$analytics=$config->config_info('whatsapp', 'cfg_general_information', " status='Y' ");?>
						</div>
						</div>
						<div class="footer_contact_item">
							<div class="footer_contact_title">E-mail:</div>
							<div class="footer_contact_line"><?=$analytics=$config->config_info('email', 'cfg_general_information', " status='Y' ");?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<?php
$dw = date("w", strtotime($now));
//if($dw==5){
if(1==2){
?>
<div class="gabaritosas">
	<div class="icosas"><i class="far fa-check-circle fa-2x"></i></div><a href="<?=ROOT;?>gabarito_sas.html">GABARITO SAS<br><small>acesse aqui!</small></a>
</div>
<?php } ?>

<div id="tagMateriais"><a href="<?=ROOT;?>listas_de_materiais.html"><img src="<?=IMG;?>materiais.png" class="img-fluid"></a> </div>

<div id="martinDigital"><a href="<?=ROOT;?>martin-digital.html"><img src="<?=IMG;?>logodigital.png" class="img-fluid"></a> </div>

<script type="text/javascript" src="<?=CSS;?>bootstrap4/popper.js"></script>
<script type="text/javascript" src="<?=CSS;?>bootstrap4/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/greensock/TweenMax.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/greensock/TimelineMax.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/greensock/animation.gsap.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/easing/easing.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/video-js/video.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/video-js/Youtube.min.js"></script>
<script type="text/javascript" src="<?=JS;?>plugins/parallax-js-master/parallax.min.js"></script>

<script type="text/javascript" id="cookieinfo"
  src="//cookieinfoscript.com/js/cookieinfo.min.js"
  data-bg="#333333"
  data-fg="#FFFFFF"
  data-link="#FFCC00"
  data-cookie="colegiomartinluther2022"
  data-text-align="left"
  data-linkmsg="Saiba mais..."
  data-moreinfo="https://pt.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)"
  data-message="<b>COOKIES!</b> &#x1F36A; Este site faz uso cookies para garantir uma melhor experi&ecirc;ncia dos nossos visitantes."
       data-close-text="Entendi!">
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>


<script type="text/javascript" src="<?=JS;?>plugins/fancybox/jquery.fancybox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=JS;?>plugins/fancybox/jquery.fancybox.min.css" media="screen" />

<script src="<?=JS;?>sweetalert2/sweetalert2.min.js" type="text/javascript"></script>
<link href="<?=JS;?>sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?=JS;?>custom.js"></script>

<script src="<?=JS;?>whatsappfloat/floating-wpp.js" type="text/javascript"></script>
<link href="<?=JS;?>whatsappfloat/floating-wpp.css" rel="stylesheet" type="text/css" />
<?php
$gmaps=$config->config_info('googlemaps', 'cfg_general_information', " status='Y' ");

$wa = $config->config_info('whatsapp', 'cfg_general_information', " status='Y' ");
$wa = str_replace(array(), array('','','',''), $wa);
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb-4b11rshAnDDcX0ELigJsmDvQeDP1mI"></script>
<div id="pickerWhatsApp"></div>

<script type="text/javascript">
// request permission on page load 
//<![CDATA[
jQuery(document).ready(function($){

	$('#pickerWhatsApp').floatingWhatsApp({
        phone: '55<?=$wa;?>',
        popupMessage: 'Precisando de ajuda?',
        message: "Coloque seu questionamento aqui...",
        premessage : "",
        showPopup: false,
        showOnIE: false,
        headerTitle: 'Boas-vindas!',
        headerColor: '#4AB45A',
        backgroundColor: '#4AB45A',
        size: '52px',
        zIndex: 99999,
        buttonImage: '<img src="<?=JS;?>whatsappfloat/whatsapp.svg" />'

    });

	if($('#showMap').length>0){
		var point = new google.maps.LatLng(<?=$gmaps;?>);
		
		var myMapOptions = {
		  zoom: 14,
		  scrollwheel: false,
		  center: point,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		var map = new google.maps.Map(document.getElementById("showMap"),myMapOptions);
		
	
		var marker = new google.maps.Marker({
		  draggable: false,
		  raiseOnDrag: false,
		  map: map,
		  position: point
		});
	}
	$(document).on('click', '.closeRg', function(){
		$('#register').hide();
		$('#materials').fadeIn();
	});
	$(document).on('click', '.closeMt', function(){
		$('#materials').hide();
	});

	$(document).on('click', function(e){
		//'.megaMenuBox',
		console.log(e.target.id);
		if(e.target.id!='showmenu' && e.target.id!='bigMenu' && $('#bigMenu').is(':visible')){
			$('#bigMenu').fadeOut();
		}
	});


});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
#register{
	position: fixed;
    left: 50%;
    transform: translate(-50%, 0);
	max-width: 700px;
	width: 100%;
	top: 10%;
	z-index: 999999;
	display: none;
}
#register td, #register img{
	margin: 0px;
	padding: 0px;
} 
.closeRg{
	position: relative;
    float: right;
    top: 10px;
    left: 0px;
	cursor: pointer;
}
@media (max-width: 600px) {

	#register{
		zoom: .6;
	}
	#tagMateriais{
		display:none;
	}
	#martinDigital{
		display:none;
	}

}
#materials{
	position: fixed;
    left: 50%;
    transform: translate(-50%, 0);
	max-width: 500px;
	width: 100%;
	top: 15%;
	z-index: 80;
	display:none;
}
.closeMt{
	position: relative;
    float: right;
    top: -25px;
    left: -70px;
	cursor: pointer;
}
#register a svg{
	color: #777;
	font-size: 2em;
}
</style>
<?=$popup->popUpBanner($param[0]);?>

<div id="register">
	<div class="closeRg"><img src="<?=IMG;?>close.png"></div>

	<table border="0" cellpadding="0" cellspacing="0" style="padding: 0; margin: 0; border-spacing: 0; width: 100%; max-width: 650px; border-collapse: collapse; line-height: 0;">
        <tr>
            <td colspan="2" style="padding: 0; margin: 0; ">
				<a href="https://apps.gennera.com.br/public/#/login" target="_blank"><img src="images/rematriculas_01.png" style="padding: 0; margin: 0; width:100%;"></a>
            </td>
        </tr>		
        <tr>
            <td style="padding: 0; margin: 0;">
				<a href="https://enrollment.gennera.com.br/public/#!/campaigns/0a91fea33b4e6042d6d87b6e6dfea5cfde428cb9/enrollments/new" target="_blank"><img src="images/rematriculas_02.png" style="padding: 0; margin: 0; width:100%;"></a>
            </td>
            <td style="padding: 0; margin: 0;">
				<a href="https://enrollment.gennera.com.br/public/#!/campaigns/029d0a593b72c5c4e8b1fccfd26efb06b6e45db7/enrollments/new" target="_blank"><img src="images/rematriculas_03.png" style="padding: 0; margin: 0; width:100%;"></a>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 0; margin: 0;">
				<a href="https://martinluther.com.br/tutoriais.html" target="_blank"><img src="images/rematriculas_04.png" style="padding: 0; margin: 0; width:100%;"></a>
            </td>            
        </tr>
    </table>
</div>
<!--
<div id="materials"><div class="closeMt"><img src="<?=IMG;?>close.png"></div>
	<table>
	<tr><td>
	<a href="https://martinluther.com.br/listas_de_materiais.html" target="_blank"><img src="<?=ROOT;?>materiais.png" class="img-fluid"></a>
	</td></tr>
	</table>
</div> -->
</body>
</html>