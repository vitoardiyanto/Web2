<footer class="text-white py-4 tembus nunito">
    <div class="container text-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt"></i> Jln Palem Ganda Asri 2 Cluster AA Blok E No. 5</li>
                    <li><i class="bi bi-telephone"></i> 087877330851</li>
                    <li><i class="bi bi-globe-americas"></i> warungemak.com</li>
                </ul>
                <a class="btn text-white" data-bs-toggle="modal"
                    data-bs-target="#popup1"><i class="bi bi-facebook"></i></a>
                <a class="btn text-white" target="_blank"
                    href="https://www.instagram.com/warungemak?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="bi bi-instagram"></i></a>
                <a class="btn text-white" data-bs-toggle="modal"
                    data-bs-target="#popup1"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
        <hr class="bg-secondary">
        <div>
            <p class="mb-0">© 2024 Warung Emak. All Rights Reserved.</p>
        </div>
    </div>
</footer>



<script>
    AOS.init({
        easing: 'ease-in-out-sine',
        once: true // Animasi hanya dijalankan sekali saat scroll
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('loaded');
    });

    window.addEventListener('pageshow', function() {
        document.body.classList.add('loaded');
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<script>
    
     $(document).ready(function() {
         // Menghapus pesan setelah 3 detik
         setTimeout(function() {
             $('#flash-success').fadeOut('slow');
             $('#flash-error').fadeOut('slow');
         }, 3000); // 3000ms = 3 detik
     });
 </script>


<script>
    document.querySelectorAll('.dropdown-toggle').forEach(function (dropdown) {
    dropdown.addEventListener('shown.bs.dropdown', function (event) {
        const menu = dropdown.parentElement.querySelector('.dropdown-menu');
        const rect = dropdown.getBoundingClientRect();
        
        menu.style.left = `${rect.left}px`;
        menu.style.top = `${rect.bottom}px`;
        menu.style.position = 'absolute';
    });
});
</script>



</body>

</html>