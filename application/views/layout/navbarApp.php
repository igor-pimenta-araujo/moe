<nav class="grey darken-4">
    <div class="nav-wrapper">
        <a href="<?= base_url()?>" class="brand-logo center"><img src="<?= base_url("shared/img/logo.png")?>"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?= base_url()?>">Inicio</a></li>
            <li><a>Dados cadastrais</a></li>
            <li><a href="<?= base_url("web/logout")?>">Sair</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="<?= base_url()?>">Inicio</a></li>
            <li style="background: #1b5e20" ><a href="<?= base_url("web/register")?>">Criar conta</a></li>
        </ul>
    </div>
</nav>