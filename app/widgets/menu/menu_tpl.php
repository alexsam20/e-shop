<li class="nav-item <?php if (isset($category['children'])) echo 'dropdown' ?>">
    <a class="nav-link <?php if (isset($category['children'])) echo 'dropdown-toggle' ?>"
       href="category/<?php echo $category['slug'] ?>"
        <?php if (isset($category['children'])) echo 'data-bs-toggle="dropdown"' ?>><?php echo $category['title'] ?></a>
    <?php if (isset($category['children'])): ?>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php echo $this->getMenuHtml($category['children']);?>
        </ul>
    <?php endif; ?>
</li>
