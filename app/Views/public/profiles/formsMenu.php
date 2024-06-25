<div class="col-9" style="display: flex; flex-direction: column; justify-content: flex-end;">
    <nav class="nav nav-pills srt blockTypes" id="pills-fl" role="filter">
        <?php if(!empty($edForms)) foreach ($edForms as $form):?>
            <a
                    class="nav-link <?=$form->byDefault?"active":""?> setType"
                    href="#"
                    data-type="<?=$form->code?>"><?=$form->name?>
            </a>
        <?php endforeach;?>
    </nav>
</div>
