<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Green Blog</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&amp;amp;display=swap">
  <style type="text/css">
      body {
          font-family: 'Ubuntu', sans-serif;
          font-size: 20px;
          font-weight: 300;
          color: #333;
          padding: 0;
          margin: 0;
      }

      .container {
          display: flex;
          flex-direction: column;
          align-items: center;
          align-content: center;
          justify-content: center;
          min-height: 100vh;
          box-sizing: border-box;
      }

      a {
          color: inherit;
          text-decoration: none;
          transition: opacity .3s ease;
      }

      a:hover {
          opacity: .6;
      }

      h1 {
          font-size: 28px;
          text-align: center;
          margin: 0;
          background: #f1f1f1;
          padding: 20px 30px;
      }

      ul {
          list-style: none;
          padding: 0;
          margin: 0;
          background: #fff;
          box-shadow: 0 0 30px rgba(0, 0, 0, .05);
          border-radius: 10px;
          overflow: hidden;
      }

      ul li+li {
          border-top: 1px solid #f1f1f1;
      }

      ul a {
          display: block;
          padding: 20px 30px;
      }

  </style>
</head>
<body>
<div class="container">
  <ul>
    <li>
      <h1>Список страниц</h1>
    </li>
    <li><a href="/news/">Новости</a></li>
    <li><a href="/xml/">XML</a></li>
  </ul>
</div>
</body>
</html>