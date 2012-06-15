<?php seo('title', $item, $item['title']) ?>
<?php seo('description', $item, truncate_text(strip_tags(htmlspecialchars_decode($item['content'])), '255')) ?>
<?php seo('keywords', $item, peanutConfig::get('meta_keywords')) ?>
<?php seo('index', $item) ?>

<?php include_partial('public/header', array('vars' => $varHeader)) ?>

<article id="page-<?php echo $item['id'] ?>" class="<?php echo $template ?>">

  <header>
    <h1><?php echo htmlentities($item['title']) ?></h1>
  </header>

  <section>
    <?php echo htmlspecialchars_decode($item['content']) ?>
  </section>

  <footer>
    <?php include_partial('author', array('author' => $item['sfGuardUser'])) ?>
    <?php include_partial('date', array('created' => $item['created_at'], 'updated' => $item['updated_at'])) ?>
  </footer>
  
</article>
<?php include_partial('public/footer', array('vars' => $varFooter)) ?>