

 
  <div id="aside" class="app-aside modal fade sm nav-dropdown">
    <div class="left navside grey dk" layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
        <a class="navbar-brand">
            <div ui-include="'<?php echo URL; ?>assets/images/logo.svg'"></div>
            <img src="<?php echo URL; ?>assets/images/logo.png" alt="." class="">
            <span class="hidden-folded inline">پنل استاد</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-border b-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">منوی اصلی</small>
              </li>
              
              <li>
                <a href="./ostad" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3fc;
                      <span ui-include="'<?php echo URL; ?>assets/images/i_0.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">داشبورد</span>
                </a>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">2</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'<?php echo URL; ?>assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">تنظیمات</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="./ostad/profile" >
                      <span class="nav-text">پروفایل</span>
                    </a>
                  </li>
                  <li>
                    <a href="./ostad/setting" >
                      <span class="nav-text">تنظیمات پنل</span>
                    </a>
                  </li>
                </ul>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8f0;
                      <span ui-include="'<?php echo URL; ?>assets/images/i_2.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">درس</span>
                </a>
                <ul class="nav-sub">
                    <li>
                    <a href="./ostad/darsShow" >
                      <span class="nav-text">نمایش</span>
                    </a>
                  </li>
                  <li>
                    <a href="./ostad/darsAdd" >
                      <span class="nav-text">اضافه کردن درس</span>
                    </a>
                  </li>
                 <li>
                    <a href="./ostad/dars" >
                      <span class="nav-text">درس مورد مطالعه </span>
                    </a>
                  </li>
                  <li>
                    <a href="./ostad/editdars" >
                      <span class="nav-text">تغییر موارد درس </span>
                    </a>
                  </li>
                  <li>
                    <a href="./ostad/chats" >
                      <span class="nav-text">ارتباط با دانشجو </span>
                    </a>
                  </li>
                </ul>
              </li>
            
              <li>
                <a href="/virtualClass/ostad/logout">
                <span class="nav-icon">
                 <i class="material-icons"></i>
                </span>
                <span class="nav-text">خروج</span>
              </a>
              </li>
          
           
          

            </ul>
        </nav>
      </div>
      
      <div flex-no-shrink="" class="b-t">
        <div class="nav-fold">
          <a href="./ostad/profile">
              <span class="pull-left">
                <img src="assets/myimg/<?php echo $_SESSION['opic']; ?>" alt="..." class="w-40 img-circle">
              </span>
              <span class="clear hidden-folded p-x">
                <span class="block _500"><?php echo $_SESSION['oname']; ?></span>
                <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>آنلاین</small>
              </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- / aside -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar">
           
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-right hidden-lg-up">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            
        
            
          
        
           
            <ul class="nav navbar-nav pull-right">
              <!-- <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link" href data-toggle="dropdown">
                  <i class="material-icons">&#xe7f5;</i>
                  <span class="label label-sm up warn">3</span>
                </a>
                <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="../assets/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div ui-include="'../views/blocks/dropdown.user.html'"></div>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li> -->
            </ul>
          
        
        
            <div class="" id="collapse">
              
         
              <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="./ostad" >
                    <i ><img src="./assets/myimg/home.png" width="40px" height="40px"></i>
                    <span></span>
                  </a>
                  
                </li>
              </ul>
           
            </div>
    
        </div> 
    </div>
    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; کپی رایت <strong>حسین خسروی</strong>
 
        </div>
        
      </div>
    </div>

    <!-- <div ui-view  -->
    <div ui-view class="app-body" id="view"> .....</div>
