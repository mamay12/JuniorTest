<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Project</title>
  </head>

  <body>
    <?php
        include_once 'select.php';


        $ds = new dynamicallyStyles();
        $ds::loadStyles();

        $select = new outTree();

        $echoTree = new echoTree();

     ?>

        <div class="container">
            <?php
                $echoTree->outTree(null, 0, $select->_categoryArr );
            ?>
        </div>
  </body>

  <script type="text/javascript" src="/js/script.js"></script>

  </html>
