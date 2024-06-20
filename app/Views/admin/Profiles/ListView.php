<div class="container-lg">
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
            <div>prices</div>
        </div>
    <?php endforeach;?>
</div>




<?php
//if(isset($edProfiles)) dd($edProfiles);
?>