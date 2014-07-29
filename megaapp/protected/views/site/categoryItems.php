<div class="span-18">

    <?php foreach($items as $i=>$item): ?>

        <form action="/megaapp/index.php/site/addItem/<?php echo $i+1 ?>" method="post">

            <h3>Item №<?php echo $item->id?></h3>
            <p>Title: <?php echo $item->name ?></p>
            <p>Description: <?php echo $item->description ?></p>
            <p>Price: <?php echo $item->price ?></p>
            <p>Category: <?php echo $item->category ?></p>

            <?php if(Yii::app()->user->role === 'user'): ?>
                <div class="row buttons">
                    <?php echo CHtml::submitButton('Add to Bucket'); ?>
                </div>
            <?php endif ?>

        </form>

    <?php endforeach ?>

</div>

<div class="span-5 last">
    <div id="sidebar">
        <h1>Category</h1>
        <?php $category = 'www' ?>
        <?php //foreach($categories as $i=>$category): ?>
        <a href="items/<?php echo $category?>"><?php echo $category?></a>
        <a href="items/<?php echo $category?>"><?php echo $category?></a>
        <a href="items/<?php echo $category?>"><?php echo $category?></a>
        <?php //endforeach ?>
    </div>
</div>