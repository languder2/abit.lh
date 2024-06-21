<div class="w-50 mx-auto">
    <form action="/admin/exam-subjects/form-processing" method="post">
        <input type="hidden" name="form[op]" value="<?=$op??"add"?>">
        <input type="hidden" name="form[id]" value="<?=$esID??""?>">
        <h3 class="mt-2 mb-3 text-center">
            <?php if($op=="add"):?>
                Добавить предмет
            <?php else:?>
                Редактировать предмет: #<?=$es->id??""?>
            <?php endif;?>

        </h3>
        <?php if(!empty($errors)):?>
            <div class="text-center mt-3 mb-2 callout callout-error" role="alert">
                <?php foreach ($errors as $error) echo "$error<br>";?>
            </div>
        <?php endif;?>
        <div class="mb-3">
            <div class="form-floating my-2 px-1">
                <input type="text" name="form[name]" placeholder="" value="<?=$form->name??""?>" required class="
                    form-control h-auto
                    <?=(isset($validator) && !empty($validator->getError("form.name")))?"is-invalid":""?>
                "
                >
                <label class="h-auto w-auto">Имя</label>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>


