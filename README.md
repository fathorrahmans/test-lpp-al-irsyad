# Aplikasi Manajemen Pegawai, Siswa & Pengiriman

Aplikasi ini dibuat menggunakan **Laravel 10** sesuai dengan tugas tes yang diberikan, dimana mencakup fitur CRUD pegawai, siswa, pengiriman, autentikasi sederhana, kirim email, dan API.

## 🚀 Instalasi

-   clone repository
-   php artisan migrate --seed
-   seeder disini untuk user default yaitu **hak akses admin & user**

## 🚀 Kredensial Default

Untuk memulai aplikasi bisa login menggunakan akun default berikut:

### 1. Akun Admin

-   **Email**: `admindev@gmail.com`
-   **Password**: `admindev`

### 2. Akun User

-   **Email**: `userdev@gmail.com`
-   **Password**: `userdev`

## 📌 Fitur

### 1. Autentikasi (Login)

-   Autentikasi sederhana tanpa Laravel Breeze/UI.
-   Register
-   Redirect otomatis:
    -   Jika belum login, akses `/` diarahkan ke halaman login.
    -   Jika sudah login, diarahkan ke `/pengiriman`.

### 2. Role & Middleware

-   Terdapat 2 role user: `admin` dan `user`.
-   Role `admin` bisa mengakses semua Menu.
-   Role `user` hanya bisa mengakses menu **Pengiriman & Siswa**.
-   Middleware manual digunakan untuk membatasi akses.

### 3. Data Pegawai (CRUD)

-   Tambah, edit, hapus pegawai.
-   Menggunakan modal dialog untuk **Tambah/Edit**.
-   Validasi input menggunakan Laravel.
-   Fitur kirim email data pegawai (menggunakan Mailtrap).

### 4. Kirim Email

-   Kirim email detail pegawai ke email masing-masing.
-   Menggunakan Mailtrap sebagai SMTP:

    -   Konfigurasi `.env`:

        ```env
        MAIL_MAILER=smtp
        MAIL_HOST=sandbox.smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=4877329facbe72
        MAIL_PASSWORD=c2314a9f3b3c07
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS="info@alirsyad.test"
        MAIL_FROM_NAME="${APP_NAME}"
        ```

### 5. Data Siswa (CRUD)

-   CRUD sederhana untuk siswa sama seperti **Pegawai**.

### 6. Data Pengiriman Barang

-   Data pengiriman hanya bisa diakses oleh user yang sudah login.
-   Tambah, filter, dan pencarian kode pengiriman.

### 7. API (Laravel Resource API)

API untuk mengelola data **Pegawai** dan **Siswa** tersedia dengan endpoint sebagai berikut:

## 📋 API Endpoints

### **PEGAWAI**

1. **Get All Pegawai**  
   `GET http://127.0.0.1:8000/api/pegawai`  
   **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Mendapatkan Seluruh Pegawai",
        "data": [
            {
                "id": 5,
                "nama": "Andik Vermansyah",
                "email": "andik@gmail.com",
                "jabatan": "keamanan",
                "created_at": "2025-04-14T11:24:11.000000Z",
                "updated_at": "2025-04-14T11:24:42.000000Z"
            },
            {
                "id": 4,
                "nama": "Aldi Rizaldi",
                "email": "aldirizaldi@gmail.com",
                "jabatan": "guru",
                "created_at": "2025-04-14T11:02:47.000000Z",
                "updated_at": "2025-04-14T11:06:12.000000Z"
            }
        ]
    }
    ```

2. **Get One Pegawai**  
   `GET http://127.0.0.1:8000/api/pegawai/{id}`  
   **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Mendapatkan Data Pegawai",
        "data": {
            "id": 4,
            "nama": "Aldi Rizaldi",
            "email": "aldirizaldi@gmail.com",
            "jabatan": "guru",
            "created_at": "2025-04-14T11:02:47.000000Z",
            "updated_at": "2025-04-14T11:06:12.000000Z"
        }
    }
    ```

3. **Add Pegawai**  
   `POST http://127.0.0.1:8000/api/pegawai`  
   **Request**:

    ```json
    {
        "nama": "Andik Vermansyah",
        "email": "andik@gmail.com",
        "jabatan": "kepala sekolah"
    }
    ```

    **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Menambahkan Pegawai",
        "data": {
            "nama": "Andik Vermansyah",
            "email": "andik@gmail.com",
            "jabatan": "kepala sekolah",
            "created_at": "2025-04-14T11:24:11.000000Z",
            "updated_at": "2025-04-14T11:24:11.000000Z",
            "id": 5
        }
    }
    ```

4. **Update Pegawai**  
   `PUT http://127.0.0.1:8000/api/pegawai/{id}`  
   **Request**:

    ```json
    {
        "nama": "Andik Vermansyah",
        "email": "andik@gmail.com",
        "jabatan": "keamanan"
    }
    ```

    **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Memperbarui Data Pegawai",
        "data": {
            "id": 5,
            "nama": "Andik Vermansyah",
            "email": "andik@gmail.com",
            "jabatan": "keamanan",
            "created_at": "2025-04-14T11:24:11.000000Z",
            "updated_at": "2025-04-14T11:24:42.000000Z"
        }
    }
    ```

5. **Delete Pegawai**  
   `DELETE http://127.0.0.1:8000/api/pegawai/{id}`  
   **Response**:
    ```json
    {
        "status": "success",
        "message": "Pegawai Berhasil Dihapus"
    }
    ```

