

 
  <div id="aside" class="app-aside modal fade sm nav-dropdown">
    <div class="left navside grey dk" layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
        <a class="navbar-brand">
            <div ui-include="'<?php echo URL; ?>assets/images/logo.svg'"></div>
            <img src="<?php echo URL; ?>assets/images/logo.png" alt="." class="">
            <span class="hidden-folded inline">پنل دانشجو</span>
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
                  <a href="./admin" >
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
                    <a href="./student/profile" >
                      <span class="nav-text">پروفایل</span>
                    </a>
                  </li>
                  <li>
                    <a href="./student/setting" >
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
                      <a href="./student/dars" >
                        <span class="nav-text">درس</span>
                      </a>
                    </li>
                    <li>
                      <a href="./student/chat" >
                        <span class="nav-text">ارتباط با استاد</span>
                      </a>
                    </li>
                    
                  </ul>
                </li>
                
               
             
                <li>
                  <a href="/virtualClass/student/logout">
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
          <a href="./student/profile">
              <span class="pull-left">
                <img src="assets/myimg/<?php echo $_SESSION['spic']; ?>" alt="..." class="w-40 img-circle">
              </span>
              <span class="clear hidden-folded p-x">
                <span class="block _500"><?php echo $_SESSION['sname']; ?></span>
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
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-right hidden-lg-up">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            
            
            <div class=" " id="collapse">
              
         
              <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link " href="./student" >
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

   <div ui-view class="app-body" id="view"> .....</div>
