<div class="w-50 mx-auto">
    <form action="/admin/profiles/form-processing" method="post">
        <input type="hidden" name="form[op]" value="<?=$op??"add"?>">
        <input type="hidden" name="form[id]" value="<?=$pID??""?>">
        <h3 class="mt-2 mb-3 text-center">
            <?php if($op=="add"):?>
                Создать профиль
            <?php else:?>
                Редактировать профиль: #<?=$pID??""?>
            <?php endif;?>
        </h3>
        <?php if(!empty($errors)):?>
            <div class="text-center mt-3 mb-2 callout callout-error" role="alert">
                <?php foreach ($errors as $error) echo "$error<br>";?>
            </div>
        <?php endif;?>
        <div class="mb-3">
            <div class="form-floating my-2 px-1">
                <input type="text" name="form[code]" placeholder="" value="<?=$form->code??""?>" required class="
                    form-control h-auto
                    <?=(isset($validator) && !empty($validator->getError("form.code")))?"is-invalid":""?>
                "
                >
                <label class="h-auto w-auto">Код профиля</label>
            </div>
            <div class="form-floating my-2 px-1">
                <input type="text" name="form[name]" placeholder="" value="<?=$form->name??""?>" required class="
                    form-control h-auto
                    <?=(isset($validator) && !empty($validator->getError("form.name")))?"is-invalid":""?>
                "
                >
                <label class="h-auto w-auto">Наименование профиля</label>
            </div>
            <div class="my-2 px-1">
                <select class="form-select" name="form[level]" required>
                    <option <?=(empty($form->level))?"selected":""?> disabled value="">Уровень</option>
                    <?php if(!empty($edLevels)) foreach($edLevels as $code=>$level):?>
                        <option <?=(!empty($form->level) && $form->level==$code)?"selected":""?> value="<?=$code?>"><?=$level->name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-floating my-2 px-1">
                <input type="text" name="form[type]" placeholder="" value="<?=$form->type??"Направление подготовки"?>" required class="
                    form-control h-auto
                    <?=(isset($validator) && !empty($validator->getError("form.type")))?"is-invalid":""?>
                "
                >
                <label class="h-auto w-auto">Наименование профиля</label>
            </div>
            <div class="w-100 my-2 px-1">
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-3 text-center"></div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $fKey):?>
                            <div class="col-3"><?=$fKey?></div>
                        <?php endforeach;?>
                    </div>
                    <div class="row py-1">
                        <div class="col-3 text-end">Форма</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $fKey):?>
                            <div class="col-3">
                                <div class="form-check form-switch d-inline-block px-0">
                                    <input
                                            class="form-check-input ms-0 px-0"
                                            type="checkbox"
                                            role="switch"
                                            name="form[forms][<?=$fKey?>]"
                                            value="1"
                                            id="edForm<?=$fKey?>"
                                            <?=!empty($form->forms->{$fKey})?"checked":""?>
                                    >
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="row align-items-center py-1">
                        <div class="col-3 text-end">Срок</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $fKey):?>
                            <div class="col-3">
                                <input class="form-control" type="text" name="form[duration][<?=$fKey?>]" value="<?=$form->duration->{$fKey}??""?>">
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="row align-items-center py-1">
                        <div class="col-3 text-end">Цена</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $fKey):?>
                            <div class="col-3">
                                <input class="form-control" type="text" name="form[prices][<?=$fKey?>]" value="<?=$form->prices->{$fKey}??""?>">
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="row align-items-center py-1">
                        <div class="col-3 text-end">Бюджет</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $fKey):?>
                            <div class="col-3">
                                <input class="form-control" type="text" name="form[places][budget][<?=$fKey?>]" value="<?=$form->places->budget->{$fKey}??""?>">
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="row align-items-center py-1">
                        <div class="col-3 text-end">Контракт</div>
                        <?php if(isset($edFormsKeys)) foreach ($edFormsKeys as $fKey):?>
                            <div class="col-3">
                                <input class="form-control" type="text" name="form[places][contract][<?=$fKey?>]" value="<?=$form->places->contract->{$fKey}??""?>">
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <h5 class="text-center">Экзаменационные предметы</h5>
            <div class="examGrid">
                <div>Предмет</div>
                <div>На выбор</div>
                <div>Обязательно</div>
                <div>Баллы</div>
                <?php if(!empty($examSubjects)) foreach($examSubjects as $code=>$exam):?>
                    <div>
                        <?=$exam->name?>
                    </div>
                    <div class="form-check form-switch d-inline-block px-0">
                        <input
                                class="form-check-input ms-0 float-none"
                                type="checkbox"
                                role="switch"
                                name="form[exams][<?=$code?>][variable]"
                                value="1"
                                <?=!empty($form->exams->{$code}->variable)?"checked":""?>
                        >
                    </div>
                    <div class="form-check form-switch px-0 text-center">
                        <input
                                class="form-check-input ms-0 float-none"
                                type="checkbox"
                                role="switch"
                                name="form[exams][<?=$code?>][required]"
                                value="1"
                                <?=!empty($form->exams->{$code}->required)?"checked":""?>
                        >
                    </div>
                    <div>
                        <input class="form-control" type="text" name="form[exams][<?=$code?>][score]" value="<?=$form->exams->{$code}->score??""?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>