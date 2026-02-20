<?php include 'inc/header.php'; ?>

<div class="contentsection contemplete clear py-10 max-w-[958px] mx-auto px-4">
    
    <div class="maincontent clear bg-white p-8 rounded-[25px] shadow-xl border-t-[6px] border-[#3498db]">
        <div class="about">
            
            <div class="mb-8 relative">
                <h2 class="text-3xl font-black text-[#2c3e50] uppercase tracking-tight italic">Contact Us</h2>
                <span class="absolute -bottom-2 left-0 w-16 h-1.5 bg-[#3498db] rounded-full shadow-[0_0_10px_#3498db]"></span>
            </div>

            <?php if (isset($msg)){ ?>
                <div class="bg-blue-50 text-blue-700 px-4 py-4 rounded-xl mb-8 border-l-4 border-blue-500 text-sm font-bold flex items-center gap-3 shadow-sm">
                    <i class="fa fa-info-circle text-lg"></i> <?php echo $msg; ?>
                </div>
            <?php } ?>

            <form action="" method="post" class="contact-form">
                <table class="w-full border-separate border-spacing-y-4">
                    <tr>
                        <td class="w-1/4 text-xs font-black text-[#34495e] uppercase tracking-[0.2em]">First Name</td>
                        <td>
                            <input type="text" name="firstname" placeholder="e.g. Mahfuj" 
                                   class="w-full px-5 py-4 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl focus:ring-4 focus:ring-[#3498db]/10 focus:border-[#3498db] outline-none text-sm transition-all text-gray-700 font-medium placeholder:opacity-50"/>
                            <?php if (isset($fname)) echo "<span class='text-red-500 text-[10px] font-black mt-2 block uppercase tracking-widest italic'>$fname</span>"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-xs font-black text-[#34495e] uppercase tracking-[0.2em]">Last Name</td>
                        <td>
                            <input type="text" name="lastname" placeholder="e.g. Ahmed" 
                                   class="w-full px-5 py-4 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl focus:ring-4 focus:ring-[#3498db]/10 focus:border-[#3498db] outline-none text-sm transition-all text-gray-700 font-medium placeholder:opacity-50"/>
                            <?php if (isset($lname)) echo "<span class='text-red-500 text-[10px] font-black mt-2 block uppercase tracking-widest italic'>$lname</span>"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-xs font-black text-[#34495e] uppercase tracking-[0.2em]">Email</td>
                        <td>
                            <input type="email" name="email" placeholder="example@mail.com" 
                                   class="w-full px-5 py-4 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl focus:ring-4 focus:ring-[#3498db]/10 focus:border-[#3498db] outline-none text-sm transition-all text-gray-700 font-medium placeholder:opacity-50"/>
                            <?php if (isset($emailErr)) echo "<span class='text-red-500 text-[10px] font-black mt-2 block uppercase tracking-widest italic'>$emailErr</span>"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-xs font-black text-[#34495e] uppercase tracking-[0.2em] align-top pt-5">Message</td>
                        <td>
                            <textarea name="body" placeholder="How can we help you?" 
                                      class="w-full px-5 py-4 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl focus:ring-4 focus:ring-[#3498db]/10 focus:border-[#3498db] outline-none text-sm h-40 resize-none transition-all text-gray-700 font-medium placeholder:opacity-50"></textarea>
                            <?php if (isset($bodyErr)) echo "<span class='text-red-500 text-[10px] font-black mt-2 block uppercase tracking-widest italic'>$bodyErr</span>"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="submit" 
                                    class="bg-[#2c3e50] hover:bg-[#3498db] text-white px-10 py-4 rounded-full font-black text-[11px] uppercase tracking-[0.3em] transition-all shadow-xl hover:shadow-[#3498db]/30 active:scale-95 flex items-center gap-3">
                                Send Message <i class="fa fa-paper-plane"></i>
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>