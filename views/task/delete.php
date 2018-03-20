<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">

        <h4>Удалить таск #<?php echo $id; ?></h4>
        <div class="row">

            <form method="post" >
                <label for="description">Вы действительно хотите удалить этот таск?</label>
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

