<?php if(!empty($profile)):?>
    <div class="col box-depart edProfile" data-level="<?=$profile->level?>">
        <div class="card card-wd bgh">
            <div class="card-body position-relative">
                <span><?=$types[$profile->type]->name??""?></span>
                <h5 class="card-title mt-3 srt name"><?=$profile->code?> <?=$profile->name?></h5>
                <div class="card-text pt-2">
                    <div class="row row-cols-1 row-cols-sm-2 g-3">
                        <div class="col">
                            <div class="card inf">
                                <div class="card-body inf edProfilePlaces">
                                    <span>Бюджетных мест</span>
                                    <?php if(!empty($profile->places->budget))  foreach ($profile->places->budget as $edForm=>$place):?>
                                        <?php if($profile->forms->{$edForm} && $place):?>
                                            <h6
                                                    class="card-title ProfileBlock4Processing ProfileIndicatorBlock <?=(isset($formByDefault) && $formByDefault==$edForm)?"":"d-none"?>"
                                                    data-type="<?=$edForm?>"
                                            >
                                                <?=$place?>
                                            </h6>
                                        <?php endif;?>
                                    <?php endforeach;?>

                                    <?php $show= true;?>
                                    <?php if(isset($edForms)) foreach ($edForms as $key=>$shape):?>
                                        <?php if($profile->{"places$shape->code"}):?>
                                            <h6 class="card-title ProfileBlock4Processing ProfileIndicatorBlock <?=$show?"":"d-none"?>" data-type="<?=$shape->code?>"><?=$profile->{"places$shape->code"}?></h6>
                                            <?php $show= false;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card inf">
                                <div class="card-body inf edProfileDuration">
                                    <span>Срок обучения</span>
                                    <?php if(!empty($profile->duration))  foreach ($profile->duration as $edForm=>$duration):?>
                                        <?php if($profile->forms->{$edForm} && $duration):?>
                                            <h6
                                                    class="card-title ProfileBlock4Processing ProfileIndicatorBlock <?=(isset($formByDefault) && $formByDefault==$edForm)?"":"d-none"?>"
                                                    data-type="<?=$edForm?>"
                                            >
                                                <div>
                                                </div>
                                                <?php $duration= (float)$duration; ?>
                                                <?=$duration.($duration<5?" года":" лет")?>
                                            </h6>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card inf">
                                <div class="card-body inf edProfilePlaces">
                                    <span>Контрактных мест</span>
                                    <?php if(!empty($profile->places->contract))  foreach ($profile->places->contract as $edForm=>$place):?>
                                        <?php if($profile->forms->{$edForm} && $place):?>
                                            <h6
                                                    class="card-title ProfileBlock4Processing ProfileIndicatorBlock <?=(isset($formByDefault) && $formByDefault==$edForm)?"":"d-none"?>"
                                                    data-type="<?=$edForm?>"
                                            >
                                                <?=$place?>
                                            </h6>
                                        <?php endif;?>
                                    <?php endforeach;?>

                                    <?php $show= true;?>
                                    <?php if(isset($edForms)) foreach ($edForms as $key=>$shape):?>
                                        <?php if($profile->{"places$shape->code"}):?>
                                            <h6 class="card-title ProfileBlock4Processing ProfileIndicatorBlock <?=$show?"":"d-none"?>" data-type="<?=$shape->code?>"><?=$profile->{"places$shape->code"}?></h6>
                                            <?php $show= false;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="d-none exams" data-pid="<?=$profile->id?>">
                            <div class="d-flex flex-column">
                            <?php if(!empty($profile->exams->required)):?>
                                <h5 class="fw-bold">Обязательные экзамены</h5>
                                <?php foreach ($profile->exams->required as $exam=>$score):?>
                                        <table class="w-100 mb-2">
                                            <tr>
                                               <td><?=$exam?></td>
                                                <td class="float-end"><?=$score??"-"?></td>
                                            </tr>
                                        </table>
                                <?php endforeach;?>
                            <?php endif;?>
                            <?php if(!empty($profile->exams->variable)):?>
                                <h5 class="fw-bold">Экзамены на выбор</h5>
                                <?php foreach ($profile->exams->variable as $exam=>$score):?>
                                        <table class="w-100">
                                            <tr>
                                                <td><?=$exam?></td>
                                                <td class="float-end"><?=$score??"-"?></td>
                                            </tr>
                                        </table>
                                <?php endforeach;?>
                            <?php endif;?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card inf">
                                <div class="card-body inf edProfilePrice">
                                    <span>Стоимость в ₽</span>
                                    <?php if(!empty($profile->prices))  foreach ($profile->prices as $edForm=>$price):?>
                                        <?php if($profile->forms->{$edForm} && $price):?>
                                            <h6
                                                class="card-title ProfileBlock4Processing ProfileIndicatorBlock <?=(isset($formByDefault) && $formByDefault==$edForm)?"":"d-none"?>"
                                                data-type="<?=$edForm?>"
                                            >
                                                <?php echo number_format((int)$price,0,false," ")?>
                                            </h6>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($profile->exams->required) or !empty($profile->exams->variable)):?>
                <div class="items-box text-center">
                <a class="list-items myBtn" data-pid="<?=$profile->id?>">
                    Вступительные испытания
                </a>
                </div>
                <?php endif;?>
                <div class="position-absolute bottom-0 mb-3  start-0 end-0">
                    <a href="https://webabit.mgu-mlt.ru/login" class="d-block btn-accept mx-auto">Подать документы онлайн <i class="bi bi-arrow-right" style="margin-left: 5px"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<?php // dd($profile->forms??"");?>
<?php // dd($profile->prices??"");?>
<?php // dd($profile->places->budget??"");?>
<?php // dd($profile??"");?>
