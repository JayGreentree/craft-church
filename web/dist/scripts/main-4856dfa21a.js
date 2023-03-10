! function(t, e, i) {
    function n(i, n, o) { var s = e.createElement(i); return n && (s.id = Y + n), o && (s.style.cssText = o), t(s) }

    function o() { return i.innerHeight ? i.innerHeight : t(i).height() }

    function s(e, i) { i !== Object(i) && (i = {}), this.cache = {}, this.el = e, this.value = function(e) { var n; return void 0 === this.cache[e] && (n = t(this.el).attr("data-cbox-" + e), void 0 !== n ? this.cache[e] = n : void 0 !== i[e] ? this.cache[e] = i[e] : void 0 !== Z[e] && (this.cache[e] = Z[e])), this.cache[e] }, this.get = function(e) { var i = this.value(e); return t.isFunction(i) ? i.call(this.el, this) : i } }

    function r(t) {
        var e = k.length,
            i = (z + t) % e;
        return 0 > i ? e + i : i
    }

    function a(t, e) { return Math.round((/%/.test(t) ? ("x" === e ? S.width() : o()) / 100 : 1) * parseInt(t, 10)) }

    function l(t, e) { return t.get("photo") || t.get("photoRegex").test(e) }

    function h(t, e) { return t.get("retinaUrl") && i.devicePixelRatio > 1 ? e.replace(t.get("photoRegex"), t.get("retinaSuffix")) : e }

    function c(t) { "contains" in w[0] && !w[0].contains(t.target) && t.target !== y[0] && (t.stopPropagation(), w.focus()) }

    function d(t) { d.str !== t && (w.add(y).removeClass(d.str).addClass(t), d.str = t) }

    function p(e) {
        z = 0, e && e !== !1 && "nofollow" !== e ? (k = t("." + tt).filter(function() {
            var i = t.data(this, J),
                n = new s(this, i);
            return n.get("rel") === e
        }), z = k.index(F.el), -1 === z && (k = k.add(F.el), z = k.length - 1)) : k = t(F.el)
    }

    function u(i) { t(e).trigger(i), at.triggerHandler(i) }

    function f(i) {
        var o;
        if (!V) {
            if (o = t(i).data(J), F = new s(i, o), p(F.get("rel")), !q) {
                q = Q = !0, d(F.get("className")), w.css({ visibility: "hidden", display: "block", opacity: "" }), I = n(lt, "LoadedContent", "width:0; height:0; overflow:hidden; visibility:hidden"), T.css({ width: "", height: "" }).append(I), U = $.height() + E.height() + T.outerHeight(!0) - T.height(), j = x.width() + C.width() + T.outerWidth(!0) - T.width(), M = I.outerHeight(!0), L = I.outerWidth(!0);
                var r = a(F.get("initialWidth"), "x"),
                    l = a(F.get("initialHeight"), "y"),
                    h = F.get("maxWidth"),
                    f = F.get("maxHeight");
                F.w = Math.max((h !== !1 ? Math.min(r, a(h, "x")) : r) - L - j, 0), F.h = Math.max((f !== !1 ? Math.min(l, a(f, "y")) : l) - M - U, 0), I.css({ width: "", height: F.h }), G.position(), u(et), F.get("onOpen"), W.add(A).hide(), w.focus(), F.get("trapFocus") && e.addEventListener && (e.addEventListener("focus", c, !0), at.one(st, function() { e.removeEventListener("focus", c, !0) })), F.get("returnFocus") && at.one(st, function() { t(F.el).focus() })
            }
            var g = parseFloat(F.get("opacity"));
            y.css({ opacity: g === g ? g : "", cursor: F.get("overlayClose") ? "pointer" : "", visibility: "visible" }).show(), F.get("closeButton") ? H.html(F.get("close")).appendTo(T) : H.appendTo("<div/>"), v()
        }
    }

    function g() { w || (X = !1, S = t(i), w = n(lt).attr({ id: J, "class": t.support.opacity === !1 ? Y + "IE" : "", role: "dialog", tabindex: "-1" }).hide(), y = n(lt, "Overlay").hide(), D = t([n(lt, "LoadingOverlay")[0], n(lt, "LoadingGraphic")[0]]), b = n(lt, "Wrapper"), T = n(lt, "Content").append(A = n(lt, "Title"), P = n(lt, "Current"), _ = t('<button type="button"/>').attr({ id: Y + "Previous" }), N = t('<button type="button"/>').attr({ id: Y + "Next" }), R = t('<button type="button"/>').attr({ id: Y + "Slideshow" }), D), H = t('<button type="button"/>').attr({ id: Y + "Close" }), b.append(n(lt).append(n(lt, "TopLeft"), $ = n(lt, "TopCenter"), n(lt, "TopRight")), n(lt, !1, "clear:left").append(x = n(lt, "MiddleLeft"), T, C = n(lt, "MiddleRight")), n(lt, !1, "clear:left").append(n(lt, "BottomLeft"), E = n(lt, "BottomCenter"), n(lt, "BottomRight"))).find("div div").css({ "float": "left" }), O = n(lt, !1, "position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;"), W = N.add(_).add(P).add(R)), e.body && !w.parent().length && t(e.body).append(y, w.append(b, O)) }

    function m() {
        function i(t) { t.which > 1 || t.shiftKey || t.altKey || t.metaKey || t.ctrlKey || (t.preventDefault(), f(this)) }
        return !!w && (X || (X = !0, N.click(function() { G.next() }), _.click(function() { G.prev() }), H.click(function() { G.close() }), y.click(function() { F.get("overlayClose") && G.close() }), t(e).bind("keydown." + Y, function(t) {
            var e = t.keyCode;
            q && F.get("escKey") && 27 === e && (t.preventDefault(), G.close()), q && F.get("arrowKey") && k[1] && !t.altKey && (37 === e ? (t.preventDefault(), _.click()) : 39 === e && (t.preventDefault(), N.click()))
        }), t.isFunction(t.fn.on) ? t(e).on("click." + Y, "." + tt, i) : t("." + tt).live("click." + Y, i)), !0)
    }

    function v() {
        var e, o, s, r = G.prep,
            c = ++ht;
        if (Q = !0, B = !1, u(rt), u(it), F.get("onLoad"), F.h = F.get("height") ? a(F.get("height"), "y") - M - U : F.get("innerHeight") && a(F.get("innerHeight"), "y"), F.w = F.get("width") ? a(F.get("width"), "x") - L - j : F.get("innerWidth") && a(F.get("innerWidth"), "x"), F.mw = F.w, F.mh = F.h, F.get("maxWidth") && (F.mw = a(F.get("maxWidth"), "x") - L - j, F.mw = F.w && F.w < F.mw ? F.w : F.mw), F.get("maxHeight") && (F.mh = a(F.get("maxHeight"), "y") - M - U, F.mh = F.h && F.h < F.mh ? F.h : F.mh), e = F.get("href"), K = setTimeout(function() { D.show() }, 100), F.get("inline")) {
            var d = t(e).eq(0);
            s = t("<div>").hide().insertBefore(d), at.one(rt, function() { s.replaceWith(d) }), r(d)
        } else F.get("iframe") ? r(" ") : F.get("html") ? r(F.get("html")) : l(F, e) ? (e = h(F, e), B = F.get("createImg"), t(B).addClass(Y + "Photo").bind("error." + Y, function() { r(n(lt, "Error").html(F.get("imgError"))) }).one("load", function() {
            c === ht && setTimeout(function() {
                var e;
                F.get("retinaImage") && i.devicePixelRatio > 1 && (B.height = B.height / i.devicePixelRatio, B.width = B.width / i.devicePixelRatio), F.get("scalePhotos") && (o = function() { B.height -= B.height * e, B.width -= B.width * e }, F.mw && B.width > F.mw && (e = (B.width - F.mw) / B.width, o()), F.mh && B.height > F.mh && (e = (B.height - F.mh) / B.height, o())), F.h && (B.style.marginTop = Math.max(F.mh - B.height, 0) / 2 + "px"), k[1] && (F.get("loop") || k[z + 1]) && (B.style.cursor = "pointer", t(B).bind("click." + Y, function() { G.next() })), B.style.width = B.width + "px", B.style.height = B.height + "px", r(B)
            }, 1)
        }), B.src = e) : e && O.load(e, F.get("data"), function(e, i) { c === ht && r("error" === i ? n(lt, "Error").html(F.get("xhrError")) : t(this).contents()) })
    }
    var y, w, b, T, $, x, C, E, k, S, I, O, D, A, P, R, N, _, H, W, F, U, j, M, L, z, B, q, Q, V, K, G, X, Z = {
            html: !1,
            photo: !1,
            iframe: !1,
            inline: !1,
            transition: "elastic",
            speed: 300,
            fadeOut: 300,
            width: !1,
            initialWidth: "600",
            innerWidth: !1,
            maxWidth: !1,
            height: !1,
            initialHeight: "450",
            innerHeight: !1,
            maxHeight: !1,
            scalePhotos: !0,
            scrolling: !0,
            opacity: .9,
            preloading: !0,
            className: !1,
            overlayClose: !0,
            escKey: !0,
            arrowKey: !0,
            top: !1,
            bottom: !1,
            left: !1,
            right: !1,
            fixed: !1,
            data: void 0,
            closeButton: !0,
            fastIframe: !0,
            open: !1,
            reposition: !0,
            loop: !0,
            slideshow: !1,
            slideshowAuto: !0,
            slideshowSpeed: 2500,
            slideshowStart: "start slideshow",
            slideshowStop: "stop slideshow",
            photoRegex: /\.(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,
            retinaImage: !1,
            retinaUrl: !1,
            retinaSuffix: "@2x.$1",
            current: "image {current} of {total}",
            previous: "previous",
            next: "next",
            close: "close",
            xhrError: "This content failed to load.",
            imgError: "This image failed to load.",
            returnFocus: !0,
            trapFocus: !0,
            onOpen: !1,
            onLoad: !1,
            onComplete: !1,
            onCleanup: !1,
            onClosed: !1,
            rel: function() { return this.rel },
            href: function() { return t(this).attr("href") },
            title: function() { return this.title },
            createImg: function() {
                var e = new Image,
                    i = t(this).data("cbox-img-attrs");
                return "object" == typeof i && t.each(i, function(t, i) { e[t] = i }), e
            },
            createIframe: function() {
                var i = e.createElement("iframe"),
                    n = t(this).data("cbox-iframe-attrs");
                return "object" == typeof n && t.each(n, function(t, e) { i[t] = e }), "frameBorder" in i && (i.frameBorder = 0), "allowTransparency" in i && (i.allowTransparency = "true"), i.name = (new Date).getTime(), i.allowFullscreen = !0, i
            }
        },
        J = "colorbox",
        Y = "cbox",
        tt = Y + "Element",
        et = Y + "_open",
        it = Y + "_load",
        nt = Y + "_complete",
        ot = Y + "_cleanup",
        st = Y + "_closed",
        rt = Y + "_purge",
        at = t("<a/>"),
        lt = "div",
        ht = 0,
        ct = {},
        dt = function() {
            function t() { clearTimeout(r) }

            function e() {
                (F.get("loop") || k[z + 1]) && (t(), r = setTimeout(G.next, F.get("slideshowSpeed")))
            }

            function i() { R.html(F.get("slideshowStop")).unbind(l).one(l, n), at.bind(nt, e).bind(it, t), w.removeClass(a + "off").addClass(a + "on") }

            function n() { t(), at.unbind(nt, e).unbind(it, t), R.html(F.get("slideshowStart")).unbind(l).one(l, function() { G.next(), i() }), w.removeClass(a + "on").addClass(a + "off") }

            function o() { s = !1, R.hide(), t(), at.unbind(nt, e).unbind(it, t), w.removeClass(a + "off " + a + "on") }
            var s, r, a = Y + "Slideshow_",
                l = "click." + Y;
            return function() { s ? F.get("slideshow") || (at.unbind(ot, o), o()) : F.get("slideshow") && k[1] && (s = !0, at.one(ot, o), F.get("slideshowAuto") ? i() : n(), R.show()) }
        }();
    t[J] || (t(g), G = t.fn[J] = t[J] = function(e, i) {
        var n, o = this;
        return e = e || {}, t.isFunction(o) && (o = t("<a/>"), e.open = !0), o[0] ? (g(), m() && (i && (e.onComplete = i), o.each(function() {
            var i = t.data(this, J) || {};
            t.data(this, J, t.extend(i, e))
        }).addClass(tt), n = new s(o[0], e), n.get("open") && f(o[0])), o) : o
    }, G.position = function(e, i) {
        function n() { $[0].style.width = E[0].style.width = T[0].style.width = parseInt(w[0].style.width, 10) - j + "px", T[0].style.height = x[0].style.height = C[0].style.height = parseInt(w[0].style.height, 10) - U + "px" }
        var s, r, l, h = 0,
            c = 0,
            d = w.offset();
        if (S.unbind("resize." + Y), w.css({ top: -9e4, left: -9e4 }), r = S.scrollTop(), l = S.scrollLeft(), F.get("fixed") ? (d.top -= r, d.left -= l, w.css({ position: "fixed" })) : (h = r, c = l, w.css({ position: "absolute" })), c += F.get("right") !== !1 ? Math.max(S.width() - F.w - L - j - a(F.get("right"), "x"), 0) : F.get("left") !== !1 ? a(F.get("left"), "x") : Math.round(Math.max(S.width() - F.w - L - j, 0) / 2), h += F.get("bottom") !== !1 ? Math.max(o() - F.h - M - U - a(F.get("bottom"), "y"), 0) : F.get("top") !== !1 ? a(F.get("top"), "y") : Math.round(Math.max(o() - F.h - M - U, 0) / 2), w.css({ top: d.top, left: d.left, visibility: "visible" }), b[0].style.width = b[0].style.height = "9999px", s = { width: F.w + L + j, height: F.h + M + U, top: h, left: c }, e) {
            var p = 0;
            t.each(s, function(t) { return s[t] !== ct[t] ? void(p = e) : void 0 }), e = p
        }
        ct = s, e || w.css(s), w.dequeue().animate(s, { duration: e || 0, complete: function() { n(), Q = !1, b[0].style.width = F.w + L + j + "px", b[0].style.height = F.h + M + U + "px", F.get("reposition") && setTimeout(function() { S.bind("resize." + Y, G.position) }, 1), t.isFunction(i) && i() }, step: n })
    }, G.resize = function(t) {
        var e;
        q && (t = t || {}, t.width && (F.w = a(t.width, "x") - L - j), t.innerWidth && (F.w = a(t.innerWidth, "x")), I.css({ width: F.w }), t.height && (F.h = a(t.height, "y") - M - U), t.innerHeight && (F.h = a(t.innerHeight, "y")), t.innerHeight || t.height || (e = I.scrollTop(), I.css({ height: "auto" }), F.h = I.height()), I.css({ height: F.h }), e && I.scrollTop(e), G.position("none" === F.get("transition") ? 0 : F.get("speed")))
    }, G.prep = function(i) {
        function o() { return F.w = F.w || I.width(), F.w = F.mw && F.mw < F.w ? F.mw : F.w, F.w }

        function a() { return F.h = F.h || I.height(), F.h = F.mh && F.mh < F.h ? F.mh : F.h, F.h }
        if (q) {
            var c, p = "none" === F.get("transition") ? 0 : F.get("speed");
            I.remove(), I = n(lt, "LoadedContent").append(i), I.hide().appendTo(O.show()).css({ width: o(), overflow: F.get("scrolling") ? "auto" : "hidden" }).css({ height: a() }).prependTo(T), O.hide(), t(B).css({ "float": "none" }), d(F.get("className")), c = function() {
                function i() { t.support.opacity === !1 && w[0].style.removeAttribute("filter") }
                var n, o, a = k.length;
                q && (o = function() { clearTimeout(K), D.hide(), u(nt), F.get("onComplete") }, A.html(F.get("title")).show(), I.show(), a > 1 ? ("string" == typeof F.get("current") && P.html(F.get("current").replace("{current}", z + 1).replace("{total}", a)).show(), N[F.get("loop") || a - 1 > z ? "show" : "hide"]().html(F.get("next")), _[F.get("loop") || z ? "show" : "hide"]().html(F.get("previous")), dt(), F.get("preloading") && t.each([r(-1), r(1)], function() {
                    var i, n = k[this],
                        o = new s(n, t.data(n, J)),
                        r = o.get("href");
                    r && l(o, r) && (r = h(o, r), i = e.createElement("img"), i.src = r)
                })) : W.hide(), F.get("iframe") ? (n = F.get("createIframe"), F.get("scrolling") || (n.scrolling = "no"), t(n).attr({ src: F.get("href"), "class": Y + "Iframe" }).one("load", o).appendTo(I), at.one(rt, function() { n.src = "//about:blank" }), F.get("fastIframe") && t(n).trigger("load")) : o(), "fade" === F.get("transition") ? w.fadeTo(p, 1, i) : i())
            }, "fade" === F.get("transition") ? w.fadeTo(p, 0, function() { G.position(0, c) }) : G.position(p, c)
        }
    }, G.next = function() {!Q && k[1] && (F.get("loop") || k[z + 1]) && (z = r(1), f(k[z])) }, G.prev = function() {!Q && k[1] && (F.get("loop") || z) && (z = r(-1), f(k[z])) }, G.close = function() { q && !V && (V = !0, q = !1, u(ot), F.get("onCleanup"), S.unbind("." + Y), y.fadeTo(F.get("fadeOut") || 0, 0), w.stop().fadeTo(F.get("fadeOut") || 0, 0, function() { w.hide(), y.hide(), u(rt), I.remove(), setTimeout(function() { V = !1, u(st), F.get("onClosed") }, 1) })) }, G.remove = function() { w && (w.stop(), t[J].close(), w.stop(!1, !0).remove(), y.remove(), V = !1, w = null, t("." + tt).removeData(J).removeClass(tt), t(e).unbind("click." + Y).unbind("keydown." + Y)) }, G.element = function() { return t(F.el) }, G.settings = Z)
}(jQuery, document, window);
var Formstone = window.Formstone = function(t, e, i, n) {
    "use strict";

    function o(t) { u.Plugins[t].initialized || (u.Plugins[t].methods._setup.call(i), u.Plugins[t].initialized = !0) }

    function s(t, e, i, n) {
        var o, s = { raw: {} };
        n = n || {};
        for (o in n) n.hasOwnProperty(o) && ("classes" === t ? (s.raw[n[o]] = e + "-" + n[o], s[n[o]] = "." + e + "-" + n[o]) : (s.raw[o] = n[o], s[o] = n[o] + "." + e));
        for (o in i) i.hasOwnProperty(o) && ("classes" === t ? (s.raw[o] = i[o].replace(/{ns}/g, e), s[o] = i[o].replace(/{ns}/g, "." + e)) : (s.raw[o] = i[o].replace(/.{ns}/g, ""), s[o] = i[o].replace(/{ns}/g, e)));
        return s
    }

    function r() {
        var t, e = { WebkitTransition: "webkitTransitionEnd", MozTransition: "transitionend", OTransition: "otransitionend", transition: "transitionend" },
            n = ["transition", "-webkit-transition"],
            o = { transform: "transform", MozTransform: "-moz-transform", OTransform: "-o-transform", msTransform: "-ms-transform", webkitTransform: "-webkit-transform" },
            s = "transitionend",
            r = "",
            a = "",
            l = i.createElement("div");
        for (t in e)
            if (e.hasOwnProperty(t) && t in l.style) { s = e[t], u.support.transition = !0; break }
        m.transitionEnd = s + ".{ns}";
        for (t in n)
            if (n.hasOwnProperty(t) && n[t] in l.style) { r = n[t]; break }
        u.transition = r;
        for (t in o)
            if (o.hasOwnProperty(t) && o[t] in l.style) { u.support.transform = !0, a = o[t]; break }
        u.transform = a
    }

    function a() { u.windowWidth = u.$window.width(), u.windowHeight = u.$window.height(), v = p.startTimer(v, y, l) }

    function l() { for (var t in u.ResizeHandlers) u.ResizeHandlers.hasOwnProperty(t) && u.ResizeHandlers[t].callback.call(e, u.windowWidth, u.windowHeight) }

    function h() { if (u.support.raf) { u.window.requestAnimationFrame(h); for (var t in u.RAFHandlers) u.RAFHandlers.hasOwnProperty(t) && u.RAFHandlers[t].callback.call(e) } }

    function c(t, e) { return parseInt(t.priority) - parseInt(e.priority) }
    var d = function() { this.Version = "0.8.48", this.Plugins = {}, this.DontConflict = !1, this.Conflicts = { fn: {} }, this.ResizeHandlers = [], this.RAFHandlers = [], this.window = e, this.$window = t(e), this.document = i, this.$document = t(i), this.$body = null, this.windowWidth = 0, this.windowHeight = 0, this.fallbackWidth = 1024, this.fallbackHeight = 768, this.userAgent = e.navigator.userAgent || e.navigator.vendor || e.opera, this.isFirefox = /Firefox/i.test(this.userAgent), this.isChrome = /Chrome/i.test(this.userAgent), this.isSafari = /Safari/i.test(this.userAgent) && !this.isChrome, this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(this.userAgent), this.isIEMobile = /IEMobile/i.test(this.userAgent), this.isFirefoxMobile = this.isFirefox && this.isMobile, this.transform = null, this.transition = null, this.support = { file: !!(e.File && e.FileList && e.FileReader), history: !!(e.history && e.history.pushState && e.history.replaceState), matchMedia: !(!e.matchMedia && !e.msMatchMedia), pointer: !!e.PointerEvent, raf: !(!e.requestAnimationFrame || !e.cancelAnimationFrame), touch: !!("ontouchstart" in e || e.DocumentTouch && i instanceof e.DocumentTouch), transition: !1, transform: !1 } },
        p = {
            killEvent: function(t, e) { try { t.preventDefault(), t.stopPropagation(), e && t.stopImmediatePropagation() } catch (i) {} },
            startTimer: function(t, e, i, n) { return p.clearTimer(t), n ? setInterval(i, e) : setTimeout(i, e) },
            clearTimer: function(t, e) { t && (e ? clearInterval(t) : clearTimeout(t), t = null) },
            sortAsc: function(t, e) { return parseInt(t, 10) - parseInt(e, 10) },
            sortDesc: function(t, e) { return parseInt(e, 10) - parseInt(t, 10) },
            decodeEntities: function(t) { var e = u.document.createElement("textarea"); return e.innerHTML = t, e.value },
            parseQueryString: function(t) {
                for (var e = {}, i = t.slice(t.indexOf("?") + 1).split("&"), n = 0; n < i.length; n++) {
                    var o = i[n].split("=");
                    e[o[0]] = o[1]
                }
                return e
            }
        },
        u = new d,
        f = t.Deferred(),
        g = { base: "{ns}", element: "{ns}-element" },
        m = { namespace: ".{ns}", beforeUnload: "beforeunload.{ns}", blur: "blur.{ns}", change: "change.{ns}", click: "click.{ns}", dblClick: "dblclick.{ns}", drag: "drag.{ns}", dragEnd: "dragend.{ns}", dragEnter: "dragenter.{ns}", dragLeave: "dragleave.{ns}", dragOver: "dragover.{ns}", dragStart: "dragstart.{ns}", drop: "drop.{ns}", error: "error.{ns}", focus: "focus.{ns}", focusIn: "focusin.{ns}", focusOut: "focusout.{ns}", input: "input.{ns}", keyDown: "keydown.{ns}", keyPress: "keypress.{ns}", keyUp: "keyup.{ns}", load: "load.{ns}", mouseDown: "mousedown.{ns}", mouseEnter: "mouseenter.{ns}", mouseLeave: "mouseleave.{ns}", mouseMove: "mousemove.{ns}", mouseOut: "mouseout.{ns}", mouseOver: "mouseover.{ns}", mouseUp: "mouseup.{ns}", panStart: "panstart.{ns}", pan: "pan.{ns}", panEnd: "panend.{ns}", resize: "resize.{ns}", scaleStart: "scalestart.{ns}", scaleEnd: "scaleend.{ns}", scale: "scale.{ns}", scroll: "scroll.{ns}", select: "select.{ns}", swipe: "swipe.{ns}", touchCancel: "touchcancel.{ns}", touchEnd: "touchend.{ns}", touchLeave: "touchleave.{ns}", touchMove: "touchmove.{ns}", touchStart: "touchstart.{ns}" };
    d.prototype.NoConflict = function() { u.DontConflict = !0; for (var e in u.Plugins) u.Plugins.hasOwnProperty(e) && (t[e] = u.Conflicts[e], t.fn[e] = u.Conflicts.fn[e]) }, d.prototype.Plugin = function(i, n) {
        return u.Plugins[i] = function(i, n) {
            function o(e) {
                var o, s, r, l = "object" === t.type(e),
                    h = this,
                    c = t();
                for (e = t.extend(!0, {}, n.defaults || {}, l ? e : {}), s = 0, r = h.length; r > s; s++)
                    if (o = h.eq(s), !a(o)) {
                        var d = "__" + n.guid++,
                            p = n.classes.raw.base + d,
                            u = o.data(i + "-options"),
                            f = t.extend(!0, { $el: o, guid: d, rawGuid: p, dotGuid: "." + p }, e, "object" === t.type(u) ? u : {});
                        o.addClass(n.classes.raw.element).data(y, f), n.methods._construct.apply(o, [f].concat(Array.prototype.slice.call(arguments, l ? 1 : 0))), c = c.add(o)
                    }
                for (s = 0, r = c.length; r > s; s++) o = c.eq(s), n.methods._postConstruct.apply(o, [a(o)]);
                return h
            }

            function r(t) { n.functions.iterate.apply(this, [n.methods._destruct].concat(Array.prototype.slice.call(arguments, 1))), this.removeClass(n.classes.raw.element).removeData(y) }

            function a(t) { return t.data(y) }

            function l(e) { if (this instanceof t) { var i = n.methods[e]; return "object" !== t.type(e) && e ? i && 0 !== e.indexOf("_") ? n.functions.iterate.apply(this, [i].concat(Array.prototype.slice.call(arguments, 1))) : this : o.apply(this, arguments) } }

            function h(i) { var o = n.utilities[i] || n.utilities._initialize || !1; return o ? o.apply(e, Array.prototype.slice.call(arguments, "object" === t.type(i) ? 0 : 1)) : void 0 }

            function d(e) { n.defaults = t.extend(!0, n.defaults, e || {}) }

            function f(e) {
                for (var i = this, n = 0, o = i.length; o > n; n++) {
                    var s = i.eq(n),
                        r = a(s) || {};
                    "undefined" !== t.type(r.$el) && e.apply(s, [r].concat(Array.prototype.slice.call(arguments, 1)))
                }
                return i
            }
            var v = "fs-" + i,
                y = "fs" + i.replace(/(^|\s)([a-z])/g, function(t, e, i) { return e + i.toUpperCase() });
            return n.initialized = !1, n.priority = n.priority || 10, n.classes = s("classes", v, g, n.classes), n.events = s("events", i, m, n.events), n.functions = t.extend({ getData: a, iterate: f }, p, n.functions), n.methods = t.extend(!0, { _setup: t.noop, _construct: t.noop, _postConstruct: t.noop, _destruct: t.noop, _resize: !1, destroy: r }, n.methods), n.utilities = t.extend(!0, { _initialize: !1, _delegate: !1, defaults: d }, n.utilities), n.widget && (u.Conflicts.fn[i] = t.fn[i], t.fn[y] = l, u.DontConflict || (t.fn[i] = t.fn[y])), u.Conflicts[i] = t[i], t[y] = n.utilities._delegate || h, u.DontConflict || (t[i] = t[y]), n.namespace = i, n.namespaceClean = y, n.guid = 0, n.methods._resize && (u.ResizeHandlers.push({ namespace: i, priority: n.priority, callback: n.methods._resize }), u.ResizeHandlers.sort(c)), n.methods._raf && (u.RAFHandlers.push({ namespace: i, priority: n.priority, callback: n.methods._raf }), u.RAFHandlers.sort(c)), n
        }(i, n), f.then(function() { o(i) }), u.Plugins[i]
    };
    var v = null,
        y = 20;
    return u.$window.on("resize.fs", a), a(), h(), t(function() { u.$body = t("body"), f.resolve(), u.support.nativeMatchMedia = u.support.matchMedia && !t("html").hasClass("no-matchmedia") }), m.clickTouchStart = m.click + " " + m.touchStart, r(), u
}(jQuery, window, document);
! function(t, e, i) {
    "use strict";

    function n(e) {
        e = e || {};
        for (var i in b) b.hasOwnProperty(i) && (p[i] = e[i] ? t.merge(e[i], p[i]) : p[i]);
        p = t.extend(p, e), p.minWidth.sort(m.sortDesc), p.maxWidth.sort(m.sortAsc), p.minHeight.sort(m.sortDesc), p.maxHeight.sort(m.sortAsc);
        for (var n in b)
            if (b.hasOwnProperty(n)) {
                w[n] = {};
                for (var o in p[n])
                    if (p[n].hasOwnProperty(o)) {
                        var s = window.matchMedia("(" + b[n] + ": " + (p[n][o] === 1 / 0 ? 1e5 : p[n][o]) + p.unit + ")");
                        s.addListener(a), w[n][p[n][o]] = s
                    }
            }
        a()
    }

    function o(t, e, i) {
        var n = g.matchMedia(e),
            o = h(n.media);
        y[o] || (y[o] = { mq: n, active: !0, enter: {}, leave: {} }, y[o].mq.addListener(l));
        for (var s in i) i.hasOwnProperty(s) && y[o].hasOwnProperty(s) && (y[o][s][t] = i[s]);
        var r = y[o],
            a = n.matches;
        a && r[u.enter].hasOwnProperty(t) ? (r[u.enter][t].apply(n), r.active = !0) : !a && r[u.leave].hasOwnProperty(t) && (r[u.leave][t].apply(n), r.active = !1)
    }

    function s(t, e) {
        if (t)
            if (e) {
                var i = h(e);
                y[i] && (y[i].enter[t] && delete y[i].enter[t], y[i].leave[t] && delete y[i].leave[t])
            } else
                for (var n in y) y.hasOwnProperty(n) && (y[n].enter[t] && delete y[n].enter[t], y[n].leave[t] && delete y[n].leave[t])
    }

    function r() {
        v = { unit: p.unit };
        for (var t in b)
            if (b.hasOwnProperty(t))
                for (var i in w[t])
                    if (w[t].hasOwnProperty(i)) {
                        var n = "Infinity" === i ? 1 / 0 : parseInt(i, 10),
                            o = b[t].indexOf("width") > -1 ? e.fallbackWidth : e.fallbackHeight,
                            s = t.indexOf("max") > -1;
                        e.support.nativeMatchMedia ? w[t][i].matches && (s ? (!v[t] || n < v[t]) && (v[t] = n) : (!v[t] || n > v[t]) && (v[t] = n)) : s ? !v[t] && n > o && (v[t] = n) : (!v[t] && 0 !== v[t] || n > v[t] && o > n) && (v[t] = n)
                    }
    }

    function a() { r(), f.trigger(u.mqChange, [v]) }

    function l(t) {
        var e = h(t.media),
            i = y[e],
            n = t.matches,
            o = n ? u.enter : u.leave;
        if (i && (i.active || !i.active && n)) {
            for (var s in i[o]) i[o].hasOwnProperty(s) && i[o][s].apply(i.mq);
            i.active = !0
        }
    }

    function h(t) { return t.replace(/[^a-z0-9\s]/gi, "").replace(/[_\s]/g, "").replace(/^\s+|\s+$/g, "") }

    function c() { return v }
    var d = e.Plugin("mediaquery", { utilities: { _initialize: n, state: c, bind: o, unbind: s }, events: { mqChange: "mqchange" } }),
        p = { minWidth: [0], maxWidth: [1 / 0], minHeight: [0], maxHeight: [1 / 0], unit: "px" },
        u = t.extend(d.events, { enter: "enter", leave: "leave" }),
        f = e.$window,
        g = f[0],
        m = d.functions,
        v = null,
        y = [],
        w = {},
        b = { minWidth: "min-width", maxWidth: "max-width", minHeight: "min-height", maxHeight: "max-height" }
}(jQuery, Formstone), + function(t) {
    "use strict";

    function e() {
        var t = document.createElement("bootstrap"),
            e = { WebkitTransition: "webkitTransitionEnd", MozTransition: "transitionend", OTransition: "oTransitionEnd otransitionend", transition: "transitionend" };
        for (var i in e)
            if (void 0 !== t.style[i]) return { end: e[i] };
        return !1
    }
    t.fn.emulateTransitionEnd = function(e) {
        var i = !1,
            n = this;
        t(this).one("bsTransitionEnd", function() { i = !0 });
        var o = function() { i || t(n).trigger(t.support.transition.end) };
        return setTimeout(o, e), this
    }, t(function() { t.support.transition = e(), t.support.transition && (t.event.special.bsTransitionEnd = { bindType: t.support.transition.end, delegateType: t.support.transition.end, handle: function(e) { if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments) } }) })
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var i = t(this),
                o = i.data("bs.alert");
            o || i.data("bs.alert", o = new n(this)), "string" == typeof e && o[e].call(i)
        })
    }
    var i = '[data-dismiss="alert"]',
        n = function(e) { t(e).on("click", i, this.close) };
    n.VERSION = "3.3.6", n.TRANSITION_DURATION = 150, n.prototype.close = function(e) {
        function i() { r.detach().trigger("closed.bs.alert").remove() }
        var o = t(this),
            s = o.attr("data-target");
        s || (s = o.attr("href"), s = s && s.replace(/.*(?=#[^\s]*$)/, ""));
        var r = t(s);
        e && e.preventDefault(), r.length || (r = o.closest(".alert")), r.trigger(e = t.Event("close.bs.alert")), e.isDefaultPrevented() || (r.removeClass("in"), t.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", i).emulateTransitionEnd(n.TRANSITION_DURATION) : i())
    };
    var o = t.fn.alert;
    t.fn.alert = e, t.fn.alert.Constructor = n, t.fn.alert.noConflict = function() { return t.fn.alert = o, this }, t(document).on("click.bs.alert.data-api", i, n.prototype.close)
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.button"),
                s = "object" == typeof e && e;
            o || n.data("bs.button", o = new i(this, s)), "toggle" == e ? o.toggle() : e && o.setState(e)
        })
    }
    var i = function(e, n) { this.$element = t(e), this.options = t.extend({}, i.DEFAULTS, n), this.isLoading = !1 };
    i.VERSION = "3.3.6", i.DEFAULTS = { loadingText: "loading..." }, i.prototype.setState = function(e) {
        var i = "disabled",
            n = this.$element,
            o = n.is("input") ? "val" : "html",
            s = n.data();
        e += "Text", null == s.resetText && n.data("resetText", n[o]()), setTimeout(t.proxy(function() { n[o](null == s[e] ? this.options[e] : s[e]), "loadingText" == e ? (this.isLoading = !0, n.addClass(i).attr(i, i)) : this.isLoading && (this.isLoading = !1, n.removeClass(i).removeAttr(i)) }, this), 0)
    }, i.prototype.toggle = function() {
        var t = !0,
            e = this.$element.closest('[data-toggle="buttons"]');
        if (e.length) { var i = this.$element.find("input"); "radio" == i.prop("type") ? (i.prop("checked") && (t = !1), e.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == i.prop("type") && (i.prop("checked") !== this.$element.hasClass("active") && (t = !1), this.$element.toggleClass("active")), i.prop("checked", this.$element.hasClass("active")), t && i.trigger("change") } else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
    };
    var n = t.fn.button;
    t.fn.button = e, t.fn.button.Constructor = i, t.fn.button.noConflict = function() { return t.fn.button = n, this }, t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(i) {
        var n = t(i.target);
        n.hasClass("btn") || (n = n.closest(".btn")), e.call(n, "toggle"), t(i.target).is('input[type="radio"]') || t(i.target).is('input[type="checkbox"]') || i.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(e) { t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type)) })
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.carousel"),
                s = t.extend({}, i.DEFAULTS, n.data(), "object" == typeof e && e),
                r = "string" == typeof e ? e : s.slide;
            o || n.data("bs.carousel", o = new i(this, s)), "number" == typeof e ? o.to(e) : r ? o[r]() : s.interval && o.pause().cycle()
        })
    }
    var i = function(e, i) { this.$element = t(e), this.$indicators = this.$element.find(".carousel-indicators"), this.options = i, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this)) };
    i.VERSION = "3.3.6", i.TRANSITION_DURATION = 600, i.DEFAULTS = { interval: 5e3, pause: "hover", wrap: !0, keyboard: !0 }, i.prototype.keydown = function(t) {
        if (!/input|textarea/i.test(t.target.tagName)) {
            switch (t.which) {
                case 37:
                    this.prev();
                    break;
                case 39:
                    this.next();
                    break;
                default:
                    return
            }
            t.preventDefault()
        }
    }, i.prototype.cycle = function(e) { return e || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this }, i.prototype.getItemIndex = function(t) { return this.$items = t.parent().children(".item"), this.$items.index(t || this.$active) }, i.prototype.getItemForDirection = function(t, e) {
        var i = this.getItemIndex(e),
            n = "prev" == t && 0 === i || "next" == t && i == this.$items.length - 1;
        if (n && !this.options.wrap) return e;
        var o = "prev" == t ? -1 : 1,
            s = (i + o) % this.$items.length;
        return this.$items.eq(s)
    }, i.prototype.to = function(t) {
        var e = this,
            i = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        if (!(t > this.$items.length - 1 || t < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function() { e.to(t) }) : i == t ? this.pause().cycle() : this.slide(t > i ? "next" : "prev", this.$items.eq(t))
    }, i.prototype.pause = function(e) { return e || (this.paused = !0), this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this }, i.prototype.next = function() { if (!this.sliding) return this.slide("next") }, i.prototype.prev = function() { if (!this.sliding) return this.slide("prev") }, i.prototype.slide = function(e, n) {
        var o = this.$element.find(".item.active"),
            s = n || this.getItemForDirection(e, o),
            r = this.interval,
            a = "next" == e ? "left" : "right",
            l = this;
        if (s.hasClass("active")) return this.sliding = !1;
        var h = s[0],
            c = t.Event("slide.bs.carousel", { relatedTarget: h, direction: a });
        if (this.$element.trigger(c), !c.isDefaultPrevented()) {
            if (this.sliding = !0, r && this.pause(), this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var d = t(this.$indicators.children()[this.getItemIndex(s)]);
                d && d.addClass("active")
            }
            var p = t.Event("slid.bs.carousel", { relatedTarget: h, direction: a });
            return t.support.transition && this.$element.hasClass("slide") ? (s.addClass(e), s[0].offsetWidth, o.addClass(a), s.addClass(a), o.one("bsTransitionEnd", function() { s.removeClass([e, a].join(" ")).addClass("active"), o.removeClass(["active", a].join(" ")), l.sliding = !1, setTimeout(function() { l.$element.trigger(p) }, 0) }).emulateTransitionEnd(i.TRANSITION_DURATION)) : (o.removeClass("active"), s.addClass("active"), this.sliding = !1, this.$element.trigger(p)), r && this.cycle(), this
        }
    };
    var n = t.fn.carousel;
    t.fn.carousel = e, t.fn.carousel.Constructor = i, t.fn.carousel.noConflict = function() { return t.fn.carousel = n, this };
    var o = function(i) {
        var n, o = t(this),
            s = t(o.attr("data-target") || (n = o.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, ""));
        if (s.hasClass("carousel")) {
            var r = t.extend({}, s.data(), o.data()),
                a = o.attr("data-slide-to");
            a && (r.interval = !1), e.call(s, r), a && s.data("bs.carousel").to(a), i.preventDefault()
        }
    };
    t(document).on("click.bs.carousel.data-api", "[data-slide]", o).on("click.bs.carousel.data-api", "[data-slide-to]", o), t(window).on("load", function() {
        t('[data-ride="carousel"]').each(function() {
            var i = t(this);
            e.call(i, i.data())
        })
    })
}(jQuery), + function(t) {
    "use strict";

    function e(e) { var i, n = e.attr("data-target") || (i = e.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, ""); return t(n) }

    function i(e) {
        return this.each(function() {
            var i = t(this),
                o = i.data("bs.collapse"),
                s = t.extend({}, n.DEFAULTS, i.data(), "object" == typeof e && e);
            !o && s.toggle && /show|hide/.test(e) && (s.toggle = !1), o || i.data("bs.collapse", o = new n(this, s)), "string" == typeof e && o[e]()
        })
    }
    var n = function(e, i) { this.$element = t(e), this.options = t.extend({}, n.DEFAULTS, i), this.$trigger = t('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle() };
    n.VERSION = "3.3.6", n.TRANSITION_DURATION = 350, n.DEFAULTS = { toggle: !0 }, n.prototype.dimension = function() { var t = this.$element.hasClass("width"); return t ? "width" : "height" }, n.prototype.show = function() {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var e, o = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
            if (!(o && o.length && (e = o.data("bs.collapse"), e && e.transitioning))) {
                var s = t.Event("show.bs.collapse");
                if (this.$element.trigger(s), !s.isDefaultPrevented()) {
                    o && o.length && (i.call(o, "hide"), e || o.data("bs.collapse", null));
                    var r = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[r](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                    var a = function() { this.$element.removeClass("collapsing").addClass("collapse in")[r](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse") };
                    if (!t.support.transition) return a.call(this);
                    var l = t.camelCase(["scroll", r].join("-"));
                    this.$element.one("bsTransitionEnd", t.proxy(a, this)).emulateTransitionEnd(n.TRANSITION_DURATION)[r](this.$element[0][l])
                }
            }
        }
    }, n.prototype.hide = function() {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var e = t.Event("hide.bs.collapse");
            if (this.$element.trigger(e), !e.isDefaultPrevented()) {
                var i = this.dimension();
                this.$element[i](this.$element[i]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                var o = function() { this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse") };
                return t.support.transition ? void this.$element[i](0).one("bsTransitionEnd", t.proxy(o, this)).emulateTransitionEnd(n.TRANSITION_DURATION) : o.call(this)
            }
        }
    }, n.prototype.toggle = function() { this[this.$element.hasClass("in") ? "hide" : "show"]() }, n.prototype.getParent = function() {
        return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function(i, n) {
            var o = t(n);
            this.addAriaAndCollapsedClass(e(o), o)
        }, this)).end()
    }, n.prototype.addAriaAndCollapsedClass = function(t, e) {
        var i = t.hasClass("in");
        t.attr("aria-expanded", i), e.toggleClass("collapsed", !i).attr("aria-expanded", i)
    };
    var o = t.fn.collapse;
    t.fn.collapse = i, t.fn.collapse.Constructor = n, t.fn.collapse.noConflict = function() { return t.fn.collapse = o, this }, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(n) {
        var o = t(this);
        o.attr("data-target") || n.preventDefault();
        var s = e(o),
            r = s.data("bs.collapse"),
            a = r ? "toggle" : o.data();
        i.call(s, a)
    })
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        var i = e.attr("data-target");
        i || (i = e.attr("href"), i = i && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, ""));
        var n = i && t(i);
        return n && n.length ? n : e.parent()
    }

    function i(i) {
        i && 3 === i.which || (t(o).remove(), t(s).each(function() {
            var n = t(this),
                o = e(n),
                s = { relatedTarget: this };
            o.hasClass("open") && (i && "click" == i.type && /input|textarea/i.test(i.target.tagName) && t.contains(o[0], i.target) || (o.trigger(i = t.Event("hide.bs.dropdown", s)), i.isDefaultPrevented() || (n.attr("aria-expanded", "false"), o.removeClass("open").trigger(t.Event("hidden.bs.dropdown", s)))))
        }))
    }

    function n(e) {
        return this.each(function() {
            var i = t(this),
                n = i.data("bs.dropdown");
            n || i.data("bs.dropdown", n = new r(this)), "string" == typeof e && n[e].call(i)
        })
    }
    var o = ".dropdown-backdrop",
        s = '[data-toggle="dropdown"]',
        r = function(e) { t(e).on("click.bs.dropdown", this.toggle) };
    r.VERSION = "3.3.6", r.prototype.toggle = function(n) {
        var o = t(this);
        if (!o.is(".disabled, :disabled")) {
            var s = e(o),
                r = s.hasClass("open");
            if (i(), !r) {
                "ontouchstart" in document.documentElement && !s.closest(".navbar-nav").length && t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click", i);
                var a = { relatedTarget: this };
                if (s.trigger(n = t.Event("show.bs.dropdown", a)), n.isDefaultPrevented()) return;
                o.trigger("focus").attr("aria-expanded", "true"), s.toggleClass("open").trigger(t.Event("shown.bs.dropdown", a))
            }
            return !1
        }
    }, r.prototype.keydown = function(i) {
        if (/(38|40|27|32)/.test(i.which) && !/input|textarea/i.test(i.target.tagName)) {
            var n = t(this);
            if (i.preventDefault(), i.stopPropagation(), !n.is(".disabled, :disabled")) {
                var o = e(n),
                    r = o.hasClass("open");
                if (!r && 27 != i.which || r && 27 == i.which) return 27 == i.which && o.find(s).trigger("focus"), n.trigger("click");
                var a = " li:not(.disabled):visible a",
                    l = o.find(".dropdown-menu" + a);
                if (l.length) {
                    var h = l.index(i.target);
                    38 == i.which && h > 0 && h--, 40 == i.which && h < l.length - 1 && h++, ~h || (h = 0), l.eq(h).trigger("focus")
                }
            }
        }
    };
    var a = t.fn.dropdown;
    t.fn.dropdown = n, t.fn.dropdown.Constructor = r, t.fn.dropdown.noConflict = function() { return t.fn.dropdown = a, this }, t(document).on("click.bs.dropdown.data-api", i).on("click.bs.dropdown.data-api", ".dropdown form", function(t) { t.stopPropagation() }).on("click.bs.dropdown.data-api", s, r.prototype.toggle).on("keydown.bs.dropdown.data-api", s, r.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", r.prototype.keydown)
}(jQuery), + function(t) {
    "use strict";

    function e(e, n) {
        return this.each(function() {
            var o = t(this),
                s = o.data("bs.modal"),
                r = t.extend({}, i.DEFAULTS, o.data(), "object" == typeof e && e);
            s || o.data("bs.modal", s = new i(this, r)), "string" == typeof e ? s[e](n) : r.show && s.show(n)
        })
    }
    var i = function(e, i) { this.options = i, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function() { this.$element.trigger("loaded.bs.modal") }, this)) };
    i.VERSION = "3.3.6", i.TRANSITION_DURATION = 300, i.BACKDROP_TRANSITION_DURATION = 150, i.DEFAULTS = { backdrop: !0, keyboard: !0, show: !0 }, i.prototype.toggle = function(t) { return this.isShown ? this.hide() : this.show(t) }, i.prototype.show = function(e) {
        var n = this,
            o = t.Event("show.bs.modal", { relatedTarget: e });
        this.$element.trigger(o), this.isShown || o.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function() { n.$element.one("mouseup.dismiss.bs.modal", function(e) { t(e.target).is(n.$element) && (n.ignoreBackdropClick = !0) }) }), this.backdrop(function() {
            var o = t.support.transition && n.$element.hasClass("fade");
            n.$element.parent().length || n.$element.appendTo(n.$body), n.$element.show().scrollTop(0), n.adjustDialog(), o && n.$element[0].offsetWidth, n.$element.addClass("in"), n.enforceFocus();
            var s = t.Event("shown.bs.modal", { relatedTarget: e });
            o ? n.$dialog.one("bsTransitionEnd", function() { n.$element.trigger("focus").trigger(s) }).emulateTransitionEnd(i.TRANSITION_DURATION) : n.$element.trigger("focus").trigger(s)
        }))
    }, i.prototype.hide = function(e) { e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : this.hideModal()) }, i.prototype.enforceFocus = function() { t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function(t) { this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus") }, this)) }, i.prototype.escape = function() { this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function(t) { 27 == t.which && this.hide() }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal") }, i.prototype.resize = function() { this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal") }, i.prototype.hideModal = function() {
        var t = this;
        this.$element.hide(), this.backdrop(function() { t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal") })
    }, i.prototype.removeBackdrop = function() { this.$backdrop && this.$backdrop.remove(), this.$backdrop = null }, i.prototype.backdrop = function(e) {
        var n = this,
            o = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var s = t.support.transition && o;
            if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + o).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function(t) { return this.ignoreBackdropClick ? void(this.ignoreBackdropClick = !1) : void(t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide())) }, this)), s && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e) return;
            s ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : e()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var r = function() { n.removeBackdrop(), e && e() };
            t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", r).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION) : r()
        } else e && e()
    }, i.prototype.handleUpdate = function() { this.adjustDialog() }, i.prototype.adjustDialog = function() {
        var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({ paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "", paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : "" })
    }, i.prototype.resetAdjustments = function() { this.$element.css({ paddingLeft: "", paddingRight: "" }) }, i.prototype.checkScrollbar = function() {
        var t = window.innerWidth;
        if (!t) {
            var e = document.documentElement.getBoundingClientRect();
            t = e.right - Math.abs(e.left)
        }
        this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
    }, i.prototype.setScrollbar = function() {
        var t = parseInt(this.$body.css("padding-right") || 0, 10);
        this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
    }, i.prototype.resetScrollbar = function() { this.$body.css("padding-right", this.originalBodyPad) }, i.prototype.measureScrollbar = function() {
        var t = document.createElement("div");
        t.className = "modal-scrollbar-measure", this.$body.append(t);
        var e = t.offsetWidth - t.clientWidth;
        return this.$body[0].removeChild(t), e
    };
    var n = t.fn.modal;
    t.fn.modal = e, t.fn.modal.Constructor = i, t.fn.modal.noConflict = function() { return t.fn.modal = n, this }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(i) {
        var n = t(this),
            o = n.attr("href"),
            s = t(n.attr("data-target") || o && o.replace(/.*(?=#[^\s]+$)/, "")),
            r = s.data("bs.modal") ? "toggle" : t.extend({ remote: !/#/.test(o) && o }, s.data(), n.data());
        n.is("a") && i.preventDefault(), s.one("show.bs.modal", function(t) { t.isDefaultPrevented() || s.one("hidden.bs.modal", function() { n.is(":visible") && n.trigger("focus") }) }), e.call(s, r, this)
    })
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.tooltip"),
                s = "object" == typeof e && e;
            !o && /destroy|hide/.test(e) || (o || n.data("bs.tooltip", o = new i(this, s)), "string" == typeof e && o[e]())
        })
    }
    var i = function(t, e) { this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e) };
    i.VERSION = "3.3.6", i.TRANSITION_DURATION = 150, i.DEFAULTS = { animation: !0, placement: "top", selector: !1, template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>', trigger: "hover focus", title: "", delay: 0, html: !1, container: !1, viewport: { selector: "body", padding: 0 } }, i.prototype.init = function(e, i, n) {
        if (this.enabled = !0, this.type = e, this.$element = t(i), this.options = this.getOptions(n), this.$viewport = this.options.viewport && t(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = { click: !1, hover: !1, focus: !1 }, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
        for (var o = this.options.trigger.split(" "), s = o.length; s--;) {
            var r = o[s];
            if ("click" == r) this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this));
            else if ("manual" != r) {
                var a = "hover" == r ? "mouseenter" : "focusin",
                    l = "hover" == r ? "mouseleave" : "focusout";
                this.$element.on(a + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = t.extend({}, this.options, { trigger: "manual", selector: "" }) : this.fixTitle()
    }, i.prototype.getDefaults = function() { return i.DEFAULTS }, i.prototype.getOptions = function(e) { return e = t.extend({}, this.getDefaults(), this.$element.data(), e), e.delay && "number" == typeof e.delay && (e.delay = { show: e.delay, hide: e.delay }), e }, i.prototype.getDelegateOptions = function() {
        var e = {},
            i = this.getDefaults();
        return this._options && t.each(this._options, function(t, n) { i[t] != n && (e[t] = n) }), e
    }, i.prototype.enter = function(e) { var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type); return i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusin" == e.type ? "focus" : "hover"] = !0), i.tip().hasClass("in") || "in" == i.hoverState ? void(i.hoverState = "in") : (clearTimeout(i.timeout), i.hoverState = "in", i.options.delay && i.options.delay.show ? void(i.timeout = setTimeout(function() { "in" == i.hoverState && i.show() }, i.options.delay.show)) : i.show()) }, i.prototype.isInStateTrue = function() {
        for (var t in this.inState)
            if (this.inState[t]) return !0;
        return !1
    }, i.prototype.leave = function(e) { var i = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type); if (i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i)), e instanceof t.Event && (i.inState["focusout" == e.type ? "focus" : "hover"] = !1), !i.isInStateTrue()) return clearTimeout(i.timeout), i.hoverState = "out", i.options.delay && i.options.delay.hide ? void(i.timeout = setTimeout(function() { "out" == i.hoverState && i.hide() }, i.options.delay.hide)) : i.hide() }, i.prototype.show = function() {
        var e = t.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(e);
            var n = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (e.isDefaultPrevented() || !n) return;
            var o = this,
                s = this.tip(),
                r = this.getUID(this.type);
            this.setContent(), s.attr("id", r), this.$element.attr("aria-describedby", r), this.options.animation && s.addClass("fade");
            var a = "function" == typeof this.options.placement ? this.options.placement.call(this, s[0], this.$element[0]) : this.options.placement,
                l = /\s?auto?\s?/i,
                h = l.test(a);
            h && (a = a.replace(l, "") || "top"), s.detach().css({ top: 0, left: 0, display: "block" }).addClass(a).data("bs." + this.type, this), this.options.container ? s.appendTo(this.options.container) : s.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
            var c = this.getPosition(),
                d = s[0].offsetWidth,
                p = s[0].offsetHeight;
            if (h) {
                var u = a,
                    f = this.getPosition(this.$viewport);
                a = "bottom" == a && c.bottom + p > f.bottom ? "top" : "top" == a && c.top - p < f.top ? "bottom" : "right" == a && c.right + d > f.width ? "left" : "left" == a && c.left - d < f.left ? "right" : a, s.removeClass(u).addClass(a)
            }
            var g = this.getCalculatedOffset(a, c, d, p);
            this.applyPlacement(g, a);
            var m = function() {
                var t = o.hoverState;
                o.$element.trigger("shown.bs." + o.type), o.hoverState = null, "out" == t && o.leave(o)
            };
            t.support.transition && this.$tip.hasClass("fade") ? s.one("bsTransitionEnd", m).emulateTransitionEnd(i.TRANSITION_DURATION) : m()
        }
    }, i.prototype.applyPlacement = function(e, i) {
        var n = this.tip(),
            o = n[0].offsetWidth,
            s = n[0].offsetHeight,
            r = parseInt(n.css("margin-top"), 10),
            a = parseInt(n.css("margin-left"), 10);
        isNaN(r) && (r = 0), isNaN(a) && (a = 0), e.top += r, e.left += a, t.offset.setOffset(n[0], t.extend({ using: function(t) { n.css({ top: Math.round(t.top), left: Math.round(t.left) }) } }, e), 0), n.addClass("in");
        var l = n[0].offsetWidth,
            h = n[0].offsetHeight;
        "top" == i && h != s && (e.top = e.top + s - h);
        var c = this.getViewportAdjustedDelta(i, e, l, h);
        c.left ? e.left += c.left : e.top += c.top;
        var d = /top|bottom/.test(i),
            p = d ? 2 * c.left - o + l : 2 * c.top - s + h,
            u = d ? "offsetWidth" : "offsetHeight";
        n.offset(e), this.replaceArrow(p, n[0][u], d)
    }, i.prototype.replaceArrow = function(t, e, i) { this.arrow().css(i ? "left" : "top", 50 * (1 - t / e) + "%").css(i ? "top" : "left", "") }, i.prototype.setContent = function() {
        var t = this.tip(),
            e = this.getTitle();
        t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
    }, i.prototype.hide = function(e) {
        function n() { "in" != o.hoverState && s.detach(), o.$element.removeAttr("aria-describedby").trigger("hidden.bs." + o.type), e && e() }
        var o = this,
            s = t(this.$tip),
            r = t.Event("hide.bs." + this.type);
        if (this.$element.trigger(r), !r.isDefaultPrevented()) return s.removeClass("in"), t.support.transition && s.hasClass("fade") ? s.one("bsTransitionEnd", n).emulateTransitionEnd(i.TRANSITION_DURATION) : n(), this.hoverState = null, this
    }, i.prototype.fixTitle = function() {
        var t = this.$element;
        (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
    }, i.prototype.hasContent = function() { return this.getTitle() }, i.prototype.getPosition = function(e) {
        e = e || this.$element;
        var i = e[0],
            n = "BODY" == i.tagName,
            o = i.getBoundingClientRect();
        null == o.width && (o = t.extend({}, o, { width: o.right - o.left, height: o.bottom - o.top }));
        var s = n ? { top: 0, left: 0 } : e.offset(),
            r = { scroll: n ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop() },
            a = n ? { width: t(window).width(), height: t(window).height() } : null;
        return t.extend({}, o, r, a, s)
    }, i.prototype.getCalculatedOffset = function(t, e, i, n) { return "bottom" == t ? { top: e.top + e.height, left: e.left + e.width / 2 - i / 2 } : "top" == t ? { top: e.top - n, left: e.left + e.width / 2 - i / 2 } : "left" == t ? { top: e.top + e.height / 2 - n / 2, left: e.left - i } : { top: e.top + e.height / 2 - n / 2, left: e.left + e.width } }, i.prototype.getViewportAdjustedDelta = function(t, e, i, n) {
        var o = { top: 0, left: 0 };
        if (!this.$viewport) return o;
        var s = this.options.viewport && this.options.viewport.padding || 0,
            r = this.getPosition(this.$viewport);
        if (/right|left/.test(t)) {
            var a = e.top - s - r.scroll,
                l = e.top + s - r.scroll + n;
            a < r.top ? o.top = r.top - a : l > r.top + r.height && (o.top = r.top + r.height - l)
        } else {
            var h = e.left - s,
                c = e.left + s + i;
            h < r.left ? o.left = r.left - h : c > r.right && (o.left = r.left + r.width - c)
        }
        return o
    }, i.prototype.getTitle = function() {
        var t, e = this.$element,
            i = this.options;
        return t = e.attr("data-original-title") || ("function" == typeof i.title ? i.title.call(e[0]) : i.title)
    }, i.prototype.getUID = function(t) { do t += ~~(1e6 * Math.random()); while (document.getElementById(t)); return t }, i.prototype.tip = function() { if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!"); return this.$tip }, i.prototype.arrow = function() { return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow") }, i.prototype.enable = function() { this.enabled = !0 }, i.prototype.disable = function() { this.enabled = !1 }, i.prototype.toggleEnabled = function() { this.enabled = !this.enabled }, i.prototype.toggle = function(e) {
        var i = this;
        e && (i = t(e.currentTarget).data("bs." + this.type), i || (i = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, i))), e ? (i.inState.click = !i.inState.click, i.isInStateTrue() ? i.enter(i) : i.leave(i)) : i.tip().hasClass("in") ? i.leave(i) : i.enter(i)
    }, i.prototype.destroy = function() {
        var t = this;
        clearTimeout(this.timeout), this.hide(function() { t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null })
    };
    var n = t.fn.tooltip;
    t.fn.tooltip = e, t.fn.tooltip.Constructor = i, t.fn.tooltip.noConflict = function() { return t.fn.tooltip = n, this }
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.popover"),
                s = "object" == typeof e && e;
            !o && /destroy|hide/.test(e) || (o || n.data("bs.popover", o = new i(this, s)), "string" == typeof e && o[e]())
        })
    }
    var i = function(t, e) { this.init("popover", t, e) };
    if (!t.fn.tooltip) throw new Error("Popover requires tooltip.js");
    i.VERSION = "3.3.6", i.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, { placement: "right", trigger: "click", content: "", template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' }), i.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype), i.prototype.constructor = i, i.prototype.getDefaults = function() { return i.DEFAULTS }, i.prototype.setContent = function() {
        var t = this.tip(),
            e = this.getTitle(),
            i = this.getContent();
        t.find(".popover-title")[this.options.html ? "html" : "text"](e), t.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof i ? "html" : "append" : "text"](i), t.removeClass("fade top bottom left right in"), t.find(".popover-title").html() || t.find(".popover-title").hide()
    }, i.prototype.hasContent = function() { return this.getTitle() || this.getContent() }, i.prototype.getContent = function() {
        var t = this.$element,
            e = this.options;
        return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
    }, i.prototype.arrow = function() { return this.$arrow = this.$arrow || this.tip().find(".arrow") };
    var n = t.fn.popover;
    t.fn.popover = e, t.fn.popover.Constructor = i, t.fn.popover.noConflict = function() { return t.fn.popover = n, this }
}(jQuery), + function(t) {
    "use strict";

    function e(i, n) { this.$body = t(document.body), this.$scrollElement = t(t(i).is(document.body) ? window : i), this.options = t.extend({}, e.DEFAULTS, n), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)), this.refresh(), this.process() }

    function i(i) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.scrollspy"),
                s = "object" == typeof i && i;
            o || n.data("bs.scrollspy", o = new e(this, s)), "string" == typeof i && o[i]()
        })
    }
    e.VERSION = "3.3.6", e.DEFAULTS = { offset: 10 }, e.prototype.getScrollHeight = function() { return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight) }, e.prototype.refresh = function() {
        var e = this,
            i = "offset",
            n = 0;
        this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), t.isWindow(this.$scrollElement[0]) || (i = "position", n = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function() {
            var e = t(this),
                o = e.data("target") || e.attr("href"),
                s = /^#./.test(o) && t(o);
            return s && s.length && s.is(":visible") && [
                [s[i]().top + n, o]
            ] || null
        }).sort(function(t, e) { return t[0] - e[0] }).each(function() { e.offsets.push(this[0]), e.targets.push(this[1]) })
    }, e.prototype.process = function() {
        var t, e = this.$scrollElement.scrollTop() + this.options.offset,
            i = this.getScrollHeight(),
            n = this.options.offset + i - this.$scrollElement.height(),
            o = this.offsets,
            s = this.targets,
            r = this.activeTarget;
        if (this.scrollHeight != i && this.refresh(), e >= n) return r != (t = s[s.length - 1]) && this.activate(t);
        if (r && e < o[0]) return this.activeTarget = null, this.clear();
        for (t = o.length; t--;) r != s[t] && e >= o[t] && (void 0 === o[t + 1] || e < o[t + 1]) && this.activate(s[t])
    }, e.prototype.activate = function(e) {
        this.activeTarget = e, this.clear();
        var i = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]',
            n = t(i).parents("li").addClass("active");
        n.parent(".dropdown-menu").length && (n = n.closest("li.dropdown").addClass("active")), n.trigger("activate.bs.scrollspy")
    }, e.prototype.clear = function() { t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active") };
    var n = t.fn.scrollspy;
    t.fn.scrollspy = i, t.fn.scrollspy.Constructor = e, t.fn.scrollspy.noConflict = function() { return t.fn.scrollspy = n, this }, t(window).on("load.bs.scrollspy.data-api", function() {
        t('[data-spy="scroll"]').each(function() {
            var e = t(this);
            i.call(e, e.data())
        })
    })
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.tab");
            o || n.data("bs.tab", o = new i(this)), "string" == typeof e && o[e]()
        })
    }
    var i = function(e) { this.element = t(e) };
    i.VERSION = "3.3.6", i.TRANSITION_DURATION = 150, i.prototype.show = function() {
        var e = this.element,
            i = e.closest("ul:not(.dropdown-menu)"),
            n = e.data("target");
        if (n || (n = e.attr("href"), n = n && n.replace(/.*(?=#[^\s]*$)/, "")), !e.parent("li").hasClass("active")) {
            var o = i.find(".active:last a"),
                s = t.Event("hide.bs.tab", { relatedTarget: e[0] }),
                r = t.Event("show.bs.tab", { relatedTarget: o[0] });
            if (o.trigger(s), e.trigger(r), !r.isDefaultPrevented() && !s.isDefaultPrevented()) {
                var a = t(n);
                this.activate(e.closest("li"), i), this.activate(a, a.parent(), function() { o.trigger({ type: "hidden.bs.tab", relatedTarget: e[0] }), e.trigger({ type: "shown.bs.tab", relatedTarget: o[0] }) })
            }
        }
    }, i.prototype.activate = function(e, n, o) {
        function s() { r.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), a ? (e[0].offsetWidth, e.addClass("in")) : e.removeClass("fade"), e.parent(".dropdown-menu").length && e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), o && o() }
        var r = n.find("> .active"),
            a = o && t.support.transition && (r.length && r.hasClass("fade") || !!n.find("> .fade").length);
        r.length && a ? r.one("bsTransitionEnd", s).emulateTransitionEnd(i.TRANSITION_DURATION) : s(), r.removeClass("in")
    };
    var n = t.fn.tab;
    t.fn.tab = e, t.fn.tab.Constructor = i, t.fn.tab.noConflict = function() { return t.fn.tab = n, this };
    var o = function(i) { i.preventDefault(), e.call(t(this), "show") };
    t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', o).on("click.bs.tab.data-api", '[data-toggle="pill"]', o)
}(jQuery), + function(t) {
    "use strict";

    function e(e) {
        return this.each(function() {
            var n = t(this),
                o = n.data("bs.affix"),
                s = "object" == typeof e && e;
            o || n.data("bs.affix", o = new i(this, s)), "string" == typeof e && o[e]()
        })
    }
    var i = function(e, n) { this.options = t.extend({}, i.DEFAULTS, n), this.$target = t(this.options.target).on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)), this.$element = t(e), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition() };
    i.VERSION = "3.3.6", i.RESET = "affix affix-top affix-bottom", i.DEFAULTS = { offset: 0, target: window }, i.prototype.getState = function(t, e, i, n) {
        var o = this.$target.scrollTop(),
            s = this.$element.offset(),
            r = this.$target.height();
        if (null != i && "top" == this.affixed) return o < i && "top";
        if ("bottom" == this.affixed) return null != i ? !(o + this.unpin <= s.top) && "bottom" : !(o + r <= t - n) && "bottom";
        var a = null == this.affixed,
            l = a ? o : s.top,
            h = a ? r : e;
        return null != i && o <= i ? "top" : null != n && l + h >= t - n && "bottom"
    }, i.prototype.getPinnedOffset = function() {
        if (this.pinnedOffset) return this.pinnedOffset;
        this.$element.removeClass(i.RESET).addClass("affix");
        var t = this.$target.scrollTop(),
            e = this.$element.offset();
        return this.pinnedOffset = e.top - t
    }, i.prototype.checkPositionWithEventLoop = function() { setTimeout(t.proxy(this.checkPosition, this), 1) }, i.prototype.checkPosition = function() {
        if (this.$element.is(":visible")) {
            var e = this.$element.height(),
                n = this.options.offset,
                o = n.top,
                s = n.bottom,
                r = Math.max(t(document).height(), t(document.body).height());
            "object" != typeof n && (s = o = n), "function" == typeof o && (o = n.top(this.$element)), "function" == typeof s && (s = n.bottom(this.$element));
            var a = this.getState(r, e, o, s);
            if (this.affixed != a) {
                null != this.unpin && this.$element.css("top", "");
                var l = "affix" + (a ? "-" + a : ""),
                    h = t.Event(l + ".bs.affix");
                if (this.$element.trigger(h), h.isDefaultPrevented()) return;
                this.affixed = a, this.unpin = "bottom" == a ? this.getPinnedOffset() : null, this.$element.removeClass(i.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
            }
            "bottom" == a && this.$element.offset({ top: r - e - s })
        }
    };
    var n = t.fn.affix;
    t.fn.affix = e, t.fn.affix.Constructor = i, t.fn.affix.noConflict = function() { return t.fn.affix = n, this }, t(window).on("load", function() {
        t('[data-spy="affix"]').each(function() {
            var i = t(this),
                n = i.data();
            n.offset = n.offset || {}, null != n.offsetBottom && (n.offset.bottom = n.offsetBottom), null != n.offsetTop && (n.offset.top = n.offsetTop), e.call(i, n)
        })
    })
}(jQuery),
function(t) {
    var e = {
            common: {
                init: function() {
                    function e() { console.log("CB Enabled"), t(".nr_video-box").colorbox({ iframe: !0, innerWidth: "640", innerHeight: "390", title: !1 }) }

                    function i() { console.log("CB Disabled"), t(".nr_video-box").each(function() { $this = t(this), $this.attr("target", "_blank"), $this.colorbox.remove() }) }
                    t(".dropdown").hover(function() { t(this).addClass("open") }, function() { t(this).removeClass("open") }), t.mediaquery({ minWidth: [768], maxWidth: [767] }), t(window).on("mqchange.mediaquery", function(t, n) { 767 === n.maxWidth && i(), 768 === n.minWidth && e() }), t(window).trigger("mqchange.mediaquery", t.mediaquery("state"));
                    var n, o, s, r, a, l, h = "http://northrocksa.churchonline.org";
                    if (o = function() { t("#churchonline_counter .time").hide(), t("#churchonline_counter .live").show() }, loadCountdown = function(e) {
                            var i;
                            if (t("#churchonline_counter").show(), e.response.item.isLive) return o();
                            date = e.response.item.eventStartTime.match(/^(\d{4})-0?(\d+)-0?(\d+)[T ]0?(\d+):0?(\d+):0?(\d+)Z$/), dateString = date[2] + "/" + date[3] + "/" + date[1] + " " + date[4] + ":" + date[5] + ":" + date[6] + " +0000", i = (new Date(dateString) - new Date) / 1e3, n = Math.floor(i / 86400), s = Math.floor(i % 86400 / 3600), a = Math.floor(i % 3600 / 60), l = Math.floor(i % 60);
                            var r = setInterval(function() { if (--l < 0 && (l = 59, --a < 0 && (a = 59, --s < 0 && (s = 23, --n < 0 && (n = 0)))), t("#churchonline_counter .days").html(n.toString().length < 2 ? "0" + n : n), t("#churchonline_counter .hours").html(s.toString().length < 2 ? "0" + s : s), t("#churchonline_counter .minutes").html(a.toString().length < 2 ? "0" + a : a), t("#churchonline_counter .seconds").html(l.toString().length < 2 ? "0" + l : l), 0 === l && 0 === a && 0 === s && 0 === n) return o(), clearInterval(r) }, 1e3);
                            return r
                        }, n = void 0, s = void 0, a = void 0, l = void 0, r = void 0, eventUrl = h + "/api/v1/events/current", msie = /msie/.test(navigator.userAgent.toLowerCase()), msie && window.XDomainRequest) {
                        var c = new XDomainRequest;
                        c.open("get", eventUrl), c.onload = function() { loadCountdown(t.parseJSON(c.responseText)) }, c.send()
                    } else t.ajax({ url: eventUrl, dataType: "json", crossDomain: !0, success: function(t) { loadCountdown(t) }, error: function(t, e, i) { return console.log(i) } })
                },
                finalize: function() {}
            }
        },
        i = {
            fire: function(t, i, n) {
                var o, s = e;
                i = void 0 === i ? "init" : i, o = "" !== t, o = o && s[t], o = o && "function" == typeof s[t][i], o && s[t][i](n)
            },
            loadEvents: function() { i.fire("common"), t.each(document.body.className.replace(/-/g, "_").split(/\s+/), function(t, e) { i.fire(e), i.fire(e, "finalize") }), i.fire("common", "finalize") }
        };
    t(document).ready(i.loadEvents)
}(jQuery);