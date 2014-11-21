<h4>
    <?= nill\blogs_category\Module::t('blogs_category', 'Categories') ?>
</h4>
<hr>
<ul class="unstyled category">
    <?php foreach($category as $key=>$value) { ?>
    <li>
        <div>
            <p class="category_item"><a href="/blogs/?category=<?= $value['id']; ?>" class="btn btn-xs btn-danger"><?= $value['category_name']; ?></a></p>
        </div>
    </li>
    <?php } ?>
</ul>
<hr>