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
<!-- 
<div class="row printable-area" id="">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title"></p>
            @foreach($pelanggaran_siswa as $data)
        
        <div class="row">
          <div class="col-12">

            <div class="row">
              
              <div class="col-md-2 text-center">
                <img src="public/assets/img/banyuwangi.png" style="width: 80px; height: auto;"></p>  
              </div>
              <div class="col-md-8 text-center"><br>
                <h3 style="text-align:center; line-height: 0; margin-bottom: 15px;font-family: 'Times New Roman', Times, serif;">PEMERINTAH KABUPATEN BANYUWANGI</h3><br>
                <h3 style="text-align:center; line-height: 0; margin-bottom: 15px;font-family: 'Times New Roman', Times, serif;">DINAS PENDIDIKAN</h3><br>
                <h3 style="text-align:center; line-height: 0; margin-bottom: 15px;font-family: 'Times New Roman', Times, serif;">SMP NEGERI 1 BANGOREJO</h3>
                
                <b style="font-family: 'Times New Roman', Times, serif;">Jl. Dr. Soetomo No.16 Jatirejo Purwoharjo Banyuwangi 68483</b><br>
                <b style="font-family: 'Times New Roman', Times, serif;">NPSN : 20525714 email : smpn1pwj@gmail.com</b>
                
               
              </div>
              <div class="col-md-2">
                 <img src="public/assets/img/logo_smp.png" style="width: 80px; height: auto;">
              </div>
            </div>
            <hr>


            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
                Nomor <br>
              </div>
               <div class="col-md-1 text-left">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                 421/____/249.245.200130/2024 
              </div>
            </div>

             <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
                lampiran <br>
              </div>
               <div class="col-sm-1 text-left">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                 - 
              </div>
            </div>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
                Perihal <br>
              </div>
               <div class="col-sm-1 text-left">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                 Panggilan Orang Tua 
              </div>
            </div><br>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-5 text-left">
                Kepada <br>
              </div>
            </div>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-5 text-left">
                Yth. Bapak/Ibu Orang Tua/Wali <br>
              </div>
            </div><br><br>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-2 text-center">
                di Tempat <br>
              </div>
            </div><br><br><br>


            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-2 text-left">
                Dengan Hormat, <br>
              </div>
            </div><br>

             <div class="row" style="font-family: 'Times New Roman', Times, serif; text-align: justify;">
              <div class="col-md-10 text-left">
                Puji Syukur kita panjatkan Kehadirat Tuhan Yang Maha Esa atas segala nikmat dan anugerah-nya kepada kita. Untuk menjalin hubungan dan komunikasi yang baik antara orang tua/wali siswa dengan pihak sekolah dalam rangka tanggung jawab bersama dalam mendidik dan melatih anak kita ke arah yang baik, maka dengan ini kami pihak sekolah perlu memanggil Bapak/Ibu Orang Tua/Wali siswa pada :<br>
              </div>
            </div><br>

             <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-2 text-left">
                Hari/tanggal <br>
              </div>
               <div class="col-md-1 text-center">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                
              </div>
            </div>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-2 text-left">
                Jam  <br>
              </div>
               <div class="col-md-1 text-center">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                
              </div>
            </div>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-2 text-left">
                Tempat  <br>
              </div>
               <div class="col-md-1 text-center">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                Ruang BK
              </div>
            </div>


            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-2 text-left">
                Agenda <br>
              </div>
               <div class="col-md-1 text-center">
                : <br>
              </div>
              <div class="col-md-6 text-left">
                Pembahasan Perkembangan Siswa
              </div>
            </div><br><br>

            <div class="row" style="font-family: 'Times New Roman', Times, serif; text-align: justify;">
              <div class="col-md-10 text-left">
               Demikian Surat pemberitahuan ini kami sampaikan untuk dapat diketahui oleh orang tua/wali siswa, atas perhatian dan kerjasamanya diucapkan terima kasih<br>
              </div>
            </div><br><br>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
              </div>
              <div class="col-md-2 text-left">
                Mengetahui<br>
              </div>
              <div class="col-md-4 text-left">
              </div>
              <div class="col-md-4 text-left">
                Purwoharjo,_____________2024
              </div>
              <div class="col-md-1 text-left">
              </div>
            </div>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
              </div>
              <div class="col-md-2 text-left">
                Kepala Sekolah <br>
              </div>
               <div class="col-md-4 text-left">
              </div>
              <div class="col-md-4 text-left">
                Guru BK
              </div>
              <div class="col-md-1 text-left">
              </div>
            </div><br><br><br>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
              </div>
              <div class="col-md-2 text-left">
                SUNOTO, S.Pd.,M.Pd.<br>
              </div>
               <div class="col-md-4 text-left">
              </div>
              <div class="col-md-3 text-left">
                SULIYAH, S.Pd
              </div>
              <div class="col-md-1 text-left">
              </div>
            </div>

            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-1 text-left">
              </div>
              <div class="col-md-3 text-left">
               NIP. 196609301999121001<br>
              </div>
               <div class="col-md-3 text-left">
              </div>
              <div class="col-md-4 text-left">
                NIP. 197103022022212007
              </div>
             
            </div><br><br>


            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
              <div class="col-md-6 text-left">
                NB : Surat Harap dibawa kembali ke sekolah  <br>
              </div>
            </div><br><br><br>



            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
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