---

### **SISWA**

1. **Get All Siswa**  
   `GET http://127.0.0.1:8000/api/siswa`  
   **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Mendapatkan Seluruh Siswa",
        "data": [
            {
                "id": 2,
                "nama": "Dimas Arifin",
                "email": "dimas@ascmail.id",
                "kelas": "x tkj 2",
                "created_at": "2025-04-14T11:22:25.000000Z",
                "updated_at": "2025-04-14T11:22:25.000000Z"
            },
            {
                "id": 1,
                "nama": "Veren Crystalia",
                "email": "crystalia@gmail.com",
                "kelas": "x rpl 12",
                "created_at": "2025-04-14T11:21:40.000000Z",
                "updated_at": "2025-04-14T11:22:06.000000Z"
            }
        ]
    }
    ```

2. **Get One Siswa**  
   `GET http://127.0.0.1:8000/api/siswa/{id}`  
   **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Mendapatkan Data Siswa",
        "data": {
            "id": 1,
            "nama": "Veren Crystalia",
            "email": "crystalia@gmail.com",
            "kelas": "x rpl 12",
            "created_at": "2025-04-14T11:21:40.000000Z",
            "updated_at": "2025-04-14T11:22:06.000000Z"
        }
    }
    ```

3. **Add Siswa**  
   `POST http://127.0.0.1:8000/api/siswa`  
   **Request**:

    ```json
    {
        "nama": "Veren Crystalia",
        "email": "crystalia@gmail.com",
        "kelas": "x rpl 1"
    }
    ```

    **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Menambahkan Siswa",
        "data": {
            "nama": "Veren Crystalia",
            "email": "crystalia@gmail.com",
            "kelas": "x rpl 1",
            "created_at": "2025-04-14T11:21:40.000000Z",
            "updated_at": "2025-04-14T11:21:40.000000Z",
            "id": 1
        }
    }
    ```

4. **Update Siswa**  
   `PUT http://127.0.0.1:8000/api/siswa/{id}`  
   **Request**:

    ```json
    {
        "nama": "Veren Crystalia",
        "email": "crystalia@gmail.com",
        "kelas": "x rpl 12"
    }
    ```

    **Response**:

    ```json
    {
        "status": "success",
        "message": "Berhasil Memperbarui Data Siswa",
        "data": {
            "id": 1,
            "nama": "Veren Crystalia",
            "email": "crystalia@gmail.com",
            "kelas": "x rpl 12",
            "created_at": "2025-04-14T11:21:40.000000Z",
            "updated_at": "2025-04-14T11:22:06.000000Z"
        }
    }
    ```

5. **Delete Siswa**  
   `DELETE http://127.0.0.1:8000/api/siswa/{id}`  
   **Response**:
    ```json
    {
        "status": "success",
        "message": "Siswa Berhasil Dihapus"
    }
    ```

---
