<head>
  <style>
    .breadcrumbs {
      padding: 10px;
      font-family: sans-serif;
    }

    .breadcrumbs__item {
      display: inline-block;
    }

    .breadcrumbs__item:not(:last-of-type)::after {
      content: '\203a';
      margin: 0 5px;
      color: #cccccc;
    }
      .breadcrumbs__link {
        text-decoration: none;
        color: #999999;
      }

      .breadcrumbs__link:hover{
        text-decoration: underline;
      }

      .breadcrumbs__link--active {
        color: #009578;
        font-weight: 500;
      }
  </style>
</head>
<body>
  <ul class = "breadcrumbs">
    <li class = "breadcrumbs_item">
        <a href= "" class = "breadcrumbs__link breadcrumbs__link--active">Home</a>
    </li>
    <li class = "breadcrumbs_item">
        <a href= "" class = "breadcrumbs__link">Home</a>
    </li>
    <li class = "breadcrumbs_item">
        <a href= "" class = "breadcrumbs__link">Home</a>
    </li>
    <li class = "breadcrumbs_item">
        <a href= "" class = "breadcrumbs__link">Home</a>
    </li>


</body>
