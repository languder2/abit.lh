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
    <?=$filterSection??""?>
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
                        <div class="col-3"><?=empty($form->short)?$form->name:$form->short?></div>
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
                        <?php if(isset($edForms)) foreach ($edForms as $formCode=>$form):?>
                            <div class="col-3"><?=$profile->duration->{$formCode}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Цена</div>
                        <?php if(isset($edForms)) foreach ($edForms as $formCode=>$form):?>
                            <div class="col-3"><?=empty($profile->prices->{$formCode})?"-":$profile->prices->{$formCode}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Бюджет</div>
                        <?php if(isset($edForms)) foreach ($edForms as $formCode=>$form):?>
                            <div class="col-3"><?=empty($profile->places->budget->{$formCode})?"-":$profile->places->budget->{$formCode}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Контракт 11</div>
                        <?php if(isset($edForms)) foreach ($edForms as $formCode=>$form):?>
                            <div class="col-3"><?=empty($profile->places->contract->{$formCode})?"-":$profile->places->contract->{$formCode}?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row">
                        <div class="col-3 text-end">Контракт 9</div>
                        <?php if(isset($edForms)) foreach ($edForms as $formCode=>$form):?>
                            <div class="col-3"><?=empty($profile->places->contract9->{$formCode})?"-":$profile->places->contract9->{$formCode}?></div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="align-content-center">
                <a class="btn btn-primary btn-sm" href="<?=base_url("admin/profiles/edit/$profile->id")?>">edit</a>
                <a
                        class="linkRemove btn btn-danger btn-sm"
                        href="<?=base_url("admin/profiles/delete/$profile->id")?>"
                        data-title="Удалить профиль обучения"
                        data-message="Удалить #<?=$profile->id?> <?=$profile->name?>"
                >
                    del
                </a>
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input float-none changeVisible" data-link="/admin/profiles/change-visible" type="checkbox" id="changeVisible-Profile<?=$profile->id?>" data-id="<?=$profile->id?>" <?=$profile->display?"checked":""?>>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

<?php
//if(isset($edProfiles)) dd($edProfiles);
?>