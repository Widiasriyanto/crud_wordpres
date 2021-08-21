<?php

// adds a shortcode in your page can use: [history_user]
add_shortcode('history_user', 'view_history_user');

function view_history_user()
{

global $wpdb;
?>
<!-- Get Library Table Edit -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="C:\xampp\htdocs\e-ppid\wp-content\asset\jquery.tabledit.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<form style="padding-left: 100px; padding-top: 50px">
   <div style="width: 90%">
      <h1 style="color: #14a2ab; font-size: 25px"><b>Data Permohonan Informasi</b></h1>
      <hr style="border: 2px solid #14a2ab;border-radius:2px">
   </div>
   <br>
   <br>
   <!-- This Table  -->
   <div style="width: 90%; text-align: center ">
      <table id="tabel-data" class="cell-border" style="width:100%;padding-top: 20px;">
         <thead>
            <tr style="background-color: #0a4f7e; color: #FFFFFF;">
               <th>NO</th>
               <th>Jenis Pemohon</th>
               <th>Nomor Identitas</th>
               <th>FOTO ID</th>
               <th>Nama</th>
               <th>Email</th>
               <th>Informasi Di Minta</th>
               <th>Tujuan Penggunaan</th>
               <th>Salinan Informasi</th>
               <th>Tanggal</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            //this Selected Database with Wpdb
            $query = $wpdb->get_results("SELECT * FROM history_informasi", ARRAY_A);
            $nomer = 0;
            foreach ($query as $row) {
               $nomer++;
               echo "<tr>
                  <td>$nomer</td>
                  <td>" . $row['jenispemohon'] . "</td>
                  <td>" . $row['nomor_identitas'] . "</td>
                  <td><a href=" . $row['URL'] . "><img src=" . $row['URL'] . " border=3 height= 40 px width= 40 px></a></td>
                  <td>" . $row['nama_lengkap'] . "</td>
                  <td>" . $row['user_email'] . "</td>
                  <td>" . $row['informasi_diminta'] . "</td>
                  <td>" . $row['tujuan_penggunaan_informasi'] . "</td>
                  <td>" . $row['cara_memperoleh_salinan_informasi'] . "</td>
                  <td>" . $row['tanggal'] . "</td>
               </tr>";
            }
            ?>

         </tbody>

         <script>
            // you Update And Delete use Table Edit Jquery
            $('#table-data')
               .Tabledit({
                  url: 'action.php',
                  columns: {
                     identifier: [0, 'nomer'],
                     editable: [
                        [1, 'jenispemohon'],
                        [2, 'nama_lengkap'],
                        [3, 'nomor_identitas']
                     ]
                  }
               });
         </script>

      </table>
   </div>
</form>
}