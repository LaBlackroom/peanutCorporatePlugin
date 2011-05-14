<?php use_helper('Text') ?>

<section>

  <h1><?php echo __('Last entries for', null, 'peanutCorporate') . ' ' . $items[0]['sfGuardUser']['username'] ?></h1>

  <?php foreach($items as $item): ?>

  <article id="page-<?php echo $item['id'] ?>">

    <header>
      <h1>
        <a
          href="<?php echo url_for('item_show', array('slug' => $item['slug'], 'sf_format' => 'html')) ?>"
          rel=""
        >
          <?php echo htmlentities($item['title']) ?>
        </a>
      </h1>
    </header>

    <section>
      <?php
        if($item['type'] == 'page' && $item['excerpt']):
          echo htmlspecialchars_decode($item['excerpt']);
        else:
          echo truncate_text(htmlspecialchars_decode($item['content']), 340);
        endif;
      ?>
    </section>

    <footer>
      <?php include_partial('author', array('author' => $item['sfGuardUser'])) ?>
      <?php include_partial('date', array('created' => $item['created_at'], 'updated' => $item['updated_at'])) ?>
    </footer>

  </article>

  <?php endforeach; ?>

</section>