
  <div id="nav-gamenav" class="container cont-m cont-p bg-cont-med-alpha">
    <h2>Game Servers</h2>
    <?php
      echo "<nav>\n";
      foreach($nav_els as $navTitle=>$navProp){
        $nav_href = $navProp["href"];
        $nav_svg_tag = $navProp["svgTag"];
        $nav_title = $navTitle;

        echo "<li class=\"nav-item\"><a href=\"$nav_href\" class=\"nav-link\"><svg class=\"svg-icon svg-fill\"><use xlink:href=\"$site_url$nav_href_icon#$nav_svg_tag\"></use></svg></a></li>\n";
      }
      
      echo "</nav>";
      ?>
  </div>

  <footer>
    <small><?php if($site_copyright){echo "Copyright &copy;2021 ".$site_copyright.".<br>All rights reserved.";} else echo "Copyright &copy;2021 padoru"?></small>
  </footer>

    <!-- jquery, no popper, no bootstrap bloat -->
    <script src="<?php echo $site_url;?>public/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $site_url;?>public/js/main.js"></script>
  </body>
</html>
