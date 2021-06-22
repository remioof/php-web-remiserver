<nav id="navbar" class="container hide">
  <ol>
    <a class="nav-link active" href="#">Home</a>
    <a class="nav-link active" href="#">Server Rules</a>
    <a class="nav-link active" href="#">News/Changelog</a>
    <a class="nav-link active" href="#">Community Artworks</a>
  </ol>

  <ol>
  <?php
      foreach($nav_els as $navTitle=>$navProp){
        $nav_href = $navProp["href"];
        $nav_svg_tag = $navProp["svgTag"];
        $nav_title = $navTitle;

        echo "<a href=\"$nav_href\" class=\"nav-link\"><svg class=\"svg-icon svg-fill\"><use xlink:href=\"$site_url$nav_href_icon#$nav_svg_tag\"></use></svg></a>\n";
      }
    ?>
  </ol>
</nav>

<button id="burger">&#x2630</button>

