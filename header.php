<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'koneksi/koneksi.php';
if(isset($_SESSION['kd_cs'])){
	$kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Himasi-Cake Bakery</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/jpeg" href="image/home/images.jpg">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300&family=Jost:wght@300;400;500&display=swap" rel="stylesheet"/>
	<style>
		* { box-sizing: border-box; }
		html, body { overflow-x: hidden; max-width: 100%; }

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

		body { font-family: 'Jost', sans-serif; background: var(--cream); color: var(--text-dark); }

		/* TOP BAR - desktop only */
		.top-bar {
			background: linear-gradient(135deg, var(--rose-dark) 0%, var(--rose) 100%);
			padding: 7px 0; font-size: 0.85rem;
			letter-spacing: 0.08em; color: rgba(255,255,255,0.88);
		}
		.top-bar .container-fluid {
			display: flex; justify-content: space-between;
			align-items: center; flex-wrap: wrap; padding: 0 20px;
		}
		.top-bar span { display: flex; align-items: center; gap: 6px; }
		.top-bar .glyphicon { color: var(--gold-light); font-size: 0.8rem; }

		/* NAVBAR DESKTOP */
		.navbar-custom {
			background: rgba(253,246,240,0.97); border: none;
			border-bottom: 1px solid rgba(201,132,138,0.15);
			box-shadow: 0 2px 20px rgba(160,90,98,0.08);
			margin-bottom: 0; min-height: 65px;
		}
		.navbar-custom .navbar-brand {
			font-family: 'Cormorant Garamond', serif;
			font-size: 1.6rem; font-weight: 600;
			color: var(--rose-dark) !important;
			letter-spacing: 0.05em; padding: 15px 0;
		}
		.navbar-custom .navbar-brand:hover { color: var(--rose) !important; }
		.navbar-inner-wrap {
			display: flex; align-items: center;
			justify-content: space-between; height: 65px;
		}
		.navbar-col-left  { flex: 0 0 auto; }
		.navbar-col-center { flex: 1; max-width: 420px; margin: 0 30px; }
		.navbar-col-right  { flex: 0 0 auto; display: flex; align-items: center; gap: 5px; }

		.navbar-col-center form { margin: 0; }
		.navbar-col-center .input-group { display: flex; }
		.navbar-col-center input {
			border: 1.5px solid var(--rose-light);
			border-radius: 25px 0 0 25px;
			width: 100%; height: 38px; padding: 0 15px;
			font-size: 0.88rem; color: var(--text-dark);
			background: var(--cream); outline: none; box-shadow: none;
		}
		.navbar-col-center input:focus { border-color: var(--rose); }
		.navbar-col-center button {
			background: var(--rose); color: white; border: none;
			border-radius: 0 25px 25px 0; height: 38px;
			padding: 0 15px; cursor: pointer; transition: background .2s;
		}
		.navbar-col-center button:hover { background: var(--rose-dark); }

		.navbar-col-right a {
			color: var(--text-mid) !important; padding: 10px 10px;
			font-size: 0.95rem; position: relative;
			text-decoration: none; display: flex; align-items: center; gap: 4px;
		}
		.navbar-col-right a:hover { color: var(--rose-dark) !important; }
		.navbar-col-right .glyphicon-shopping-cart,
		.navbar-col-right .glyphicon-bell { color: var(--rose); font-size: 1.2rem; }
		.badge-notif {
			background: var(--rose-dark); color: white;
			border-radius: 50%; padding: 1px 6px; font-size: 0.72rem;
			position: absolute; top: 4px; right: 2px;
		}
		.navbar-col-right .dropdown { position: relative; }
		.navbar-col-right .dropdown-menu {
			position: absolute; right: 0; left: auto; top: 100%;
			border: 1px solid rgba(201,132,138,0.18); border-radius: 4px;
			box-shadow: 0 8px 28px rgba(160,90,98,0.12);
			background: var(--white); padding: 6px 0;
			min-width: 160px; z-index: 9999; display: none;
		}
		.navbar-col-right .dropdown.open .dropdown-menu { display: block; }
		.navbar-col-right .dropdown-menu li a {
			display: block; padding: 9px 18px; font-size: 0.9rem;
			color: var(--text-mid) !important; text-transform: uppercase;
			letter-spacing: 0.05em; white-space: nowrap;
		}
		.navbar-col-right .dropdown-menu li a:hover {
			background: rgba(201,132,138,0.07); color: var(--rose-dark) !important;
		}

		/* MENU BAR BAWAH - desktop only */
		.menu-bar {
			background: var(--white);
			border-bottom: 1px solid rgba(201,132,138,0.1);
			box-shadow: 0 1px 6px rgba(160,90,98,0.06);
		}
		.menu-bar ul {
			display: flex; justify-content: center;
			list-style: none; margin: 0; padding: 0; gap: 5px;
		}
		.menu-bar ul li a {
			display: block; padding: 10px 20px;
			font-size: 0.82rem; letter-spacing: 0.12em;
			text-transform: uppercase; color: var(--text-mid);
			text-decoration: none; transition: color .2s; position: relative;
		}
		.menu-bar ul li a::after {
			content: ''; position: absolute;
			bottom: 6px; left: 20px; right: 20px;
			height: 1px; background: var(--rose);
			transform: scaleX(0); transition: transform .25s;
		}
		.menu-bar ul li a:hover { color: var(--rose-dark); }
		.menu-bar ul li a:hover::after { transform: scaleX(1); }

		/* MOBILE NAVBAR */
		.mobile-navbar {
			display: none;
			background: rgba(253,246,240,0.97);
			border-bottom: 1px solid rgba(201,132,138,0.15);
			box-shadow: 0 2px 20px rgba(160,90,98,0.08);
			height: 60px; align-items: center;
			padding: 0 12px; gap: 10px;
			position: sticky; top: 0; z-index: 1050;
		}
		.mob-hamburger {
			background: var(--rose); border: none; border-radius: 8px;
			width: 38px; height: 38px;
			display: flex; align-items: center; justify-content: center;
			color: white; font-size: 1.1rem; cursor: pointer; flex-shrink: 0;
			transition: background .2s;
		}
		.mob-hamburger:hover { background: var(--rose-dark); }
		.mob-search-wrap { flex: 1; }
		.mob-search {
			display: flex; align-items: center;
			border: 1.5px solid var(--rose-light);
			border-radius: 25px; height: 36px;
			padding: 0 12px; background: var(--cream);
		}
		.mob-search input {
			background: transparent; border: none; outline: none;
			font-size: 0.85rem; color: var(--text-dark);
			width: 100%; font-family: 'Jost', sans-serif;
		}
		.mob-search input::placeholder { color: var(--text-soft); }
		.mob-search button {
			background: transparent; border: none;
			color: var(--rose); cursor: pointer; font-size: 0.85rem; padding: 0;
		}
		.mob-right { display: flex; align-items: center; gap: 6px; flex-shrink: 0; }
		.mob-icon {
			position: relative;
			background: rgba(201,132,138,0.1); border: none; border-radius: 50%;
			width: 36px; height: 36px;
			display: flex; align-items: center; justify-content: center;
			color: var(--rose-dark); font-size: 0.95rem;
			cursor: pointer; text-decoration: none; transition: background .2s;
		}
		.mob-icon:hover { background: rgba(201,132,138,0.2); color: var(--rose-dark); text-decoration: none; }
		.mob-badge {
			position: absolute; top: -2px; right: -2px;
			background: var(--rose-dark); color: white;
			border-radius: 50%; width: 17px; height: 17px;
			font-size: 0.6rem; font-weight: 700;
			display: flex; align-items: center; justify-content: center;
		}
		.mob-avatar {
			background: var(--rose); border-radius: 50%;
			width: 36px; height: 36px;
			display: flex; align-items: center; justify-content: center;
			color: white; font-size: 0.78rem; font-weight: 700;
			cursor: pointer; flex-shrink: 0; transition: background .2s;
		}
		.mob-avatar:hover { background: var(--rose-dark); }
		.mob-dropdown { position: relative; }
		.mob-dropdown-menu {
			display: none; position: absolute; right: 0; top: calc(100% + 8px);
			background: white; border-radius: 10px;
			box-shadow: 0 8px 28px rgba(160,90,98,0.15);
			min-width: 160px; z-index: 9999; overflow: hidden;
			border: 1px solid rgba(201,132,138,0.15);
		}
		.mob-dropdown.open .mob-dropdown-menu { display: block; }
		.mob-dropdown-menu a {
			display: block; padding: 10px 16px; font-size: 0.88rem;
			color: var(--text-mid); text-decoration: none; transition: background .2s;
		}
		.mob-dropdown-menu a:hover { background: rgba(201,132,138,0.08); color: var(--rose-dark); }
		.mob-notif-menu { min-width: 270px; }
		.mob-notif-item {
			display: block; padding: 10px 16px; font-size: 0.83rem;
			color: var(--text-mid); border-bottom: 1px solid rgba(201,132,138,0.08); cursor: pointer;
		}
		.mob-notif-item:hover { background: rgba(201,132,138,0.06); }
		.mob-notif-empty { padding: 14px 16px; font-size: 0.83rem; color: #bbb; text-align: center; }
		.mob-user-label {
			padding: 9px 16px 5px; font-size: 0.76rem;
			color: var(--text-soft); border-bottom: 1px solid rgba(201,132,138,0.12);
		}

		/* SIDEBAR */
		.sidebar-overlay {
			display: none; position: fixed; inset: 0;
			background: rgba(0,0,0,0.4); z-index: 1060;
		}
		.sidebar-overlay.active { display: block; }
		.sidebar {
			position: fixed; top: 0; left: -280px;
			width: 270px; height: 100%; background: white;
			z-index: 1070; transition: left .28s ease;
			display: flex; flex-direction: column;
			box-shadow: 4px 0 20px rgba(0,0,0,0.12);
		}
		.sidebar.open { left: 0; }
		.sidebar-header {
			background: linear-gradient(135deg, var(--rose-dark) 0%, var(--rose) 100%);
			padding: 18px 16px 20px;
			display: flex; align-items: center; gap: 12px;
		}
		.sidebar-logo {
			width: 44px; height: 44px; border-radius: 50%;
			background: rgba(255,255,255,0.2);
			display: flex; align-items: center; justify-content: center;
			font-size: 1.3rem; flex-shrink: 0;
		}
		.sidebar-brand { flex: 1; color: white; }
		.sidebar-brand .brand-sub { font-size: 0.68rem; opacity: 0.8; letter-spacing: 0.1em; text-transform: uppercase; display: block; }
		.sidebar-brand .brand-name { font-family: 'Cormorant Garamond', serif; font-size: 1.05rem; font-weight: 600; display: block; }
		.sidebar-close {
			background: rgba(255,255,255,0.15); border: none; border-radius: 50%;
			width: 28px; height: 28px; color: white; font-size: 0.85rem;
			cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;
		}
		.sidebar-close:hover { background: rgba(255,255,255,0.28); }
		.sidebar-nav { flex: 1; overflow-y: auto; padding: 8px 0; }
		.sidebar-nav a {
			display: flex; align-items: center; gap: 12px;
			padding: 12px 20px; color: var(--text-mid);
			text-decoration: none; font-size: 0.9rem;
			border-left: 3px solid transparent;
			transition: background .18s, color .18s, border-left-color .18s;
		}
		.sidebar-nav a:hover {
			background: rgba(201,132,138,0.07); color: var(--rose-dark);
			border-left-color: var(--rose); text-decoration: none;
		}
		.sidebar-nav .nav-icon { width: 20px; text-align: center; flex-shrink: 0; }
		.sidebar-divider { height: 1px; background: rgba(201,132,138,0.1); margin: 5px 0; }
		.sidebar-footer {
			padding: 12px 18px; border-top: 1px solid rgba(201,132,138,0.1);
			font-size: 0.72rem; color: var(--text-soft); text-align: center;
		}

		/* RESPONSIVE SWITCH */
		@media (max-width: 768px) {
			.top-bar       { display: none; }
			.navbar-custom { display: none; }
			.menu-bar      { display: none; }
			.mobile-navbar { display: flex; }
		}
	</style>
</head>
<body>

	<!-- SIDEBAR OVERLAY -->
	<div class="sidebar-overlay" id="sidebarOverlay"></div>

	<!-- SIDEBAR -->
	<div class="sidebar" id="sidebar">
		<div class="sidebar-header">
			<div class="sidebar-logo">🎂</div>
			<div class="sidebar-brand">
				<span class="brand-sub">Himasi-Cake</span>
				<span class="brand-name">Bakery</span>
			</div>
			<button class="sidebar-close" id="sidebarClose">✕</button>
		</div>
		<nav class="sidebar-nav">
			<a href="index.php"><span class="nav-icon">🏠</span> Home</a>
			<a href="produk.php"><span class="nav-icon">🛍️</span> Produk</a>
			<a href="about.php"><span class="nav-icon">ℹ️</span> Tentang Kami</a>
			<a href="manual.php"><span class="nav-icon">📖</span> Manual Aplikasi</a>
			<?php if(isset($_SESSION['kd_cs'])): ?>
			<a href="chat.php"><span class="nav-icon">💬</span> Pesan</a>
			<div class="sidebar-divider"></div>
			<a href="keranjang.php"><span class="nav-icon">🛒</span> Keranjang</a>
			<?php endif; ?>
			<div class="sidebar-divider"></div>
			<?php if(!isset($_SESSION['user'])): ?>
			<a href="user_login.php"><span class="nav-icon">👤</span> Login</a>
			<a href="register.php"><span class="nav-icon">📝</span> Register</a>
			<?php else: ?>
			<a href="proses/logout.php"><span class="nav-icon">🚪</span> Log Out (<?= htmlspecialchars($_SESSION['user']) ?>)</a>
			<?php endif; ?>
		</nav>
		<div class="sidebar-footer">&copy; <?= date('Y') ?> Himasi-Cake Bakery</div>
	</div>

	<!-- TOP BAR (desktop only) -->
	<div class="top-bar">
		<div class="container-fluid">
			<span>
				<i class="glyphicon glyphicon-earphone"></i>
				<a href="https://wa.me/6285229460693" target="_blank" style="color:rgba(255,255,255,0.88);text-decoration:none;">+6285229460693</a>
			</span>
			<span>
				<i class="glyphicon glyphicon-envelope"></i>
				<a href="mailto:himasi-cakebakery@gmail.com" style="color:rgba(255,255,255,0.88);text-decoration:none;">himasi-cakebakery@gmail.com</a>
			</span>
			<span>himasi-cake bakery Indonesia</span>
		</div>
	</div>

	<!-- NAVBAR DESKTOP -->
	<nav class="navbar-custom">
		<div class="container">
			<div class="navbar-inner-wrap">
				<div class="navbar-col-left">
					<a class="navbar-brand" href="index.php">HIMASI-CAKE BAKERY</a>
				</div>
				<div class="navbar-col-center">
					<form action="cari.php" method="GET">
						<div class="input-group">
							<input type="text" name="q" placeholder="Cari produk...">
							<button type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</form>
				</div>
				<div class="navbar-col-right">
					<?php 
					if(isset($_SESSION['kd_cs'])){
						$cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs'");
						$value = mysqli_num_rows($cek);
						echo "<a href='keranjang.php' style='position:relative;'>
								<i class='glyphicon glyphicon-shopping-cart'></i>
								<span class='badge-notif'>$value</span>
							  </a>";
					} else {
						echo "<a href='keranjang.php' style='position:relative;'>
								<i class='glyphicon glyphicon-shopping-cart'></i>
								<span class='badge-notif'>0</span>
							  </a>";
					}
					?>
					<?php if(isset($_SESSION['kd_cs'])):
						$notif = mysqli_query($conn, "SELECT * FROM produksi WHERE kode_customer = '$kode_cs' AND status IN ('Pesanan Diterima (Siap Kirim)','Pesanan Ditolak') AND is_read = 0");
						$jumlah_notif = mysqli_num_rows($notif);
					?>
					<div class="dropdown">
						<a href="#" class="dropdown-toggle" style="position:relative;">
							<i class="glyphicon glyphicon-bell"></i>
							<?php if($jumlah_notif > 0): ?>
								<span class="badge-notif"><?= $jumlah_notif ?></span>
							<?php endif; ?>
						</a>
						<ul class="dropdown-menu" style="min-width:280px;">
							<?php if($jumlah_notif > 0):
								mysqli_data_seek($notif, 0);
								while($row = mysqli_fetch_array($notif)):
									$warna = ($row['status'] == 'Pesanan Diterima (Siap Kirim)') ? 'green' : 'red';
									$icon  = ($row['status'] == 'Pesanan Diterima (Siap Kirim)') ? '✅' : '❌';
							?>
								<li><a href="#" onclick="tandaiDibaca(<?= $row['id_order'] ?>)" style="white-space:normal;text-transform:none;">
									<?= $icon ?> Invoice <b><?= $row['invoice'] ?></b><br>
									<small style="color:<?= $warna ?>;font-weight:bold;"><?= $row['status'] ?></small>
								</a></li>
							<?php endwhile; else: ?>
								<li><a href="#" style="color:#aaa;text-transform:none;">Tidak ada notifikasi baru</a></li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>
					<?php if(!isset($_SESSION['user'])): ?>
					<div class="dropdown">
						<a href="#" class="dropdown-toggle">
							<i class="glyphicon glyphicon-user" style="color:var(--rose);"></i> Akun
						</a>
						<ul class="dropdown-menu">
							<li><a href="user_login.php">Login</a></li>
							<li><a href="register.php">Register</a></li>
						</ul>
					</div>
					<?php else: ?>
					<div class="dropdown">
						<a href="#" class="dropdown-toggle">
							<i class="glyphicon glyphicon-user" style="color:var(--rose);"></i> <?= $_SESSION['user'] ?>
						</a>
						<ul class="dropdown-menu">
							<li><a href="proses/logout.php">Log Out</a></li>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav>

	<!-- MENU BAR BAWAH (desktop only) -->
	<div class="menu-bar">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="about.php">Tentang Kami</a></li>
				<li><a href="manual.php">Manual Aplikasi</a></li>
				<?php if(isset($_SESSION['kd_cs'])): ?>
				<li><a href="chat.php">💬 Pesan</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<!-- MOBILE NAVBAR -->
	<nav class="mobile-navbar">
		<button class="mob-hamburger" id="mobHamburger">&#9776;</button>
		<div class="mob-search-wrap">
			<form action="cari.php" method="GET" style="margin:0;">
				<div class="mob-search">
					<input type="text" name="q" placeholder="Cari produk...">
					<button type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
			</form>
		</div>
		<div class="mob-right">
			<?php
			$mob_value = 0;
			if(isset($_SESSION['kd_cs'])){
				$mob_cek = mysqli_query($conn, "SELECT kode_produk FROM keranjang WHERE kode_customer = '$kode_cs'");
				$mob_value = mysqli_num_rows($mob_cek);
			}
			?>
			<a href="keranjang.php" class="mob-icon">
				<i class="glyphicon glyphicon-shopping-cart"></i>
				<span class="mob-badge"><?= $mob_value ?></span>
			</a>
			<?php if(isset($_SESSION['kd_cs'])):
				$mob_notif = mysqli_query($conn, "SELECT * FROM produksi WHERE kode_customer = '$kode_cs' AND status IN ('Pesanan Diterima (Siap Kirim)','Pesanan Ditolak') AND is_read = 0");
				$mob_jumlah = mysqli_num_rows($mob_notif);
			?>
			<div class="mob-dropdown">
				<div class="mob-icon" id="mobNotifToggle">
					<i class="glyphicon glyphicon-bell"></i>
					<?php if($mob_jumlah > 0): ?>
						<span class="mob-badge"><?= $mob_jumlah ?></span>
					<?php endif; ?>
				</div>
				<div class="mob-dropdown-menu mob-notif-menu">
					<?php if($mob_jumlah > 0):
						mysqli_data_seek($mob_notif, 0);
						while($row = mysqli_fetch_array($mob_notif)):
							$warna = ($row['status'] == 'Pesanan Diterima (Siap Kirim)') ? 'green' : 'red';
							$icon  = ($row['status'] == 'Pesanan Diterima (Siap Kirim)') ? '✅' : '❌';
					?>
						<div class="mob-notif-item" onclick="tandaiDibaca(<?= $row['id_order'] ?>)">
							<?= $icon ?> Invoice <b><?= $row['invoice'] ?></b><br>
							<small style="color:<?= $warna ?>;font-weight:bold;"><?= $row['status'] ?></small>
						</div>
					<?php endwhile; else: ?>
						<div class="mob-notif-empty">Tidak ada notifikasi baru</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="mob-dropdown">
				<?php
				$mob_inisial = 'A';
				if(isset($_SESSION['user'])){
					$mob_inisial = strtoupper(substr($_SESSION['user'], 0, 2));
				}
				?>
				<div class="mob-avatar" id="mobAkunToggle"><?= $mob_inisial ?></div>
				<div class="mob-dropdown-menu">
					<?php if(!isset($_SESSION['user'])): ?>
						<a href="user_login.php">👤 Login</a>
						<a href="register.php">📝 Register</a>
					<?php else: ?>
						<div class="mob-user-label"><?= htmlspecialchars($_SESSION['user']) ?></div>
						<a href="proses/logout.php">🚪 Log Out</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav>

	<script>
		$(document).ready(function(){

			// Desktop dropdown
			$('.dropdown-toggle').on('click', function(e){
				e.preventDefault(); e.stopPropagation();
				$(this).closest('.dropdown').toggleClass('open');
			});
			$(document).on('click', function(e){
				if(!$(e.target).closest('.dropdown').length){
					$('.dropdown').removeClass('open');
				}
			});

			// Sidebar
			$('#mobHamburger').on('click', function(){
				$('#sidebar').addClass('open');
				$('#sidebarOverlay').addClass('active');
			});
			$('#sidebarClose, #sidebarOverlay').on('click', function(){
				$('#sidebar').removeClass('open');
				$('#sidebarOverlay').removeClass('active');
			});

			// Dropdown notif mobile
			$('#mobNotifToggle').on('click', function(e){
				e.stopPropagation();
				$(this).closest('.mob-dropdown').toggleClass('open');
				$('#mobAkunToggle').closest('.mob-dropdown').removeClass('open');
			});

			// Dropdown akun mobile
			$('#mobAkunToggle').on('click', function(e){
				e.stopPropagation();
				$(this).closest('.mob-dropdown').toggleClass('open');
				$('#mobNotifToggle').closest('.mob-dropdown').removeClass('open');
			});

			// Klik luar tutup dropdown mobile
			$(document).on('click', function(e){
				if(!$(e.target).closest('.mob-dropdown').length){
					$('.mob-dropdown').removeClass('open');
				}
			});
		});

		function tandaiDibaca(id_order){
			$.ajax({
				url: 'proses/tandai_baca.php',
				type: 'POST',
				data: { id_order: id_order },
				success: function(){ location.reload(); }
			});
		}
	</script>