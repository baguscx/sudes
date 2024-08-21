<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT KETERANGAN USAHA</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .logo {
            width: 10%; /* Sesuaikan dengan lebar logo */
            float: left;
            margin-right: 1px;
            padding-right: 1px;
            /* margin-right: 1px; Sesuaikan jarak antara logo dan teks */
            /* margin-top: 5px; Menyamakan tinggi logo dengan teks */
            margin-bottom: 15px; //Menyamakan tinggi logo dengan teks
            z-index: 200;
        }
        .logo > img {
            margin-right: 1px;
            /* margin-left: 100px; */
            padding-right: 1px;
            width: 80px;
            height: auto;
            align-items: center;
            text-align: center;
        }

        h4,h3,h2,.hp {
            text-align: center;
            margin: 0;
        }

        .kop {
            margin-right: 100px;
            padding-right: 100px;
            width: 90%;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            margin-left: 1px;
            padding-left: 1px; /* Sesuaikan dengan jarak antara logo dan teks */
            padding-top: 10px; /* Menyamakan tinggi teks dengan logo */
        }

        .line {
            border-top: 3px solid black;
            height: 2px;
            border-bottom: 1px solid black;
        }

        .judul {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .ttd {
            margin-top: 20px;
        }

        .ttd-kiri,
        .ttd-kanan {
            width: 50%; /* Bagi ruang secara merata antara tanda tangan */
            float: left;
            text-align: left;
        }

        .ttd-kanan {
            text-align: right;
        }

        /* css qr */
        .qr-container {
            position: relative;
            display: flex;
            justify-content: center; /* aligns children horizontally (logo and QR code) */
            align-items: center; /* aligns children vertically (logo and QR code) */
            height: 15px; /* adjust the height as needed */
        }
        .object-a {
            position: absolute;
            top: 50%; /* Menggeser logo ke tengah vertikal */
            left: 50%; /* Menggeser logo ke tengah horizontal */
            transform: translate(-50%, -50%); /* Membuat logo berada di tengah-tengah */
        }
        .lego {
            position: absolute;
            top: 50%; /* Menggeser logo ke tengah vertikal */
            left: 50%; /* Menggeser logo ke tengah horizontal */
            transform: translate(-50%, -50%); /* Membuat logo berada di tengah-tengah */
            z-index: 2; /* Pastikan logo berada di lapisan terdepan */
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
        <img src="src/images/logo.png" alt="logo" class="logo">
        </div>
        <div class="kop">
            <h4>PEMERINTAH KABUPATEN PASURUAN</h4>
            <h4>KECAMATAN BEJI</h4>
            <h2>KEPALA DESA KEDUNGRINGIN</h2>
            <p class="hp">No. Telp. (0343) 655756</p>
        </div>
    </div>
    <hr class="line"/>
    <div class="container">
        <h3 class="judul">SURAT KETERANGAN USAHA</h3>
        <p style="text-align: center; margin-top: 0; padding: 0; margin-bottom: 20px;">Nomor. 563/{{$indeks[$ps->id]+1}}/424.233.2.10/2024</p>
        <p style="padding: 0 50px 0 50px">Yang bertanda tangan dibawah ini Kepala Desa Kedungringin, Kecamatan Beji, Kabupaten Pasuruan menerangkan bahwa :</p>
        <table style="padding: 0 90px 0 80px; width: 100%; border-collapse: collapse;">
            <tr>
            <td style="text-align: left; width: 30%;">Nama</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->nama  ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">NIK</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->nik ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Tempat Tanggal Lahir</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->tempat_lahir.', '.\Carbon\Carbon::parse($list->tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Jenis Kelamin</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->gender ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Kewarganegaraan / Agama</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->kewarganegaraan.' / '.$list->agama ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Status Pernikahan</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->status_pernikahan ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Pekerjaan</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->pekerjaan ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Alamat</td>
            <td style="text-align: left; padding-left: 10px;">: {{'Dusun '. $list->dusun .', RT.'. $list->rt .', RW.'. $list->rw ?? ''}}</td>
            </tr>
        </table>
        <p style="padding: 0 50px 0 50px">
           Sesuai dengan keterangan yang bersangkutan benar nama tersebut diatas mempunyai usaha sebagai berikut :
        </p>
        <table style="padding: 0 90px 0 80px; width: 100%; border-collapse: collapse;">
            <tr>
            <td style="text-align: left; width: 30%;">Nama Usaha</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->nama_instansi ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left; width: 30%;">Mulai usaha sejak</td>
            <td style="text-align: left; padding-left: 10px;">: {{2024 - (\Carbon\Carbon::parse($list->mulai_usaha)->isoFormat('YYYY')). ' Tahun'  ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Alamat Usaha</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->alamat_usaha ?? ''}}</td>
            </tr>
            <tr>
            <td style="text-align: left;">Tujuan</td>
            <td style="text-align: left; padding-left: 10px;">: {{$list->tujuan ?? ''}}</td>
            </tr>
        </table>
        <p style="padding: 0 50px 0 50px">
            Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.
        </p>

<div class="ttd">
    <div class="ttd-kiri" style="text-align: center">

    </div>
    <div class="ttd-kanan" style="text-align: center">
        <p style="margin-bottom: 5px;">Kedungringin, {{\Carbon\Carbon::parse($list->created_at)->isoFormat('D MMMM YYYY') ?? ''}}
            <br><b>KEPALA DESA KEDUNGRINGIN</b></p>
        <br>
        <br>
        <br>
            @if ($ps->status == "Selesai")
                <div class="qr-container">
                    <img style="width: 20px" src="logo.png" class="lego" alt="">
                    <img class="object-a" src="data:image/png;base64, {!! base64_encode(QrCode::size(100)->generate('http://127.0.0.1:8000/cek/surat/'.$list->id)) !!} ">
                </div>
            @endif
        <br>
        <br>
        <p style="margin-top: 20px;"><u><b>RISKY WAHYUNI, SH</b></u></p>
    </div>
</div>

    </div>
</body>
</html>
