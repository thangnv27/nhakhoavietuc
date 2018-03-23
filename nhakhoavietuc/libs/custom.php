<?php
/**
 * Get current request url
 * @return tring
 */
function getCurrentRquestUrl(){
    $prefix = "http://";
    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]=="on"){
        $prefix = "https://";
    }
    return $prefix . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}
/*----------------------------------------------------------------------------*/
# Cities  in Vietnamese
/*----------------------------------------------------------------------------*/
if(!function_exists('vn_city_list')){
    function vn_city_list(){
        return array(
            "An Giang", "Bà Rịa - Vũng Tàu", "Bạc Liêu", "Bắc Kạn", "Bắc Giang", "Bắc Ninh", "Bến Tre", "Bình Dương",
            "Bình Định", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Cần Thơ", "Đà Nẵng", "Đắk Lắk", "Đắk Nông",
            "Đồng Nai", "Đồng Tháp", "Điện Biên", "﻿Gia Lai", "Hà Giang", "Hà Nam", "Hà Nội", "Hà Tĩnh", "Hải Dương", 
            "Hải Phòng", "Hòa Bình", "Hậu Giang", "Hưng Yên", "TP. Hồ Chí Minh", "Khánh Hòa", "Kiên Giang", "Kon Tum", 
            "Lai Châu", "Lào Cai", "Lạng Sơn", "Lâm Đồng", "Long An", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", 
            "Phú Thọ", "Phú Yên", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", 
            "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên - Huế", "Tiền Giang", 
            "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái", "Nơi khác", 
        );
    }
}
function font_awesome_icons() {
    return array(
        'Web Application Icons' => array(
            'adjust', 'anchor', 'archive', 'arrows', 'arrows-h', 'arrows-v', 'asterisk', 'ban',
            'bar-chart-o', 'barcode', 'bars', 'beer', 'bell', 'bell-o', 'bolt', 'bomb', 'book',
            'bookmark', 'bookmark-o', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn',
            'bullseye', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-square-o-down',
            'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'certificate', 'check',
            'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'child', 'circle',
            'circle-o', 'circle-o-notch', 'circle-thin', 'clock-o', 'cloud', 'cloud-download',
            'cloud-upload', 'code', 'code-fork', 'coffee', 'cog', 'cogs', 'comment', 'comment-o',
            'comments', 'comments-o', 'compass', 'credit-card', 'crop', 'crosshairs', 'cube', 'cubes',
            'cutlery', 'database', 'desktop', 'dot-circle-o', 'download', 'ellipsis-h', 'ellipsis-v',
            'envelope', 'envelope-o', 'envelope-square', 'eraser', 'exchange', 'exclamation',
            'exclamation-circle', 'exclamation-triangle', 'external-link', 'external-link-square', 'eye',
            'eye-slash', 'fax', 'female', 'fighter-jet', 'file-archive-o', 'file-audio-o', 'file-code-o',
            'file-excel-o', 'file-image-o', 'file-pdf-o', 'file-powerpoint-o', 'file-video-o', 'file-word-o',
            'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flask',
            'folder', 'folder-o', 'folder-open', 'folder-open-o', 'frown-o', 'gamepad', 'gavel', 'gift',
            'glass', 'globe', 'graduation-cap', 'hdd-o', 'headphones', 'heart', 'heart-o', 'history',
            'home', 'inbox', 'info', 'info-circle', 'key', 'keyboard-o', 'language', 'laptop',
            'leaf', 'lemon-o', 'level-down', 'level-up', 'life-ring', 'lightbulb-o', 'location-arrow',
            'lock', 'magic', 'magnet', 'male', 'map-marker', 'meh-o', 'microphone', 'microphone-slash',
            'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'money', 'moon-o',
            'music', 'paper-plane', 'paper-plane-o', 'paw', 'pencil', 'pencil-square', 'pencil-square-o',
            'phone', 'phone-square', 'picture-o', 'plane', 'plus', 'plus-circle', 'plus-square',
            'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qrcode', 'question', 'question-circle',
            'quote-left', 'quote-right', 'random', 'recycle', 'refresh', 'reply', 'reply-all', 'retweet',
            'road', 'rocket', 'rss', 'rss-square', 'search', 'search-minus', 'search-plus', 'share',
            'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart',
            'sign-in', 'sign-out', 'signal', 'sitemap', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc',
            'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc',
            'sort-numeric-asc', 'sort-numeric-desc', 'space-shuttle', 'spinner', 'spoon', 'square',
            'square-o', 'star', 'star-half', 'star-half-o', 'star-o', 'suitcase', 'sun-o', 'tablet',
            'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'terminal', 'thumb-tack', 'thumbs-down',
            'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle',
            'times-circle-o', 'tint', 'trash-o', 'tree', 'trophy', 'truck', 'umbrella', 'university',
            'unlock', 'unlock-alt', 'upload', 'user', 'users', 'video-camera', 'volume-down',
            'volume-off', 'volume-up', 'wheelchair', 'wrench'
        ),
        'File Type Icons' => array(
            'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o',
            'file-o', 'file-pdf-o', 'file-powerpoint-o', 'file-text', 'file-text-o', 'file-video-o',
            'file-word-o'
        ),
        'Spinner Icons' => array(
            'circle-o-notch', 'cog', 'refresh', 'spinner',
        ),
        'Form Control Icons' => array(
            'check-square', 'check-square-o', 'circle', 'circle-o', 'dot-circle-o', 'minus-square',
            'minus-square-o', 'plus-square', 'plus-square-o', 'square', 'square-o'
        ),
        'Currency Icons' => array(
            'btc', 'eur', 'gbp', 'inr', 'jpy', 'krw', 'money', 'rub', 'try', 'usd',
        ),
        'Text Editor Icons' => array(
            'align-center', 'align-justify', 'align-left', 'align-right', 'bold', 'chain-broken',
            'clipboard', 'columns', 'eraser', 'file', 'file-o', 'file-text', 'file-text-o',
            'files-o', 'floppy-o', 'font', 'header', 'indent', 'italic', 'link', 'list',
            'list-alt', 'list-ol', 'list-ul', 'outdent', 'paperclip', 'paragraph', 'repeat',
            'scissors', 'strikethrough', 'subscript', 'superscript', 'table', 'text-height',
            'text-width', 'th', 'th-large', 'th-list', 'underline', 'undo',
        ),
        'Directional Icons' => array(
            'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down',
            'angle-left', 'angle-right', 'angle-up', 'arrow-circle-down', 'arrow-circle-left',
            'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up',
            'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up',
            'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'caret-down', 'caret-left', 'caret-right',
            'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up',
            'caret-up', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right',
            'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up',
            'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'long-arrow-down', 'long-arrow-left',
            'long-arrow-right', 'long-arrow-up',
        ),
        'Video Player Icons' => array(
            'arrows-alt', 'backward', 'compress', 'eject', 'expand', 'fast-backward', 'fast-forward',
            'forward', 'pause', 'play', 'play-circle', 'play-circle-o', 'step-backward', 'step-forward',
            'stop', 'youtube-play',
        ),
        'Brand Icons' => array(
            'adn', 'android', 'apple', 'behance', 'behance-square', 'bitbucket', 'bitbucket-square',
            'btc', 'codepen', 'css3', 'delicious', 'deviantart', 'digg', 'dribbble', 'dropbox',
            'drupal', 'empire', 'facebook', 'facebook-square', 'flickr', 'foursquare', 'git',
            'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'google', 'google-plus',
            'google-plus-square', 'hacker-news', 'html5', 'instagram', 'joomla', 'jsfiddle', 'linkedin',
            'linkedin-square', 'linux', 'maxcdn', 'openid', 'pagelines', 'pied-piper', 'pied-piper-alt',
            'pinterest', 'pinterest-square', 'qq', 'rebel', 'reddit', 'reddit-square', 'renren',
            'share-alt', 'share-alt-square', 'skype', 'slack', 'soundcloud', 'spotify', 'stack-exchange',
            'stack-overflow', 'steam', 'steam-square', 'stumbleupon', 'stumbleupon-circle', 'tencent-weibo',
            'trello', 'tumblr', 'tumblr-square', 'twitter', 'twitter-square', 'vimeo-square', 'vine',
            'vk', 'weibo', 'weixin', 'windows', 'wordpress', 'xing', 'xing-square', 'yahoo',
            'youtube', 'youtube-play', 'youtube-square',
        ),
        'Medical Icons' => array(
            'ambulance', 'h-square', 'hospital-o', 'medkit', 'plus-square', 'stethoscope', 'user-md',
            'wheelchair'
        )
    );
}

