<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="<?php echo $meta_description; ?>">
  <title><?php echo $meta_title; ?> | GreenBlog</title>
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/styles/styles.css">
</head>
<body>
<div class="page-wrapper">
  <header class="page-header" id="page-header">
    <div class="container page-header__top"><a class="logo page-header__logo" href="/"><img class="logo__thumbnail" src="/assets/images/pic-logo.png">
        <div class="logo__content">
          <p class="logo__title">GreenBlog</p>
          <p class="logo__description">краткое описание сайта</p>
        </div></a>
      <button class="page-header__menu-opener menu-toggler" type="button" id="menu-opener"><span class="visually-hidden">Открыть меню</span><span class="menu-toggler__icon"><span class="menu-toggler__icon-line"></span></span></button>
    </div>
    <nav class="page-header__navigation">
      <button class="page-header__menu-closer menu-toggler" type="button" id="menu-closer"><span class="visually-hidden">Закрыть меню</span><span class="menu-toggler__icon"><span class="menu-toggler__icon-line"></span></span></button>
      <div class="container">
        <div class="page-header__links"><a class="page-header__link page-header__link--main has-icon has-icon--mail" href="mailto:info@green.by">info@green.by</a><a class="page-header__link page-header__link--phone has-icon has-icon--phone" href="tel:+ 375 (33) 347-15-08">+ 375 (33) 347-15-08</a><a class="page-header__link page-header__link--order-call button" href="#">Заказать звонок</a></div>
        <ul class="main-menu page-header__main-menu">
          <li class="main-menu__item"><a class="main-menu__link" href="#">Главная</a></li>
          <li class="main-menu__item"><a class="main-menu__link" href="#">Каталог</a></li>
          <li class="main-menu__item"><a class="main-menu__link" href="#">Новости</a></li>
          <li class="main-menu__item"><a class="main-menu__link" href="#">О нас</a></li>
          <li class="main-menu__item"><a class="main-menu__link" href="#">Доставка и оплата</a></li>
          <li class="main-menu__item"><a class="main-menu__link" href="#">Контакты</a></li>
        </ul>
      </div>
    </nav>
  </header>