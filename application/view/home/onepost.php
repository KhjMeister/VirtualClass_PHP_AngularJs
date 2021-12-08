
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
         <!-- Page Content -->
 
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
      <div class="col-lg-8">


          <h1 class="mt-4"><?php echo $oneposts->title; ?></h1>

   

          <hr>


          <p>پست شده در تاریخ <?php echo $oneposts->datee; ?></p>

          <hr>

          <img class="img-fluid rounded" src="" alt="">

          <hr>

          <p class="lead"><?php echo $oneposts->textt; ?></p>

          

          <hr>


          <div class="box my-4">
            <h5 class="box-header">کامنت بگذارید:</h5>
            <div class="box-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn primary">ثبت</button>
              </form>
            </div>
          </div>

          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">نام شخص</h5>
             متن کامنت
            </div>
          </div>
        </div>
          <br>
      </div>

</div> 
     
      </div>
  </div>


    </div>
  </div>
