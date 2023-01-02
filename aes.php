<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php 
    require 'aes.class.php';     // AES PHP implementation
    require 'aesctr.class.php';  // AES Counter Mode implementation

    $timer = microtime(true);

    // initialise password & plaintext if not set in post array
    $pw = empty($_POST['pw']) ? ''              : $_POST['pw'];
    $pt = empty($_POST['pt']) ? '' : $_POST['pt'];
    $cipher = empty($_POST['cipher']) ? '' : $_POST['cipher'];
    $plain  = empty($_POST['plain'])  ? '' : $_POST['plain'];

    // perform encryption/decryption as required
    $encr = empty($_POST['encr']) ? $cipher : AesCtr::encrypt($pt, $pw, 256);
    $decr = empty($_POST['decr']) ? $plain  : AesCtr::decrypt($cipher, $pw, 256);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    AES
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
<style>.dropzone {
    border: 5px solid rgb(0, 0, 0);
    width: 25%;
    padding: 2% 2% 5% 2%;
    text-align: center;
    margin: 5px 0 5px 0;
}</style>
  
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
           CREXT
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="aes.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Aes</p>
            </a>
          </li>
          <li>
            <a href="rsa.html">
              <i class="tim-icons icon-atom"></i>
              <p>RSA</p>
            </a>
          </li>
          <li>
            <a href="index.html">
              <i class="tim-icons icon-bank"></i>
              <p>beranda</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      
      
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header mb-5">
                
              </div>
              <div class="card-body">
                <div class="container-xxl py-2">
                    <div class="container">
                        
                            <div class="card card-body">
                                <div class=container>
                                    <div class="divTablefullwidth">
                                        <div class="divTableBody">
                                            <div class="divTableRow">
                                                <div class="divTableCell" style="float: left;">
    
                                                </div>
                                                <div class="divTableCell" style="float: left;">
                                                    <h1>
                                                        <button type="button" class="btn btn-secondary" id="btnDivEncrypt"
                                                            onClick="javascript:switchdiv('encrypt');">Encrypt
                                                            File</button>
                                                        <button type="button" class="btn btn-danger" id="btnDivDecrypt"
                                                            onClick="javascript:switchdiv('decrypt');">Decrypt
                                                            File</button>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
                                <div class=container>
                                    <hr>
                                </div>
    
                                <div class="container" id=divEncryptfile>
                                    <h2>Encrypt File</h2>
                                    <p>Lakukan enkripsi dengan menginputkan password sebegai kunci.</p>
    
                                    <div class="divTable">
                                        <div class="divTableBody">
                                            <div class="divTableRow">
                                                <div class="divTableCell">Password</div>
                                                <div class="divTableCell"><input id=txtEncpassphrase type=password size=30
                                                        onkeyup=javascript:encvalidate(); value=''></div>
                                                <div class="divTableCell">(minimal 8 karakter)</div>
                                            </div>
                                            <div class="divTableRow">
                                                <div class="divTableCell">Password (retype)</div>
                                                <div class="divTableCell"><input id=txtEncpassphraseretype type=password
                                                        size=30 onkeyup=javascript:encvalidate(); value=''></div>
                                                <div class="divTableCell"><span class=greenspan id=spnCheckretype></span>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
    
                                    <p> </p>
    
                                    <div>
                                        <div class=dropzone id="encdropzone" ondrop="drop_handler(event);"
                                            ondragover="dragover_handler(event);" ondragend="dragend_handler(event);">
                                            <p>Drag File Disini Untuk Encrypt<a
                                                    onclick=javascript:encfileElem.click();></a>.</p>
                                            <p><span id=spnencfilename></span></p>
                                        </div>
                                        <input type="file" id="encfileElem" style="display:none"
                                            onchange="selectfile(this.files)">
                                    </div>
    
                                    <p> </p>
    
                                    <div class="divTable">
                                        <div class="divTableBody">
                                            <div class="divTableRow">
                                                <div class="divTableCell"><button type="button" class="btn btn-success"
                                                        id=btnEncrypt onclick=javascript:encryptfile(); disabled>Encrypt
                                                        File</button></div>
                                                <div class="divTableCell"><span id=spnEncstatus></span></div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <p> </p>
    
                                    <div>
                                        <a id=aEncsavefile hidden><button type="button" class="btn btn-info">Save Encrypted
                                                File</button></a>
                                    </div>
    
                                    <p> </p> <div class="centered-wrapper cf">
        <form method="post">

            <h3>Plaintext:</h3>
            <input type="text" name="pt" size="40" value="<?= htmlspecialchars($pt) ?>" autocomplete="off">

            <br><br>
            
            <input type="text" name="cipher" size="40" value="<?= $encr ?>" autocomplete="off">
            <button type="submit" name="encr" value="Encrypt it">Encrypt it</button>
            <br><br>
            
            <input type="text" name="plain" size="40" value="<?= htmlspecialchars($decr) ?>" autocomplete="off">
            <button type="submit" name="decr" value="Decrypt it">Decrypt it</button>
            <br><br>
        </form>
    </div>
                                </div>
    
                                <div class="container" id=divDecryptfile>
                                    <h2>Decrypt File</h2>
                                    <p>Lakukan dekripsi file dengan menginputkan password yang sama ketika enkripsi file.
                                    </p>
    
                                    <div class="divTable">
                                        <div class="divTableBody">
                                            <div class="divTableRow">
                                                <div class="divTableCell">Password</div>
                                                <div class="divTableCell"><input id=txtDecpassphrase type=password size=30
                                                        onkeyup=javascript:decvalidate(); value=''></div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <p> </p>
    
                                    <div>
                                        <div class=dropzone id="decdropzone" ondrop="drop_handler(event);"
                                            ondragover="dragover_handler(event);" ondragend="dragend_handler(event);">
                                            <p>Drag File Disini Untuk Decrypt<a role=button
                                                    onclick=javascript:decfileElem.click();></a>.</p>
                                            <p><span id=spndecfilename></span></p>
                                        </div>
                                        <input type="file" id="decfileElem" style="display:none"
                                            onchange="selectfile(this.files)">
                                    </div>
    
                                    <p> </p>
    
                                    <div class="divTable">
                                        <div class="divTableBody">
                                            <div class="divTableRow">
                                                <div class="divTableCell"><button type="button" class="btn btn-success"
                                                        id=btnDecrypt onclick=javascript:decryptfile(); disabled>Decrypt
                                                        File</button></div>
                                                <div class="divTableCell"><span id=spnDecstatus></span></div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <p> </p>
    
                                    <div>
                                        <a id=aDecsavefile hidden><button type="button" class="btn btn-info">Save Decrypted
                                                File</button></a>
                                    </div>
    
                                    <p> </p>
                                </div>
    
    
                            </div>
                        </div>
                    </div>              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <div class="copyright">
           
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
  <script type="text/javascript">
    var mode = null;
    var objFile = null;
    switchdiv('encrypt');

    function switchdiv(t) {
        if (t == 'encrypt') {
            divEncryptfile.style.display = 'block';
            divDecryptfile.style.display = 'none';
            btnDivEncrypt.disabled = true;
            btnDivDecrypt.disabled = false;
            mode = 'encrypt';
        } else if (t == 'decrypt') {
            divEncryptfile.style.display = 'none';
            divDecryptfile.style.display = 'block';
            btnDivEncrypt.disabled = false;
            btnDivDecrypt.disabled = true;
            mode = 'decrypt';
        }
    }

    function encvalidate() {
        if (txtEncpassphrase.value.length >= 8 && txtEncpassphrase.value == txtEncpassphraseretype.value) {
            spnCheckretype.classList.add("greenspan");
            spnCheckretype.classList.remove("redspan");
            spnCheckretype.innerHTML = '&#10004;';
        } else {
            spnCheckretype.classList.remove("greenspan");
            spnCheckretype.classList.add("redspan");
            spnCheckretype.innerHTML = '&#10006;';
        }

        if (txtEncpassphrase.value.length >= 8 && txtEncpassphrase.value == txtEncpassphraseretype.value &&
            objFile) {
            btnEncrypt.disabled = false;
        } else {
            btnEncrypt.disabled = true;
        }
    }

    function decvalidate() {
        if (txtDecpassphrase.value.length > 0 && objFile) {
            btnDecrypt.disabled = false;
        } else {
            btnDecrypt.disabled = true;
        }
    }

    //drag and drop functions:
    //https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API/File_drag_and_drop
    function drop_handler(ev) {
        console.log("Drop");
        ev.preventDefault();
        // If dropped items aren't files, reject them
        var dt = ev.dataTransfer;
        if (dt.items) {
            // Use DataTransferItemList interface to access the file(s)
            for (var i = 0; i < dt.items.length; i++) {
                if (dt.items[i].kind == "file") {
                    var f = dt.items[i].getAsFile();
                    console.log("... file[" + i + "].name = " + f.name);
                    objFile = f;
                }
            }
        } else {
            // Use DataTransfer interface to access the file(s)
            for (var i = 0; i < dt.files.length; i++) {
                console.log("... file[" + i + "].name = " + dt.files[i].name);
            }
            objFile = file[0];
        }
        displayfile()
        if (mode == 'encrypt') {
            encvalidate();
        } else if (mode == 'decrypt') {
            decvalidate();
        }
    }

    function dragover_handler(ev) {
        console.log("dragOver");
        // Prevent default select and drag behavior
        ev.preventDefault();
    }

    function dragend_handler(ev) {
        console.log("dragEnd");
        // Remove all of the drag data
        var dt = ev.dataTransfer;
        if (dt.items) {
            // Use DataTransferItemList interface to remove the drag data
            for (var i = 0; i < dt.items.length; i++) {
                dt.items.remove(i);
            }
        } else {
            // Use DataTransfer interface to remove the drag data
            ev.dataTransfer.clearData();
        }
    }

    function selectfile(Files) {
        objFile = Files[0];
        displayfile()
        if (mode == 'encrypt') {
            encvalidate();
        } else if (mode == 'decrypt') {
            decvalidate();
        }
    }

    function displayfile() {
        var s;
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        var bytes = objFile.size;
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        if (i == 0) {
            s = bytes + ' ' + sizes[i];
        } else {
            s = (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
        }

        if (mode == 'encrypt') {
            spnencfilename.textContent = objFile.name + ' (' + s + ')';
        } else if (mode == 'decrypt') {
            spndecfilename.textContent = objFile.name + ' (' + s + ')';
        }
    }

    function readfile(file) {
        return new Promise((resolve, reject) => {
            var fr = new FileReader();
            fr.onload = () => {
                resolve(fr.result)
            };
            fr.readAsArrayBuffer(file);
        });
    }

    async function encryptfile() {
        btnEncrypt.disabled = true;

        var plaintextbytes = await readfile(objFile)
            .catch(function (err) {
                console.error(err);
            });
        var plaintextbytes = new Uint8Array(plaintextbytes);

        var pbkdf2iterations = 10000;
        var passphrasebytes = new TextEncoder("utf-8").encode(txtEncpassphrase.value);
        var pbkdf2salt = window.crypto.getRandomValues(new Uint8Array(8));

        var passphrasekey = await window.crypto.subtle.importKey('raw', passphrasebytes, {
                name: 'PBKDF2'
            }, false, ['deriveBits'])
            .catch(function (err) {
                console.error(err);
            });
        console.log('passphrasekey imported');

        var pbkdf2bytes = await window.crypto.subtle.deriveBits({
                "name": 'PBKDF2',
                "salt": pbkdf2salt,
                "iterations": pbkdf2iterations,
                "hash": 'SHA-256'
            }, passphrasekey, 384)
            .catch(function (err) {
                console.error(err);
            });
        console.log('pbkdf2bytes derived');
        pbkdf2bytes = new Uint8Array(pbkdf2bytes);

        keybytes = pbkdf2bytes.slice(0, 32);
        ivbytes = pbkdf2bytes.slice(32);

        var key = await window.crypto.subtle.importKey('raw', keybytes, {
                name: 'AES-CBC',
                length: 256
            }, false, ['encrypt'])
            .catch(function (err) {
                console.error(err);
            });
        console.log('key imported');

        var cipherbytes = await window.crypto.subtle.encrypt({
                name: "AES-CBC",
                iv: ivbytes
            }, key, plaintextbytes)
            .catch(function (err) {
                console.error(err);
            });

        if (!cipherbytes) {
            spnEncstatus.classList.add("redspan");
            spnEncstatus.innerHTML = '<p>Error encrypting file.  See console log.</p>';
            return;
        }

        console.log('plaintext encrypted');
        cipherbytes = new Uint8Array(cipherbytes);

        var resultbytes = new Uint8Array(cipherbytes.length + 16)
        resultbytes.set(new TextEncoder("utf-8").encode('Salted__'));
        resultbytes.set(pbkdf2salt, 8);
        resultbytes.set(cipherbytes, 16);

        var blob = new Blob([resultbytes], {
            type: 'application/download'
        });
        var blobUrl = URL.createObjectURL(blob);
        aEncsavefile.href = blobUrl;
        aEncsavefile.download = objFile.name + '.txt';

        spnEncstatus.classList.add("greenspan");
        spnEncstatus.innerHTML = '<p>File encrypted.</p>';
        aEncsavefile.hidden = false;
    }

    async function decryptfile() {
        btnDecrypt.disabled = true;

        var cipherbytes = await readfile(objFile)
            .catch(function (err) {
                console.error(err);
            });
        var cipherbytes = new Uint8Array(cipherbytes);

        var pbkdf2iterations = 10000;
        var passphrasebytes = new TextEncoder("utf-8").encode(txtDecpassphrase.value);
        var pbkdf2salt = cipherbytes.slice(8, 16);


        var passphrasekey = await window.crypto.subtle.importKey('raw', passphrasebytes, {
                name: 'PBKDF2'
            }, false, ['deriveBits'])
            .catch(function (err) {
                console.error(err);

            });
        console.log('passphrasekey imported');

        var pbkdf2bytes = await window.crypto.subtle.deriveBits({
                "name": 'PBKDF2',
                "salt": pbkdf2salt,
                "iterations": pbkdf2iterations,
                "hash": 'SHA-256'
            }, passphrasekey, 384)
            .catch(function (err) {
                console.error(err);
            });
        console.log('pbkdf2bytes derived');
        pbkdf2bytes = new Uint8Array(pbkdf2bytes);

        keybytes = pbkdf2bytes.slice(0, 32);
        ivbytes = pbkdf2bytes.slice(32);
        cipherbytes = cipherbytes.slice(16);

        var key = await window.crypto.subtle.importKey('raw', keybytes, {
                name: 'AES-CBC',
                length: 256
            }, false, ['decrypt'])
            .catch(function (err) {
                console.error(err);
            });
        console.log('key imported');

        var plaintextbytes = await window.crypto.subtle.decrypt({
                name: "AES-CBC",
                iv: ivbytes
            }, key, cipherbytes)
            .catch(function (err) {
                console.error(err);
            });

        if (!plaintextbytes) {
            spnDecstatus.classList.add("redspan");
            spnDecstatus.innerHTML = '<p>Error decrypting file.  Password may be incorrect.</p>';
            return;
        }

        console.log('ciphertext decrypted');
        plaintextbytes = new Uint8Array(plaintextbytes);

        var blob = new Blob([plaintextbytes], {
            type: 'application/download'
        });
        var blobUrl = URL.createObjectURL(blob);
        aDecsavefile.href = blobUrl;
        aDecsavefile.download = objFile.name.replace(".txt", "");

        spnDecstatus.classList.add("greenspan");
        spnDecstatus.innerHTML = '<p>File decrypted.</p>';
        aDecsavefile.hidden = false;
    }
</script>
</body>

</html>