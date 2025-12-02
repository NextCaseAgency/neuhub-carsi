<footer id="footer">
    @php
        $settings = \Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting::find(1);
    @endphp
    <div class="footer p-5">
        <div class="container">
            <div class="footer-logo">
                <img src="{{asset('img/footerLogo.png')}}" alt="" />
            </div>
            <p class="footer-text">
             {{$footer[16]['data']['address']}}
            </p>
            <p class="footer-number"> {{$footer[16]['data']['phone']}}</p>
            <p class="footer-mail">{{$footer[16]['data']['email']}}</p>

            <div class="footer-social-links">
                <div class="footer-social-link">
                    <a href="{{$settings['social_network']['facebook']}}"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <div class="footer-social-link">
                    <a href="{{$settings['social_network']['instagram']}}"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="footer-social-link">
                    <a href="{{$settings['social_network']['youtube']}}"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-end p-3">
        <p class="footer-end-p1">
            {{$footer[16]['data']['cookie_text']}}
        </p>
        <p class="footer-end-p2">
            {!! __('page.cookie_policy') !!}
        </p>

        <a href="https://nextcase.agency/" target="_blank"
           style="display: flex; justify-content: center;"
           class="footer-end-a">
            Nextcase Agency
        </a>
    </div>
</footer>
<!-- footer end -->

<!-- bootsrap js -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!-- app js -->
<script src="public/js/app.js"></script>
<!-- swiper js  -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="public/js/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@if(isset($settings['more_configs']['footer']))
    {!! $settings['more_configs']['footer'] !!}
@endif
@stack('js')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('videoModal');
        const iframe = document.getElementById('videoIframe');
        const closeBtn = document.querySelector('.close-transport');
        const items = document.querySelectorAll('.transport-header-right-item');

        items.forEach(item => {
            item.addEventListener('click', function() {
                const videoSrc = this.getAttribute('data-video');
                iframe.src = videoSrc;
                modal.style.display = 'block';
            });
        });

        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            iframe.src = '';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                iframe.src = '';
            }
        });
    });

</script>
<script>
    const heroListSwiper = new Swiper('.hero-list', {
        loop: true,
        effect: 'fade',
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    const heroTextListSwiper = new Swiper('.hero-text-list', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    heroListSwiper.controller.control = heroTextListSwiper;
    heroTextListSwiper.controller.control = heroListSwiper;
</script>

<!-- Tanıtım Flimi  -->
<script>
    document.getElementById('play-video').addEventListener('click', function (event) {
        event.preventDefault();

        // Video URL ve Modal
        const videoUrl = this.href.replace("watch?v=", "embed/");
        const modal = document.getElementById("tanitimFlim-modal");
        const videoFrame = document.getElementById("tanitimFlim-video");

        // Videoyu modal içine yerleştir
        videoFrame.src = videoUrl + "?autoplay=1";

        // Modalı aç ve display'i flex yap
        modal.style.display = "flex";
    });

    // Modalı kapatma
    document.querySelector('.tanitimFlim-close').addEventListener('click', function () {
        const modal = document.getElementById("tanitimFlim-modal");
        const videoFrame = document.getElementById("tanitimFlim-video");

        modal.style.display = "none";
        videoFrame.src = "";
    });

    // Modal dışına tıklayınca kapatma
    window.addEventListener('click', function (event) {
        const modal = document.getElementById("tanitimFlim-modal");
        if (event.target === modal) {
            const videoFrame = document.getElementById("tanitimFlim-video");
            modal.style.display = "none";
            videoFrame.src = "";
        }
    });
</script>
<script>
    // Modal ve iframe elementleri
    const modal = document.getElementById('transport-header-right-modal');
    const videoFrame = document.getElementById('transport-header-right-video-frame');
    const closeButton = document.querySelector('.transport-header-right-close');

    // Transport itemlere tıklama olayları
    document.querySelectorAll('.transport-header-right-item').forEach(item => {
        item.addEventListener('click', function() {
            // Tıklanan divin data-video değerini al ve iframe src'sini güncelle
            const videoUrl = this.getAttribute('data-video');
            videoFrame.src = videoUrl;

            // Modalı göster (display: flex ile)
            modal.style.display = 'flex';
        });
    });

    // Modalı kapatma
    closeButton.onclick = function() {
        modal.style.display = 'none';
        videoFrame.src = '';  // Videoyu durdurmak için src'yi boşalt
    }

    // Modal dışında bir yere tıklayınca kapatma
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
            videoFrame.src = '';  // Videoyu durdurmak için src'yi boşalt
        }
    }
</script>
</body>
</html>
