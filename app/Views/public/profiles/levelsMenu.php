<nav class="nav nav-pills srt blockLevels">
    <?php if(isset($edLevels)) foreach ($edLevels as $key=>$level):?>
        <?php
        if(isset($currentLevel) && (!$currentLevel && $level->byDefault) || $currentLevel === $level->code ) $active= true;
        else $active= false;
        ?>
        <a
                class="nav-link <?=$active?"active":""?> setLevel"
                href="?edLevel=<?=$level->code?>"
                data-level="<?=$level->code?>">
            <?=$level->name?>
        </a>
    <?php endforeach;?>
</nav>
