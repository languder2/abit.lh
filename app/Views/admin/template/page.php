<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title??""?></title>
    <link href="<?=base_url('css/lib/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url("css/admin/main.css"); ?>?t=<?php echo(microtime(true).rand()); ?>" rel="stylesheet" type="text/css">
    <script defer src="<?= base_url('js/lib/bootstrap.bundle.min.js');?>"></script>
    <script defer src="<?= base_url('/js/admin/main.js');?>?t=<?php echo(microtime(true).rand()); ?>"></script>

    <?php if(!empty($includes->js)) foreach ($includes->js as $js):?>
        <script defer src="<?= base_url($js);?>?t=<?php echo(microtime(true).rand()); ?>"></script>
    <?php endforeach; ?>
    <?php if(!empty($includes->css)) foreach ($includes->css as $css):?>
        <link href="<?=base_url($css);?>?t=<?php echo(microtime(true).rand()); ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
</head>
<body>
<header class="container-fluid px-0">
    <?php if(!empty($mainMenu)) echo $mainMenu?>
</header>
<main class="container-lg px-2">
    <?=$pageContent??""?>
</main>
<footer>
</footer>
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <a href="#" class="btn btn-primary btnSuccess">Удалить</a>
            </div>
        </div>
    </div>
</div>
</body>