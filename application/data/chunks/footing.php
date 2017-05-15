
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">© <?php echo $maindata[3]; ?></p>        
    </div>
</footer>

  <script type="text/javascript" src="<?php echo PRE_INDEX_URL."assets/js/jquery-3.2.0.min.js"; ?>"></script>
  <script type="text/javascript" src="<?php echo PRE_INDEX_URL."assets/js/bootstrap.min.js"; ?>"></script>
  <script src="<?php echo PRE_INDEX_URL."assets/js/lightbox.js"; ?>"></script>
  <script>
      var i = 0;
      $('img').each(function() {        
        if ($(this).parent('a').length > 0){
            $(this).parent('a').attr('data-lightbox', 'image-'+i);
            i++;
        }
      });
  </script>
</body>
</html>