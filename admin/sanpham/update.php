<div class="row">
        <div class="row formtitle"><h1>CẬP NHẬP SẢN PHẨM</h1></div>
      </div>
      <div class="row formcontent">
      <form action="index.php?act=updatesp" enctype="multipart/form-data" method="post">
          <div class="row mb10">
            Mã sản phẩm <br />
            <input
              type="text"
              name="masp"
              disabled
              placeholder="auto number"
            />
          </div>
          <div class="row mb10">     
            Danh mục: 
            <select name="iddm" id="">
              <option value="0" selected>Tất cả</option>
              <?php
              foreach($listdanhmuc as $danhmuc){
                extract($danhmuc);
                if($sanpham[0]['iddm']==$id){
                  $s = "selected";
                }else{
                  $s="";
                }
                echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
              }
              ?>
            </select></div>
          <div class="mb10 row">
            Tên sản phẩm <br />
            <input type="text" name="tensp" value="<?=$sanpham[0]['name']?>"/>
          </div>
          <div class="mb10 row">
            Giá <br />
            <input type="text" name="giasp" value="<?=$sanpham[0]['price']?>">
          </div>
          <div class="mb10 row">
            Ảnh <br />
            <img width=20 height=20 src="../img/<?=$sanpham[0]['img']?>" alt="">
            <input type="file" name="anh" />
            <input type="hidden" name="anh" value="<?=$sanpham[0]['img']?>">
          </div>
          <div class="mb10 row">
            Mô tả <br />
            <textarea name="mota" id="" cols="30" rows="10"><?=$sanpham[0]['mota']?></textarea>
          </div>
          <div class="mb10 row">
            <input type="hidden" name="id" value="<?=$sanpham[0]['id']?>">
            <input type="submit" name="capnhat" value="CẬP NHẬT" />
            <input type="reset" value="NHẬP LẠI" />
            <a href="index.php?act=listsp"
              ><input type="button" value="DANH SÁCH"
            /></a>
          </div>
          <?php
          if(isset($thongbao)&&!empty($thongbao)){
            echo $thongbao;
          }
          ?>
        </form>
      </div>