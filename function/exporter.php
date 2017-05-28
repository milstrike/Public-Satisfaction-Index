<?php

/* 
 * The MIT License
 *
 * Copyright 2017 milstrike.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

$errorMessage = "";
$_SESSION["cetak"] = "";
$sangat_puas = 0;
$puas = 0;
$kurang_puas = 0;
$tidak_puas = 0;
if(isset($_POST["dateSubmit"])){
    $tanggal_awal = dateConverter($_POST["tanggal-awal"]);
    $bulan_awal = $_POST["bulan-awal"];
    $tahun_awal = $_POST["tahun-awal"];
    
    $tanggal_akhir = dateConverter($_POST["tanggal-akhir"]);
    $bulan_akhir = $_POST["bulan-akhir"];
    $tahun_akhir = $_POST["tahun-akhir"];
    
    $calendar_awal = dateFormatter($tanggal_awal, $bulan_awal, $tahun_awal);
    $calendar_akhir = dateFormatter($tanggal_akhir, $bulan_akhir, $tahun_akhir);
    
    $statusDataAwal = checkdatedata($database, $calendar_awal);
    $statusDataAkhir = checkdatedata($database, $calendar_akhir);
    
    
    
    if($statusDataAwal == 0 || $statusDataAkhir == 0){
        $errorMessage = "Error!, a date contain no data";
    }
    else{
        exportDataExcel($database, $calendar_awal, $calendar_akhir);
    }
}

function exportDataExcel($database, $tanggalAwal, $tanggalAkhir){
    
    $_SESSION["cetak"] = '<table border="1"><thead><tr><th>#</th><th>Tanggal</th><th>Sangat Puas</th><th>Puas</th><th>Kurang Puas</th><th>Tidak Puas</th></tr></thead><tbody>';
    
    $IDawal = getIDDataFromCalendar($database, $tanggalAwal);
    $IDakhir = getIDDataFromCalendar($database, $tanggalAkhir);
    
    $i = 0;
    $a = 0;
    $x = 1;
    
    if($IDawal < $IDakhir){
        $i = $IDawal;
        $a = $IDakhir;
    }
    else{
        $a = $IDawal;
        $i = $IDakhir; 
    }
    
    for($t = $i; $t<=$a; $t++){
        $data = getDataBasedOnID($database, $t);
        //echo $data;
        $sangat_puas = $sangat_puas + $data["sangat_puas"];
        $puas = $puas + $data["puas"];
        $kurang_puas = $kurang_puas + $data["kurang_puas"];
        $tidak_puas = $tidak_puas + $data["tidak_puas"];
        $_SESSION["cetak"]=$_SESSION["cetak"].'<tr><td>'.$x++.'</td><td>'.$data["tanggal"].'</td><td>'.$data["sangat_puas"].'</td><td>'.$data["puas"].'</td><td>'.$data["kurang_puas"].'</td><td>'.$data["tidak_puas"].'</td></tr>';
    }
    
    $_SESSION["cetak"] = $_SESSION["cetak"].'<tr><td colspan="2"><strong>Jumlah</strong></td><td>'.$sangat_puas.'</td><td>'.$puas.'</td><td>'.$kurang_puas.'</td><td>'.$tidak_puas.'</td></tr></tbody></table>';
    header("location:resultExcel.php");
}


