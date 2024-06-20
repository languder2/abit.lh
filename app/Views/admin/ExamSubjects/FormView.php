<div class="mw-50">
    <form action="/admin/exam-subjects/form-processing" method="post">
        <h3 class="mt-2 mb-3 text-center"><?=$title??""?></h3>
        <input type="hidden" name="form[op]" value="<?=$op??"add"?>">
        <input type="hidden" name="form[esID]" value="<?=$es->id??""?>">
        <div class="mb-3">
            <label class="w-100">
                <input
                        type="text"
                        class="form-control py-2 px-2"
                        name="form[poll-name]"
                        placeholder="Название опроса"
                        value=""
                >
            </label>
        </div>
    </form>
</div>