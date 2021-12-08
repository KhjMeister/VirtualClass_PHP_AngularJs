
<div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
      <div class=" hidden-sm-up " >
          <ul class="nav navbar-nav pull-right nav-active-primary">
            <li class="nav-item ">
              <a class="nav-link my-nav1 active" href="<?php echo URL; ?>home/posts">
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/comm.png"></span> 
              </a>
            </li>
             <li class="nav-item ">
              <a class="nav-link my-nav1 " href="<?php echo URL; ?>home/contactUs">
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/chat.png"></span> 
              </a>
            </li>
           
            <li class="nav-item">
               <a class="nav-link my-nav1" href="<?php echo URL; ?>home/connectToMe">
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/pal.png"></span> 
              </a>
            </li>
            <li class="nav-item my-nav1">
             <a class="nav-link" href="<?php echo URL; ?>home/">
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/home.png"></span> 
              </a>
            </li>
          </ul>
      </div>         

      <div class="collapse navbar-toggleable-sm" id="navbar-0">
          <ul class="nav navbar-nav pull-right nav-active-primary">
            <li class="nav-item ">
              <a class="nav-link my-nav active" href="<?php echo URL; ?>home/posts">
                <span>پست ها</span> 
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link my-nav " href="<?php echo URL; ?>home/contactUs">
                <span>ارتباط با مدیر</span> 
              </a>
            </li>
           
            <li class="nav-item">
               <a class="nav-link my-nav" href="<?php echo URL; ?>home/connectToMe">
                <span>ارتباط با طراح</span> 
              </a>
            </li>
            <li class="nav-item my-nav">
             <a class="nav-link" href="<?php echo URL; ?>home/">
                <span>خانه</span> 
              </a>
            </li>
          </ul>
        </div>
    </div>
    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; کپی رایت <strong>KjMeister</strong> <span class="hidden-xs-down"></span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="../">درباره من</a>
          <span class="text-muted">-</span>
        
        </div>
      </div>
    </div>
    <div class="padding">
      <div class="row">
        <br>
        <br>
      <div class="container">
        <div class="row">

          <div class="col-md-4">

          <!-- Search Widget -->
            <div class="box my-4">
              <h5 class="box-header">جستجو</h5>
              <div class="box-body">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="جستجو بای ... ">
                  <span class="input-group-btn">
                    <button class="btn primary" type="button">بگرد!</button>
                  </span>
                </div>
              </div>
            </div>

          <!-- Categories Widget -->
          <div class="box my-4">
            <h5 class="box-header">موضوعات</h5>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">درسی</a>
                    </li>
                    <li>
                      <a href="#">علمی</a>
                    </li>
                    <li>
                      <a href="#">اجتماعی</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">ورزشی</a>
                    </li>
                    <li>
                      <a href="#">دانشگاهی</a>
                    </li>
                    <li>
                      <a href="#">سلامتی</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
   
        <?php foreach ($allposts as $postam){ ?>
        
        <div class="col-sm-4">
          <a href="<?php echo URL ?>home/onepost?id=<?php echo $postam->poid; ?>" class="dropdown-item" >
          <div class="box">
            <div class="box-header">
              <h3><?php echo $postam->title; ?></h3>
              <small><?php echo $postam->datee; ?></small>
            </div>
            <div class="box-tool">
              <ul class="nav">
                
                <li class="nav-item inline dropdown">
                  <a class="nav-link" data-toggle="dropdown">
                    <i class="material-icons md-18">&#xe5d4;</i>
                  </a>
                  <div class="dropdown-menu pull-right">
                    <a href="<?php echo URL ?>home/onepost?id=<?php echo $postam->poid; ?>" class="dropdown-item" href>مشاهده متن کامل</a>
                    
                  </div>
                </li>
              </ul>
            </div>
            <div class="box-body">
              <p class="m-a-0"><?php echo $postam->textt; ?></p>
            </div>
          </div>
          </a>
        </div>

     <?php } ?>
      </div>
    </div> 
      <div class="container pull-center">
       <ul class="pager">
        <li><a href="<?php echo URL; ?>home/posts?page=<?php echo ($_GET['page'] +1); ?>">بعدی</a></li>
        <li><a href="<?php echo URL; ?>home/posts?page=<?php echo ($_GET['page'] -1); ?>">قبلی</a></li>
      </ul>
        </div>
      </div>
  </div>


</div>
  </div>
