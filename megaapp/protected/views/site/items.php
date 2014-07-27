<?php foreach($items as $i=>$item): ?>

<form action="/megaapp/index.php/site/addItem/<?php echo $i+1 ?>" method="post">

    <h3>Item №<?php echo $item->id?></h3>
    <p>Title: <?php echo $item->name ?></p>
    <p>Description: <?php echo $item->description ?></p>
    <p>Price: <?php echo $item->price ?></p>

    <?php if(Yii::app()->user->role === 'user'): ?>
        <div class="row buttons">
            <?php echo CHtml::submitButton('Add to Bucket'); ?>
        </div>
    <?php endif ?>

</form>

<?php endforeach ?>