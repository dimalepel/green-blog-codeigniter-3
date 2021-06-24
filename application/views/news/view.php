<main class="page-main">
  <div class="container">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="#">Главная</a></li>
      <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/news/">Новости</a></li>
      <li class="breadcrumbs__item"><?php echo $title; ?></li>
    </ul>
    <section class="single-page">
      <header class="single-page__header">
        <div class="single-page__header-content">
          <h1 class="page-title single-page__title"><?php echo $title; ?></h1>
          <p class="single-page__date"><?php echo $pub_date; ?></p>
          <p class="single-page__description"><?php echo $description; ?></p>
        </div><img class="single-page__thumbnail" src="<?php echo $thumb_url; ?>">
      </header>
      <div class="single-page__content">
        <?php echo $text; ?>
      </div>
    </section>
  </div>

  <?php $this->load->view('blocks/recommended-news', $news_recommended); ?>

</main>