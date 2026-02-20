<?php 
  include 'lib/Database.php';
  include 'config/config.php';
  include 'helpers/Format.php';

  $db = new Database();
  $fm = new Format();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      if (isset($_GET['pageid'])) {
          $pageTitle = $_GET['pageid'];
          $query = "SELECT * FROM tbl_page WHERE id = '$pageTitle'";
          $gettitle = $db->select($query);
          if ($gettitle) {
            while ($result = $gettitle->fetch_assoc()) { ?>
              <title><?php echo $result['name']?> - <?php echo TITLE?></title>
          <?php } }
      } elseif (isset($_GET['id'])) {
          $postid = $_GET['id'];
          $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
          $postID = $db->select($query);
          if ($postID) {
            while ($result = $postID->fetch_assoc()) { ?>
              <title><?php echo $result['title']?> - <?php echo TITLE?></title>
          <?php } }
      } else { ?>
          <title><?php echo $fm->title() ?> - <?php echo TITLE?></title>
      <?php } ?>      
    
    <link rel="icon" href="images/icon.jpeg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                jhakanaka: '#FF4B2B',
                darkblue: '#1e293b',
              }
            }
          }
        }
    </script>
    
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">  
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css">
    
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect:'random', slices:10, animSpeed:500, pauseTime:5000,
            directionNav:false, controlNav:false, pauseOnHover:true
        });
    });
    </script>
</head>

<body class="bg-[#f0f2f5]">

<header class="headersection shadow-[0_10px_30px_rgba(255,75,43,0.3)] border-b-4 border-[#FF416C] bg-gradient-to-r from-[#FF416C] to-[#FF4B2B]">
    <div class="max-w-[958px] mx-auto flex justify-between items-center px-4 py-6">
        <?php
        $query = "SELECT * FROM title_slogan WHERE id = 1";
        $getData = $db->select($query);
        if ($getData) {
            while ($result = $getData->fetch_assoc()) { ?>      
            <a href="index.php" class="logo group flex items-center space-x-5">
                <div class="relative">
                    <img class="relative transition-transform group-hover:rotate-12 duration-500 bg-white p-1 rounded-full shadow-lg" 
                         src="admin/<?php echo $result['logo'] ?>" alt="Logo" style="width:70px; height:70px; object-fit: cover;"/>
                </div>
                <div>
                    <h2 class="text-white text-3xl font-black italic tracking-tighter"><?php echo $result['title'] ?></h2>
                    <p class="text-yellow-100 text-[10px] font-medium tracking-widest uppercase opacity-80"><?php echo $result['slogan'] ?></p>
                </div>
            </a>
        <?php } } ?>

        <div class="flex flex-col items-end space-y-3">
            <div class="searchbtn">
                <form action="search.php" method="get" class="flex items-center bg-white/10 backdrop-blur-md rounded-full border border-white/30 p-1 group focus-within:bg-white transition-all">
                    <input class="bg-transparent border-none focus:ring-0 text-white focus:text-gray-800 px-3 py-1 rounded-full text-xs w-32 placeholder-white/70" 
                           type="text" name="search" placeholder="Search..."/>
                    <button type="submit" name="submit" class="bg-yellow-400 text-gray-900 px-4 py-1 rounded-full text-[10px] font-black uppercase">Search</button>
                </form>
            </div>
        </div>
    </div>
</header>

<nav class="navsection sticky top-0 z-50 bg-[#1e293b] border-b border-white/10">
    <div class="max-w-[958px] mx-auto">
        <?php $currentPage = basename($_SERVER['SCRIPT_FILENAME'], '.php'); ?>
        <ul class="flex items-center justify-center py-1">
            <li class="relative group">
                <a <?php if ($currentPage == 'index') { echo 'id="active"'; } ?> href="index.php" class="text-white font-bold uppercase tracking-widest text-[11px] px-6 py-4 block hover:text-yellow-400 transition-colors">Home</a>
            </li>
            <?php
            $query = "SELECT * FROM tbl_page";
            $pages = $db->select($query);
            if ($pages) {
                while ($result = $pages->fetch_assoc()) { ?>  
                <li class="relative group border-l border-gray-700">
                    <a <?php if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) { echo 'id="active"'; } ?>
                       href="page.php?pageid=<?php echo $result['id']?>" 
                       class="text-white font-bold uppercase tracking-widest text-[11px] px-6 py-4 block hover:text-yellow-400 transition-colors"><?php echo $result['name']?></a>
                </li>
            <?php } } ?>
            <li class="relative group border-l border-gray-700">
                <a <?php if ($currentPage == 'contact') { echo 'id="active"'; } ?> href="contact.php" class="text-white font-bold uppercase tracking-widest text-[11px] px-6 py-4 block hover:text-yellow-400 transition-colors">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<style>
#active { background: rgba(255, 255, 255, 0.1); color: #facc15 !important; border-bottom: 2px solid #facc15; }
</style>