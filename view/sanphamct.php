<div class="row mb">
        <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle"><?=$onesp['0']['name']?></div>
            <div class="row boxcontent">
          <?php
          echo '<div class="row mb spct"><img src="img/'.$onesp['0']['img'].'" alt=""></div>';
          echo $onesp['0']['mota'];
          ?>
            </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script>
             $(document).ready(function(){
            $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$onesp[0]['id']?>});
             });
          </script>
          <div class="row" id="binhluan">

          </div>
          <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
              <ul class="spcl"> <?php
            foreach($sp_cung_loai as $spcl){
              extract($spcl);
              $linksp="index.php?act=sanphamct&idsp=".$id;
              echo '<li><div class="lispcl"><a href="'.$linksp.'">'.$name.'</a><img src="img/'.$img.'" alt=""></div></li>';
            }
            ?></ul>
            </div>
          </div>
        </div>
        <div class="boxphai">
        <?php 
        include "boxright.php";
        ?>
        </div>
      </div>