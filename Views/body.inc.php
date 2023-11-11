<?php if (isset($user)) { ?>
    <div class="col-12">
        <?php require_once(__DIR__ . '/navbar.inc.php'); ?>
        <div class="col-12 row">
            <?php require_once(__DIR__ . '/menu.inc.php') ?>
            <div class="col-10">
                <div class="container overflow-auto" id="theContent">
                    <?php require_once(__DIR__ . '/content.inc.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        const navHeight = document.querySelector('#navbar').clientHeight
        document.querySelector('#theContent').setAttribute('style', `height: ${window.innerHeight - navHeight}px`)
    </script>
<?php } else {
    require_once('Components/Login/index.inc.php');
} ?>