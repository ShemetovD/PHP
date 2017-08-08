<?php
/**
 * Created by PhpStorm.
 * User: Ula
 * Date: 17.07.2017
 * Time: 19:03
 */

include ('function.php');


?>

<!--    <h1>Add film</h1>
    <form>
      <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="text" class="form-control" id="user_id" placeholder="titl>
      </div>
      <div class="form-group">
        <label for="task_id">Task ID</label>
        <input type="text" class="form-control" id="task_id" placeholder="Task ID">
      </div>
      <div class="form-group">
        <label for="mark">Mark</label>
        <input type="text" class="form-control" id="mark" placeholder="mark">
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
    </form>-->

<!--<table>
    <tr>
        <td>title</td>
        <td>lenght</td>
        <td>author</td>
        <td>startDate</td>
        <td>cash</td>
        <?php
/*        foreach ($films as $film){
            //echo '<tr>'.$film->title.'</tr>';
            //print_r($films);
            <td><?php echo $film->title; */?></td>
        }
        ?>
    </tr>
</table>-->

<form action="" method="get">
    <input type="text" name="title" value="<?php echo $_GET['title'];?>"/>
    <input type="text" name="lenght" value="<?php echo $_GET['lenght'];?>"/>
    <input type="text" name="author" value="<?php echo $_GET['author'];?>"/>
    <input type="text" name="startDate" value="<?php echo $_GET['startDate'];?>"/>
    <input type="text" name="cash" value="<?php echo $_GET['cash'];?>"/>
    <input type="submit" name="search" value="search"/>

<table>
    <thead>
    <tr>
        <th><button type="submit" name="desc" value="title">desc</button><button type="submit" name="asc" value="title">asc</button>title</th>
        <th><button type="submit" name="desc" value="lenght">desc</button><button type="submit" name="asc" value="lenght">asc</button>lenght</th>
        <th><button type="submit" name="desc" value="author">desc</button><button type="submit" name="asc" value="author">asc</button>author</th>
        <th><button type="submit" name="desc" value="startDate">desc</button><button type="submit" name="asc" value="startDate">asc</button>startDate</th>
        <th><button type="submit" name="desc" value="cash">desc</button><button type="submit" name="asc" value="cash">asc</button>cash</th>
    </tr>
    </thead>
    <tbody>
            <?php
            foreach ($films as $film){
                echo '<tr><th>'.$film->title.'</th>';
                echo '<th>'.$film->lenght.'</th>';
                echo '<th>'.$film->author.'</th>';
                echo '<th>'.$film->startDate.'</th>';
                echo '<th>'.$film->cash.'</th></tr>';
            }
            ?>
    </tbody>
</table>


    <input type="hidden" name="order_way" value="<?php echo $_GET['order_way'];?>"/>
    <input type="hidden" name="order_table" value="<?php echo $_GET['order_table'];?>"/>
<!--    <input type="hidden" name="page_num" value="--><?php //echo $_GET['page_num'];?><!--"/>-->

    <?php
    //echo '$number_of_pages = '.$number_of_pages;
    $page_number_paginate = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;
    echo '<button type="submit" name="page" value='.$page.'><--</button>';
    for ($page=1;$page<=$number_of_pages;$page++) {
        //echo '<a href="main.php?page=' . $page . '">' . $page . '</a> ';
        if($page_number_paginate == $page){
            echo '<button type="submit" name="page" calss="active" style="background:#6cd06c;" value='.$page.'>'.$page.'</button>';
        }else{
            echo '<button type="submit" name="page" value='.$page.'>'.$page.'</button>';
        }

    }
    echo '<button type="submit" name="page" value='.$number_of_pages.'>--></button>';
    ?>

</form>







