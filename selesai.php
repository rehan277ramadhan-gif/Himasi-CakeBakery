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

  .success-section {
    padding: 80px 0 160px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
    min-height: 70vh;
    display: flex;
    align-items: center;
  }

  .success-card {
    max-width: 580px;
    margin: 0 auto;
    background: var(--white);
    border-radius: 8px;
    border: 1px solid rgba(201,132,138,0.12);
    box-shadow: 0 8px 40px rgba(160,90,98,0.12);
    overflow: hidden;
    animation: fadeUp .8s ease both;
    text-align: center;
  }

  /* TOP BANNER */
  .success-banner {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #f5d5d8 0%, #e8b4b8 40%, #c9848a 75%, #a05a62 100%);
    padding: 48px 40px 40px;
  }

  .success-banner::before {
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
  .deco-circle:nth-child(1) { width:180px; height:180px; top:-50px; right:-40px; }
  .deco-circle:nth-child(2) { width:100px; height:100px; bottom:-20px; left:20px; border-color:rgba(201,169,110,0.3); }

  .success-icon {
    font-size: 3.5rem;
    display: block;
    margin-bottom: 16px;
    position: relative;
    animation: float 3s ease-in-out infinite;
    filter: drop-shadow(0 4px 10px rgba(0,0,0,0.15));
  }

  .success-banner h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2rem;
    font-weight: 600;
    color: var(--white);
    letter-spacing: 0.04em;
    position: relative;
    text-shadow: 0 2px 10px rgba(0,0,0,0.12);
    margin: 0;
  }

  .success-banner .banner-sub {
    font-size: 0.72rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.72);
    font-weight: 300;
    margin-top: 8px;
    position: relative;
  }

  /* BODY */
  .success-body {
    padding: 40px 48px 44px;
  }

  .divider-gold {
    width: 60px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
    margin: 0 auto 28px;
  }

  .success-body p {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.15rem;
    font-style: italic;
    color: var(--text-mid);
    line-height: 1.8;
    margin-bottom: 32px;
  }

  .success-body p strong {
    font-style: normal;
    color: var(--rose-dark);
    font-weight: 600;
  }

  /* STEPS */
  .steps {
    display: flex;
    justify-content: center;
    gap: 28px;
    margin-bottom: 36px;
    flex-wrap: wrap;
  }

  .step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
  }

  .step-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--rose-light), var(--rose));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 4px 14px rgba(160,90,98,0.2);
  }

  .step-label {
    font-size: 0.68rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--text-soft);
    font-weight: 400;
  }

  .step-arrow {
    font-size: 1rem;
    color: var(--rose-light);
    align-self: flex-start;
    margin-top: 14px;
  }

  /* BUTTON */
  .btn-belanja-lagi {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 13px 32px;
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
    color: var(--white);
    border: none;
    border-radius: 4px;
    font-family: 'Jost', sans-serif;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    text-decoration: none;
    cursor: pointer;
    transition: opacity .25s, transform .2s, box-shadow .25s;
    box-shadow: 0 6px 20px rgba(160,90,98,0.28);
  }

  .btn-belanja-lagi:hover {
    opacity: 0.9;
    transform: translateY(-1px);
    box-shadow: 0 10px 26px rgba(160,90,98,0.35);
    color: var(--white);
    text-decoration: none;
  }

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
    opacity: 0.6;
  }
  .gold-accent::before, .gold-accent::after {
    content: '';
    width: 24px;
    height: 1px;
    background: var(--gold-light);
  }

  @keyframes fadeUp {
    from { opacity:0; transform:translateY(24px); }
    to   { opacity:1; transform:translateY(0); }
  }

  @keyframes float {
    0%, 100% { transform:translateY(0); }
    50%       { transform:translateY(-8px); }
  }
</style>

<div class="success-section">
  <div class="container">
    <div class="success-card">

      <!-- BANNER -->
      <div class="success-banner">
        <div class="deco-circle"></div>
        <div class="deco-circle"></div>
        <span class="success-icon">🎉</span>
        <h2>Checkout Berhasil!</h2>
        <p class="banner-sub">Terima kasih telah berbelanja</p>
      </div>

      <!-- BODY -->
      <div class="success-body">
        <div class="divider-gold"></div>

        <p>Terimakasih sudah berbelanja di <strong>Himasi-Cake Bakery</strong>.<br>
        Pesananmu sedang diproses, silahkan tunggu barangmu di rumah ya 🎂</p>

        <!-- STEPS -->
        <div class="steps">
          <div class="step-item">
            <div class="step-icon">✅</div>
            <span class="step-label">Order</span>
          </div>
          <div class="step-arrow">›</div>
          <div class="step-item">
            <div class="step-icon">📦</div>
            <span class="step-label">Diproses</span>
          </div>
          <div class="step-arrow">›</div>
          <div class="step-item">
            <div class="step-icon">🚚</div>
            <span class="step-label">Dikirim</span>
          </div>
          <div class="step-arrow">›</div>
          <div class="step-item">
            <div class="step-icon">🏠</div>
            <span class="step-label">Diterima</span>
          </div>
        </div>

        <a href="index.php" class="btn-belanja-lagi">🛍 Belanja Lagi</a>

        <div class="gold-accent">Bakery Premium</div>
      </div>

    </div>
  </div>
</div>

<?php 
	include 'footer.php';
?>