<?php
$parent_id = \shop\App::$app::getProperty('parent_id');
$get_id = serverMethodGET('id');
?>

<option value="<?php echo $id ?>" <?php if ($id == $parent_id) echo ' selected'; ?> <?php if ($get_id == $id) echo ' disabled'; ?>>
    <?php echo $tab . $category['title'] ?>
</option>
<?php if(isset($category['children'])): ?>
    <?php echo $this->getMenuHtml($category['children'], '&nbsp;&nbsp;' . $tab. '-&nbsp;') ?>
<?php endif; ?>
