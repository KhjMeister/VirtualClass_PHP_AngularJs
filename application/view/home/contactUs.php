
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
<div class=" hidden-sm-up " >
  <ul class="nav navbar-nav pull-right nav-active-primary">
            <li class="nav-item ">
              <a class="nav-link my-nav1 " href="<?php echo URL; ?>home/posts">
                <span ><img width="25px;" src="<?php echo URL; ?>assets/myimg/comm.png"></span> 
              </a>
            </li>
             <li class="nav-item ">
              <a class="nav-link my-nav1 active" href="<?php echo URL; ?>home/contactUs">
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
              <a class="nav-link my-nav " href="<?php echo URL; ?>home/posts">
                <span>پست ها</span> 
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link my-nav active" href="<?php echo URL; ?>home/contactUs">
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


<!-- ############ PAGE START-->

    <br>
    <br>

        <div class="padding">
        <div class="row">
          <div class="container">

          <div class="col-sm-12 col-md-12 col-lg-12">
            <h4 class="m-a-0 m-b-sm text-md">بیشترین سوالات پرسیده شده</h4>
            <div class="m-b" id="accordion">
              
              
              <?php  foreach ($allqusan as $qun) { ?>
              <div class="panel box no-border m-b-xs">
                <div class="box-header p-y-sm">
                  <span class="pull-right label text-sm"><?php echo $qun->vieww; ?></span>
                  <a data-toggle="collapse" data-parent="#accordion" data-target="#c_<?php echo $qun->qaid ?>">
                    &nbsp; سوال: <?php echo $qun->qu; ?>
                  </a>
                </div>
                <div id="c_<?php echo $qun->qaid ?>" class="collapse">
                  <div class="box-body">
                    <span class="text-md pull-right w-32 m-r rounded warning">A</span> 
                    <p class="text-sm text-muted clear">
                      <?php echo $qun->an; ?>
                    </p>
                  </div>
                </div>
              </div>
              <?php } ?>
              
            </div>
            <div class="container">
              <p></p>
              <?php if(isset($_SESSION['msgg'])){ ?>
            <div class='alert success myalertt'>
              <span class='closebtn'>&times;</span>
              <?php  echo $_SESSION['msgg']; ?>
            </div>
            <?php } ?>
            </div>
            <h4 class="m-t-md text-md">ثبت مشکل</h4>
            <form name="form-contact" class="form-validation m-b-lg" action="<?php echo URL; ?>home/RepErr" class="myForm " method="POST">
              <div class="row">
                <div class="col-sm-6 m-b">
                  <label>نام شما</label>
                  <input type="text" name="name" class="form-control" placeholder="نام" required >
                </div>
                <div class="col-sm-6 m-b">
                  <label>ایمیل</label>
                  <input type="email" name="email" class="form-control" placeholder="ایمیل را وارد کنید" required >
                </div>
              </div>
              <div class="form-group">
                <label>نوع مشکل</label>
                <select class="form-control c-select" name="kynde">
                  <option >ارور وب سایت</option>
                  <option >مشکل سرویس ها</option>
                  <option >مشکل ورود و ثبت نام</option>
                </select>
              </div>
              <div class="form-group">
                <label>توضیحات شما</label>
                <textarea name="textt" class="form-control" rows="6" placeholder="....."></textarea>
              </div>
              <button type="submit" onclick="mysnakyy()" class="btn btn-info">ثبت</button>
            </form>
   

          </div>
        </div>
        </div>
      </div>





    </div>
  </div>

           
<script type="text/javascript">
                mysnakyy(){
            new Snackbar("<i class='fa fa-edit'>&nbsp;&nbsp;&nbsp; ارسال شد</i> ");
            };
                </script>