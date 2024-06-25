<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$meta['title']??"Абитуриент МелГУ"?></title>
    <meta name="description" content="<?=$meta['description']??""?>">
    <meta name="keywords" content="<?=$meta['keywords']??""?>">
    <link rel="icon" href="<?=base_url("img/favicon-1.ico")?>" sizes="32x32">
    <link rel="icon" href="<?=base_url("img/favicon-1.ico")?>" sizes="192x192">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url("css/public/style.css?time=".microtime(true))?>">
    <link rel="stylesheet" href="<?=base_url("css/public/anim-bg.css?time=".microtime(true))?>">
    <link rel="stylesheet" href="<?=base_url("css/public/fb.css?time=".microtime(true))?>">
    <?php if(!empty($includes->css)) foreach ($includes->css as $css):?>
        <link rel="stylesheet" href="<?=base_url("css/$css?t=".microtime(true));?>" type="text/css">
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="<?=base_url("js/lib/imask.js?");?>"></script>
    <script defer src="<?=base_url("js/public/script.js?t=".microtime(true));?>"></script>
    <script defer src="<?=base_url("js/public/head-scroll.js?t=".microtime(true));?>"></script>
    <script defer src="<?=base_url("js/public/fb.js?t=".microtime(true));?>"></script>
    <?php if(!empty($includes->js)) foreach ($includes->js as $js):?>
        <script defer src="<?=base_url("js/$js?t=".microtime(true));?>"></script>
    <?php endforeach; ?>

</head>
<body>

<header class="navbar navbar-expand-xl navbar-light fixed-top unscrolled" id="mainNav">
    <div class="col-12 d-flex justify-content-between p-2 pt-0" style="max-width: 1320px; margin: 0 auto;">
        <div class="logo">
            <a class="navbar-brand" href="/">
                <img class="clr-logo" src="img/full-logo.png" alt="Логотип">
                <img class="min-logo" src="img/clr-logo.png" alt="Логотип">
                <img class="white-logo log" src="img/white-logo.png" alt="Логотип">
            </a>
        </div>
        <div class="d-flex upper-bnt" style="align-items: center;">
            <a class="d-block fb_call" href="#">Задать вопрос<i class="bi bi-chat-left" style="margin-left: 10px;"></i></a>
            <a class="d-block" href="https://webabit.mgu-mlt.ru/login">Личный кабинет <i class="bi bi-person-fill"></i></a>
        </div>
    </div>
    <div class="container-fluid under-header" style="max-width: 1320px; margin: 0 auto;">
        <a class="d-hidden" href="#"><img src=""></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic" aria-controls="navbarBasic" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?=$menuTop??""?>
    </div>
</header>
<div class="container-lg wd main-content">

    <?=$pageContent??""?>

</div>
<div class="area">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<section class="section-footer" style="margin: 0">
    <div class="container-lg">
        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-1 row-cols-sm-1 g-3">
            <div class="col">
                <div class="card card-footer" onClick="location.href='https://webabit.mgu-mlt.ru/'">
                    <div class="card-body">
                        <h3 class="card-title">Приемная кампания</h3>
                        <a class="str"><i class="bi bi-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-footer" onClick="location.href='https://mgu-mlt.ru/istoriya-2/'">
                    <div class="card-body">
                        <h3 class="card-title">Об университете</h3>
                        <a class="str"><i class="bi bi-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-footer">
                    <div class="card-body">
                        <h3 class="card-title">Карьера после обучения</h3>
                        <a class="str"><i class="bi bi-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 px-2 pt-5 mt-5" style="max-width: 1320px; margin: 0 auto;">
            <div class="col-lg col-sm-12">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="<?=base_url("/contacts/")?>" class="nav-link p-0 text-muted mb-3" style=" color: #CA182E !important;">Адрес</a>
                        <p>Запорожская обл.,
                            г.Мелитополь, ул. Гетманская (Ленина), 20, корпус. № Н1, ауд. Н1.315 (третий этаж)</p>
                    </li>
                    <li class="nav-item mb-2"><a href="<?=base_url("/contacts/")?>" class="nav-link p-0 text-muted how-find">Как нас найти?</a></li>
                </ul>
            </div>
            <div class="col">

            </div>
            <div class="col mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted mb-3 hd" style=" color: #CA182E !important;">Горячая линия</a>
                    </li>
                    <li class="nav-item mb-2"><a href="tel:+79901469279" class="nav-link p-0 text-muted">+7(990)-146-92-79</a></li>
                </ul>
            </div>

            <div class="col">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" style=" color: #CA182E !important;">Сайт МелГУ</a></li>
                    <li class="nav-item mb-2"><a href="https://mgu-mlt.ru/" class="nav-link p-0 text-muted text-decoration-underline">mgu-mlt.ru</a></li>
                    <li class="nav-item mb-2"><a class="nav-link p-0 text-muted">Данный сайт является официальным</a></li>
                </ul>
            </div>
        </div>
        <div class="border-top pt-3">
            <p class="text-center text-muted m-0 pb-2">МелГУ © 2024</p>
        </div>
    </footer>
</section>
<?=$fb??""?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(97612054, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/97612054" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
    function searchDepartments() {
        // Получаем значение из поля поиска
        var searchText = document.getElementById("search-depart").value.toLowerCase();

        // Получаем все элементы с классом "card-title"
        var cardTitles = document.getElementsByClassName("name");

        // Проходимся по всем элементам и скрываем те, которые не содержат введенный текст
        for (var i = 0; i < cardTitles.length; i++) {
            var cardTitleText = cardTitles[i].innerText.toLowerCase();
            var card = cardTitles[i].closest('.box-depart');
            if (cardTitleText.includes(searchText)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        }
    }

    // Добавляем обработчик события input к полю поиска
    document.getElementById("search-depart").addEventListener("input", searchDepartments);
</script>
<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
</body>
</html>