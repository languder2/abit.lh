<div class="container-lg">
    <div class="row">
        <div class="col-lg-10 col-sm-8">
            <h3 class="mt-2 mb-3">Экзаменационные предметы</h3>
        </div>
        <div class="col-lg col-sm-4 pt-2 fs-5 text-end">
            <a href="<?=base_url('admin/exam-subjects/add')?>" class="btn btn-primary w-75">
                Создать
            </a>
        </div>
    </div>
    <div class="examSubjects-grid">
        <?php if(!empty($examSubjects)) foreach ($examSubjects as $exam):?>
            <div>
            </div>
            <div>
                <?=$exam->name?>
            </div>
        <?php endforeach;?>
    </div>
</div>

