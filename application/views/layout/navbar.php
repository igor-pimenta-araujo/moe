<nav class="grey darken-4">
    <div class="nav-wrapper">
        <a href="<?= base_url()?>" class="brand-logo center"><img src="<?= base_url("shared/img/logo.png")?>"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <?php if ($_SESSION):?>
            <?php if ($_SESSION['office'] == "intern"):?>
            <li><a href="<?= base_url("intern")?>">Área do estagiário</a></li>
            <?php endif;?>
            <?php if ($_SESSION['office'] == "employer"):?>
            <li><a href="<?= base_url("employer")?>">Área da empresa</a></li>
            <?php endif;?>
            <?php endif;?>
            <li style="background: #1b5e20" ><a href="<?= base_url("web/register")?>">Criar conta</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="<?= base_url()?>">Inicio</a></li>
            <li style="background: #1b5e20" ><a href="<?= base_url("web/register")?>">Criar conta</a></li>
        </ul>
    </div>
</nav>