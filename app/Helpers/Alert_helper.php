<?php
function Alert($message='',$goback=false,$url ='')
{
    $assign = ['message'=>$message,'goback'=>$goback];
    if($url !=='')
    {
        $assign['url'] = $url;
    }
    return view('errors/alertError',$assign);
}