function treatment_list() {
    return array(
        'Khám tổng quát' => 'Khám tổng quát',
        'Thẩm mỹ răng' => 'Thẩm mỹ răng',
        'Phục hình răng giả - Implant' => 'Phục hình răng giả - Implant',
        'Chỉnh nha - niềng răng' => 'Chỉnh nha - niềng răng',
        'Cười hở lợi' => 'Cười hở lợi',
        'Thẩm mỹ nụ cười' => 'Thẩm mỹ nụ cười',
        'Khác' => 'Khác',
    );
}

if(!function_exists('ppo_convert_object_to_array')){
    /**
     * Convert an object to array
     * @param Object $object
     * @return array
     */
    function ppo_convert_object_to_array($object){
        $array = array();
        foreach ($object as $member => $data){
            $array[$member] = $data;
        }
        return $array;
    }
}
if(!function_exists('convert_number_to_words')){
    /**
     * Convert number to words
     * @param Integer $number
     * @return String
     */
    function convert_number_to_words($number, $show = false){
        $hyphen = ' ';
        $conjunction = '  ';
        $separator = ' ';
        $negative = 'negative ';
        $decimal = ' point ';
        $dictionary = array(
            0 => 'không',
            1 => 'một',
            2 => 'hai',
            3 => 'ba',
            4 => 'bốn',
            5 => 'năm',
            6 => 'sáu',
            7 => 'bảy',
            8 => 'tám',
            9 => 'chín',
            10 => 'mười',
            11 => 'mười một',
            12 => 'mười hai',
            13 => 'mười ba',
            14 => 'mười bốn',
            15 => 'mười năm',
            16 => 'mười sáu',
            17 => 'mười bảy',
            18 => 'mười tám',
            19 => 'mười chín',
            20 => 'hai mươi',
            30 => 'ba mươi',
            40 => 'bốn mươi',
            50 => 'năm mươi',
            60 => 'sáu mươi',
            70 => 'bảy mươi',
            80 => 'tám mươi',
            90 => 'chín mươi',
            100 => 'trăm',
            1000 => 'ngàn',
            1000000 => 'triệu',
            1000000000 => 'tỷ',
            1000000000000 => 'nghìn tỷ',
            1000000000000000 => 'ngàn triệu triệu',
            1000000000000000000 => 'tỷ tỷ'
        );
        if (!is_numeric($number)) {
            return false;
        }
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
            );
            return false;
        }
        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }
        
        $string = $fraction = null;
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int) ($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        if($show){
            echo $string;
        }
        return $string;
    }
}
/**
 * Remove special char
 * 
 * @param string $string
 * @return string
 */
