<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">




            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-8">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <label for="fname">Name</label>
                        <input type="text" id="fname" name="name" placeholder="Your name..">

                        <label for="email">Email</label>
                        <input type="E-mail" id="email" name="email" placeholder="Your last name..">

                        

                        <label for="description">Текст</label>
                        <textarea name="description"></textarea>

                        <label for="img">Image</label>
                        <input id ="img" type="file" name="image" placeholder="" value="">


                        <p>Статус</p>
                        <select name="status">
                            <option value="0" selected="selected">Обрабатывается</option>
                            <option value="1">Готово</option>
                        </select>
                        <input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary btn-block">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>