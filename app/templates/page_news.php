<!-- mockup --> 
<style>
  /* style overrides , won't be a good idea to use id selector */
  h3, h4 {
    margin: .2rem 0 .5rem 0;
    padding-block-start: .4em;
    padding-block-end: .4em;
    padding-inline-start: 1rem;
    padding-inline-end: 1rem;
  }
  
  p {
    margin-bottom: 1rem;
    text-align: justify;
    text-justify: inter-word;  
  }
  li {
    list-style: decimal;
  }

  article a {
    color: skyblue;
  }

  button {
    margin: .2rem;
  }

</style>
<div class="container cont-m-top cont-w cont-fl-col">
  
  <?php for($iter = 0; $iter <=2; $iter++): ?>
  <?php 
  //dummy
  $post_number = str_pad($iter, 4, '0', STR_PAD_LEFT);
  $post_title = "chg-log"
  ?>



  <div class="container cont-m cont-fl-col bg-cont-med-alpha">
    <h4 style="border-bottom: 2px solid #918c8b; border-top: 2px solid #918c8b"><?php echo $post_title?> <?php echo $post_number?><span style="float: right; padding-right:1rem">01/01/21</span></h4>
    <article class="container cont-p cont-fl-col">
      <h3>Headings 3</h3>
      <h4>Headings 4</h4>
      <p>content, long paragraph. now here's some lorem ipsum fact <i><b>motherfucker</b></i>, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
      
      <p>Also <i>any</i> <u>inline markup</u> styling is <br> possible</p>
      <li>could be a list</li>
      <li>could be a list</li>
      <ul>
        <li>another set</li>
        <li>with padings</li>
      </ul>
      <p><a href="#">link</a></p>
    </article>
  </div>
  <?php endfor;?>
  <div class="container cont-fl-row">
  <button>&lt;&lt;&lt;</button>
  <button>&lt;</button>  
  <button>&gt;</button>
  <button>&gt;&gt;&gt;</button>
  </div>

</div>

