</header>
<!--Main Navigation-->

<!--Footer-->
<footer class="bg-light text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-dark" target="_blank" href="https://igoraraujo.netlify.app/">igoraraujo.netlify.app</a>
    </div>
    <!-- Copyright -->
</footer>
<!--Footer-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- MDB -->
<script type="text/javascript" src="<?= base_url("shared/mdb5/js/mdb.min.js") ?>"></script>
<!-- Custom JS -->
<?php if (isset($scripts)) {
    foreach ($scripts as $script_name) {
        $src = base_url() . "shared/js/" . $script_name; ?>
        <script src="<?= $src ?>"></script>
    <?php }
} ?>
</body>
</html>