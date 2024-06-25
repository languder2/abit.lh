<section>
    <?php

//    dd($currentLevel??"");
//    dd($edLevels??"");
    $mysqli   = new mysqli("ucrtecrt.beget.tech", "ucrtecrt_abit", "jl6g5D&h", "ucrtecrt_abit");


    $profiles= [];
    $res= $mysqli->query("SELECT * FROM edProfiles WHERE display='1' ORDER BY code,name");
    while($row= $res->fetch_object()) $profiles[]= $row;
    ?>
    <div class="mb-5">
        <?=$profilesEdLevelsMenu??""?>

        <div class="row under-srt">
            <div class="col-3">
                <input type="text" id="search-depart" class="form-control mt-4" placeholder="Поиск">
            </div>
            <?=$profilesEdFormsMenu??""?>
        </div>

    </div>
    <div class="tab-content blockEdProfiles" id="pills-tabContent parent">
        <h3 id="not_found" class="d-none">
            Направления подготовки соответствующие запросу не найдены.
        </h3>
        <div class="row row-cols-lg-3 row-cols-sm-1 row-cols-md-2 g-3">
            <?php if(!empty($edProfileCards)) foreach ($edProfileCards as $key=>$card):?>
                <?=$card?>
            <?php endforeach;?>
        </div>
    </div>
    <div class="mt-5">
        <p class="info_bal">
            <span>*</span> Что бы ознакомиться с нормативными документами и минимальными проходными баллами <a href="https://mgu-mlt.ru/normativnye-dokumenty/">Перейдите по ссылке</a>
        </p>
        <p class="info_bal">
            <span>**</span> Стоимость отображена согласно выбранной форме обучения в фильтре
        </p>
    </div>
</section>
