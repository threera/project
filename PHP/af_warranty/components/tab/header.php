<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">AF WARRANTY</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
        <?php
        // Defines all pages in navigation
        $pages = array(
            'หน้าเเรก'   => 'index.php',
            'ลงทะเบียนรับประกันออนไลน์' => 'dropdown',
            'ตรวจสอบการรับประกัน' => 'check.php',
            'เเจ้งเคลม' => 'claim.php'
        );

        // Gets active page URL
        $active = basename($_SERVER['PHP_SELF']);

        // Loops through all pages
        foreach ($pages as $title => $url) {
            if ($active === 'customer.php' || $active === 'dealer.php') {
              $active = 'dropdown';
            } 

            
            // Checks if active url is matched and adds active CSS class
            if ($active === $url) {
                if ($url === 'dropdown') {
                    echo '<li class="dropdown"><a href="#" class="active"><span>'.$title.'</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="bac">
                      <li><a href="customer.php">ลงทะเบียนผู้ซื้อ</a></li>
                      <li><a href="dealer.php">ลงทะเบียนผู้ขาย</a></li>
                    </ul>
                  </li>';
                } else {
                    echo '<li><a href="'.$url.'" class="nav-link p-0 scrollto active">'.$title.'</a></li>';
                }  
            } 
            // Prints out default style for remaining links
            else {
                if ($url === 'dropdown') {
                    echo '<li class="dropdown"><a href="#"><span>'.$title.'</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="bac">
                      <li><a href="customer.php">ลงทะเบียนผู้ซื้อ</a></li>
                      <li><a href="dealer.php">ลงทะเบียนผู้ขาย</a></li>
                    </ul>
                  </li>';
                } else {
                    echo '<li><a href="'.$url.'" class="nav-link p-0 scrollto">'.$title.'</a></li>';
                }  
                
            }
        }
    ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

