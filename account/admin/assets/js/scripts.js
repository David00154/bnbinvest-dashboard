var NioApp = function(a, l, e) {
    "use strict";
    var i = {
            AppInfo: {
                name: "ICOCrypto",
                package: "1.6.0",
                version: "1.0.2",
                author: "Softnio"
            }
        },
        s = {
            docReady: [],
            docReadyDefer: [],
            winLoad: [],
            winLoadDefer: []
        };

    function t(l) {
        l = void 0 === l ? a : l, s.docReady.concat(s.docReadyDefer).forEach(function(a) {
            a(l)
        })
    }

    function o(l) {
        l = "object" == typeof l ? a : l, s.winLoad.concat(s.winLoadDefer).forEach(function(a) {
            a(l)
        })
    }
    return a(e).ready(t), a(l).on("load", o), i.components = s, i.docReady = t, i.winLoad = o, i
}(jQuery, window, document);
NioApp = function(a, l, e, i) {
    "use strict";
    var s = l(e),
        t = l(i),
        o = l("body"),
        d = l(".header-main"),
        n = e.location.href,
        c = d.innerHeight() - 2,
        m = n.split("#");
    return l.fn.exists = function() {
        return this.length > 0
    }, a.Win = {}, a.Win.height = l(e).height(), a.Win.width = l(e).width(), a.getStatus = {}, a.getStatus.isRTL = !(!o.hasClass("has-rtl") && "rtl" !== o.attr("dir")), a.getStatus.isTouch = "ontouchstart" in i.documentElement, a.getStatus.isMobile = !!navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Windows Phone|/i), a.getStatus.asMobile = a.Win.width < 768, s.on("resize", function() {
        a.Win.height = l(e).height(), a.Win.width = l(e).width(), a.getStatus.asMobile = a.Win.width < 768
    }), a.Util = {}, a.Util.classInit = function() {
        var i = function() {
            !0 === a.getStatus.asMobile ? o.addClass("as-mobile") : o.removeClass("as-mobile")
        };
        !0 === a.getStatus.isTouch ? o.addClass("has-touch") : o.addClass("no-touch"), i(), "rtl" === o.attr("dir") && (o.addClass("has-rtl"), a.getStatus.isRTL = !0), l(e).on("resize", i)
    }, a.components.docReady.push(a.Util.classInit), a.Util.preLoader = function() {
        var a = l(".preloader"),
            e = l(".spinner");
        a.exists() && (o.addClass("page-loaded"), e.fadeOut(300), a.delay(600).fadeOut(300))
    }, a.components.winLoad.push(a.Util.preLoader), a.Util.backTop = function() {
        var a = l(".backtop");
        if (a.exists()) {
            s.scrollTop() > 800 ? a.fadeIn("slow") : a.fadeOut("slow"), a.on("click", function(a) {
                l("body,html").stop().animate({
                    scrollTop: 0
                }, 1500, "easeInOutExpo"), a.preventDefault()
            })
        }
    }, a.components.docReady.push(a.Util.backTop), a.Util.browser = function() {
        var a = -1 !== navigator.userAgent.indexOf("Chrome") ? 1 : 0,
            l = -1 !== navigator.userAgent.indexOf("Firefox") ? 1 : 0,
            s = -1 !== navigator.userAgent.indexOf("Safari"),
            t = -1 !== navigator.userAgent.indexOf("MSIE") || i.documentMode ? 1 : 0,
            d = !t && !!e.StyleMedia,
            n = navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf("OPR") ? 1 : 0;
        a ? o.addClass("chrome") : l ? o.addClass("firefox") : t ? o.addClass("ie") : d ? o.addClass("edge") : n ? o.addClass("opera") : s && o.addClass("safari")
    }, a.components.winLoad.push(a.Util.browser), a.Util.headerSticky = function() {
        var a = l(".is-sticky"),
            e = {
                hasFixed: function() {
                    if (a.exists()) {
                        var l = a.offset();
                        s.on("scroll", function() {
                            s.scrollTop() > l.top ? a.hasClass("has-fixed") || a.addClass("has-fixed") : a.hasClass("has-fixed") && a.removeClass("has-fixed")
                        })
                    }
                },
                hasShrink: function() {
                    a.hasClass("is-shrink") && (c = d.height() + 16 - 2)
                }
            };
        e.hasFixed(), e.hasShrink(), s.on("resize", function() {
            c = a.hasClass("is-shrink") ? d.height() + 16 - 2 : d.outerHeight() - 2
        })
    }, a.components.docReady.push(a.Util.headerSticky), a.Util.imageBG = function() {
        var a = l(".bg-image");
        a.exists() && a.each(function() {
            var a = l(this),
                e = a.parent(),
                i = a.data("overlay"),
                s = a.data("opacity"),
                t = a.children("img").attr("src"),
                o = !(void 0 === i || !i) && i,
                d = !(void 0 === s || !s) && s;
            void 0 !== t && "" !== t && (e.hasClass("has-bg-image") || e.addClass("has-bg-image"), o ? a.hasClass("overlay-" + o) || (a.addClass("overlay"), a.addClass("overlay-" + o)) : a.hasClass("overlay-fall") || a.addClass("overlay-fall"), d && a.addClass("overlay-opacity-" + d), a.css("background-image", 'url("' + t + '")').addClass("bg-image-loaded"))
        })
    }, a.components.docReady.push(a.Util.imageBG), a.Util.Ovm = function() {
        var a = l(".nk-ovm"),
            e = l(".nk-ovm[class*=mask]");
        a.exists() && a.each(function() {
            l(this).parent().hasClass("has-ovm") || l(this).parent().addClass("has-ovm")
        }), e.exists() && e.each(function() {
            l(this).parent().hasClass("has-mask") || l(this).parent().addClass("has-mask")
        })
    }, a.components.docReady.push(a.Util.Ovm), a.Util.progressBar = function() {
        var e = l("[data-percent]"),
            i = l("[data-point]");
        e.exists() && e.each(function() {
            l(this).css("width", l(this).data("percent") + "%")
        }), i.exists() && i.each(function() {
            l(this).css("left", l(this).data("point") + "%")
        }), i.exists() && !0 === a.getStatus.isRTL && i.each(function() {
            l(this).css("right", l(this).data("point") + "%"), l(this).css("left", "auto")
        })
    }, a.components.docReady.push(a.Util.progressBar), a.Util.inputAnimate = function() {
        var a = l(".input-line");
        a.exists() && a.each(function() {
            var a = l(this),
                e = a.val(),
                i = "input-focused";
            e && a.parent().addClass(i), a.on("focus", function() {
                l(this).parent().addClass(i)
            }), a.on("blur", function() {
                l(this).parent().removeClass(i), l(this).val() && l(this).parent().addClass(i)
            })
        })
    }, a.components.docReady.push(a.Util.inputAnimate), a.Util.toggler = function() {
        var a = ".toggle-tigger";
        l(a).exists() && t.on("click", a, function(e) {
            var i = l(this);
            l(a).not(i).removeClass("active"), l(".toggle-class").not(i.parent().children()).removeClass("active"), i.toggleClass("active").parent().find(".toggle-class").toggleClass("active"), e.preventDefault()
        }), t.on("click", "body", function(e) {
            var i = l(a),
                s = l(".toggle-class");
            s.is(e.target) || 0 !== s.has(e.target).length || i.is(e.target) || 0 !== i.has(e.target).length || (s.removeClass("active"), i.removeClass("active"))
        })
    }, a.components.docReady.push(a.Util.toggler), a.Util.accordionActive = function() {
        var a = l(".accordion-item"),
            e = l(".accordion-title");
        a.exists() && a.each(function() {
            var a = l(this);
            a.find(".accordion-title").hasClass("collapsed") ? a.removeClass("current") : a.addClass("current")
        }), e.exists() && e.on("click", function() {
            var a = l(this);
            a.parent().siblings().removeClass("current"), a.parent().addClass("current")
        })
    }, a.components.docReady.push(a.Util.accordionActive), a.Util.scrollAnimation = function() {
        var a = l(".animated");
        l().waypoint && a.exists() && a.each(function() {
            var a = l(this),
                e = a.data("animate"),
                i = a.data("duration"),
                s = a.data("delay");
            a.waypoint(function() {
                a.addClass("animated " + e).css("visibility", "visible"), i && a.css("animation-duration", i + "s"), s && a.css("animation-delay", s + "s")
            }, {
                offset: "95%"
            })
        })
    }, a.components.winLoad.push(a.Util.scrollAnimation), a.MainMenu = function() {
        var a = l(".navbar-toggle"),
            e = l(".header-navbar"),
            i = l(".header-navbar-classic"),
            o = l(".menu-toggle"),
            c = l(".menu-link"),
            r = {
                Overlay: function() {
                    e.exists() && e.append('<div class="header-navbar-overlay"></div>')
                },
                navToggle: function() {
                    a.exists() && a.on("click", function(a) {
                        var e = l(this),
                            s = e.data("menu-toggle");
                        e.toggleClass("navbar-active"), i.exists() ? l("#" + s).slideToggle().toggleClass("menu-shown") : l("#" + s).parent().toggleClass("menu-shown"), a.preventDefault()
                    })
                },
                navClose: function() {
                    l(".header-navbar-overlay").on("click", function() {
                        a.removeClass("navbar-active"), e.removeClass("menu-shown")
                    }), c.on("click", function(i) {
                        l(this).hasClass("menu-toggle") || (a.removeClass("navbar-active"), e.removeClass("menu-shown"))
                    }), t.on("click", "body", function(l) {
                        !o.is(l.target) && 0 === o.has(l.target).length && !d.is(l.target) && 0 === d.has(l.target).length && s.width() < 992 && (a.removeClass("navbar-active"), i.find(".header-menu").slideUp(), e.removeClass("menu-shown"))
                    })
                },
                menuToggle: function() {
                    o.exists() && o.on("click", function(a) {
                        var e = l(this).parent();
                        s.width() < 992 && (e.children(".menu-drop").slideToggle(400), e.siblings().children(".menu-drop").slideUp(400), e.toggleClass("open-nav"), e.siblings().removeClass("open-nav")), a.preventDefault()
                    })
                },
                mobileNav: function() {
                    s.width() < 992 ? e.delay(500).addClass("menu-mobile") : (e.delay(500).removeClass("menu-mobile"), e.removeClass("menu-shown"))
                },
                currentPage: function() {
                    c.exists() && c.each(function() {
                        n === this.href && "" !== m[1] && l(this).closest("li").addClass("active").parent().closest("li").addClass("active")
                    })
                }
            };
        r.Overlay(), r.navToggle(), r.navClose(), r.menuToggle(), r.mobileNav(), r.currentPage(), s.on("resize", function() {
            r.mobileNav()
        })
    }, a.components.docReady.push(a.MainMenu), a.OnePageScroll = function() {
        l('a.menu-link[href*="#"]:not([href="#"])').on("click", function() {
            if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname) {
                var a = this.hash,
                    e = !!this.hash.slice(1) && l("[name=" + this.hash.slice(1) + "]"),
                    i = a.length ? l(a) : e;
                if (i.length) return l(".navbar-toggle").removeClass("active"), l(".header-navbar").removeClass("menu-shown"), l("html, body").delay(150).animate({
                    scrollTop: i.offset().top - c
                }, 1e3, "easeInOutExpo"), !1
            }
        })
    }, a.components.docReady.push(a.OnePageScroll), a.scrollAct = function() {
        o.scrollspy({
            target: "#header-menu",
            offset: c + 2
        })
    }, a.components.docReady.push(a.scrollAct), a.Plugins = {}, a.Plugins.countdown = function() {
        var a = l(".countdown");
        a.exists() && a.each(function() {
            var a = l(this),
                e = a.attr("data-date"),
                i = a.data("day-text") ? a.data("day-text") : "Days",
                s = a.data("hour-text") ? a.data("hour-text") : "Hours",
                t = a.data("min-text") ? a.data("min-text") : "Min",
                o = a.data("sec-text") ? a.data("sec-text") : "Sec";
            a.countdown(e).on("update.countdown", function(a) {
                l(this).html(a.strftime('<div class="countdown-item"><span class="countdown-time countdown-time-first">%D</span><span class="countdown-text">' + i + '</span></div><div class="countdown-item"><span class="countdown-time">%H</span><span class="countdown-text">' + s + '</span></div><div class="countdown-item"><span class="countdown-time">%M</span><span class="countdown-text">' + t + '</span></div><div class="countdown-item"><span class="countdown-time countdown-time-last">%S</span><span class="countdown-text">' + o + "</span></div>"))
            })
        })
    }, a.components.docReady.push(a.Plugins.countdown), a.Plugins.carousel = function() {
        var e = l(".has-carousel");

        function i(a) {
            var e = l(a);
            !e.hasClass("blank-added") && s.width() > 575 ? (e.trigger("add.owl.carousel", ['<div class="item-blank"></div>']), e.addClass("blank-added").removeClass("blank-removed"), e.trigger("refresh.owl.carousel")) : !e.hasClass("blank-removed") && s.width() < 576 && e.hasClass("blank-added") && (e.trigger("remove.owl.carousel", -1), e.addClass("blank-removed").removeClass("blank-added"), e.trigger("refresh.owl.carousel"))
        }
        e.exists() && e.each(function() {
            var e = l(this),
                t = e.data("items") ? e.data("items") : 4,
                o = e.data("items-desk") ? e.data("items-desk") : t,
                d = e.data("items-tab-l") ? e.data("items-tab-l") : t > 3 ? t - 1 : t,
                n = e.data("items-tab-p") ? e.data("items-tab-p") : d > 2 ? d - 1 : d,
                c = e.data("items-mobile") ? e.data("items-mobile") : n > 1 ? n - 1 : n,
                m = e.data("items-mobile-s") ? e.data("items-mobile-s") : c,
                r = e.data("timeout") ? e.data("timeout") : 6e3,
                h = !!e.data("auto") && e.data("auto"),
                g = !!e.data("loop") && e.data("loop"),
                v = !!e.data("dots") && e.data("dots"),
                p = !!e.data("custom-dots") && "." + e.data("custom-dots"),
                u = !!e.data("navs") && e.data("navs"),
                f = !!e.data("center") && e.data("center"),
                b = e.data("margin") ? e.data("margin") : 30,
                x = !!e.data("animate-out") && e.data("animate-out"),
                k = !!e.data("animate-in") && e.data("animate-in");
            t <= 1 && (t = o = d = n = c = 1), e.addClass("owl-carousel").owlCarousel({
                navText: ["", ""],
                items: t,
                loop: g,
                nav: u,
                dots: v,
                dotsContainer: p,
                margin: b,
                center: f,
                autoplay: h,
                autoplayTimeout: r,
                autoplaySpeed: 600,
                animateOut: x,
                animateIn: k,
                rtl: a.getStatus.isRTL,
                responsive: {
                    0: {
                        items: m
                    },
                    576: {
                        items: c
                    },
                    768: {
                        items: n
                    },
                    992: {
                        items: d
                    },
                    1200: {
                        items: t
                    },
                    1600: {
                        items: o
                    }
                },
                onInitialized: function() {
                    l().waypoint && Waypoint.refreshAll()
                }
            }), !0 === e.data("blank") && (i(e), s.on("resize", function() {
                i(e)
            }))
        })
    }, a.components.docReady.push(a.Plugins.carousel), a.Plugins.select2 = function() {
        var a = l(".select");
        a.exists() && a.each(function() {
            var a = l(this),
                e = a.data("select2-theme") ? a.data("select2-theme") : "bordered",
                i = a.data("select2-placehold") ? a.data("select2-placehold") : "Select an option";
            a.select2({
                placeholder: i,
                theme: "default select-" + e
            })
        })
    }, a.components.docReady.push(a.Plugins.select2), a.Plugins.validform = function() {
        var a = l(".form-validate");
        if (!l().validate) return console.log("jQuery Form Validate not Defined."), !0;
        a.exists() && a.each(function() {
            var a = l(this);
            a.validate(), a.find(".select").on("change", function() {
                l(this).valid()
            })
        })
    }, a.components.docReady.push(a.Plugins.validform), a.Plugins.submitform = function() {
        var a = l(".nk-form-submit");
        if (!l().validate && !l().ajaxSubmit) return console.log("jQuery Form and Form Validate not Defined."), !0;
        a.exists() && a.each(function() {
            var a = l(this),
                e = a.find(".form-results");
            a.validate({
                ignore: [],
                invalidHandler: function() {
                    e.slideUp(400)
                },
                submitHandler: function(a) {
                    e.slideUp(400), l(a).ajaxSubmit({
                        target: e,
                        dataType: "json",
                        success: function(i) {
                            var s = "error" === i.result ? "alert-danger" : "alert-success";
                            e.removeClass("alert-danger alert-success").addClass("alert " + s).html(i.message).slideDown(400), "error" !== i.result && l(a).clearForm().find("input").removeClass("input-focused")
                        }
                    })
                }
            }), a.find(".select").on("change", function() {
                l(this).valid()
            })
        })
    }, a.components.docReady.push(a.Plugins.submitform), a.demoPanel = function() {
        var e = a.getStatus.isRTL ? "./../images" : "./images",
            i = a.getStatus.isRTL ? "../landing/rtl/" : "./landing/",
            s = a.getStatus.isRTL ? "../../ico-user/" : "../ico-user/",
            t = a.getStatus.isRTL ? "../" : "./rtl/",
            d = a.getStatus.isRTL ? "LTR" : "RTL";
        o.append('');
        var n = l(".demo-themes,.demo-close"),
            c = l(".demo-content"),
            m = l(".demo-color-toggle"),
            r = l(".demo-color"),
            h = l(".color-trigger");
        c.length > 0 && n.on("click", function() {
            c.toggleClass("demo-active").css("display", "block"), o.toggleClass("shown-preview")
        }), m.length > 0 && m.on("click", function() {
            r.slideToggle("slow")
        }), h.length > 0 && h.on("click", function() {
            var a = l(this).attr("title");
            return l("#theming").attr("href", "assets/css/" + a + ".css"), !1
        })
    }, a.components.docReady.push(a.demoPanel), a.promoPanel = function() {
        var e = a.getStatus.isRTL ? "../images" : "./images";
        o.append('<a target="_blank" href="https://t.me/" class="promo-trigger"><div class="promo-trigger-img"><i class="fa fa-paper-plane"></i></div><div class="promo-trigger-text">Official Telegram Group</div></a>');
        var i = l(".promo-trigger"),
            s = l(".promo-content"),
            t = l(".promo-close");
        t.length > 0 && t.on("click", function() {
            var a = Cookies.get("twz-offer");
            return s.removeClass("active"), i.addClass("active"), null === a && Cookies.set("twz-offer", "true", {
                expires: 1,
                path: ""
            }), !1
        }), null === Cookies.get("twz-offer") ? s.addClass("active") : i.addClass("active")
    }, a.components.winLoad.push(a.promoPanel), a.Plugins.parallax = function() {
        var a = l("[data-parallax]");
        a.exists() && a.each(function() {
            var a = l(this);
            !0 === a.data("parallax") && (a.addClass("plx-bg"), a.parent().addClass("has-plx"))
        })
    }, a.components.docReady.push(a.Plugins.parallax), a.Plugins.popup = function() {
        var a = l(".content-popup"),
            e = l(".video-popup"),
            i = l(".image-popup"),
            s = {
                content_popup: function() {
                    a.exists() && a.each(function() {
                        l(this).magnificPopup({
                            type: "inline",
                            preloader: !0,
                            removalDelay: 400,
                            mainClass: "mfp-fade content-popup"
                        })
                    })
                },
                video_popup: function() {
                    e.exists() && e.each(function() {
                        l(this).magnificPopup({
                            type: "iframe",
                            removalDelay: 160,
                            preloader: !0,
                            fixedContentPos: !1,
                            callbacks: {
                                beforeOpen: function() {
                                    this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim"), this.st.mainClass = this.st.el.attr("data-effect")
                                }
                            }
                        })
                    })
                },
                image_popup: function() {
                    i.exists() && i.each(function() {
                        l(this).magnificPopup({
                            type: "image",
                            mainClass: "mfp-fade image-popup"
                        })
                    })
                }
            };
        s.content_popup(), s.video_popup(), s.image_popup()
    }, a.components.docReady.push(a.Plugins.popup), a.Plugins.particles = function() {
        var a = l(".particles-bg");
        a.exists() && a.each(function() {
            var a = l(this),
                e = a.attr("id"),
                i = a.data("default-color") ? a.data("default-color") : "#fff",
                s = a.data("shape-stroke-color") ? a.data("shape-stroke-color") : "#fff",
                t = a.data("line-linked-color") ? a.data("line-linked-color") : "#fff";
            particlesJS(e, {
                particles: {
                    number: {
                        value: 40,
                        density: {
                            enable: !0,
                            value_area: 800
                        }
                    },
                    color: {
                        value: i
                    },
                    shape: {
                        type: "circle",
                        opacity: .1,
                        stroke: {
                            width: 0,
                            color: s
                        },
                        polygon: {
                            nb_sides: 5
                        }
                    },
                    opacity: {
                        value: .1,
                        random: !1,
                        anim: {
                            enable: !1,
                            speed: 1,
                            opacity_min: .12,
                            sync: !1
                        }
                    },
                    size: {
                        value: 6,
                        random: !0,
                        anim: {
                            enable: !1,
                            speed: 40,
                            size_min: .08,
                            sync: !1
                        }
                    },
                    line_linked: {
                        enable: !0,
                        distance: 150,
                        color: t,
                        opacity: .2,
                        width: 1.3
                    },
                    move: {
                        enable: !0,
                        speed: 6,
                        direction: "none",
                        random: !1,
                        straight: !1,
                        out_mode: "out",
                        bounce: !1,
                        attract: {
                            enable: !1,
                            rotateX: 600,
                            rotateY: 1200
                        }
                    }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: {
                            enable: !0,
                            mode: "repulse"
                        },
                        onclick: {
                            enable: !0,
                            mode: "push"
                        },
                        resize: !0
                    },
                    modes: {
                        grab: {
                            distance: 400,
                            line_linked: {
                                opacity: 1
                            }
                        },
                        bubble: {
                            distance: 400,
                            size: 40,
                            duration: 2,
                            opacity: 8,
                            speed: 3
                        },
                        repulse: {
                            distance: 200,
                            duration: .4
                        },
                        push: {
                            particles_nb: 4
                        },
                        remove: {
                            particles_nb: 2
                        }
                    }
                },
                retina_detect: !0
            })
        })
    }, a.components.docReady.push(a.Plugins.particles), a
}(NioApp, jQuery, window, document);