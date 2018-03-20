<?php include ROOT . '/views/layouts/header.php'; ?>


<br/>

<div class="col-lg-4">
    <div class="login-form">

       <form action="#" method="post" enctype="multipart/form-data">

        <label for="fname">Name</label>
        <input type="text" id="fname" name="name" value="<?php echo $banner['name']; ?>">

        <label for="url">URL</label>
        <input type="text" id="url" name="url" value="<?php echo $banner['url']; ?>">



        <label for="position">Position</label>
        <input type="text" id="position" name="position" value="<?php echo $banner['position']; ?>">


        <label for="img">Image</label>


        <img src="<?php echo Banner::getImage($banner['id']); ?>" width="200" alt="" />
        <input id ="img" type="file" name="image" placeholder="" width="320" height="240" value="<?php echo $banner['image']; ?>">


        <p>Статус</p>

        <select name="status">
        <option value="0" <?php if ($banner['status'] == 0) echo ' selected="selected"'; ?>>Не отображать</option>
        <option value="1" <?php if ($banner['status'] == 1) echo ' selected="selected"'; ?>>Отображать</option>
        </select>
        <input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary btn-block">
    </form>


</div>
</div>


