<?php header("Content-Type: text/xml"); ?>

<!DOCTYPE yml_catalog SYSTEM "shop.dtd">
<?php $categories = [[1, 'cat1'], [2, 'cat2']]; ?>

<categories>
<?php foreach($categories as $category) { ?>
	<category id="<?php echo $category[0]; ?>"><?php echo $category[1]; ?></category>
<?php } ?>
</categories>