
<?php
    // $lar = 2;
    
class foo
{
   
    function do_foo()
    {
        $lar =$_POST['lar'];
        // echo "Doing foo."; 
        if($lar == "2"){
            echo 'fuck';
        }else{
            echo 'sk';
        }
    }

    function lol()
    {
        $kk = $_POST['kk'];
        if($kk = "3"){
            echo 'kkkk';
        }else{
            echo 'lllll';
        }
    }
}

// $bar = new foo;
// $bar->do_foo();
// $l = new foo;
// $l->lol();

//test mobile or desktop play boawser//
// function isMobile () {
//   return is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
// }
// echo isMobile() ? "You are using a mobile device." : "You are on a desktop or laptop." ;
//end test mobile or desktop play boawser//

?>