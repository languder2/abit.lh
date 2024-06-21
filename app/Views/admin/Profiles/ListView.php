<div class="container-lg">
    <div class="row">
        <div class="col-lg-10 col-sm-8">
            <h3 class="mt-2 mb-3">Профили обучения</h3>
        </div>
        <div class="col-lg col-sm-4 pt-2 fs-5 text-end">
            <a href="<?=base_url('admin/profiles/add')?>" class="btn btn-primary w-75">
                Создать
            </a>
        </div>
    </div>
    <?php if(isset($message) and !empty($message)):?>
        <div class="mb-3 callout <?=$message->class?>">
            <?=$message->message?>
        </div>
    <?php endif; ?>
    <div class="grid-row py-2 text-center fw-bold ">
        <div>Код</div>
        <div>Наименование</div>
        <div>
            Уровень
        </div>
        <div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3"></div>
                    <?php if(isset($edForms)) foreach ($edForms as $form):?>
                        <div class="col-3"><?=$form->code?></div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div></div>
    </div>
    <?php if(isset($edProfiles)) foreach ($edProfiles as $profile):?>
        <div class="grid-row py-2 text-center profileRow">
            <div>
                <?=$profile->code?>
            </div>
            <div class="text-start">
                <?=$profile->name?>
            </div>
            <div>
                <?=$edLevels[$profile->level]->name??""?>
            </div>
            <div class="w-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 text-end">Срок</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $form):?>
                            <div class="col-3"><?=$profile->duration->{$form}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Цена</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $form):?>
                            <div class="col-3"><?=empty($profile->prices->{$form})?"-":$profile->prices->{$form}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Бюджет</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $form):?>
                            <div class="col-3"><?=empty($profile->places->budget->{$form})?"-":$profile->places->budget->{$form}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Контракт</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $form):?>
                            <div class="col-3"><?=empty($profile->places->contract->{$form})?"-":$profile->places->contract->{$form}?></div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div>
                <a href="<?=base_url("admin/profiles/edit/$profile->id")?>">edit</a>
                <br>
                <a href="#">delete</a>
                <br>
                <a href="#">on</a>
                <br>
                <a href="#">off</a>

            </div>
        </div>
    <?php endforeach;?>
</div>




<?php
//if(isset($edProfiles)) dd($edProfiles);
?>