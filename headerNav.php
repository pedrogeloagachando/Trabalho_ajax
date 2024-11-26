<?php
$paginaCorrente = basename($_SERVER['SCRIPT_NAME']);
//echo $pagina_corrente;
?>

<div class="navbar-fixed">
    <nav class="grey">
        <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo white-text">Receitas_do_Pedro.com</a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons" style="color: white;">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li> <a class="white-text" <?php if ($paginaCorrente == 'index.php') {
                                                echo 'style="text-decoration: underline;"';
                                            } ?> href="index.php">Página inicial</a></li>
                <li> <a class="white-text" <?php if ($paginaCorrente == 'receita.php') {
                                                echo 'style="text-decoration: underline;"';
                                            } ?> href="receita.php">Receitas</a></li>
              
            </ul>
        </div>
    </nav>
</div>
<ul id="mobile" class="sidenav">
    <li><a href="index.php"><i class="material-icons">home</i>Página principal</a></li>
    <li><a href="receita.php">Receitas</a></li>
    
</ul>