<div class="row mb">
        <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle"><strong><?=($tendm=="") ? "Sản phẩm" : $tendm[0]['name']?></strong></div>
            <div class="row boxcontent">
          <?php
            if(isset($_SESSION['user'])){
              $action = "index.php?act=addtocart";
            }else{
              $action = "";
            }
             $i=0;
             foreach($dssp as $sp){
                extract($sp);
                $linksp="index.php?act=sanphamct&idsp=".$id;
                if($i==2||$i==5||$i==8||$i==11||$i==14||$i==17||$i==20||$i==23||$i==26||$i==29||$i==32||$i==35||$i==38||$i==41||$i==44||$i==47||$i==50||$i==53){
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
            </div>
          </div>        
        </div>
        <div class="boxphai">
        <?php 
        include "boxright.php";
        ?>
        </div>
      </div>