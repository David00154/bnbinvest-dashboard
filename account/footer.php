<footer class="main-footer">
    Copyright &copy; 2022 BnbInvest Fx Trade. All Rights Reserved.
</footer>

</div>
<!-- ./wrapper -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en'
            },
            'google_translate_element'
        );
        /*
      To remove the "powered by google",
      uncomment one of the following code blocks.
      NB: This breaks Google's Attribution Requirements:
      https://developers.google.com/translate/v2/attribution#attribution-and-logos
  */

        // Native (but only works in browsers that support query selector)
        if (typeof(document.querySelector) == 'function') {
            document.querySelector('.goog-logo-link').setAttribute('style', 'display: none');
            document.querySelector('.goog-te-gadget').setAttribute('style', 'font-size: 0');
        }

        // If you have jQuery - works cross-browser - uncomment this
        jQuery('.goog-logo-link').css('display', 'none');
        jQuery('.goog-te-gadget').css('font-size', '0');
    }
</script>
<!-- GetButton.io widget -->
<!-- <script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "+17322016143", // WhatsApp number
            call_to_action: "", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
            host = "getbutton.io",
            url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script> -->
<!-- /GetButton.io widget -->

<!-- jQuery 3 -->
<script>
    if (document.getElementById("balancebtc") != null) {
        $(document).ready(function() {



            var dataString = <?= $UserDetails->balance ?>;

            $.ajax({
                "url": "https://blockchain.info/tobtc?currency=USD&value=" + dataString,
                "method": "POST",
                "timeout": 0,
                beforeSend: function() {
                    // Show image container
                    $("#balancebtc").val("Loading");
                },
                success: function(result) {
                    //console.log(result);
                    //var btc = '<img src=\"../data/crypto-dash/coin1.png\" class=\"ic1 width-20\">' + result + ' BTC';
                    //$("#balancebtc").appendl(btc);
                    document.getElementById("balancebtc").innerHTML += result + ' BTC';
                },
                error: function(xhr, status, error) {
                    $("#balancebtc").html("Error in converting");
                }


            });

        });
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script src="js/custom-script.js"></script>
<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- Slimscroll -->
<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- This is data table -->
<script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>

<!-- Crypto_Admin App -->
<script src="js/template.js"></script>

<!-- Crypto_Admin dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>

<!-- Crypto_Admin for demo purposes -->
<script src="js/demo.js"></script>

<!-- Crypto_Admin for Data Table -->
<script src="js/pages/data-table.js"></script>

<!-- Start of Async Drift Code -->
<script>
    "use strict";

    !(function() {
        var t = (window.driftt = window.drift = window.driftt || []);
        if (!t.init) {
            if (t.invoked)
                return void(
                    window.console &&
                    console.error &&
                    console.error("Drift snippet included twice.")
                );
            (t.invoked = !0),
            (t.methods = [
                "identify",
                "config",
                "track",
                "reset",
                "debug",
                "show",
                "ping",
                "page",
                "hide",
                "off",
                "on",
            ]),
            (t.factory = function(e) {
                return function() {
                    var n = Array.prototype.slice.call(arguments);
                    return n.unshift(e), t.push(n), t;
                };
            }),
            t.methods.forEach(function(e) {
                    t[e] = t.factory(e);
                }),
                (t.load = function(t) {
                    var e = 3e5,
                        n = Math.ceil(new Date() / e) * e,
                        o = document.createElement("script");
                    (o.type = "text/javascript"),
                    (o.async = !0),
                    (o.crossorigin = "anonymous"),
                    (o.src =
                        "https://js.driftt.com/include/" + n + "/" + t + ".js");
                    var i = document.getElementsByTagName("script")[0];
                    i.parentNode.insertBefore(o, i);
                });
        }
    })();
    drift.SNIPPET_VERSION = "0.3.1";
    drift.load("85kxn6cadctf");
</script>
<!-- End of Async Drift Code -->



<!-- Smartsupp Live Chat script
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'a12c064ff68a07c8112619ca2c3658bcd2300535';
    window.smartsupp || (function(d) {
        var s, c, o = smartsupp = function() {
            o._.push(arguments)
        };
        o._ = [];
        s = d.getElementsByTagName('script')[0];
        c = d.createElement('script');
        c.type = 'text/javascript';
        c.charset = 'utf-8';
        c.async = true;
        c.src = 'https://www.smartsuppchat.com/loader.js?';
        s.parentNode.insertBefore(c, s);
    })(document);
</script>
 -->
<!-- <script src="https://code.tidio.co/aumcuiixq8ko7qs0kxghgfswcz7bynap.js" async></script> -->
</body>

</html>