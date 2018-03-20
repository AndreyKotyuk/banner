<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
            <div class="feature_items">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление Баннерами</li>
                    </ol>
                </div>

                <a href="/admin/banner/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить банер</a>

                <h4>Список банеров</h4>

                <br/>
            </div>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Название банера</th>
                    <th>URL</th>
                    <th>image</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($bannerList as $banner): ?>
                    <tr>
                        <td><?php echo $banner['id']; ?></td>
                        <td><?php echo $banner['name']; ?></td>
                        <td><a href="<?php echo $banner['url']; ?>"><?php echo $banner['url']; ?></a></td>
                    
                        <td>
                        <!-- <?php var_dump(Banner::getImage($banner['id'])) ?> -->
                         <img src="<?php echo Banner::getImage($banner['id']); ?>" width="200" alt="" />
                         
                     </td>

                     <td><?php echo Banner::getStatusText($banner['status']); ?></td>   
                     <td><a href="/admin/banner/update/<?php echo $banner['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                     <td><a href="/admin/banner/delete/<?php echo $banner['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                 </tr>
             <?php endforeach; ?>
         </table>

     </div>
 </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

