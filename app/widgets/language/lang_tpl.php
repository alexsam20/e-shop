<div class="dropdown d-inline-block">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <img src="<?php echo PATH ?>/assets/img/lang/<?php echo \shop\App::$app::getProperty('language')['code']; ?>.png" alt="">
    </a>
    <ul class="dropdown-menu" id="languages">
        <?php foreach ($this->languages as $k => $v): ?>
            <?php if (\shop\App::$app::getProperty('language')['code'] == $k) continue; ?>
            <li>
                <button class="dropdown-item" data-langcode="<?php echo $k; ?>">
                    <img src="<?php echo PATH ?>/assets/img/lang/<?php echo $k; ?>.png" alt="<?php echo $v['title']; ?>">
                    <?php echo $v['title']; ?>
                </button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
