<footer class="page-footer grey darken-4">
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2021 - Igor Araujo
        </div>
    </div>
</footer>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src=<?= base_url("shared/js/meujs.js")?>></script>

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Custom JS -->
<?php if (isset($scripts)) {
    foreach ($scripts as $script_name) {
        $src = base_url() . "shared/js/" . $script_name; ?>
        <script src="<?= $src ?>"></script>
    <?php }
} ?>

</body>

</html>