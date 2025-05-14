   <!-- Script tag -->
   <script src="{{ asset('assets/web/js/jquery-3.6.0.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
       integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
   </script>
   <script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="{{ asset('assets/web/js/main.js') }}"></script>

   <!-- Include Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script>
       document.addEventListener("DOMContentLoaded", function() {
           new Swiper(".mySwiper", {
               slidesPerView: 1,
               spaceBetween: 20,
               loop: true,
               autoplay: {
                   delay: 3000,
                   disableOnInteraction: false,
               },
               navigation: {
                   nextEl: ".swiper-button-next",
                   prevEl: ".swiper-button-prev",
               },
               pagination: {
                   el: ".swiper-pagination",
                   clickable: true,
               },
               breakpoints: {
                   576: {
                       slidesPerView: 1
                   },
                   768: {
                       slidesPerView: 2
                   },
                   992: {
                       slidesPerView: 3
                   },
                   1200: {
                       slidesPerView: 4
                   }
               }
           });
       });
   </script>

   </body>

   </html>
