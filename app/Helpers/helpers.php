<?php
use App\Models\ContactMessage;
use App\Models\EmailSubscriber;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
  
if (! function_exists('getLetestMessage')) {
    function getLetestMessage()
    {
        return ContactMessage::limit(3)->get();
    }
}

if (! function_exists('getLetestMessageCount')) {
    function getLetestMessageCount()
    {
        return ContactMessage::count();
    }
}

if (! function_exists('getSubscribers')) {
    function getSubscribers()
    {
        return EmailSubscriber::limit(3)->get();
    }
}

if (! function_exists('getSubscriberCount')) {
    function getSubscriberCount()
    {
        return EmailSubscriber::count();
    }
}

if (! function_exists('timeFormate1')) {
    function timeFormate1($datetime,$full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

if (! function_exists('generalSettings')) {
    function generalSettings()
    {
        return DB::table('general_settings')->first();
    }
}
if (! function_exists('contact')) {
    function contact()
    {
        return DB::table('contacts')->first();
    }
}
if (! function_exists('contact_all')) {
    function contact_all()
    {
        return DB::table('contacts')->get();
    }
}
if (! function_exists('get_menu')) {
    function get_menu()
    {
        return DB::table('menus')->get();
    }
}
if (! function_exists('check_social_icon')) {
    function check_social_icon($socialName)
    {
        $data = DB::table('social_medias')->where('social_media_type',$socialName)->first();
        if(empty($data)){
            return false;
        }else{
            return  $data;
        }
    }
}
if (! function_exists('get_seo_data')) {
    function get_seo_data($page_name)
    {
        return DB::table('manage_seo')->where('page_name',$page_name)->first();
    }
}
if (! function_exists('get_useful_links')) {
    function get_useful_links($page_name)
    {
        return DB::table('useful_links')->where('page_name',$page_name)->first();
    }
}