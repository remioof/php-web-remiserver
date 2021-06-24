    <footer>
      <small><?php if($site_copyright){echo "Copyright &copy;2021 ".$site_copyright.".<br>All rights reserved.";} else echo "Copyright &copy;2021 padoru"?></small>
    </footer>

    <!-- jquery, no popper, no bootstrap bloat -->
    <script src="<?php echo $site_url;?>public/js/jquery-3.6.0.min.js" defer></script>
    <script src="<?php echo $site_url;?>public/js/main.js" defer></script>
  </body>
</html>
