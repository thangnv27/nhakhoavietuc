<?php
// Dang ky nhan khuyen mai, voucher
echo do_shortcode(stripslashes_deep(get_option(SHORT_NAME . "_voucherForm")));
?>
<!--Thong tin lien he-->
<div style="padding: 20px; border: 3px dashed green;margin-bottom: 30px;box-shadow: 0 3px 10px 0 #ccc;font-size: 16px">
    <h3 style="color: green;text-transform: uppercase;margin-top: 0"><?php echo get_option('unit_owner') ?></h3>
    <p>Địa chỉ: <?php echo get_option('info_address') ?></p>
    <p>TEL: <?php echo get_option('info_tel') ?></p>
    <p>Điện thoại tư vấn: <?php echo get_option(SHORT_NAME . "_hotline") ?></p>
    <p>Liện hệ với Bác sĩ : <?php echo get_option(SHORT_NAME . '_contact_person') ?></p>
    <p style="margin-bottom: 0">Mobile: <?php echo get_option(SHORT_NAME . "_hotline") ?></p>
</div>
<?php
// Dang ky tu van mien phi
echo do_shortcode(stripslashes_deep(get_option(SHORT_NAME . "_consultForm")));
?>
<!--Dat lich kham-->
<h3 style="color: #F15921">ĐẶT LỊCH KHÁM</h3>
<iframe src="//vicare.vn/dat-kham/widget/8692/" frameborder="0" allowTransparency="true" width="100%" height="260" style="overflow:auto"></iframe>