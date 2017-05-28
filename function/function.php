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

function checkdatedata($database, $dates){
    $sql = "SELECT * FROM masukan WHERE tanggal='".$dates."'";
    $query = mysql($database, $sql);
    $rows = mysql_num_rows($query);
    $status = 0;
    if($rows > 0){
         $status = 1;
    }
    return $status;
}

function getDateNow(){
    date_default_timezone_set('Asia/Jakarta');
    return date("d/m/Y");
}

function getInitialData($database, $dates, $flow){
    $sql = "SELECT * FROM masukan WHERE tanggal='".$dates."'";
    $query = mysql($database, $sql);
    $row = mysql_fetch_array($query);
    $data = $row[$flow];
    return $data;
}

function getDataBasedOnID($database, $id){
    $sql = "SELECT * FROM masukan WHERE _id='".$id."'";
    $query = mysql($database, $sql);
    $row = mysql_fetch_array($query);
    return $row;
}

function getIDDataFromCalendar($database, $dates){
    $sql = "SELECT * FROM masukan WHERE tanggal='".$dates."'";
    $query = mysql($database, $sql);
    $row = mysql_fetch_array($query);
    $data = $row["_id"];
    return $data;
}

function createFirstData($database, $dates, $index, $skor){
    $queryCreate = "";
    switch($index){
        case 1:
            $queryCreate = "INSERT INTO masukan (_id, tanggal, sangat_puas, puas, tidak_puas, kurang_puas) VALUES ('NULL', '".$dates."', $skor, '0', '0', '0')";
            break;
        case 2:
            $queryCreate = "INSERT INTO masukan (_id, tanggal, sangat_puas, puas, tidak_puas, kurang_puas) VALUES ('NULL', '".$dates."', '0', $skor, '0', '0')";
            break;
        case 3:
            $queryCreate = "INSERT INTO masukan (_id, tanggal, sangat_puas, puas, tidak_puas, kurang_puas) VALUES ('NULL', '".$dates."', '0', '0', $skor, '0')";
            break;
        case 4:
            $queryCreate = "INSERT INTO masukan (_id, tanggal, sangat_puas, puas, tidak_puas, kurang_puas) VALUES ('NULL', '".$dates."', '0', '0', '0', $skor)";
            break;
        
    }
    $sqlCreate = mysql($database, $queryCreate);
}

function updateData($database, $dates, $index, $skor){
    $queryCreate = "";
    switch($index){
        case 1:
            $queryCreate = "UPDATE masukan SET sangat_puas='".$skor."' WHERE tanggal='".$dates."'";
            break;
        case 2:
            $queryCreate = "UPDATE masukan SET puas='".$skor."' WHERE tanggal='".$dates."'";
            break;
        case 3:
            $queryCreate = "UPDATE masukan SET tidak_puas='".$skor."' WHERE tanggal='".$dates."'";
            break;
        case 4:
            $queryCreate = "UPDATE masukan SET kurang_puas='".$skor."' WHERE tanggal='".$dates."'";
            break;
        
    }
    $sqlCreate = mysql($database, $queryCreate);
}

function dateConverter($dates){
    $num_padded = sprintf("%02d", $dates);
    return $num_padded;
}

function calendarConverter($month){
    $returnMonth = "";
    switch($month){
        case "Januari":
            $returnMonth = "01";
            break;
        
        case "Februari":
            $returnMonth = "02";
            break;
        
        case "Maret":
            $returnMonth = "03";
            break;
        
        case "April":
            $returnMonth = "04";
            break;
        
        case "Mei":
            $returnMonth = "05";
            break;
        
        case "Juni":
            $returnMonth = "06";
            break;
        
        case "Juli":
            $returnMonth = "07";
            break;
        
        case "Agustus":
            $returnMonth = "08";
            break;
        
        case "September":
            $returnMonth = "09";
            break;
        
        case "Oktober":
            $returnMonth = "10";
            break;
        
        case "November":
            $returnMonth = "11";
            break;
        
        case "Desember":
            $returnMonth = "12";
            break;
    }
    
return $returnMonth;
}

function dateFormatter($dates, $months, $years){
    $dateFormatted = $dates."/".$months."/".$years;
    return $dateFormatted;
}
