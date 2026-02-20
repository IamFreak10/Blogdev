<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
?>

<div class="bg-white max-w-[958px] clear py-8  mx-auto px-4">
    <div class="flex flex-col lg:flex-row gap-8">
        
        <main class="flex-1">
            <?php 
                $per_page = 4; // Increased to 4 for a balanced grid
                if(isset($_GET['page'])){
                    $page = $_GET['page'];  
                } else { 
                    $page = 1;
                }
                $start_form = ($page - 1) * $per_page;

                $query = "SELECT * FROM tbl_post LIMIT $start_form, $per_page";
                $post = $db->select($query);
                
                if($post){
            ?>
            
            <div class="w-full mx-auto grid  grid-cols-1 md:grid-cols-2 gap-6">
                <?php while($result = $post->fetch_assoc()){ ?>
                    <article class="group  rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col h-full overflow-hidden">
                        
                        <div class="relative h-48 overflow-hidden">
                            <a href="post.php?id=<?php echo $result['id'] ?>">
                                <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                     src="admin/<?php echo $result['image']?>" alt="post image"/>
                            </a>
                            <div class="absolute top-3 left-3">
                                <span class="bg-[#FF4B2B] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter shadow-lg">
                                    <?php echo $result['author'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex items-center text-[11px] text-gray-400 mb-2 gap-2 uppercase font-semibold">
                                <i class="fa fa-calendar-o text-[#FF4B2B]"></i>
                                <?php echo $fm->formaDate($result['date'] ) ?>
                            </div>

                            <h2 class="text-lg font-bold text-gray-800 leading-snug group-hover:text-[#FF4B2B] transition-colors mb-3">
                                <a href="post.php?id=<?php echo $result['id'] ?>">
                                    <?php echo $fm->textShroten($result['title'], 50) ?>
                                </a>
                            </h2>

                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-4">
                                <?php echo $fm->textShroten($result['body'], 100) ?>
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-50 flex justify-between items-center">
                                <a href="post.php?id=<?php echo $result['id'] ?>" class="text-[11px] font-black uppercase text-gray-400 group-hover:text-[#FF4B2B] flex items-center gap-1 transition-all">
                                    Read Post <i class="fa fa-long-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>

            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-1 bg-white p-2 rounded-xl shadow-sm border border-gray-100">
                    <?php 
                        $query = "SELECT * FROM tbl_post";
                        $res = $db->select($query);
                        $total_rows = mysqli_num_rows($res);
                        $total_pages = ceil($total_rows / $per_page);

                        $prev = $page - 1;
                        if($page > 1) echo "<a href='index.php?page=$prev' class='p-2 hover:bg-gray-100 rounded-lg transition-colors'><i class='fa fa-angle-left'></i></a>";

                        for($i = 1; $i <= $total_pages; $i++){
                            $active = ($i == $page) ? 'bg-[#FF4B2B] text-white' : 'text-gray-600 hover:bg-gray-50';
                            echo "<a href='index.php?page=$i' class='w-9 h-9 flex items-center justify-center rounded-lg text-xs font-bold transition-all $active'>$i</a>";
                        }

                        $next = $page + 1;
                        if($page < $total_pages) echo "<a href='index.php?page=$next' class='p-2 hover:bg-gray-100 rounded-lg transition-colors'><i class='fa fa-angle-right'></i></a>";
                    ?>
                </nav>
            </div>

            <?php } else { echo "<script>window.location = '404.php'; </script>"; } ?>
        </main>

        <aside class="w-full lg:w-72">
            <div class="sticky top-28 space-y-8">
                <?php include 'inc/sidebar.php' ?>
            </div>
        </aside>

    </div>
</div>

<?php include 'inc/footer.php' ?>