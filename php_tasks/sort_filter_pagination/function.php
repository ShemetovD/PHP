<?php
/**
 * Created by PhpStorm.
 * User: Ula
 * Date: 13.07.2017
 * Time: 19:04
 */


    define("DB_HOST","intexsoft");
    define("DB_USER","root");
    define("DB_PASSWORD","");
    define("DB_NAME","cinema");

        $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        $items_array = [];
        $number_of_pages;
        //$films = [];

        $items_array['title'] = $_GET['title'];
        $items_array['lenght'] = $_GET['lenght'];
        $items_array['author'] = $_GET['author'];
        $items_array['startDate'] = $_GET['startDate'];
        $items_array['cash'] = $_GET['cash'];

        $page_number = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;

        if (isset($_GET['search'])) {


            $result = paginate($page_number);
            $films = $result[0];
            $number_of_pages = $result[1];


        }else{
            $result = paginate($page_number);
            $films = $result[0];
            $number_of_pages = $result[1];
        }


        if(isset($_GET['desc']) && !empty($_GET['desc'])){
            $_GET['order_way'] = 'desc';
            $_GET['order_table'] = $_GET['desc'];

            $result = paginate($page_number);
            $films = $result[0];
            $number_of_pages = $result[1];
        }

        if(isset($_GET['asc']) && !empty($_GET['asc'])){
            $_GET['order_way'] = 'asc';
            $_GET['order_table'] = $_GET['asc'];

            $result = paginate($page_number);
            $films = $result[0];
            $number_of_pages = $result[1];
        }

        if(isset($_GET['page'])){

            $result = paginate($_GET['page']);
            $films = $result[0];
            $number_of_pages = $result[1];

        }

        function paginate($page){

            $p_db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            $results_per_page = 2;
            $page_number = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;

            $items_array = [];

            $items_array['title'] = $_GET['title'];
            $items_array['lenght'] = $_GET['lenght'];
            $items_array['author'] = $_GET['author'];
            $items_array['startDate'] = $_GET['startDate'];
            $items_array['cash'] = $_GET['cash'];

            $this_page_first_result = ($page_number-1)*$results_per_page;

            $before = "SELECT * FROM Films WHERE 1=1";
            foreach ($items_array as $key => $value){
                if(isset($value) && !empty($value)){
                    $before .= " and $key = '$value'";
                }
            }

            if(isset($_GET['order_table']) && !empty($_GET['order_table'])){
                $before .= " ORDER BY ".$_GET['order_table'];
            }

            if(isset($_GET['order_way']) && !empty($_GET['order_way'])){
                $before .= " ".$_GET['order_way'];
            }

            $sql = $before . ' LIMIT '.$this_page_first_result . ',' .  $results_per_page;
            $sql2 = $before;

            $final_result = $p_db->query($sql);
            $full_result = $p_db->query($sql2);

            $films = array();
            for($i=0; $i < $final_result->num_rows; $i++){
                $films[]=$final_result->fetch_object();
            }

            $number_all_records = $full_result->num_rows;
            $number_of_pages = ceil($number_all_records/$results_per_page);

            return array($films,$number_of_pages);
        }

?>