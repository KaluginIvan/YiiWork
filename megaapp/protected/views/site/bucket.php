<h3>Your bucket:</h3>
<?php foreach($items as $item): ?>
<h3>Item №<?php echo $items->id?></h3>
<p>Title: <?php echo $items->name ?></p>
<p>Description: <?php echo $items->description ?></p>
<p>Price: <?php echo $items->price ?></p>
<hr/>
<?php endforeach ?>

<form action="/megaapp/index.php/site/order/" method="post">

<div class="row buttons">
    <?php echo CHtml::submitButton('Order'); ?>
</div>

</form>