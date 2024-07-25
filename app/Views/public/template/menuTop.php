<div class="collapse navbar-collapse " id="navbarBasic">
    <ul class="navbar-nav  mb-2 mb-xl-0 w-100">
        <?php if(isset($menu)) foreach ($menu as $mEl):?>
            <li class="nav-item">
                <a
                        class="nav-link <?=(isset($mainPage) && !empty($mEl->op))?"edLevelMenu":""?>"
                        href="<?=$mEl->external?$mEl->link:base_url($mEl->link)?>"
                        target="<?=$mEl->external?"_blank":"_self"?>"
                        <?php if(!empty($mEl->op)):?>
                            data-level="<?=$mEl->op?>" aria-current="page"
                        <?php endif;?>
                    >
                    <?=$mEl->name?>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>
