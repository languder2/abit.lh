<div class="w-50 mx-auto">
    <form action="/admin/documents/form-processing" method="post" enctype="multipart/form-data">
        <input type="hidden" name="form[op]" value="<?=$op??"add"?>">
        <input type="hidden" name="form[id]" value="<?=$pID??""?>">
        <h3 class="mt-2 mb-3 text-center">
            <?=$title??""?>
        </h3>
        <input  type="hidden"
                name="form[action]"
                value="<?=$op??"add"?>"
        >
        <input  type="hidden"
                name="id"
                value="<?=$form->id??0?>"
        >
        <input  type="hidden"
                name="form[pdf]"
                value="<?=$form->pdf??""?>"
        >
        <input  type="hidden"
                name="form[fileName]"
                value="<?=$form->fileName??""?>"
        >

        <?php if(isset($message) and !empty($message)):?>
            <div class="mb-3 callout <?=$message->class??""?>">
                <?=$message->message??""?>
            </div>
        <?php endif;?>

        <?php if(!empty($validatorErrors)):?>
            <div class="text-center mt-3 mb-2 callout callout-error" role="alert">
                <?php foreach ($validatorErrors as $error) echo "$error<br>";?>
            </div>
        <?php endif;?>

        <div class="form-floating my-2 px-1">
            <input  type="text"
                    id="form-authors"
                    name="form[name]"
                    class="form-control h-auto <?=empty($validatorErrors->{"form.name"})?"":"is-invalid"?>"
                    value="<?=$form->name??""?>"
                    placeholder="Автор"
                    required
            >
            <label class="h-auto w-auto" for="form-authors">
                Укажите название файла
                <span class="text-danger fw-bold">*</span>
            </label>
        </div>

        <div class="form-floating my-2 px-1">
            <input  type="text"
                    name="form[tags]"
                    id="form-name"
                    placeholder="Название"
                    required
                    value="<?=$form->tags??""?>"
                    class="form-control h-auto <?=empty($validatorErrors->{"form.name"})?"":"is-invalid"?>"

            >
            <label class="h-auto w-auto" for="form-name">
                Теги
                <span class="text-danger fw-bold">*</span>
            </label>
        </div>

        <div class="form-floating my-2 px-1">
            <input  type="date"
                    name="form[date]"
                    id="form-date"
                    placeholder="Дата публикации"
                    value="<?=$form->date??date("Y-m-d")?>"
                    required
                    class="form-control h-auto">
            <label class="h-auto w-auto" for="form-date">Дата</label>
        </div>

        <div class="my-2 px-1">
            <label class=" form-check form-switch">
                <input  name="form[display]"
                        class="form-check-input float-none change-visible me-2"
                        type="checkbox"
                        value="1"
                    <?=(!isset($form) || !empty($form->display))?"checked":""?>
                >
                Опубликовать
            </label>
        </div>
        <div class="my-2 px-1">
            <input  name="pdf"
                <?=empty($form->pdf)?"":"required"?>
                    class="form-control"
                    type="file"
                <?=empty($form->pdf)?"required":""?>
                    accept="application/pdf"
            >
        </div>

        <?php if(!empty($form->pdf)):?>
            <div class="my-3 px-1">
                Загружен файл:
                <?=$form->fileName?>
            </div>
        <?php endif;?>

        <div class="text-center">
            <button class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>
<?=$ckeditor??""?>