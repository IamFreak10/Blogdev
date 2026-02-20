<?php include 'inc/header.php'; ?>

<div class="bg-white contentsection contemplete clear py-10 flex flex-col md:flex-row gap-8 max-w-[958px] mx-auto px-4">
    
    <?php  
    if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
        echo "<script>window.location = 'index.php'; </script>";  
    } else {
       $pageid = $_GET['pageid'];
    }
    ?>

    <main class="main-area flex-1">
        <?php
            $pagequery = "SELECT * FROM tbl_page WHERE id = '$pageid'";
            $detailspage = $db->select($pagequery);
            if ($detailspage) {
                while ($result = $detailspage->fetch_assoc()){ ?>  

            <div class="bg-white rounded-[25px] p-8 shadow-xl border-t-[6px] border-[#FF4B2B] transition-all duration-300 hover:shadow-2xl">
                <div class="about">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="h-10 w-2 bg-[#FF4B2B] rounded-full shadow-[0_0_10px_#FF4B2B]"></div>
                        <h2 class="text-3xl font-extrabold text-[#1e293b] tracking-tight uppercase">
                            <?php echo $result['name']; ?>
                        </h2>
                    </div>
                    
                    <div class="text-gray-600 text-lg leading-relaxed space-y-4">
                        <?php echo $result['body']; ?>
                    </div>
                </div>
            </div>

        <?php } } else { echo "<script>window.location = '404.php'; </script>"; } ?>
    </main>

    <aside class="w-full md:w-[300px]">
        <div class="sticky top-24">
            <?php include 'inc/sidebar.php'; ?>
        </div>
    </aside>

</div>

<?php include 'inc/footer.php'; ?>