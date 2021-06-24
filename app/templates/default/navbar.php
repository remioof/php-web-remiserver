<nav id="navbar" class="container hide">
  <ol id="navbar-links">
    <a class="nav-link" href="?p=home">Home</a>
    <a class="nav-link" href="?p=rules">Server Rules</a>
    <a class="nav-link" href="?p=news">News/Changelog</a>
    <a class="nav-link disabled" href="#MegaorDrive">Preload Files</a>
  </ol>

  <ol id="navbar-servers">
  <?php
      foreach($nav_els as $navTitle=>$navProp){
        $nav_href = $navProp["href"];
        $nav_svg_tag = $navProp["svgTag"];
        $nav_title = $navTitle;

        echo "<a href=\"?p=server\" class=\"nav-link\"><svg class=\"svg-icon svg-fill\"><use xlink:href=\"$site_url$nav_href_icon#$nav_svg_tag\"></use></svg></a>\n";
      }
    ?>
  </ol>
</nav>

<button id="burger">&#x2630</button>

