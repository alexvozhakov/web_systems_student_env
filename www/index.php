<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                
include_once 'Router.php';

function home($pattern){
    echo 'home';
}
function pockets_list($pattern){
    echo $pattern[1][0];
   // echo '2';
}
function pocket_view($pattern){
    echo '3';
}
function pocket_sum($first, $second){

    echo $first + $second;
            //var_dump ($id);
}
function pocket_divide($pattern){
    echo ($pattern[1] / $pattern[2]);
}
function pocket_subtract($pattern){
    echo ($pattern[1] - $pattern[2]);
}
function pocket_multiply($pattern){
    echo ($pattern[1] * $pattern[2]);
}
function account_list($pattern){
    echo '8';
}
function account_view($pattern){
    echo "user ".$pattern[1];
}
function account_sum($pattern){
    echo '10';
}
function account_divide($pattern){
    echo '11';
}
function account_subtract($pattern){
    echo '12';
}
function account_multiply($pattern){
    echo '13';
}

//$router = new Router();
Router::get('^\/$', 'home');
Router::get('^\/pocket(\/?)$', 'pockets_list');
Router::get('^\/pocket\/(\d+)$', 'pocket_view');

Router::get('^\/pocket\/(\d+)\/(\d+)\/sum$', 'pocket_sum');
Router::get('^\/pocket\/(\d+)\/(\d+)\/divide$', 'pocket_divide');
Router::get('^\/pocket\/(\d+)\/(\d+)\/subtract$', 'pocket_subtract');
Router::get('^\/pocket\/(\d+)\/(\d+)\/multiply$', 'pocket_multiply');

Router::get('^\/account(\/?)$', 'account_list');
Router::get('^\/account\/(\d+)$', 'account_view');

Router::post('^\/account\/(\d+)\/sum$', 'account_sum');
Router::post('^\/account\/(\d+)\/divide$', 'account_divide');
Router::post('^\/account\/(\d+)\/subtract$', 'account_subtract');
Router::post('^\/account\/(\d+)\/multiply$', 'account_multiply');

Router::process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

        ?>
    </body>
</html>
