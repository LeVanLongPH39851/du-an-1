<div class="row mb">
        <div class="boxtrai mr">
          <div class="row">
            <div class="banner">
              <img id="slide" src="img/banner0.png" alt="" />
              <button class="pre" onclick="pre()">&#10094;</button>
              <button class="next" onclick="next()">&#10095;</button>
              <script>
                var album = [];
                for (var i = 0; i < 3; i++) {
                  album[i] = new Image();
                  album[i].src = "./img/banner" + i + ".png";
                }
                var interval = setInterval(slideshow, 2000);
                index = 0;
                function slideshow() {
                  index++;
                  if (index > 2) {
                    index = 0;
                  }
                  document.getElementById("slide").src = album[index].src;
                }
                function next() {
                  index++;
                  if (index > 2) {
                    index = 0;
                  }
                  document.getElementById("slide").src = album[index].src;
                }
                function pre() {
                  index--;
                  if (index < 0) {
                    index = 2;
                  }
                  document.getElementById("slide").src = album[index].src;
                }
              </script>
            </div>
          </div>
          <div class="row">
            <?php
            if(isset($_SESSION['user'])){
              $action = "index.php?act=addtocart";
            }else{
              $action = "";
            }
            $i=0;
            foreach($spnew as $sp){
                extract($sp);
                $linksp="index.php?act=sanphamct&idsp=".$id;
                if($i==2||$i==5||$i==8){
                    $mr = "";
                }else{
                    $mr= "mr";
                }
                echo'<div class="boxsp '.$mr.'">
                <div class="img"><a href="'.$linksp.'"><img src="img/'.$img.'" alt="" /></a></div>
                <p class="notmg">'.$price.'.000 vnđ</p>
                <a class="mg" href="'.$linksp.'">'.$name.'</a>
                <div class="row btnaddtocart">
                <form action="'.$action.'" method="post">
                  <input type="hidden" name="id" value="'.$id.'">
                  <input type="hidden" name="name" value="'.$name.'">
                  <input type="hidden" name="img" value="'.$img.'">
                  <input type="hidden" name="price" value="'.$price.'">';
                 
            if(isset($_SESSION['user'])){ ?>
              <input type="submit" name="addtocart" value="Add to cart">
              <?php
            }else{?>
             <input type="submit" onclick="return alert('Bạn cần đăng nhập để thêm vào giỏ hàng')" name="addtocart" value="Add to cart">
           <?php }
          echo'</form>
              </div>
              </div>';
              $i+=1;
            }
            ?>
            <!-- <div class="boxsp mr">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp mr">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp mr">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp mr">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp mr">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp mr">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div>
            <div class="boxsp">
              <div class="img"><img src="img/sp1.jpg" alt="" /></div>
              <p>259.000vnđ</p>
              <a href="">Áo thun oversize vịt Donald Disney</a>
            </div> -->
          </div>
        </div>
        <div class="boxphai">
        <?php 
        include "boxright.php";
        ?>
        </div>
      </div>