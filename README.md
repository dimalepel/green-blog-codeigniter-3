# Практическое тестовое задание по работе с Codeigniter 3

### 1. Реализовать вывод из базы данных списка новостей по ссылке /news
- Должна присутствовать пейджинация, по 5 новостей на страницу
- Должна быть возможность сортировки новостей по дате и названию (возрастание/убывание)
- Возможность поиска новостей по названию

### 2. Просмотр новости по ссылке /news/урл-новости
- У каждой новости должен был уникальный ЧПУ
- Для каждой новости должны подставляться Meta title, description
- Также на странице выводятся другие новости в рандомной порядке

### 3. По ссылке /xml реализовать вывод списка новостей в свободном XML формате
Например
```xml
    <news>
       <new id="1">
           <title>Заголовок новости</title>
           <url>/news/test-new-1</url>
           <pub_date>21.03.2020 15:00</pub_date>
           <description>Краткое описание новости</description>
           <text>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta turpis a est mollis, commodo aliquam ipsum elementum. Nulla facilisi. Ut et est sed ligula vehicula pulvinar scelerisque vitae magna. Integer aliquet nisi sit amet nunc tincidunt consectetur et vel risus. Aenean felis eros, vulputate eget rutrum ac, tincidunt vel erat. Aenean ornare libero id felis tincidunt ornare. Nam dictum bibendum massa eu interdum. Donec sodales erat aliquam, efficitur neque ac, imperdiet felis. Donec condimentum varius nisl, a iaculis eros fringilla vitae. Suspendisse et tincidunt lectus, ut volutpat diam. Cras sodales neque eu aliquet rutrum. Suspendisse porta arcu in lacus semper facilisis sit amet eget turpis. Ut in iaculis nunc, malesuada vulputate orci.</text>
           <meta_title>Мета-заголовок новости</meta_title>
           <meta_description>Мета-описание новости</meta_description>
       </new>
       ....
   </news>
```

### ТРЕБОВАНИЯ:
1. Реализация на фреймворке CodeIgniter 3 (https://www.codeigniter.com/download)
2. База данных mySQL
3. Построение запросов через конструктор запросов встроенном в самом CodeIgniter
4. Верстка HTML5 и CSS3 + SCSS. При использовании SCSS продемонстрировать использование переменных и миксинов
5. Адаптивность под мобильные устройства

### Уточнения:
1. База данных для проекта находится в корне проекта `news.sql`
2. Исходники верстки доступны по ссылке https://github.com/dimalepel/green-blog (также там инструкция по развертыванию проекта)
