<?php
/* 
 * Template Name: Chẩn đoán qua hình ảnh
 */

$errorMsg = "";
$successMsg = "";
if(isset($_POST['title'])){
    $title = getRequest('title');
    $sex = getRequest('sex');
    $age = getRequest('age');
    $email = getRequest('email');
    $mobile = getRequest('mobile');
    $address = getRequest('address');
    $treatment = getRequest('treatment');
    $comments = getRequest('comments');

    if(!empty($title) and !empty($sex) and !empty($age) and !empty($email) and !empty($mobile) and !empty($address)){
        // Upload file
        $files = array('photo_1', 'photo_2', 'photo_3', 'photo_4', 'photo_5', 'photo_6');
        $allowed = array('png', 'jpg', 'gif');
        $file_valid = true;
        foreach ($files as $file) {
            if(isset($_FILES[$file]) and $_FILES[$file]['error'] == 0){
                $extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
                if (!in_array(strtolower($extension), $allowed)) {
                    $file_valid = false;
                    break;
                }
            }
        }

        if ($file_valid == false) {
            $errorMsg = "Chỉ cho phép tải lên ảnh có các định dạng sau: PNG, JPG, GIF";
        } else {
            $upload_dir = wp_upload_dir();
            $folder = "diagnosis-" . date('dmY');
            $path = $upload_dir['basedir'] . "/" . $folder;
            if (!is_dir($path)){
                mkdir($path, 0755);
            }
            $uploaded = array();
            foreach ($files as $file) {
                if(isset($_FILES[$file]) and $_FILES[$file]['error'] == 0){
                    $name = random_string() . "_" . $_FILES[$file]['name'];
                    $tmp_name = $path . '/' . $name;
                    
                    if (move_uploaded_file($_FILES[$file]['tmp_name'], $tmp_name )) {
                        $tmp_url = $upload_dir['baseurl'] . "/" . $folder . "/" . $name;
                        $uploaded[$file] = array(
                            'dir' => $tmp_name,
                            'url' => $tmp_url,
                        );
                    }
                }
            }
            
            // Create new diagnosis
            $new_diagnosis = array(
                'post_type' => 'diagnosis',
                'post_title' => $title,
                'post_status' => 'publish',
                'post_author' => 1,
            );
            $diagnosis_id = wp_insert_post($new_diagnosis);
            if($diagnosis_id){
                update_post_meta($diagnosis_id, "sex", $sex);
                update_post_meta($diagnosis_id, "age", $age);
                update_post_meta($diagnosis_id, "email", $email);
                update_post_meta($diagnosis_id, "mobile", $mobile);
                update_post_meta($diagnosis_id, "address", $address);
                update_post_meta($diagnosis_id, "treatment", $treatment);
                update_post_meta($diagnosis_id, "comments", $comments);
                
                $sex = ($sex == 'male') ? 'Nam' : 'Nữ';

                $mail_html = <<<HTML
<h2>Thông tin bệnh nhân</h2>
<p>Họ và tên: $title</p>
<p>Giới tính: $sex</p>
<p>Tuổi: $age</p>
<p>Email: $email</p>
<p>Số điện thoại: $mobile</p>
<p>Địa chỉ: $address</p>
<p>Chọn điều trị: $treatment</p>
<p>Ghi chú: $comments</p>
<h2>Hình ảnh</h2>
HTML;
                $attachment = array();
                foreach($uploaded as $photo => $img){
                    $attachment[] = $img['dir'];
                    update_post_meta($diagnosis_id, $photo, $img['url']);
                    
                    switch ($photo) {
                        case "photo_1":
                            $mail_html .= "<p>Ảnh chụp trực diện:<br />";
                            $mail_html .= '<img src="' . $img['url'] . '" /></p>';
                            break;
                        case "photo_2":
                            $mail_html .= "<p>Ảnh chụp vòm trên:<br />";
                            $mail_html .= '<img src="' . $img['url'] . '" /></p>';
                            break;
                        case "photo_3":
                            $mail_html .= "<p>Ảnh chụp vòm dưới:<br />";
                            $mail_html .= '<img src="' . $img['url'] . '" /></p>';
                            break;
                        case "photo_4":
                            $mail_html .= "<p>Ảnh chụp răng cắn bên phải:<br />";
                            $mail_html .= '<img src="' . $img['url'] . '" /></p>';
                            break;
                        case "photo_5":
                            $mail_html .= "<p>Ảnh chụp răng cắn bên trái:<br />";
                            $mail_html .= '<img src="' . $img['url'] . '" /></p>';
                            break;
                        case "photo_6":
                            $mail_html .= "<p>Ảnh chụp từ dưới lên:<br />";
                            $mail_html .= '<img src="' . $img['url'] . '" /></p>';
                            break;
                        default:
                            break;
                    }
                }
                $subject = get_option('blogname') . " - Chẩn đoán qua hình ảnh";
                $admin_email = get_option('admin_email');
                $successMsg = "Cảm ơn Quý khách hàng đã dử dung dịch vụ chẩn đoán qua hình ảnh, kết quả chẩn đoán sẽ mất 1 đến 2 ngày và được gửi đến email của Quý khách!";

                add_filter('wp_mail_content_type', 'set_html_content_type');
                wp_mail("tuvanquaanh@gmail.com", $subject, $mail_html, "", $attachment);

                // reset content-type to avoid conflicts
                remove_filter('wp_mail_content_type', 'set_html_content_type');
            } else {
                $errorMsg = "Quá trình gửi lên gặp lỗi, vui lòng thử lại hoặc liên hệ hotline 09 72 32 86 88 để được tư vấn.";
            }
        }
    } else {
        $errorMsg = "Vui lòng nhập đầy đủ thông tin!";
    }
}

