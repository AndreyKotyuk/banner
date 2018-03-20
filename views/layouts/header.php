<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Blog Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="/template/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="/template/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/template/css/blog.css" rel="stylesheet">
  <link href="/template/css/main.css" rel="stylesheet">
  <link href="/template/css/flexslider.css" rel="stylesheet">


  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 


  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="/template/js/jquery-3.3.1.min.js"></script>
  <script src="/template/js/slider.js"></script>
     <!-- <script src="/template/js/jquery.flexslider.js"></script>
     <script src="/template/js/jquery.flexslider-min.js"></script> -->
     <script defer src="/template/js/jquery.flexslider.js"></script>
   </head>

   <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Header</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            
            <?php if (User::isGuest()): ?>                                        
             <a class="btn btn-sm btn-outline-secondary" href="/login/"><i class="fa fa-lock"></i> Вход</a>
           <?php else: ?>
           <span class="menu"> <a class="btn btn-sm btn-outline-secondary" href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a> </span>
           <span class="menu">          
            <a class="btn btn-sm btn-outline-secondary" href="/logout/"><i class="fa fa-unlock"></i> Выход</a>
            </span>
          <?php endif; ?>
          <!-- <a class="btn btn-sm btn-outline-secondary" href="/login">Sign up</a> -->
        </div>
      </div>
    </header>