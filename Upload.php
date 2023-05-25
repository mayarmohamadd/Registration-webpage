<?php

    $img_name = $_FILES['img']['name'];
    $tmp_img_name = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_img_name, "images/". $img_name);

