<?php include ROOT . '/views/layouts/header.php'; ?>


<br/>

<div class="col-lg-4">
    <div class="login-form">
     <form action="#" method="post" enctype="multipart/form-data">

        <label for="fname">Name</label>
        <input type="text" id="fname" name="name" value="<?php echo $task['name']; ?>">

        <label for="email">Email</label>
        <input type="E-mail" id="email" name="email" value="<?php echo $task['email']; ?>">



        <label for="description">Текст</label>

        <textarea name="description"><?php echo $task['description']; ?></textarea>

        <label for="img">Image</label>


        <img src="<?php echo Task::getImage($task['id']); ?>" width="200" alt="" />
        <input id ="img" type="file" name="image" placeholder="" width="320" height="240" value="<?php echo $task['image']; ?>">


        <p>Статус</p>

        <select name="status">
            <option value="0" <?php if ($task['status'] == 0) echo ' selected="selected"'; ?>>Обрабатывается</option>
            <option value="1" <?php if ($task['status'] == 1) echo ' selected="selected"'; ?>>Готово</option>
        </select>
        <input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary btn-block">
    </form>


</div>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>