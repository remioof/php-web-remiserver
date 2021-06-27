<nav id="navbar" class="container hide">
  <ol id="navbar-links">
    <a class="nav-link" href="?p=home">Home</a>
    <a class="nav-link" href="?p=rules">Server Rules</a>
    <a class="nav-link disabled" href="?p=news">News/Changelog</a>
    <a class="nav-link disabled" href="#MegaorDrive">Preload Files</a>
    <a href="<?php echo $extHref_discord?>" title="Join our discord!"><svg class="svg-nav svg-fill "><use xlink:href="public/img/icon.svg#discord"></use></svg></a>
    <a href="<?php echo $extHref_steamGroup?>" title="Join our Steam Group!"><svg class="svg-nav svg-fill "><use xlink:href="public/img/icon.svg#steam"></use></svg></a>
  </ol>

  <ol id="navbar-servers">
    <?php
        foreach($serverli as $navTitle=>$navProp){
          $nav_href = preg_replace('/\s*/', '', $navTitle);
          $nav_href = strtolower($nav_href);
          $nav_title = $navProp["title"];
          $nav_svg_tag = $navProp["site_svgTag"];
          
          echo "<a href=\"?p=server&g=$nav_href\" title=\"$nav_title\" class=\"nav-link\"><svg class=\"svg-icon svg-fill\"><use xlink:href=\"$site_url$nav_href_icon#$nav_svg_tag\"></use></svg></a>\n";
        }
      ?>
    </ol>
</nav>

<button id="burger">&#x2630</button>

