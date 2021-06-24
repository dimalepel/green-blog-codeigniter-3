<section class="articles articles--recommended">
  <div class="container">
    <h2 class="section-title">Возможно Вас заинтересует</h2>
    <ul class="articles__list">
      <?php foreach ($news_recommended as $key => $value): ?>
        <li class="article articles__item">
          <img class="article__thumbnail" src="<?php echo $value['thumb_url']; ?>"/>
          <div class="article__content">
            <p class="article__date"><?php echo DateTime::createFromFormat('Y-m-d h:s:i', $value['pub_date'])->format('d / m / Y'); ?></p>
            <h3 class="article__title"><?php echo $value['title']; ?></h3>
            <p class="article__description"><?php echo $value['description']; ?></p>
            <a class="article__detail-link" href="/news/article/<?php echo $value['slug']; ?>">читать полностью</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>