function removeSpecialChar($string){
    $specialChar = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", ";", ":", "'", "\"", ",", ".", "/", "<", ">", "?", );
    foreach ($specialChar as $key => $value) {
        $pos = strpos($string, $value);
        if($pos){
            $string = str_replace(substr($string, $pos, 2), ucwords(substr($string, $pos+1, 1)), $string);
        }
    }
    return $string;
}
/**
 * Generate random string 
 * 
 * @param integer $length default length = 32
 * @return string
 */
function random_string($length = 32){
    $key = '';
    $rand = str_split(strtolower(md5(time() * microtime())));
    $keys = array_merge(range(0, 9), range('a', 'z'));
    $keys = array_merge($keys, $rand);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    
    return $key;
}
/**
 * Replaces url entities with -
 *
 * @param string $fragment
 * @return string
 */
function clean_entities($fragment){
    $translite_simbols = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $fragment = preg_replace($translite_simbols, $replace, $fragment);
    $fragment = preg_replace('/(-)+/', '-', $fragment);

    return $fragment;
}

/**
 * Read properties file
 * 
 * @param type $filename path to properties file
 * @return array key=>value
 */
function readProperties($filename){
    $list = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $language = array();
    foreach ($list as $lang) {
        $arr = explode('=', $lang);
        if (count($arr) == 2) {
            $language[trim($arr[0])] = trim($arr[1]);
        }
    }
    return $language;
}
/**
 * Write text to file
 *
 * @param string $filename
 * @param string $text
 * @param string $mode example: w+
 */
