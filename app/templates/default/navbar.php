<nav id="navbar" class="container hide">
  <ol id="navbar-links">
    <a class="nav-link" href="?p=home">Home</a>
    <a class="nav-link" href="?p=rules">Server Rules</a>
    <a class="nav-link disabled" href="?p=news">News/Changelog</a>
    <a class="nav-link disabled" href="#MegaorDrive">Preload Files</a>
  </ol>

  <ol id="navbar-servers">
  <?php
      foreach($serverli as $navTitle=>$navProp){
        $nav_href = preg_replace('/\s*/', '', $navTitle);
        $nav_href = strtolower($nav_href);
        
        $nav_svg_tag = $navProp["site_svgTag"];
        
        echo "<a href=\"?p=server&g=$nav_href\" class=\"nav-link\"><svg class=\"svg-icon svg-fill\"><use xlink:href=\"$site_url$nav_href_icon#$nav_svg_tag\"></use></svg></a>\n";
      }
    ?>
  </ol>
</nav>

<button id="burger">&#x2630</button>

