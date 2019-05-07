<html lang="en">
<head>
	<meta charset="utf-8">
			<title>CI - AuthCore:<?php echo($page); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-center bg-light">
        <a href='<?php echo site_url("/")?>' class="navbar-brand">CI - AuthCore</a>
        <ul class="navbar-nav nav-right">
           <li class="nav-item"><a class="nav-link" href="<?php echo site_url('/landing')?>">landing</a></li>
					 <li class="nav-item"><a class="nav-link" href="<?php echo site_url('/user/logout')?>">logout [<?php echo($username); ?>]</a></li>
        </ul>
    </nav>
			 <div class="container text-center" style="margin-top:15%">
             <h3>Welcome</h3>
             <p>This is the dashboard</p>
        </div>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
    </html>