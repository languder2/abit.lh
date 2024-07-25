<div class="container-lg">
    <div class="row">
        <div class="col col-lg-10 col-sm-8">
            <h3 class="mt-2 mb-3">
                Публикации
            </h3>
        </div>
        <div class="col col-lg-2 col-sm-4 pt-2 fs-5 text-end">
            <a href="<?=base_url('admin/documents/add')?>" class="btn btn-primary">
                Создать
            </a>
        </div>
    </div>
    <?php if(isset($message) and !empty($message)):?>
        <div class="mb-3 callout <?=$message->class??""?>">
            <?=$message->message??""?>
        </div>
    <?php endif;?>

    <?php echo $filter??""?>

    <?php if(!isset($publications) or empty($publications)):?>
        <div class="mb-3 callout callout-error">
            Нет данных
        </div>
    <?php else:?>
        <div class="list-grid my-3">
            <div class="grid-title">#</div>
            <div class="grid-title">Дата</div>
            <div class="grid-title">Теги</div>
            <div class="grid-title">Название</div>
            <div class="grid-title"> </div>
            <div class="grid-title"> </div>
            <div class="grid-title"> </div>
            <div class="grid-title"> </div>
            <div class="grid-title"> </div>
            <?php if(isset($publications)) foreach ($publications as $publicate):?>
                <div>
                    <?=$publicate->id?>
                </div>
                <div>
                    <?=date("d.m.Y",strtotime($publicate->date))?>
                </div>
                <div>
                    <?=$publicate->tags?>
                </div>
                <div>
                    <?=$publicate->name?>
                </div>
                <div>
                    <a href="<?=base_url("/documents/$publicate->id")?>" target="_blank">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
                <div>
                    <?php if(!empty($publicate->pdf) and file_exists($publicate->pdf)):?>
                        <a href="<?=base_url($publicate->pdf)?>" target="_blank">
                            <i class="bi bi-filetype-pdf"></i>
                        </a>
                    <?php elseif(!empty($publicate->pdf) and !file_exists($publicate->pdf)):?>
                        <span class="pdf-error">
                            <i class="bi bi-filetype-pdf"></i>
                        </span>
                    <?php endif;?>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <label>
                            <input class="form-check-input float-none change-visible" data-link="/admin/documents/change-visible" data-id="<?=$publicate->id?>" type="checkbox" <?=$publicate->display?"checked":""?>>
                        </label>
                    </div>
                </div>
                <div>
                    <a class="btn btn-primary btn-sm" href="<?=base_url("admin/documents/edit/$publicate->id")?>"><i class="bi bi-pencil"></i></a>
                </div>
                <div>
                    <a class="btn btn-danger btn-sm" href="<?=base_url("admin/documents/delete/$publicate->id")?>"><i class="bi bi-trash3"></i></a>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif;?>
</div>

<?=$paginator??""?>

