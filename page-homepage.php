<?php 
/* Template Name: Page Homepage */ 

get_header(); ?>

<section id="hero-image" class="home-section home-section--hero-image">
  <div class="grid">
    <div class="grid__row">
      <div class="col d-flex home-section__col-6 home-section__offset-5 align-items-center vh-100">
        <div class="home-section__text-container">
          <h1 class="home-section__heading-one">Enabling merchants to sell and earn more.</h1>

          <p class="home-section__paragraph">UMKM adalah tonggak utama ekonomi Indonesia. Kami hadir untuk memberikan solusi bagi seluruh UMKM Indonesia untuk menjual dan untung lebih.</p>

          <img loading="lazy" src="<?php echo get_template_directory_uri() ?>/assets/img/member-of-fazzfinancial-group.svg" alt="member of fazzfinancial group">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="payment" class="home-section home-section--payment">
  <div class="grid">
    <div class="grid__row justify-content-center">
      <div class="col d-flex home-section__col-6 align-items-center vh-100">
        <div class="home-section__text-container text-center">
          <p class="home-section__title-product text-color--payfazz-blue">Payfazz Agen</p>

          <h1 class="home-section__heading-one">Terima segala pembayaran.</h1>

          <p class="home-section__paragraph">Terima pembayaran tanpa ribet. Tidak perlu repot untuk uang kembalian, dan tarik dana keuntungan dalam hitungan menit.</p>

          <a class="button button--payfazz-blue">PELAJARI LEBIH</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="capital" class="home-section home-section--capital">
  <div class="grid">
    <div class="grid__row">
      <div class="col d-flex home-section__col-6 align-items-center vh-100">
        <div class="home-section__text-container">
          <p class="home-section__title-product text-color--payfazz-blue">Payfazz Agen</p>

          <h1 class="home-section__heading-one">Modal usaha dengan pembayaran ringan.</h1>

          <p class="home-section__paragraph">Semua orang dapat memulai usaha tanpa pusing mengenai modal usaha dengan pendaftaran yang mudah. Usaha daganan kelontong juga dapat tetap berjalan lancar dengan “Buy Now Pay Later”.</p>

          <a class="button button--payfazz-blue">PELAJARI LEBIH</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="cash" class="home-section home-section--cash">
  <div class="grid">
    <div class="grid__row">
      <div class="col d-flex home-section__col-6 home-section__offset-5 align-items-center vh-100">
        <div class="home-section__text-container">
          <p class="home-section__title-product text-color--yellow">Payfazz Master Agen</p>

          <h1 class="home-section__heading-one">Pelayanan Tarik dan setor tunai.</h1>

          <p class="home-section__paragraph">Sekarang semua agen dapat melayani pelanggan untuk kebutuhan keuangan mereka seperti tarik, setor, tabung, dan transfer.</p>

          <a class="button button--payfazz-blue">PELAJARI LEBIH</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="loyalty" class="home-section home-section--loyalty">
  <div class="grid">
    <div class="grid__row">
      <div class="col d-flex home-section__col-6 align-items-center vh-100">
        <div class="home-section__text-container">
          <p class="home-section__title-product text-color--green">Payfazz Mobile</p>

          <h1 class="home-section__heading-one">Program loyalti dan promo untuk pelanggan.</h1>

          <p class="home-section__paragraph">Buat pelanggan kamu puas dengan menawarkan program loyalti dan promo. Pelanggan puas, usaha lancar.</p>

          <a class="button button--payfazz-blue">PELAJARI LEBIH</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="product" class="home-section home-section--product">
  <div class="grid">
    <div class="grid__row">
      <div class="grid__col d-flex home-section__col-6 home-section__offset-5 align-items-end vh-100">
        <div class="home-section__text-container">
          <h1 class="home-section__heading-one">Produk PAYFAZZ</h1>

          <p class="home-section__paragraph">Kami membantu usaha berjalan lebih cepat dan besar. Milai dari menyediakan servis finansial, barang dagangan grosir, hingga servis pelanggan. Kami ada untuk kamu.</p>

          <a class="button button--payfazz-blue button--home-product">PELAJARI LEBIH</a>
        </div>
      </div>
    </div>
</section>

<div class="product-navigation d-flex align-items-center">
  <ul class="product-navigation__list">
    <li class="product-navigation__list-item" id="trigger-hero-image">
      <a class="product-navigation__link">
        <!--<span class="product-navigation__text">Intro</span>-->
      </a>
    </li>

    <li class="product-navigation__list-item" id="trigger-payment">
      <a class="product-navigation__link">
        <!--<span class="product-navigation__text">Intro</span>-->
      </a>
    </li>

    <li class="product-navigation__list-item" id="trigger-capital">
      <a class="product-navigation__link">
        <!--<span class="product-navigation__text">Intro</span>-->
      </a>
    </li>

    <li class="product-navigation__list-item" id="trigger-cash">
      <a class="product-navigation__link">
        <!--<span class="product-navigation__text">Intro</span>-->
      </a>
    </li>

    <li class="product-navigation__list-item" id="trigger-loyalty">
      <a class="product-navigation__link">
        <!--<span class="product-navigation__text">Intro</span>-->
      </a>
    </li>
  </ul>
</div>

<?php get_footer(); ?>

