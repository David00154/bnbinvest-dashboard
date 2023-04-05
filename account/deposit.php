<?php
include "../core/config.php";
if (!isLogged()) {
  header("location: ../sign-in.php");
  exit;
}
// if ($UserDetails->verify > 0) {
//   header("location: verify.php");
//   exit;
// }

$wallet = generateWallet();
$getdepo = "";
$depo = $royaldb->query("SELECT * FROM topup WHERE user_id='$UserDetails->id' ORDER BY id DESC") or die($royaldb->error);
if ($depo->num_rows > 0) {
  $sn = 1;
  while ($load = $depo->fetch_object()) {
    $getWdate = date("M-d-Y", $load->date);
    $getdepo .= "<tr><td>$sn</td><td>$load->type</td><td>$" . number_format((float)$load->amount) . "</td><td>$getWdate</td></tr>";
    $sn++;
  }
} else {
  $getdepo .= "<tr>No Deposit Yet</tr>";
}


include "header.php";
include "sidebar.php";


?>
<title>Deposit | BnbInvest Fx </title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div id="google_translate_element" class="text-center mb-2"></div>
    <h1>
      Deposit Funds
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Deposit Funds</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h6>Make your first deposit with any of the following methods immediately your deposit has been confirmed.</h6><br>
      </div>
      <?php
      if ($UserDetails->btc_wallet != NULL) {
      ?>
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="images/bitcoin.jpg" alt="Bitcoin">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#bitcoin"><i class="fa fa-share"></i> Choose This</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="bitcoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer bitcoin (BTC) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 300 USD.</p>

                      <!-- <center>
                      <p class="mb-20">
                        <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bitcoin:<?= $wallet ?>" />
                      </p>
                    </center> -->

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="<?= $UserDetails->btc_wallet ?>">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="bitcoin:<?= $wallet ?>" class="btn btn-success btn-lg mb-20" style="font-size: 20px; font-weight: bold;">Pay Using BTC Wallet App</a>
                      </center>
                      <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Col -->
      <?php } ?>

      <?php if ($UserDetails->bnb_wallet != NULL) { ?>
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALYAAAB5CAMAAACjkCtXAAAAeFBMVEUiIiLwuQsEEiP3vgmzixX8wgj0vAoYHCIfICIKFCOEaBsAACRLPh8sJyJ6YRzfrA4TGSPBlhOPcBlDOSAADiPptA3aqRCYdxnToxA0LiG5kBQACCOJbBrNnxEmJSI4MSFjUB5YRh89NCCmgRdbSx5qVB0ZFyJRQh/EfsaiAAAE1ElEQVR4nO2a2ZaiMBCGgQhJQCUiCLK4O/3+bzjZwIC4QF/MyZn6L/q0QsXPn6IqCToOCAQCgUAgEAgEAoFAIBAIBAKBQCDQ/y5C/jXBHLH9iv1rhuli2zjeWsfN0jgI4tQybu514LqBZX4zT1ALbpv8Vl4rbnv8ZqylFtzUEu6H1zb5zYhJLbixBdx9r23xmzkdddD9EzsvuIlniFKKyfAYezobqxe4H8rwr6gfXqOmQR/8JpeFqWt9wml37CDeKsOqOxvfSvHOTQKye9kLDc+/KLXs8KAu9vviwT06P8FLH/XkFmGkDScrecw9d4FsLd7x11S88OpBaNac0pGP+Ira8HqXYpzu3vuNl4PbwA38jUM0tm5YqzZxODZ/o8UO/afQnM6iJkfTa34t8dHw+/g8j33G5pFlZGJ3rz9i81PXs/xmSTsU2lGZgYbffvJst8YOfCmkOP0bM7FdlHuvsZGK1B+SrWZN8dMcGV5LsDa/UT7ihMIONnUidNXzmEXaw3aDM32FHVxlZFK6KjSclyZpjQyvJZkn/Ub12PVT2CiPZBWLolJ+iwYPsDNlwgg2OlciMo1IIUMnZzdh4vqQivvdeo3V3z2vgyiv5OFBdW2x9Yfhn0xikz62izZy8DHskx7QW8uRrhOx6bI8yBHS2i8UXJok0mFMd77yGh/KZW/cATbZxgK7pANs18+jD9jsLq9LMg2bXWK/ccQQJA0vcqgqCYJE9gp8CVPhFnYaP76YN2aL7REuzCplWe2Z2Orvnb7AZiKUsOoqz7tN6pVU1GtUEJWC8hqnYlg/VHeXRMWE3528fhuGtNjOnmt7y2V+Zp6RJEHTBG16j2HfVyL0crrKG2gTORPEvZYf3xy6L8u9Vlet6834IHt9r+/oApgpuQrwpI5r7M1WpXdDyVgBNEPR7jjFbNz2RlQcdN1kbTPwaw1JHF0JOfejzDx3yWKvS06LHdWqQF+rT11y8WfSrMRr2hF8VXL5pOdRBfRNUy26k4quFo50yex67Lsd0YX8vugefeiSceLMdNuZ53agpAbJbsYtybEJVp02u4xhG5Gu30zKkrHcrqfk9k4p1tn9g01shy0zOVYzgh3rUJ3dXZZ+pQ+VBH+oJEmklJ5lJqmC8MB26FqlieyEgy6pQ527NMWvvQnYH+r21qjbx7G63X4TFqkeTUkP24lkfVMlfLzdELqXHXY3qQS+7ZLs2y7JYVT9PeM+NsFNd++OY/OxNuKUbOI275s5SfHtnITbWkpsUbpNbD5xz4L32ITtJPZ+ztR19gyQL38pn8idJBz6GbjNB16PY6sZoOdVUaLKDZ6BPXe+nSR1XYd13qbC4JY0hx6fb3dz9WZabkuNrG68CaubbnlzrZ6xSaX3AcZWN3x5o0PvM5bvz2vJ/fS1pAglz9h8rPi5kgxDy1mbDr9fuXMsPbcdYjv05r/H5qv+1bxNntf7JIev9klQFte62qh9Et+Yi1YJerNPEmTF3Zv7kOtXu1KLPDyRtN3eUbtSiXEnk/zlrtQiX5+9eetfxT1/D9DzKDPq18geIHu1ByhD50M7tu642rq/bevThOGzG2YJta1Pysznkp5F1LY+Bbb1mbutv3Cw9fcktv56BwQCgUAgEAgEAoFAIBAIBAKBQCAQyBr9BfcmXzCAo6VyAAAAAElFTkSuQmCC" alt="Bnb">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#bnb"><i class="fa fa-share"></i> Choose This</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="bnb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer bnb (BNB) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 300 USD.</p>

                      <!-- <center>
            <p class="mb-20">
              <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bnb:<?= $wallet ?>" />
            </p>
          </center> -->

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="<?= $UserDetails->bnb_wallet ?>">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="bnb:<?= $wallet ?>" class="btn btn-success btn-lg mb-20" style="font-size: 20px; font-weight: bold;">Pay Using BNB Wallet App</a>
                      </center>
                      <!-- <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p> -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Col -->


      <?php } ?>

      <?php if ($UserDetails->blur_wallet != NULL) { ?>
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSLpKhPZ5BB4-r9bauqRItAIqhyXbAHJQcwmFAtBQICA&s" alt="Blur">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#blur"><i class="fa fa-share"></i> Choose This</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="blur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer blur (Blur) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 300 USD.</p>

                      <!-- <center>
            <p class="mb-20">
              <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=blur:<?= $wallet ?>" />
            </p>
          </center> -->

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="<?= $UserDetails->blur_wallet ?>">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="blur:<?= $wallet ?>" class="btn btn-success btn-lg mb-20" style="font-size: 20px; font-weight: bold;">Pay Using Blur Wallet App</a>
                      </center>
                      <!-- <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p> -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Col -->


      <?php } ?>

      <?php if ($UserDetails->pi_wallet != NULL) { ?>
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="data:image/png;base64,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" alt="Pi">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#pi"><i class="fa fa-share"></i> Choose This</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="pi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer pi (Pi) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 300 USD.</p>

                      <!-- <center>
            <p class="mb-20">
              <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=pi:<?= $wallet ?>" />
            </p>
          </center> -->

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="<?= $UserDetails->pi_wallet ?>">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="pi:<?= $wallet ?>" class="btn btn-success btn-lg mb-20" style="font-size: 20px; font-weight: bold;">Pay Using Pi Wallet App</a>
                      </center>
                      <!-- <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p> -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Col -->


      <?php } ?>


      <!-- Bank Transfer -->
      <!-- <div class="col-md-3">
        <div class="box box-widget"> -->
          <!-- /.box-header -->
          <!-- <div class="box-body">
            <img class="img-fluid pad" src="images/mastercard.png" alt="Ria">

            <a href="carddeposit.php"><button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#ria"><i class="fa fa-share"></i> Choose This</button></a>

          </div> -->
          <!-- /.box-body -->
        <!-- </div> -->
        <!-- /.box -->
      <!-- </div> -->
      <!-- Col -->
      <!-- Bank Transfer end -->

      <?php if ($UserDetails->ada_wallet != NULL) { ?>
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="data:image/png;base64,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" alt="Ada">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#ada"><i class="fa fa-share"></i> Choose This</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="ada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer ada (Ada) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 300 USD.</p>

                      <!-- <center>
            <p class="mb-20">
              <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=pi:<?= $wallet ?>" />
            </p>
          </center> -->

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="<?= $UserDetails->ada_wallet ?>">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="pi:<?= $wallet ?>" class="btn btn-success btn-lg mb-20" style="font-size: 20px; font-weight: bold;">Pay Using Ada Wallet App</a>
                      </center>
                      <!-- <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p> -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Col -->


      <?php } ?>

      <?php if ($UserDetails->usdt_wallet != NULL) { ?>
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="data:image/png;base64,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" alt="Usdt">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#usdt"><i class="fa fa-share"></i> Choose This</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="usdt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer usdt (Usdt) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 300 USD.</p>

                      <!-- <center>
            <p class="mb-20">
              <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=pi:<?= $wallet ?>" />
            </p>
          </center> -->

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="<?= $UserDetails->usdt_wallet ?>">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="pi:<?= $wallet ?>" class="btn btn-success btn-lg mb-20" style="font-size: 20px; font-weight: bold;">Pay Using Usdt Wallet App</a>
                      </center>
                      <!-- <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p> -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Col -->


      <?php } ?>

    </div>
    <!-- Row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title text-white"><i class="fa fa-history"></i> Deposit History</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Payment Gateway</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?= $getdepo ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include "footer.php";
?>
<script src="js/clipboard.min.js"></script>
<script>
  new ClipboardJS('#copy-button');
</script>