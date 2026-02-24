<?php 
include 'header.php';
?>

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

  .register-wrapper {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 16px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
  }

  .register-card {
    width: 100%;
    max-width: 680px;
    background: var(--white);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(160,90,98,0.12), 0 4px 16px rgba(160,90,98,0.08);
    animation: fadeUp .8s ease both;
  }

  /* Banner Atas */
  .register-card-banner {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #f5d5d8 0%, #e8b4b8 40%, #c9848a 75%, #a05a62 100%);
    padding: 36px 40px 32px;
    text-align: center;
  }

  .register-card-banner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 70% 60% at 80% 20%, rgba(201,169,110,0.25) 0%, transparent 70%);
    pointer-events: none;
  }

  .deco-circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.2);
    pointer-events: none;
  }
  .deco-circle:nth-child(1) { width:200px; height:200px; top:-60px; right:-50px; }
  .deco-circle:nth-child(2) { width:120px; height:120px; bottom:-30px; left:-30px; border-color: rgba(201,169,110,0.3); }

  .banner-icon {
    font-size: 2.5rem;
    display: block;
    margin-bottom: 8px;
    position: relative;
    animation: float 4s ease-in-out infinite;
    filter: drop-shadow(0 4px 10px rgba(0,0,0,0.15));
  }

  .banner-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--white);
    letter-spacing: 0.04em;
    position: relative;
    text-shadow: 0 2px 10px rgba(0,0,0,0.12);
  }

  .banner-sub {
    font-size: 0.72rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.75);
    font-weight: 300;
    margin-top: 5px;
    position: relative;
  }

  /* Card Body */
  .register-card-body {
    padding: 40px 40px 36px;
  }

  .register-heading {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.7rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 4px;
  }

  .register-sub {
    font-size: 0.75rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--text-soft);
    font-weight: 300;
    margin-bottom: 30px;
  }

  .divider-gold {
    width: 50px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
    margin: 0 0 28px 0;
  }

  .field-group {
    margin-bottom: 18px;
  }

  .field-group label {
    display: block;
    font-size: 0.7rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--text-mid);
    font-weight: 500;
    margin-bottom: 7px;
    font-family: 'Jost', sans-serif;
  }

  .field-group input.form-control {
    width: 100% !important;
    padding: 12px 16px !important;
    background: var(--cream) !important;
    border: 1px solid rgba(201,132,138,0.25) !important;
    border-radius: 4px !important;
    font-family: 'Jost', sans-serif !important;
    font-size: 0.9rem !important;
    color: var(--text-dark) !important;
    outline: none !important;
    box-shadow: none !important;
    transition: border-color .25s, box-shadow .25s !important;
    height: auto !important;
  }

  .field-group input.form-control::placeholder {
    color: var(--text-soft);
    font-weight: 300;
  }

  .field-group input.form-control:focus {
    border-color: var(--rose) !important;
    box-shadow: 0 0 0 3px rgba(201,132,138,0.12) !important;
    background: var(--white) !important;
  }

  .section-label {
    font-size: 0.68rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--gold);
    font-weight: 500;
    margin-bottom: 14px;
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(201,169,110,0.25);
  }

  .btn-register-submit {
    width: 100%;
    padding: 14px;
    margin-top: 10px;
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
    color: var(--white);
    border: none;
    border-radius: 4px;
    font-family: 'Jost', sans-serif;
    font-size: 0.82rem;
    font-weight: 500;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    cursor: pointer;
    transition: opacity .25s, transform .2s, box-shadow .25s;
    box-shadow: 0 6px 20px rgba(160,90,98,0.28);
  }

  .btn-register-submit:hover {
    opacity: 0.9;
    transform: translateY(-1px);
    box-shadow: 0 10px 26px rgba(160,90,98,0.35);
  }

  .btn-register-submit:active { transform: translateY(0); }

  .gold-accent {
    margin-top: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: var(--gold);
    font-size: 0.68rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    opacity: 0.65;
    font-family: 'Jost', sans-serif;
  }

  .gold-accent::before, .gold-accent::after {
    content: '';
    width: 24px;
    height: 1px;
    background: var(--gold-light);
  }

  @keyframes fadeUp {
    from { opacity:0; transform: translateY(24px); }
    to   { opacity:1; transform: translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-7px); }
  }
</style>

<div class="register-wrapper">
  <div class="register-card">

    <!-- BANNER ATAS -->
    <div class="register-card-banner">
      <div class="deco-circle"></div>
      <div class="deco-circle"></div>
      <span class="banner-icon">🎂</span>
      <div class="banner-title">HIMASI-CAKE BAKERY</div>
      <div class="banner-sub">Crafted with love &amp; passion</div>
    </div>

    <!-- FORM -->
    <div class="register-card-body">
      <h2 class="register-heading">Buat Akun Baru</h2>
      <p class="register-sub">Daftarkan diri Anda sekarang</p>
      <div class="divider-gold"></div>

      <form action="proses/register.php" method="POST">

        <p class="section-label">Informasi Pribadi</p>
        <div class="row">
          <div class="col-md-6">
            <div class="field-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="field-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-group">
              <label for="telp">No Telp</label>
              <input type="text" class="form-control" id="telp" placeholder="+62" name="telp" required>
            </div>
          </div>
        </div>

        <p class="section-label">Keamanan Akun</p>
        <div class="row">
          <div class="col-md-6">
            <div class="field-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-group">
              <label for="konfirmasi">Konfirmasi Password</label>
              <input type="password" class="form-control" id="konfirmasi" placeholder="Konfirmasi Password" name="konfirmasi" required>
            </div>
          </div>
        </div>

        <button type="submit" class="btn-register-submit">Daftar Sekarang</button>
      </form>

      <div class="gold-accent">Bakery Premium</div>
    </div>

  </div>
</div>

<?php 
include 'footer.php';
?>