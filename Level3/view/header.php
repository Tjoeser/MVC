<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./media/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.cdnfonts.com/css/zorgeous" rel="stylesheet"> -->
                
</head>

<body>
    <div class="header">
        <h1>My Website</h1>
        <p>A website created by me.</p>
    </div>
    <div class="navbar">
        <a class="navbutton" href="index.php">Home</a>
        <a class="navbutton" href="index.php?op=products">Products</a>
        <a class="navbutton" href="index.php?op=contacts">Contacts</a>
    </div>
    <div class="navbar">
    </div>

    <div class="row">
        <div class="side">



            <img class="fakeimg" style="height:400px;" src=".\media\newyork6.png">
            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            <h3>More Text</h3>
            <p>Lorem ipsum dolor sit ame.</p>
            <img class="fakeimg" style="height:10rem;" src=".\media\newyork1.png"><br>
            <img class="fakeimg" style="height:10rem;" src=".\media\newyork2.png"><br>
            <img class="fakeimg" style="height:10rem;" src=".\media\newyork3.png">
        </div>

        <div class="main">

        
        <div class="searchsection">
        <?php

        $op = isset($_GET['op']) ? $_GET['op'] : '';
        

        if ($op == 'products' || $op == 'contacts') {
            echo $searchbar;
            echo $dropdown;
        } else {
        }


        ?>
        </div>