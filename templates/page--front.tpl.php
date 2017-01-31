<div class="preload active">
    <div id="floatingCirclesG">
        <div class="f_circleG" id="frotateG_01"></div>
        <div class="f_circleG" id="frotateG_02"></div>
        <div class="f_circleG" id="frotateG_03"></div>
        <div class="f_circleG" id="frotateG_04"></div>
        <div class="f_circleG" id="frotateG_05"></div>
        <div class="f_circleG" id="frotateG_06"></div>
        <div class="f_circleG" id="frotateG_07"></div>
        <div class="f_circleG" id="frotateG_08"></div>
    </div>
</div>
<div class="w-page hidden">
    <div class="w-menu">
        <div class="w-toggle">
            <div class="toggle">
                <div class="link shop leaf">Магазин</div>
                <div class="link directions leaf">Направления</div>
            </div>
           <?php
            $menu = menu_tree('main-menu');
            echo render($menu);
            ?>
        </div>
    </div>
    <div class="w-preload active">
        <div class="w-logo">
            <div class="logo">
            </div>
            <?php if($page['slogan']): ?>
                <?php print render($page['slogan']);?>
            <?php endif; ?>
        </div>
        <div class="w-switch">
            <?php if($page['split']): ?>
                <?php print render($page['split']);?>
            <?php endif; ?>
        </div>
        <div class="w-circle">
            <div class="circle">
                <div class="half direction"></div>
                <div class="half shop"></div>
            </div>
        </div>
    </div>
    <div class="w-split">
        <div class="split shop">
            <div class="circle directions">
                <div class="text">В направления</div>
            </div>
            <header>
                <div class="in-header">
                    <div class="logo">
                        Магазин
                    </div>
                    <?php if($page['search_shop']): ?>
                        <?php print render($page['search_shop']);?>
                    <?php endif; ?>
                    <?php if($page['info_shop']): ?>
                        <?php print render($page['info_shop']);?>
                    <?php endif; ?>
                    <?php if($page['cart_shop']): ?>
                        <?php print render($page['cart_shop']);?>
                    <?php endif; ?>
                </div>
            </header>
            <?php if($page['slider_shop']): ?>
                <?php print render($page['slider_shop']);?>
            <?php endif; ?>
            <?php if($page['catalog_shop']): ?>
                <?php print render($page['catalog_shop']);?>
            <?php endif; ?>
            <?php if($page['popular_shop']): ?>
                <?php print render($page['popular_shop']);?>
            <?php endif; ?>
            <?php if($page['shares_shop']): ?>
                <?php print render($page['shares_shop']);?>
            <?php endif; ?>
            <?php if($page['news_shop']): ?>
                <?php print render($page['news_shop']);?>
            <?php endif; ?>
            <footer>
                <div class="w-left">
                    <?php if($page['footer_left_shop']): ?>
                        <?php print render($page['footer_left_shop']);?>
                    <?php endif; ?>
                    <?php
                    $menu = menu_tree('main-menu');
                    echo render($menu);
                    ?>
                    <?php if($page['socials_socials']): ?>
                        <?php print render($page['socials_shop']);?>
                    <?php endif; ?>
                </div>
                <div class="w-right">
                    <?php if($page['footer_right_shop']): ?>
                        <?php print render($page['footer_right_shop']);?>
                    <?php endif; ?>
                </div>
                <div class="copy">
                    <?php if($page['copy_shop']): ?>
                        <?php print render($page['copy_shop']);?>
                    <?php endif; ?>
                    <div id="web-master">
                        <a href="http://web-master.kz/"  target="_blank">
                            <img src="<?php print $base_path . $directory; ?>/img/web-master.png" alt="<?php print t('web-master.kz') ?>"/>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
        <div class="split directions">
            <h1>направления</h1>
        </div>
    </div>
</div>

