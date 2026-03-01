"use strict";

function addBackToTop(options) {
    var o, t, e, n, i = options || {},
        r = i.backgroundColor || "#000",
        a = i.cornerOffset || 20,
        s = i.diameter || 56,
        u = i.ease || function (o) {
            return 0.5 * (1 - Math.cos(Math.PI * o));
        },
        m = i.id || "back-to-top",
        b = i.innerHTML || '<svg viewBox="0 0 24 24"><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"></path></svg>',
        f = i.onClickScrollTo || 0,
        w = i.scrollContainer || document.body,
        k = i.scrollDuration || 100,
        T = i.showWhenScrollTopIs || 1,
        z = i.size || s,
        C = i.textColor || "#fff",
        N = i.zIndex || 1,
        A = w === document.body,
        B = A && document.documentElement;

    o = Math.round(0.43 * z);
    t = Math.round(0.29 * z);

    e = "#" + m + "{" +
        "background:" + r + ";" +
        "border-radius:50%;" +
        "bottom:" + a + "px;" +
        "box-shadow:0 2px 5px 0 rgba(0,0,0,.26);" +
        "color:" + C + ";" +
        "cursor:pointer;" +
        "display:block;" +
        "height:" + z + "px;" +
        "opacity:1;" +
        "outline:0;" +
        "position:fixed;" +
        "right:" + a + "px;" +
        "transition:bottom .2s,opacity .2s;" +
        "user-select:none;" +
        "width:" + z + "px;" +
        "z-index:" + N + ";" +
        "}" +
        "#" + m + " svg{" +
        "display:block;" +
        "fill:currentColor;" +
        "height:" + o + "px;" +
        "margin:" + t + "px auto 0;" +
        "width:" + o + "px;" +
        "}" +
        "#" + m + ".hidden{" +
        "bottom:-" + z + "px;" +
        "opacity:0;" +
        "}";

    n = document.createElement("style");
    n.appendChild(document.createTextNode(e));
    document.head.insertAdjacentElement("afterbegin", n);

    var btn = document.createElement("div");
    btn.id = m;
    btn.className = "hidden";
    btn.innerHTML = b;
    btn.addEventListener("click", function (e) {
        e.preventDefault();
        var target = typeof f === "function" ? f() : f;
        var start = performance.now();
        var initialScroll = getScroll();
        var distance = initialScroll - target;

        if (k <= 0 || typeof requestAnimationFrame === "undefined") {
            scrollToY(target);
            return;
        }

        function animateScroll(timestamp) {
            var progress = Math.min((timestamp - start) / k, 1);
            scrollToY(initialScroll - Math.round(u(progress) * distance));
            if (progress < 1) {
                requestAnimationFrame(animateScroll);
            }
        }

        requestAnimationFrame(animateScroll);
    });
    document.body.appendChild(btn);

    var hidden = true;

    function toggle() {
        if (getScroll() >= T) {
            if (hidden) {
                btn.className = "";
                hidden = false;
            }
        } else {
            if (!hidden) {
                btn.className = "hidden";
                hidden = true;
            }
        }
    }

    function getScroll() {
        return w.scrollTop || (B && document.documentElement.scrollTop) || 0;
    }

    function scrollToY(y) {
        w.scrollTop = y;
        if (B) document.documentElement.scrollTop = y;
    }

    (A ? window : w).addEventListener("scroll", toggle);
    toggle();
}

// 👇 This makes sure the function runs after the page is ready
document.addEventListener("DOMContentLoaded", function () {
    addBackToTop();
});
