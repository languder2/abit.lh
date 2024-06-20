<?php
if(empty($menu))
   return false;
?>
<div class="container-fluid bg-primary px-0">
    <div class="container-lg">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid fs-5">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-0 text-end">
                        <?php foreach ($menu as $item):?>
                            <li class="nav-item <?=(!empty($item->submenu))?"dropdown":""?>">
                                <?php if(empty($item->link)):?>
                                    <span><?=$item->name?></span>
                                <?php else:?>
                                    <a
                                        <?php if(empty($item->submenu)):?>
                                            class="nav-link  active"
                                            href="<?=base_url($item->link)?>"
                                        <?php else:?>
                                            class="nav-link dropdown-toggle  active"
                                            role="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                        <?php endif;?>
                                       >
                                        <?=$item->name?>
                                    </a>
                                    <?php if(!empty($item->submenu)):?>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php foreach ($item->submenu as $subitem):?>
                                                <li><a class="dropdown-item active" href="<?=base_url($subitem->link)?>"><?=$subitem->name?></a></li>
                                            <?php endforeach;?>
                                        </ul>
                                    <?php endif;?>
                                <?php endif;?>
                            </li>
                        <?php endforeach;?>
                   </ul>
                </div>
            </div>
        </nav>
    </div>
</div>