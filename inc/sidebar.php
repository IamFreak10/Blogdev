<div class="sidebar flex flex-col gap-12"> <div class="samesidebar group">
        <div class="flex items-baseline justify-between mb-8">
            <h2 class="text-[11px] uppercase tracking-[0.3em] font-black text-gray-400 group-hover:text-[#FF4B2B] transition-colors duration-500">
                Explore Categories
            </h2>
            <div class="h-[1px] flex-1 ml-4 bg-gray-100 group-hover:bg-[#FF4B2B]/20 transition-colors duration-500"></div>
        </div>
        
        <ul class="flex flex-wrap gap-2"> <?php
            $query = "SELECT * FROM tbl_category";
            $category = $db->select($query);
            if ($category) {
                while($result = $category->fetch_assoc()) { ?>
                <li>
                    <a href="posts.php?category=<?php echo $result['id'] ?>" 
                       class="inline-block px-5 py-2.5 rounded-full border border-gray-100 text-sm font-semibold text-gray-600 hover:border-[#FF4B2B] hover:text-[#FF4B2B] hover:bg-[#FF4B2B]/5 transition-all duration-300">
                        <?php echo $result['name']; ?>
                    </a>
                </li>
            <?php } } ?>      
        </ul>
    </div>

    <div class="samesidebar">
        <div class="flex items-baseline justify-between mb-10">
            <h2 class="text-[11px] uppercase tracking-[0.3em] font-black text-gray-400">
                Latest Readings
            </h2>
            <div class="h-[1px] flex-1 ml-4 bg-gray-100"></div>
        </div>
        
        <div class="flex flex-col gap-10"> <?php
            $query = "SELECT * FROM tbl_post limit 4";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){ ?>
                <div class="popular group flex flex-col gap-4">
                    <div class="relative overflow-hidden rounded-2xl bg-gray-100 aspect-[16/9]">
                        <a href="post.php?id=<?php echo $result['id'] ?>">
                            <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" 
                                 src="admin/<?php echo $result['image']?>" alt="post image"/>
                        </a>
                    </div>
                    
                    <div class="px-1">
                        <span class="text-[10px] font-bold text-[#FF4B2B] uppercase tracking-widest mb-2 block">
                            <?php echo $fm->formaDate($result['date']) ?>
                        </span>
                        <h3 class="text-lg font-bold text-gray-800 leading-tight group-hover:text-gray-600 transition-colors">
                            <a href="post.php?id=<?php echo $result['id'] ?>">
                                <?php echo $result['title']; ?>
                            </a>
                        </h3>
                        <p class="mt-3 text-sm text-gray-400 leading-relaxed line-clamp-2 italic">
                             <?php echo $fm->textShroten($result['body'], 80); ?>
                        </p>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>

</div>