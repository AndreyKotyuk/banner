<?php include ROOT . '/views/layouts/header.php'; ?>


<section>
    <div class="container">
        <div class="row">


         <div class="col-lg-8">
            <div class="features_items">
                <form action="#" method="post">
                    <p>Сортировать по</p>
                    <select name="sort">
                        <option value="id" >id</option>
                        <option value="name">name</option>
                        <option value="email">email</option>
                        <option value="status">status</option>
                    </select>
                    <input type="submit" value="Сортировать" name="submit" class="btn btn-lg btn-primary btn-block">
                </form>

                <?php foreach ($tasks as $task): ?>
                    <p>
                        Статус: 
                        <?php if($task['status']==0): ?>
                            Не готов!
                        <?php else: ?>
                            Готов
                        <?php endif; ?>
                    </p>
                    <h1 class="mt-4">Имя: <?php echo $task['name']; ?></h1>
                    <!-- Author -->  <p class="lead"> E-mail:  
                        <?php echo $task['email']; ?>
                    </p>
                    <hr>
                 
                    <img src="<?php echo Task::getImage($task['id']); ?>" width='320' height='240' alt="" />

                    <hr>
                    <h4>Текст:</h4>
                    <p>
                        <?php echo $task['description']; ?>
                    </p>
                    <?php if(!User::isGuest()): ?>
                     <a href="/tasks/update/<?php echo $task['id']; ?>" class="btn btn-info" role="button">Edit</a>
                     <a href="/tasks/delete/<?php echo $task['id']; ?>" class="btn btn-danger" role="button">Delete</a>

                 <?php endif; ?>
                 <hr>

             <?php endforeach; ?> 
         </div>
     </div>
 </div>


</div><!--features_items-->

<!-- Постраничная навигация -->
<?php echo $pagination->get(); ?>

</div>
</div>
</div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>