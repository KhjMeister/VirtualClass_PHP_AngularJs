
  <div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        
      </div>
    </div>

<?php if(isset($_SESSION['msg'])){ ?>
<div class='alert danger myalertt'>
  <span class='closebtn'>&times;</span>
  <?php  echo $_SESSION['msg']; ?>
</div>
<?php } ?>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        به حساب کاربریتان وارد شوید.
      </div>
      <form name="form" action="<?php echo URL; ?>ostad/logined" class="myForm " method="POST">
        <div class="md-form-group float-label">
          <input class="md-input" type="text"  name="username" required>
          <label>نام کاربری</label>
        </div>
        <div class="md-form-group float-label">
          <input class="md-input" type="password" name="psw" required>
          <label>رمز</label>
        </div>      
        <div class="m-b-md">        
          <label class="md-check">
            <input type="checkbox"><i class="primary"></i>من را به خاطر بسپار
          </label>
        </div>
        <button type="submit" class="btn primary btn-block p-x-md">ورود</button>
      </form>
    </div>

    
  </div>

<!-- ############ LAYOUT END-->

  </div>

  <script type="text/javascript">
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }



</script>







 