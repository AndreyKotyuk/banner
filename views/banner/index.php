

<!-- Place somewhere in the <body> of your page -->
<div class="center">
  <div class="flexslider">
    <ul class="slides">
     <?php foreach ($bannerList as $banner): ?>

       <li>
        <a href="<?php echo $banner['url']; ?>">
          <img width="320" height="380"  src="<?php echo Banner::getImage($banner['id']); ?>" />
          <p class="flex-caption"><?php echo $banner['name']; ?></p>
        </a>

      </li>

      
    <?php endforeach; ?>

  </ul>
</div>
</div>



