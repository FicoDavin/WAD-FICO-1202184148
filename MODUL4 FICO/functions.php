<?php 
         if(!isset($_SESSION)) 
         { 
             session_start(); 
         } 

// mysqli_connect berfungsi menghubungkan ke dalam database
// parameternya ($host, $username, $password, $namadatabase)
$conn = mysqli_connect("localhost","root","","wad_modul4");

function registrasi($data){
    // memanggil global variable $conn
    global $conn;

    // strtolower digunakan untuk membuat inputan menjadi huruf kecil semua
    // striplashes digunakan untuk mengilangkan strip (-)
    // mysqli_real_escape_string digunakan agar password dapat menggunakan tanda petik
    $nama = $data['nama'];
    $email = strtolower(stripslashes($data['email']));
    $no_hp = $data['no_hp'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek apa kah email sudah ada atau belum
    // mysqli_query digunakan untuk menjalankan query
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    // mysqli_fetch_assoc digunakan untuk merubah hasil query menjadi associative array
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Email sudah terdaftar!');
            </script>";
        return false;
    }

    //cek konfirmasi password 
    if($password != $password2) {
        echo "<script>
            alert('Password tidak sama!');
            </script>";
        return false;
    }
    
    //Hash Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan data ke dalam database
    mysqli_query($conn, "INSERT INTO users VALUE ('', '$nama', '$email','$no_hp', '$password')");

    // melihat apakah kolom / data berhasil ditambahkan
    return mysqli_affected_rows($conn);

}

function login($data){
    global $conn;
    $email = $data["email"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE 
    email = '$email'");
    

    // cek usernama 
    // mysqli_num_rows menghitung ada berapa baris yg dikembalikan oleh query $result
    if (mysqli_num_rows($result) === 1) {

        //cek password
        // mysqli_fetch_assoc digunakan untuk merubah hasil query menjadi associative array
        $row = mysqli_fetch_assoc($result);
        // password_verify digunakan untuk mengembalikan hasil password_hash
        if (password_verify($password, $row["password"])) {
            $_SESSION['success-login'] = true;
            $_SESSION['berhasil-login'] = true;
            // cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['nama']), time()+60);
                
                if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
                    $id = $_COOKIE['id'];
                    $key = $_COOKIE['key'];
                    // ambil nama berdasarkan id
                    $result = mysqli_query($conn, "SELECT nama FROM users WHERE id = $id");
                    $row = mysqli_fetch_assoc($result);
        
                    // cek cookie dan nama
                    if( $key === hash('sha256', $row['nama']) ) {
                        $_SESSION['berhasil-login'] = true;
                    }
            }
			}   
            return;
        }
        else {
            $_SESSION['failed-login'] = true;
            return;
        }
    }
    else {
        $_SESSION['failed-login'] = true;
        return;
    }
}  

function addToCart($data, $id){
    global $conn;
    $nama_barang = $data['nama_barang'];
    $harga = $data['harga'];
    mysqli_query($conn, "INSERT INTO cart VALUE ('', '$id', '$nama_barang','$harga')");
    return $_SESSION['add-to-cart'] = true;
}

function update($data, $id) {
    global $conn;
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp= $_POST['no_hp'];

    mysqli_query($conn, "UPDATE users SET nama = '$nama', no_hp = '$no_hp' WHERE email = '$email' ");
    return $_SESSION['success-update'] = true;
}


?>