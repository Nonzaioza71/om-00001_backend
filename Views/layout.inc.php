<div class="col-12">
    <div class="col-12">
        <?php require_once(__DIR__."/menu.inc.php");?>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-2">
            <?php require_once(__DIR__."/launchpad.inc.php");?>
        </div>
        <div class="overflow-auto container" id="TheContent">
            <div class="mb-5 col-12">
                <?php require_once(__DIR__."/content.inc.php"); ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('#TheContent').setAttribute('style', `
        height: ${window.innerHeight-document.querySelector('#TheNavbar').clientHeight}px;
    `)
</script>