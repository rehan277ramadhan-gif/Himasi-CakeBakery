<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

  :root {
    --rose:       #c9848a;
    --rose-light: #e8b4b8;
    --rose-dark:  #a05a62;
    --gold:       #c9a96e;
    --gold-light: #e8d5b0;
    --cream:      #fdf6f0;
    --white:      #ffffff;
    --text-dark:  #3b2a2c;
    --text-mid:   #7a5c60;
    --text-soft:  #b0888c;
  }

  .footer-main {
    background: linear-gradient(135deg, #3b2a2c 0%, #5a3a3e 100%);
    border-top: 4px solid var(--rose);
    padding: 60px 0 44px;
    font-family: 'Jost', sans-serif;
  }

  .footer-brand h3 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.6rem; font-weight: 600;
    color: var(--rose-light);
    letter-spacing: 0.06em; margin-bottom: 14px;
  }

  .footer-brand .footer-desc {
    font-size: 0.85rem;
    color: rgba(255,255,255,0.55);
    line-height: 1.85; margin-bottom: 20px;
    max-width: 260px;
  }

  .divider-gold {
    width: 50px; height: 1px;
    background: linear-gradient(90deg, var(--gold), transparent);
    margin-bottom: 20px;
  }

  .footer-contact p {
    font-size: 0.84rem;
    color: rgba(255,255,255,0.65);
    line-height: 1.7; margin-bottom: 8px;
    display: flex; align-items: flex-start; gap: 10px;
  }

  .footer-contact .glyphicon {
    color: var(--gold); font-size: 0.85rem;
    margin-top: 3px; flex-shrink: 0;
  }

  .footer-menu h5 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.2rem; font-weight: 600;
    color: var(--rose-light);
    letter-spacing: 0.08em; margin-bottom: 14px;
  }

  .footer-menu ul { list-style: none; padding: 0; margin: 0; }
  .footer-menu ul li { margin-bottom: 10px; }
  .footer-menu ul li a {
    font-size: 0.84rem;
    color: rgba(255,255,255,0.58);
    text-decoration: none; letter-spacing: 0.06em;
    transition: color .25s, padding-left .25s;
    display: inline-flex; align-items: center; gap: 7px;
  }
  .footer-menu ul li a::before {
    content: '›'; color: var(--gold);
    font-size: 1rem; transition: transform .2s;
  }
  .footer-menu ul li a:hover {
    color: var(--rose-light); padding-left: 5px; text-decoration: none;
  }
  .footer-menu ul li a:hover::before { transform: translateX(3px); }

  .footer-tagline {
    text-align: center; padding-top: 8px;
  }
  .footer-tagline .icon {
    font-size: 2.4rem; display: block;
    margin-bottom: 14px; opacity: 0.75;
  }
  .footer-tagline blockquote {
    font-family: 'Cormorant Garamond', serif;
    font-style: italic; font-size: 1.05rem;
    color: rgba(255,255,255,0.5);
    line-height: 1.75; border: none;
    padding: 0; margin: 0 auto;
    max-width: 210px;
  }
  .footer-tagline .footer-badge {
    display: inline-block; margin-top: 18px;
    padding: 5px 16px;
    border: 1px solid rgba(201,132,138,0.3);
    border-radius: 20px;
    font-size: 0.72rem; letter-spacing: 0.12em;
    text-transform: uppercase; color: rgba(255,255,255,0.35);
  }

  .footer-separator {
    border: none;
    border-top: 1px solid rgba(201,132,138,0.15);
    margin: 40px 0 0;
  }

  .footer-copy {
    background: rgba(0,0,0,0.3);
    padding: 14px 0;
    text-align: center;
    font-family: 'Jost', sans-serif;
    font-size: 0.76rem; letter-spacing: 0.1em;
    color: rgba(255,255,255,0.4);
  }
  .footer-copy span { color: var(--rose-light); }
</style>

<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">

        <!-- BRAND & KONTAK -->
        <div class="col-md-4 footer-brand">
          <h3>HIMASI-CAKE BAKERY</h3>
          <div class="divider-gold"></div>
          <p class="footer-desc">Pelopor bakery modern Indonesia sejak 1978. Menyajikan produk sehat, bergizi, dan terjangkau untuk semua kalangan.</p>
          <div class="footer-contact">
            <p><i class="glyphicon glyphicon-map-marker"></i> Jl. Tanah Merah Indah 1 No.10C</p>
            <p><i class="glyphicon glyphicon-earphone"></i> +6287804616097</p>
            <p><i class="glyphicon glyphicon-envelope"></i> o-cake@gmail.com</p>
          </div>
        </div>

        <!-- MENU -->
        <div class="col-md-4 footer-menu">
          <h5>Menu</h5>
          <div class="divider-gold"></div>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="about.php">Tentang Kami</a></li>
            <li><a href="about.php">Hubungi Kami</a></li>
          </ul>
        </div>

        <!-- TAGLINE -->
        <div class="col-md-4 footer-tagline">
          <span class="icon">🎂</span>
          <blockquote>"Crafted with love &amp; passion since 1978"</blockquote>
          <span class="footer-badge">PT. Mustika Citra Rasa</span>
        </div>

      </div>
      <hr class="footer-separator">
    </div>
  </div>

  <!-- COPYRIGHT -->
  <div class="footer-copy">
    Copyright &copy; 2026 <span>HIMASI-CAKE BAKERY</span> — All Rights Reserved
  </div>
</footer>
</body>
</html>