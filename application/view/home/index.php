

  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
         <div class="navbar">

    <div class=" hidden-sm-up " >


        <ul class="nav navbar-nav pull-right nav-active-primary">
          <li class="nav-item dropdown  ">
            <a class="nav-link" href="<?php echo URL; ?>admin" >
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/lock.png"></span> 
              
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link my-nav1 " href="<?php echo URL; ?>home/posts">
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
            <li class="nav-item  ">
             <a class="nav-link my-nav1 active" href="<?php echo URL; ?>home/">
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/home.png"></span> 
              </a>
            </li>
        </ul>

    </div>

    <div class="collapse navbar-toggleable-sm " >


        <ul class="nav navbar-nav pull-right nav-active-primary">
          <li class="nav-item dropdown  ">
            <a class="nav-link" href="<?php echo URL; ?>admin" >
              <span>ورود ادمین</span>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link my-nav " href="<?php echo URL; ?>home/posts">
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
            <li class="nav-item  ">
             <a class="nav-link my-nav active" href="<?php echo URL; ?>home/">
                <span>خانه</span> 
              </a>
            </li>
        </ul>

    </div>

  </div>

    </div>
    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; کپی رایت <strong>KjMeister</strong> <span class="hidden-xs-down"></span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="<?php echo URL; ?>home/connectToMe">درباره من</a>
          <span class="text-muted">-</span>
        
        </div>
      </div>
    </div>


    <br>
    <br>

<div class="padding">
  <div class="row">

      
<div class="  " >
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php  foreach ($allpics as $pic) { ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $pic->pic_id; ?>" class="<?php if($pic->pic_id==0){ echo "active"; } ?>"></li>
    
     <?php } ?>
  </ol>
  <div class="carousel-inner " >
    <?php  foreach ($allpics as $pic) { ?>
    <div class="carousel-item <?php if($pic->pic_id==0){ echo "active"; } ?>">
      <img class="d-block " style="margin-right: 0.5%;" src="<?php echo $pic->link; ?>" alt="<?php echo $pic->name; ?>">
    </div>
    <?php } ?>
  </div>
  
</div>
</div>

<br>
<br>
    <div class="col-sm-6 col-md-7">
      <div class="row">
        <div class="col-xs-6 col-sm-12 col-md-6">
          <div class="box">
              <div class="item">
                <div class="item-bg">
                  <img src="<?php echo URL; ?>assets/myimg/ostad.png" class="blur">
                </div>
                <div class="p-a-lg pos-rlt text-center">
                  <img src="<?php echo URL; ?>assets/myimg/ostad.png" class="img-circle w-56" style="margin-bottom: -7rem">
                </div>
            </div>
              <div class="p-a text-center">
                <a href="<?php echo URL; ?>ostad" class="text-md m-t block">پنل استاد</a>
                <p><small></small></p>
                <p><a href="<?php echo URL; ?>ostad" class="btn btn-sm primary">ورود</a></p>
                <div class="text-xs">
                  <!-- <em>مجموع اساتید: <strong>1</strong>, آنلاین: <strong>0</strong></em> -->
                </div>
              </div>
          </div>
        </div>
    <div class="col-xs-6 col-sm-12 col-md-6">
          <div class="box">
              <div class="item">
                <div class="item-bg">
                  <img src="<?php echo URL; ?>assets/myimg/user.png" class="blur">
                </div>
                <div class="p-a-lg pos-rlt text-center">
                  <img src="<?php echo URL; ?>assets/myimg/user.png" class="img-circle w-56" style="margin-bottom: -7rem">
                </div>
            </div>
              <div class="p-a text-center">
                <a href="<?php echo URL; ?>student" class="text-md m-t block">پنل دانشجو</a>
                <p><small></small></p>
                <p><a href="<?php echo URL; ?>student" class="btn btn-sm primary">ورود</a></p>
                <div class="text-xs">
                  <!-- <em>مجموع دانشجویان: <strong>1</strong>, آنلاین: <strong>0</strong></em> -->
                </div>
              </div>
          </div>
        </div>
 




       
      </div>
    </div>

   
  </div>
</div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->