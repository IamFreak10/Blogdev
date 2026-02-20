<footer class="bg-gray-900 text-gray-300 py-12 px-6 border-t-4 border-cyan-500 relative overflow-hidden">
    
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-1/2 h-1 bg-cyan-500 blur-2xl opacity-50"></div>

    <div class="max-w-6xl mx-auto flex flex-col items-center">
        
        <nav class="footermenu mb-8">
            <ul class="flex flex-wrap justify-center gap-8">
                <li><a href="#" class="hover:text-cyan-400 transition-all duration-300 uppercase tracking-widest text-sm font-semibold hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)]">Home</a></li>
                <li><a href="#" class="hover:text-cyan-400 transition-all duration-300 uppercase tracking-widest text-sm font-semibold hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)]">About</a></li>
                <li><a href="#" class="hover:text-cyan-400 transition-all duration-300 uppercase tracking-widest text-sm font-semibold hover:drop-shadow-[0_0_8px_rgba(34,211,238,0.8)]">Contact</a></li>
                <li><a href="#" class="hover:text-cyan-400 transition-all duration-300 uppercase tracking-widest text-sm font-semibold hover:drop-shadow-[0_0_8_rgba(34,211,238,0.8)]">Privacy</a></li>
            </ul>
        </nav>

        <div class="text-center opacity-70">
            <?php
            $query = "SELECT * FROM tbl_footer WHERE id=1";
            $footerNote = $db->select($query);
            if ($footerNote) {
                while ($result = $footerNote->fetch_assoc()){
            ?>  
                <p class="text-sm tracking-tight italic">
                    &copy; <?php echo $result['note'] ?> - <?php echo date('Y'); ?> | All Rights Reserved.
                </p>
            <?php } } ?>  
        </div>
    </div>
</footer>

<div class="fixedicon fixed right-0 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-1">
    <a href="http://facebook.com" class="group bg-gray-800 p-3 rounded-l-lg border-l-2 border-blue-600 transition-all duration-500 hover:pr-8 hover:bg-blue-600">
        <img src="images/fb.png" alt="FB" class="w-6 h-6 grayscale group-hover:grayscale-0 transition-all duration-300" />
    </a>
    <a href="http://twitter.com" class="group bg-gray-800 p-3 rounded-l-lg border-l-2 border-sky-400 transition-all duration-500 hover:pr-8 hover:bg-sky-400">
        <img src="images/tw.png" alt="TW" class="w-6 h-6 grayscale group-hover:grayscale-0 transition-all duration-300" />
    </a>
    <a href="http://linkedin.com" class="group bg-gray-800 p-3 rounded-l-lg border-l-2 border-blue-700 transition-all duration-500 hover:pr-8 hover:bg-blue-700">
        <img src="images/in.png" alt="IN" class="w-6 h-6 grayscale group-hover:grayscale-0 transition-all duration-300" />
    </a>
</div>

<script type="text/javascript" src="js/scrolltop.js"></script>