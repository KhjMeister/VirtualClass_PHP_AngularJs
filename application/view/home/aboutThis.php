

  <!-- content -->
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
        



        <!-- navbar collapse -->
        <div class="collapse navbar-toggleable-sm" id="navbar-0">

          <!-- nabar right -->
          <ul class="nav navbar-nav pull-right nav-active-primary">
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
            <li class="nav-item my-nav">
             <a class="nav-link" href="<?php echo URL; ?>home/">
                <span>خانه</span> 
              </a>
            </li>
          </ul>
          <!-- / navbar right -->
          
       
      
  </div>

    </div>
    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; کپی رایت <strong>khaledjj</strong> <span class="hidden-xs-down"></span>
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
    
    <div class="p-a-md primary p-y-lg">
    <h1 class="display-3 _500 l-s-n-2x">راهنمای استفاده از سایت</h1>
    <div class="row">
      <h4 class="col-md-9 l-h">در این بخش قصد دارم روش استفاده از دو پنل استاد و دانشجو را با تصاویر متحرک آموزش دهم.</h4>
      <h4 class="col-md-9 l-h"></h4>
    </div>
</div>
<div class="p-a-md">
  <div class="row p-t-md">
     <div class="col-sm-9 col-sm-pull-3">
     
      <div id="build">
        <h2 class="m-t-lg m-b">پنل استاد</h2>
        <p class="text-md">Flatkit uses <a href="http://nodejs.org" class="text-info">Grunt</a> for its CSS and JavaScript build system, it's optional, you can use this theme without grunt tools, we included all the dependencies in this theme.</p>
        <ol>
          <li><a href="https://nodejs.org/download" class="text-info">Download and install Node</a>, which we use to manage our dependencies.</li>
          <li>Run <code>npm install -g bower grunt-cli</code></li>
          <li>Run <code>bower install --force-latest</code> to install dependencies</li>
          <li>Run <code>grunt build</code> to build dist with minified js and css</li>
          <li>Run <code>npm start</code> to start server</li>
        </ol>

        <p class="box p-a-sm m-t-md">
          Note: any commands we tell you to run must be ran from the project's root folder.
        </p>
      </div>

      <div id="includes">
        <h2 class="m-t-lg m-b">پنل دانشجو</h2>
        <p>You'll find the following directories and files, grouping common resources and providing both compiled and minified distribution files, as well as raw source files.</p>
          <pre class="box p-a">
          app/
            |-- bower.json
            |-- package.json
            |-- GruntFile.js
            |-- README.md
            |-- CHANGELOG.md
            |-- dist/
            |-- libs/
            |   |-- angular/
            |   |-- jquery/
            |-- assets/
            |   |-- scss/
            |   |-- styles/
            |   |-- bootstrap/
            |   |-- fonts/
            |   |-- images/
            |-- views/
            |   |-- blocks/
            |   |-- chart/
            |   |-- form/
            |   |-- layout/
            |   |-- page/
            |   |-- table/
            |   |-- ui/
            |   |-- widget/
            |   |-- layout.html
            |   |-- layout.0.html
            |   |-- layout.1.html
            |   |-- layout.2.html
            |   |-- layout.3.html
            |   |-- layout.4.html
            |-- angular/
            |   |-- api/
            |   |-- apps/
            |   |   |-- calendar/
            |   |   |-- contact/
            |   |   |-- inbox/
            |   |   |-- note/
            |   |   |-- todo/
            |   |-- scripts/
            |   |   |-- controllers/
            |   |   |-- directives/
            |   |   |-- filters/
            |   |   |-- services/
            |   |   |-- app.js
            |   |   |-- app.ctrl.js
            |   |   |-- config.js
            |   |   |-- config.lazyload.js
            |   |   |-- config.router.js
            |   |-- index.html
            |-- html/
            |   |-- api/
            |   |-- scripts/
            |   |   |-- app.js
            |   |   |-- config.js
            |   |   |-- config.lazyload.js
            |   |   |-- config.router.js
            |   |-- index.html
          </pre>
      </div>
      
     
      
    </div>
    <div class="col-sm-3 col-sm-push-9">
      <div bs-affix data-offset-top="-80" class="pos-stc-sm text">
        <h5>فهرست</h5>
        <nav>
          <ul class="nav">
           
            <li class="nav-item">
              <a href="#build" ui-scroll-to="build">پنل استاد</a>
            </li>
            <li class="nav-item">
              <a href="#includes" ui-scroll-to="includes">پنل دانشجو</a>
            </li>
            
          </ul>
        </nav>
        <a href="<?php echo URL; ?>home/connectToMe" target="_blank" class="btn rounded danger m-y-md">ارتباط با طراح</a>
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