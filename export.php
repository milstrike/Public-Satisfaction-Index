<!DOCTYPE html>
<!--
The MIT License

Copyright 2017 MIL.System.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
-->
<!--
    Created on : 11 Mei 17, 20:44:10
    Author     : MIL.System
-->
<?php
session_start();
include "config/dbConfig.php";
include "function/function.php";
include "function/exporter.php";
?>
<html lang="en">
  <head>
    <title>Aplikasi Indeks Kepuasan Masyarakat - Kantor Imigrasi Kelas II Nunukan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/docs.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/custom.css" rel="stylesheet" media="screen">
  </head>
  <body>
      <div class="container-fluid">
          <div class="row-fluid">
              <div class="span12">
                  
                  <div class="row-fluid">
                      <div class="span12">
                        <p align="center">
                            <img src="assets/example_logo.png" width="120px">
                        </p>  
                      </div>
                  </div>
                  
                  <div class="row-fluid" style="padding-top: 20px;">
                        <div class="span12">
                            <p align="center" class='strokeme' style="font-family: 'Arial'; font-size: 30px; color: #0000D5">
                                <strong>Public Satisfaction Inde</strong>
                            </p>
                        </div>
                  </div>
                  
                  <div class="row-fluid" style="padding-top: 60px;">
                        <div class="span12">
                            <p align="center" class='strokeme-bl' style="font-family: 'Times'; font-size: 30px; color: #FFF">
                                <strong>Data Management - Export to Excel</strong>
                            </p>
                        </div>
                  </div>
                  
                  <div class="row-fluid" style="padding-top: 20px;">
                        <div class="span6">
                            <p align="center" class='strokeme-bl' style="font-family: 'Arial'; font-size: 20px; color: #FFF">
                                <strong>Start Date</strong>
                            </p>
                            <form class="form-inline" method="POST">
                                <p align="center">
                                <select name="tanggal-awal" class="input-xxlarge span2">
                                    <?php 
                                        for($i = 1; $i<= 31; $i++){
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }?>
                                </select>
                                <select name="bulan-awal" class="input-xxlarge span3">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select name="tahun-awal" class="input-xxlarge span2">
                                    <?php 
                                        for($a = 2017; $a<= 2045; $a++){
                                            echo '<option value="'.$a.'">'.$a.'</option>';
                                        }?>
                                </select>
                            </p>
                        </div>
                        <div class="span6">
                            <p align="center" class='strokeme-bl' style="font-family: 'Arial'; font-size: 20px; color: #FFF">
                                <strong>End Date</strong>
                            </p>
                            <p align="center">
                            <select name="tanggal-akhir" class="input-xxlarge span2">
                                    <?php 
                                        for($i = 1; $i<= 31; $i++){
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }?>
                                </select>
                                <select name="bulan-akhir" class="input-xxlarge span3">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select name="tahun-akhir" class="input-xxlarge span2">
                                    <?php 
                                        for($a = 2017; $a<= 2045; $a++){
                                            echo '<option value="'.$a.'">'.$a.'</option>';
                                        }?>
                                </select>
                            </p>
                        </div>
                  </div>
                  
                  <div class="row-fluid" style="padding-top: 20px;">
                      <div class="span12" style="text-align: center;">
                          <input type="submit" name="dateSubmit" class="btn btn-large btn-primary" value="Export Data!">
                          </form>
                            <p align="center"><span class="text-error"><?php echo $errorMessage; ?></span></p>
                      </div>
                  </div>
                  

                  
              </div>
          </div>
      </div>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </body>
</html>
