<!-- mockup --> 
<?php 
  //$post_number = str_pad($iter, 4, '0', STR_PAD_LEFT);

  // $news_data_structure? any ideas?
  // Array
  // (
  //     [post_number] => Array
  //         (
  //             [post_date] => str
  //             [post_title] => str
  //             [post_tag] => Array (str)
  //             [post_content] => str
  //         )
  //  );
?>

<style><?php ob_start();?>
  /* style overrides , won't be a good idea to use id selector */
  h3, h4 {
    margin: .2rem 0 .5rem 0;
    padding-block-start: .4em;
    padding-block-end: .4em;
    padding-inline-start: 1rem;
    padding-inline-end: 1rem;
  }

  article h3 {
    border-left: 5px solid grey;
  }
  
  p {
    margin-bottom: 1rem;
    text-align: justify;
    text-justify: inter-word;  
  }

  ul{
    margin-block-start: .2em;
    margin-block-end: 1em;
  }

  li {
    list-style: circle;
  }

  ul>li {
    list-style: disc;
  }

  article a, article a:visited {
    color: skyblue;
    text-decoration: underline; 
  }

  button {
    margin: .2rem;
  }

  pre {
    margin: 0;
    padding: 0;
  }

  <?php 
  $styles = ob_get_clean();
  use site\baseFunctions as funct;
  echo funct\minify_css($styles);

  ?></style>

<div class="container cont-m-top cont-w cont-fl-col">
  <div id="news-wrapper">

    <div class="container cont-m cont-fl-col bg-cont-med-alpha">
      <h4 style="border-bottom: 2px solid #918c8b; border-top: 2px solid #918c8b"><span style="float: right; padding-right:1rem">July 2, 2021</span></h4>
      <pre style="margin-left: 1rem;"><u><a href="#">General</a></u>&nbsp;/&nbsp;<u><a href="#">Sven Co-op</a></u>,&nbsp;SunfloewrSP</pre>
      <article class="container cont-p cont-fl-col">
        <h3>Some quality of life changes</h3>
        <br>  
        <li>Add:
          <ul><li>Playermodels: GF_G11, Arknights_Exusiai</li></ul>
        </li>  
        <li>Change:
          <ul>
            <li>Chatsounds: shortened the "mine" chatsound, separated nof chatsound to nof1, nof2 respectively. Reduced volume on all of the aforementioned chatsounds</li>
            <li>Maps: Removed model restrictions from the following maps:
              <ul>
                <li>Touhou_Hakureijinja</li>
                <li>Restrictions series</li>
                <li>Poke646 series</li>
              </ul>
            </li>
          </ul>
        </li>
        <li>Remove: 
          <ul>
            <li>Maps: between_elvis, aircontact, royal_bdayroom, ZombieLand, sc_greysnake1, Horde</li>
            <small>Reason for remove: never ending maps, short and unfun, and "sc_greysnake1" may crash player's gaem. I want to remove sc_agrentina series too</small>
          </ul>
        </li>
        <li>Minor stuffs: you can now vote map for pizza_ya_san1 in the classic vote menu</li>
        <p>parsed "news content" will look something like this. next: markdown to markup parser</p>
      </article>
    </div>

    <div class="container cont-m cont-fl-col bg-cont-med-alpha">
      <h4 style="border-bottom: 2px solid #918c8b; border-top: 2px solid #918c8b">Optional Header<span style="float: right; padding-right:1rem">:m :d, :yyyy</span></h4>
      <pre style="margin-left: 1rem;">post-dir-path, author</pre>
      <article class="container cont-p cont-fl-col">
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <p>content, long paragraph, justified. <br> now here's some lorem ipsum fact <i><b>motherfucker</b></i>, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
        
        <p>Also <i>any</i> <u>inline markup</u> styling is <br> possible</p>
        <li>list</li>
        <li>list</li>
        <ul>
          <li>another set</li>
          <li>with paddings</li>
        </ul>
        <p>Inline <a href="#">link</a></p>
        <p>to add padoru use div  element with padoru class, cant be inserted inline sadly</p><span class="padoru"></span>
        <p>or use &lt;img&gt; with href:link to public/img/icon-padoru.gif</p>
      </article>
    </div>
  </div>
  
  
  <div class="container cont-fl-row">
  <button class="disabled">&lt;&lt;&lt;</button>
  <button class="disabled">&lt;</button>  
  <button class="disabled">&gt;</button>
  <button class="disabled">&gt;&gt;&gt;</button>
  </div>

</div>

