<form method="post" action="/admin/profiles/set-filter" class="formFilter">
    <div>
        <input type="text" class="form-control h-auto" name="filter[code]" placeholder="Код">
    </div>
    <div>
        <input type="text" class="form-control h-auto" name="filter[name]" placeholder="Название">
    </div>
    <div>
    </div>
    <div>
        <select class="form-select" name="filter[display]">
            <option value="false">all</option>
            <option value="1">visible</option>
            <option value="0">hidden</option>
        </select>
    </div>
    <div class="text-end">
        <button class="btn btn-primary">Применить</button>
    </div>
</form>