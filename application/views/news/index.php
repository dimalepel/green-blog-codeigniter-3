<main class="page-main">
  <div class="container">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
      <li class="breadcrumbs__item"><?php echo $title; ?></li>
    </ul>

    <?php if ($order_by === 'pub_date') {
      $order_by = 'title';
      $order_by_label = 'заголовку';
    } else {
      $order_by = 'pub_date';
      $order_by_label = 'дате';
    } ?>

    <h1 class="page-title"><?php echo $title; ?></h1>
    <section class="search">
      <?php $attr = array('class' => 'form search__form',
        'role'  => 'form',
        'id'    => 'form_id',
        'name'  => 'form_search_name');
      echo form_open('news', $attr); ?>
        <?php
          $data = array(
            'type' => 'text',
            'name' => 'search_key',
            'value' => $search_key,
            'class' => 'form__field',
            'placeholder' => 'Поиск по записям'
          );
        echo form_input($data); ?>
        <button class="form__button" type="submit">Найти</button>
      <?php echo form_close(); ?>
      <div class="sort-by">
        <p class="sort-by__title">Сортировать по:
          <a class="sort-by__link" href="/news/1/<?php echo $order_by; ?>/asc"><?php echo $order_by_label; ?> по возрастанию</a>
          <a class="sort-by__link" href="/news/1/<?php echo $order_by; ?>/desc"><?php echo $order_by_label; ?> по убыванию</a>
        </p>
      </div>
    </section>
    <section class="articles">
      <ul class="articles__list">
        <?php foreach ($news as $key => $news_item) : ?>

          <li class="article articles__item">
            <img class="article__thumbnail" src="<?php echo $news_item['thumb_url']; ?>"/>
            <div class="article__content">
              <p class="article__date"><?php echo setDateTimeFormat($news_item['pub_date'], 'Y-m-d h:i:s', 'd / m / Y'); ?></p>
              <h3 class="article__title"><?php echo $news_item['title']; ?></h3>
              <p class="article__description"><?php echo $news_item['description']; ?></p>
              <a class="article__detail-link" href="/news/article/<?php echo $news_item['slug']; ?>">читать полностью</a>
            </div>
          </li>

        <?php endforeach; ?>
      </ul>
      <?php if(!$search_key) {
        echo $pagination;
      } ?>

    </section>
  </div>
</main>
