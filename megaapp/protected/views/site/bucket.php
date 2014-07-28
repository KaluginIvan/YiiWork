<h3>Your bucket:</h3>
<?php if(isset($items) && $items !== array()): ?>
<?php foreach($items as $item): ?>
<h3>Item №<?php echo $item->id?></h3>
<p>Title: <?php echo $item->name ?></p>
<p>Description: <?php echo $item->description ?></p>
<p>Price: <?php echo $item->price ?></p>
<hr/>
<?php endforeach ?>

<form action="/megaapp/index.php/site/order/" method="post">

<div class="row buttons">
    <?php echo CHtml::submitButton('Order'); ?>
</div>

</form>

<?php else: ?>
<p>Bucket is empty</p>
<?php endif ?>