get_header();
?>

<div class="diagnosis-main">
    <div class="container">
        <?php
        if(!empty($errorMsg)){
            echo '<p style="color:red;margin-bottom: 30px;padding: 0 60px">'.$errorMsg.'</p>';
        } else if(!empty ($successMsg)){
            echo '<p style="color:green;margin-bottom: 30px;padding: 0 60px">'.$successMsg.'</p>';
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data" id="frm_diagnosis">
            <div class="box-in box-registration-form-information">
                <h2>Vui lòng nhập đầy đủ thông tin dưới đây</h2>
                <div class="content clearfix">
                    <div class="form-box">
                        <div class="form-row">
                            <label for="title" class="">Họ và tên</label>
                            <input type="text" name="title" id="title" class="input-text">
                        </div>
                        <div class="form-row form-groups clearfix">
                            <div class="form-box-in form-sex">
                                <label>Giới tính</label>
                                <div class="radioboxes">
                                    <div class="radiobox radiobox-male">
                                        <label for="male">
                                            <input type="radio" name="sex" id="male" value="male" checked="checked" /> Nam
                                        </label>
                                    </div>
                                    <div class="radiobox radiobox-female">
                                        <label for="male">
                                            <input type="radio" name="sex" id="female" value="female" /> Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-box-in form-age">
                                <label for="age">Tuổi</label>
                                <select name="age" id="age">
                                    <?php foreach (range(14, 75) as $age) {
                                        echo '<option value="'.$age.'" >' . $age . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="input-text">
                        </div>
                        <div class="form-row">
                            <label for="mobile">Số điện thoại</label>
                            <input type="text" name="mobile" id="mobile" class="input-text">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-row">
                            <label for="address" class="">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="input-text">
                        </div>
                        <div class="form-row form-country clearfix">
                            <label for="treatment">Chọn điều trị</label>
                            <select name="treatment" id="treatment">
                                <?php foreach(treatment_list() as $treatment): ?>
                                <option value="<?php echo $treatment ?>"><?php echo $treatment ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="comments">Ghi chú</label>
                            <textarea name="comments" id="comments"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-in box-registration-form-upload">
                <h2>Hãy tự chụp hình bằng máy ảnh hoặc smartphone và gửi cho chúng tôi theo hình mẫu dưới đây</h2>
                <div class="content clearfix">
                    <div class="form-box form-upload-list">
                        <ul>
                            <li>
                                <div class="upload">
                                    <div class="upload-image">
                                        <img src="http://nhakhoavietuc.com/wp-content/uploads/2016/05/smile-assessment-front.png" alt="" id="img-lower-arch">
                                    </div>
                                    <div class="upload-browse">
                                        <label for="upload-lower-arch">Ảnh chụp trực diện:</label>
                                        <div class="customfile"><span class="customfile-button" aria-hidden="true">Browse</span><span class="customfile-feedback" aria-hidden="true">No file selected</span><input type="file" name="photo_1" id="upload-lower-arch" class="input-file customfile-input" style="left: 0px; top: 0px;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="upload">
                                    <div class="upload-image">
                                        <img src="http://nhakhoavietuc.com/wp-content/uploads/2016/05/smile-assessment-upper.png" alt="" id="img-upper-arch">
                                    </div>
                                    <div class="upload-browse">
                                        <label for="upload-upper-arch">Ảnh chụp vòm trên:</label>
                                        <div class="customfile"><span class="customfile-button" aria-hidden="true">Browse</span><span class="customfile-feedback" aria-hidden="true">No file selected</span><input type="file" name="photo_2" id="upload-upper-arch" class="input-file customfile-input"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="upload">
                                    <div class="upload-image">
                                        <img src="http://nhakhoavietuc.com/wp-content/uploads/2016/05/smile-assessment-lower.png" alt="" id="img-front">
                                    </div>
                                    <div class="upload-browse">
                                        <label for="upload-front">Ảnh chụp vòm dưới:</label>
                                        <div class="customfile"><span class="customfile-button" aria-hidden="true">Browse</span><span class="customfile-feedback" aria-hidden="true">No file selected</span><input type="file" name="photo_3" id="upload-front" class="input-file customfile-input"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="upload">
                                    <div class="upload-image">
                                        <img src="http://nhakhoavietuc.com/wp-content/uploads/2016/05/smile-assessment-right.png" alt="" id="img-left">
                                    </div>
                                    <div class="upload-browse">
                                        <label for="upload-front">Ảnh chụp răng cắn bên phải:</label>
                                        <div class="customfile"><span class="customfile-button" aria-hidden="true">Browse</span><span class="customfile-feedback" aria-hidden="true">No file selected</span><input type="file" name="photo_5" id="upload-left" class="input-file customfile-input"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="upload">
                                    <div class="upload-image">
                                        <img src="http://nhakhoavietuc.com/wp-content/uploads/2016/05/smile-assessment-left.png" alt="" id="img-right">
                                    </div>
                                    <div class="upload-browse">
                                        <label for="upload-front">Ảnh chụp răng cắn bên trái:</label>
                                        <div class="customfile"><span class="customfile-button" aria-hidden="true">Browse</span><span class="customfile-feedback" aria-hidden="true">No file selected</span><input type="file" name="photo_6" id="upload-right" class="input-file customfile-input"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="multiline">
                                <div class="upload">
                                    <div class="upload-image">
                                        <img src="http://nhakhoavietuc.com/wp-content/uploads/2016/05/smile-assessment-closet.png" alt="" id="img-profile">
                                    </div>
                                    <div class="upload-browse">
                                        <label for="upload-profile">Ảnh chụp từ dưới lên:</label>
                                        <div class="customfile"><span class="customfile-button" aria-hidden="true">Browse</span><span class="customfile-feedback" aria-hidden="true">No file selected</span><input type="file" name="photo_4" id="upload-profile" class="input-file customfile-input"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="form-box form-description">
                        <?php 
                        if ( have_posts() ){
                            while ( have_posts() ) : the_post();
                            the_content();
                            endwhile;
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="box-in box-registration-form-apply">
                <div class="content clearfix">
                    <div class="form-box form-apply">
                        <div class="apply-wrapper">
                            <button type="submit" id="apply" class="normal"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> Gửi thông tin</button>
                        </div>
                        <!-- .apply-wrapper -->
                    </div>
                    <!-- .form-apply -->
                </div>
            </div>
        </form>
    </div>
</div>
<div class="diagnosis-wait-overlay" style="display: none"></div>
<div class="diagnosis-wait" style="display: none">
    <p>Xin Quý khách vui long chờ trong giấy lát, để thông tin được tải lên máy chủ của chúng tôi.</p>
    <p>Trong thời gian chờ đợi, Quý khách vui lòng không tắt cửa sổ trình duyệt, không ngắt kết nối mạng.</p>
    <p>Xin cám ơn!</p>
</div>

<script type="text/javascript">
  jQuery(function($) {
      $(window).load(function (){
          if($(this).width() > $(".diagnosis-wait").width()){
            $(".diagnosis-wait").css({
                left: ($(this).width() - $(".diagnosis-wait").width()) / 2
            });
          }
      });
      
    // PREVIEW IMAGES
    if (window.FileReader) {
      function imagePreview( input ) {
        var id = $(input).attr( 'id' ),
          type = id.replace( 'upload-', '' ),
          img = $("#img-" + type);
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            img.attr( 'src', e.target.result );
          }
          reader.readAsDataURL( input.files[0] );
        }
      }
      $('.input-file').change(function() {
        imagePreview( this );
      });
    }
    
    $("#frm_diagnosis").submit(function (){
        $(".diagnosis-wait-overlay, .diagnosis-wait").show();
    });
  });
</script>

<?php get_footer(); ?>
