<!DOCTYPE html>
<html>
<head>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    
    <style>
      body {
        font-family: "Times New Roman", Times, serif;
        font-size: 12pt;
        line-height: 1.2;
        margin: 0;
        padding: 0;
      }
      table{
        margin:0;
        padding: 0
      }
      .container {
        margin-top: 15mm;
        margin: auto;
        width: 160mm;
      }
      .kop-surat {
        width: 100%;
        border-bottom: 2px solid black;
        margin-bottom: 20px;
        table-layout: fixed;
      }
      .kop-surat td {
        padding: 5px;
        vertical-align: middle;
      }
      .logo {
        text-align: center;
        width: 80px;
        height: auto;
      }
      .info-perusahaan {
        text-align: center;
        width: 70%;
      }
      .info-perusahaan h2,
      .info-perusahaan p {
        margin: 0;
      }
      .info-surat{
        width: 30mm;
      }
      h2,
      h3,
      p {
        margin: 0;
      }
    </style>

</head>
  <title></title>
</head>
<body>




<button type="button" onclick="ESFuncPrint('content')">Cetak</button><br><br>

<div class="container" id="content">
      <table class="kop-surat">
        <tr>
          <td><img width="50px" height="auto" src="public/assets/img/banyuwangi.png" alt="Logo Kiri" class="logo" /></td>
          <td class="info-perusahaan">
            <h3>PEMERINTAH KABUPATEN BANYUWANGI</h3>
            <h3>DINAS PENDIDIKAN</h3>
            <h3>SMP NEGERI 1 BANGOREJO</h3>
            <P>Jl. Dr. Soetomo No. 16 Jatirejo Purwoharjo Banyuwangi 684</P>
            <p>NPSN : 20525714 email : smpn1pwj@gmail.com</p>
          </td>
          <td><img width="50px" height="auto" src="public/assets/img/logo_smp.png" alt="Logo Kanan" class="logo" /></td>
        </tr>
      </table>

      <table>
        <tr>
          <td class="info-surat">Nomor</td>
          <td>: <span>421/____/249.245.200130/2024</span></td>
        </tr>
        <tr>
          <td class="info-surat">Lampiran</td>
          <td>: <span>-</span></td>
        </tr>
        <tr>
          <td class="info-surat">Perihal</td>
          <td>: <span>Panggilan orang tua</span></td>
        </tr>
      </table>
      <p style="margin-top: 16pt">Kepada</p>
      <p>Yth. Bapak/Ibu Orang Tua/Wali</p>
      <p>di Tempat</p>
      <p style="margin-top: 16pt">Dengan hormat,</p>

      <p>
        Puji Syukur kita panjatkan Kehadirat Tuhan Yang Maha Esa atas segala nikmat dan anugerah-Nya kepada kita. Untuk menjalin hubungan dan komunikasi yang baik antara orang tua/wali siswa dengan pihak sekolah dalam rangka tanggung jawab bersama dalam mendidik dan melatih anak kita ke arah yang baik, maka dengan ini kami pihak sekolah perlu memanggil Bapak/Ibu Orang Tua/Wali siswa pada :
      </p>
      <table style="margin-top: 12pt">
        <tr>
          <td class="info-surat">Hari / Tanggal</td>
          <td>: <span>20 Januari 2024</span></td>
        </tr>
        <tr>
          <td class="info-surat">Jam</td>
          <td>: <span>09:00</span></td>
        </tr>
        <tr>
          <td class="info-surat">Tempat</td>
          <td>: <span>Ruang BK</span></td>
        </tr>
        <tr>
          <td class="info-surat">Agenda</td>
          <td>: <span>pembahasan Perkembangan Siswa</span></td>
        </tr>
      </table>
      <p style="margin-top: 12pt">
        Demikian Surat pemberitahuan ini kami sampaikan untuk dapat diketahui oleh orang tua/wali siswa, atas perhatian dan kerjasamanya diucapkan terima kasih
      </p>

      <table style="width: 100%; margin-top: 32pt">
        <tr>
          <td>
            <div>
              <p>Mengetahui,</p>
              <p>Kepala Sekolah</p>
              <br>
              <br>
              <br>
              <br>
              <br>
              <p>SUNOTO, S.Pd.,M.Pd.</p>
              <p>NIP. 196609301999121001</p>
            </div>
          </td>
          <td>
            <div style="text-align: right;">
              <br>
              <p>Guru BK,</p>
              <br>
              <br>
              <br>
              <br>
              <br>
              <p>SULIYAH, S. Pd</p>
              <p>NIP. 197103022022212007</p>
            </div>
          </td>
        </tr>
      </table>
      <br>
      <br>
      <br>
      <p>NB : Surat Harap dibawa kembali ke sekolah</p>
    </div>


 <script>
        function ESFuncPrint(PrintArea) {
        var printContents = document.getElementById(PrintArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      };
  </script>




</body>
</html>