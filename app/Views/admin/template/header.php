<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title??""?></title>
    <link href="<?=base_url('css/lib/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('css/admin/main.css'); ?>?t=<?=microtime(true);?>" rel="stylesheet" type="text/css">
    <script defer src="<?= base_url('js/lib/bootstrap.bundle.min.js');?>"></script>
    <script defer src="<?= base_url('js/admin/main.js');?>?t=<?=microtime(true);?>"></script>
</head>
<body>
<header class="container-fluid px-0">
    <?php if(!empty($mainMenu)) echo $mainMenu?>
</header>
<main class="container-lg px-2">
