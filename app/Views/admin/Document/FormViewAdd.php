<div class="w-50 mx-auto">
    <form action="/admin/profiles/form-processing" method="post" enctype="multipart/form-data">
        <input type="hidden" name="form[op]" value="<?=$op??"add"?>">
        <input type="hidden" name="form[id]" value="<?=$pID??""?>">
        <h3 class="mt-2 mb-3 text-center">
                Добавить PDF
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
                <label class="h-auto w-auto">Заголовок файла</label>
            </div>
            <div class="my-2 px-1">
                <input  name="pdf"
                    <?=empty($form->pdf)?"":"required"?>
                        class="form-control"
                        type="file"
                    <?=empty($form->data->pdf)?"required":""?>
                        accept="application/pdf"
                >
            </div>

            <?php if(!empty($form->data->pdf)):?>
                <div class="my-3 px-1">
                    Загружен файл:
                    <?=$form->data->fileName?>
                </div>
            <?php endif;?>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>
