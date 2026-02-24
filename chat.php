<?php 
session_start();
include 'koneksi/koneksi.php';

if(!isset($_SESSION['kd_cs'])){
    header('location: user_login.php');
    exit();
}

$kode_cs = $_SESSION['kd_cs'];

// Kirim pesan
if(isset($_POST['pesan']) && $_POST['pesan'] != ''){
    $pesan = $_POST['pesan'];
    mysqli_query($conn, "INSERT INTO pesan (kode_customer, pesan, pengirim) VALUES ('$kode_cs', '$pesan', 'customer')");
    
    // Tambahan ini
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Tandai pesan admin sudah dibaca
mysqli_query($conn, "UPDATE pesan SET is_read = 1 WHERE kode_customer = '$kode_cs' AND pengirim = 'admin'");

// Ambil semua pesan
$result = mysqli_query($conn, "SELECT * FROM pesan WHERE kode_customer = '$kode_cs' ORDER BY waktu ASC");

include 'header.php';
?>

<style>
.chat-wrap { max-width: 750px; margin: 40px auto 80px; }
.chat-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: var(--rose-dark); border-bottom: 2px solid var(--rose-light); padding-bottom: 10px; margin-bottom: 25px; }
.chat-box { background: #fff; border-radius: 10px; border: 1px solid rgba(201,132,138,0.2); padding: 20px; height: 420px; overflow-y: auto; display: flex; flex-direction: column; gap: 12px; box-shadow: 0 4px 20px rgba(160,90,98,0.08); margin-bottom: 15px; }
.bubble { max-width: 70%; padding: 10px 15px; border-radius: 18px; font-size: 0.9rem; line-height: 1.5; word-break: break-word; }
.bubble-customer { background: linear-gradient(135deg, var(--rose), var(--rose-dark)); color: white; align-self: flex-end; border-bottom-right-radius: 4px; }
.bubble-admin { background: var(--cream); color: var(--text-dark); border: 1px solid var(--rose-light); align-self: flex-start; border-bottom-left-radius: 4px; }
.bubble-time { font-size: 0.7rem; opacity: 0.7; margin-top: 4px; }
.bubble-name { font-size: 0.72rem; font-weight: bold; margin-bottom: 3px; color: var(--rose-dark); }
.chat-form { display: flex; gap: 10px; }
.chat-form input { flex: 1; border: 1.5px solid var(--rose-light); border-radius: 25px; padding: 10px 20px; font-size: 0.9rem; outline: none; background: var(--cream); }
.chat-form input:focus { border-color: var(--rose); }
.chat-form button { background: linear-gradient(135deg, var(--rose), var(--rose-dark)); color: white; border: none; border-radius: 25px; padding: 10px 25px; cursor: pointer; font-size: 0.9rem; transition: opacity .2s; }
.chat-form button:hover { opacity: 0.9; }
.empty-chat { text-align: center; color: var(--text-soft); margin: auto; }
</style>

<div class="container">
    <div class="chat-wrap">
        <h3 class="chat-title">💬 Chat dengan Admin</h3>

        <div class="chat-box" id="chatBox">
            <?php 
            $jumlah = mysqli_num_rows($result);
            if($jumlah == 0): ?>
                <div class="empty-chat">
                    <p>Belum ada pesan. Mulai percakapan sekarang!</p>
                </div>
            <?php else:
                while($row = mysqli_fetch_assoc($result)):
                    $kelas = $row['pengirim'] == 'customer' ? 'bubble-customer' : 'bubble-admin';
                    $nama  = $row['pengirim'] == 'customer' ? 'Anda' : 'Admin';
                    $waktu = date('d M Y H:i', strtotime($row['waktu']));
                    ?>
                    <div style="display:flex; flex-direction:column; align-items: <?= $row['pengirim'] == 'customer' ? 'flex-end' : 'flex-start' ?>">
                        <div class="bubble-name"><?= $nama ?></div>
                        <div class="bubble <?= $kelas ?>"><?= htmlspecialchars($row['pesan']) ?></div>
                        <div class="bubble-time"><?= $waktu ?></div>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>

        <form class="chat-form" method="POST">
            <input type="text" name="pesan" placeholder="Ketik pesan..." autocomplete="off">
            <button type="submit"><i class="glyphicon glyphicon-send"></i> Kirim</button>
        </form>
    </div>
</div>

<script>
    var chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>

<?php include 'footer.php'; ?>