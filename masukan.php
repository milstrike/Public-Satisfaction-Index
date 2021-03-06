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
include "config/dbConfig.php";
include "function/function.php";

$index = $_GET["flow"];
$dates = getDateNow();
$statusDate = checkdatedata($database, $dates);
$flow = "";

switch($index){
    case 1:
        $flow = "sangat_puas";
        break;
    
    case 2:
        $flow = "puas";
        break;
    
    case 3:
        $flow = "tidak_puas";
        break;
    
    case 4:
        $flow = "kurang_puas";
        break;
}

if($statusDate == 1){
    $initValue = getInitialData($database, $dates, $flow);
    $recentValue = $initValue + 1;
    updateData($database, $dates, $index, $recentValue);
    header("location:thanks.php");
}
else{
    createFirstData($database, $dates, $index, '1');
    header("location:thanks.php");
}