function write_to_file($filename, $text, $mode) {
    $fp = fopen($filename, $mode);
    fputs($fp, "$text\n");
    fclose($fp);
}

/**
 * Remove BBCODE from text document
 * @param string $code text document
 * @return string text document
 */
function removeBBCode($code){
    $code = preg_replace("/(\[)(.*?)(\])/i", '', $code);
    $code = preg_replace("/(\[\/)(.*?)(\])/i", '', $code);
    $code = preg_replace("/http(.*?).(.*)/i", '', $code);
    $code = preg_replace("/\<a href(.*?)\>/", '', $code);
    $code = preg_replace("/:(.*?):/", '', $code);
    $code = str_replace("\n", '', $code);
    return $code;
}
/**
 * Get short content from full contents
 * 
 * @param integer $length 
 * @return string
 */
function get_short_content($contents, $length){
    $short = "";
    $contents = strip_tags($contents);
    if (strlen($contents) >= $length) {
        $text = explode(" ", substr($contents, 0, $length));
        for ($i = 0; $i < count($text) - 1; $i++) {
            if($i == count($text) - 2){
                $short .= $text[$i];
            }else{
                $short .= $text[$i] . " ";
            }
        }
        $short .= "...";
    } else {
        $short = $contents;
    }
    return $short;
}
/**
 * Video Youtube
 */
function shortcode_youtube($content = NULL, $width = 300, $height = 300){
    if ("" === $content)
        return 'No YouTube Video ID Set';
    $id = $text = $content;
    return '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://www.youtube.com/v/' . $id . '"></param><embed src="http://www.youtube.com/v/' . $id . '" type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'"></embed></object>';
}
/**
 * Tests a string to see if it's a valid email address
 *
 * @param	string	Email address
 *
 * @return	boolean
 */
function is_valid_email($email) {
//    return filter_var($email, FILTER_VALIDATE_EMAIL);
//    return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^", $email);
    return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s\'"<>@,;]+\.+[a-z]{2,6}))$#si', $email);
}
/**
 * Tests a string to see if it's a valid ID Card
 *
 * @param	string	ID Card
 *
 * @return	boolean
 */
function is_ID_Card($id_card) {
    return preg_match('#^[0-9]{9,12}$#si', $id_card);
}

/**
 * Tests a string to see if it's a valid phone number
 *
 * @param	string	$phone Phone number
 *
 * @return	boolean
 */
function is_valid_phone_number($phone) {
    return preg_match("#^[0-9[:space:]\+\-\.\(\)]+$#si", $phone);
}
/**
 * Display with <pre> tag on browser
 * @param All format $value
 */
function preTag($value) {
    if (is_string($value)) {
        echo "<pre>";
        echo($value);
        echo "</pre>";
    } else {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
}
/**
 * Init display error messages
 */
function myDebug(){
    ini_set('display_errors', 'On');
    error_reporting(E_ALL | E_STRICT);
}