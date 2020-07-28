<?php
namespace AppBundle\Helper;

class TextHelper
{
    public function trim_words($text, $num_words = 55, $more = null)
    {
        if (null === $more) {
            $more = '&hellip;';
        }
        $original_text = $text;
        /*
         * translators: If your word count is based on single characters (e.g. East Asian characters),
         * enter 'characters_excluding_spaces' or 'characters_including_spaces'. Otherwise, enter 'words'.
         * Do not translate into your own language.
         */
        if (strpos($text, 'characters') === 0 && preg_match('/^utf\-?8$/i', 'utf-8')) {
            $text = trim(preg_replace("/[\n\r\t ]+/", ' ', $text), ' ');
            preg_match_all('/./u', $text, $words_array);
            $words_array = array_slice($words_array[0], 0, $num_words + 1);
            $sep = '';
        } else {
            $words_array = preg_split("/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY);
            $sep = ' ';
        }
        if (count($words_array) > $num_words) {
            array_pop($words_array);
            $text = implode($sep, $words_array);
            $text = $text . $more;
        } else {
            $text = implode($sep, $words_array);
        }
        /**
         * Filters the text content after words have been trimmed.
         *
         * @since 3.3.0
         *
         * @param string $text The trimmed text.
         * @param int $num_words The number of words to trim the text to. Default 55.
         * @param string $more An optional string to append to the end of the trimmed text, e.g. &hellip;.
         * @param string $original_text The text before it was trimmed.
         */
        return $text;
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function slugifySearch($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', ' ', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^\w]+~', ' ', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    function urlClean($nameout)
    {
        $nameout = strtolower( $nameout );
        $nameout = str_replace('#', '', $nameout);
        $nameout = str_replace('%', '', $nameout);
        $nameout = str_replace('^', '', $nameout);
        $nameout = str_replace('&', '', $nameout);
        $nameout = str_replace('*', '', $nameout);
        $nameout = str_replace('!', '', $nameout);
        $nameout = str_replace('~', '', $nameout);
        $nameout = str_replace('`', '', $nameout);
        $nameout = str_replace('[', '', $nameout);
        $nameout = str_replace(']', '', $nameout);
        $nameout = str_replace('"', '', $nameout);
        $nameout = str_replace('{', '', $nameout);
        $nameout = str_replace('}', '', $nameout);
        $nameout = str_replace("|", '', $nameout);
        $nameout = str_replace("'", '', $nameout);
        $nameout = str_replace(':', '', $nameout);
        $nameout = str_replace(';', '', $nameout);
        $nameout = str_replace('<', '', $nameout);
        $nameout = str_replace('>', '', $nameout);
        $nameout = str_replace('.', '', $nameout);
        $nameout = str_replace(',', '', $nameout);
        $nameout = str_replace('>', '', $nameout);
        $nameout = str_replace('æ', 'ae', $nameout);
        $nameout = str_replace('ø', 'oe', $nameout);
        $nameout = str_replace('å', 'aa', $nameout);
        $nameout = str_replace('(', '', $nameout);
        $nameout = str_replace(')', '', $nameout);

        return $nameout;
    }

    function xss_clean($data)
    {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                    // Remove really unwanted tags
                    $old_data = $data;
                    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|onmouseover|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);

            // we are done...
            return $data;
    }

    public function greeting()
    {
        $greet = null;

        date_default_timezone_set("Asia/Jakarta");

        $b = time();
        $hour = date("G",$b);

        if ($hour>=0 && $hour<=11)
        {
        $greet = "Pagi";
        }
        elseif ($hour >=12 && $hour<=14)
        {
        $greet = "Siang";
        }
        elseif ($hour >=15 && $hour<=17)
        {
        $greet = "Sore";
        }
        elseif ($hour >=17 && $hour<=18)
        {
        $greet = "Petang";
        }
        elseif ($hour >=19 && $hour<=23)
        {
        $greet = "Malam ";
        }

        return $greet;
    }

    function xss_check($data)
    {
            // Fix &entity\n;
            $pattern = '/[~`!@$%^*()_\[\]{}\|\\:;\"\'<,>.]/';
            $data = preg_match($pattern,  $data);

            // we are done...
            return $data;
    }

    function currentUrl()
    {
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https://';
        }
        else {
        $protocol = 'http://';
        }
        
        $current_link = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        return $current_link;
    }

    
}
