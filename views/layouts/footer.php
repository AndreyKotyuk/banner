</div>
<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
</p>
</footer>

<script src="/template/js/bootstrap.min.js"></script>

<!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/template/js/jquery-3.3.1.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="/template/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

</body>
</html>
