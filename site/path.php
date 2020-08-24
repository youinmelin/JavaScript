
    <?php
        echo 'hello! php is servering you!<br>';
        $date = date('Y-m-d');
        $time = date('H:i:s');
        echo $date.' '.$time;
        $current_ip = $_SERVER['REMOTE_ADDR'];
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $files = scandir('.');

           echo 'ip:'.$current_ip.'<br>'; 
           echo 'language:'.$language.'<br>';
           echo 'browser:'.$browser.'<br>';
           foreach ($files as $value){
	 echo "<a href='$value'>$value</a><br>";
           }
           ?>
