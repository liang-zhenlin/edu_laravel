/*
 Highcharts JS v5.0.6 (2016-12-07)
 Client side exporting module

 (c) 2015 Torstein Honsi / Oystein Moseng

 License: www.highcharts.com/license
*/
(function (h) {
    "object" === typeof module && module.exports
        ? (module.exports = h)
        : h(Highcharts);
})(function (h) {
    (function (a) {
        function w(d, a) {
            var c = t.getElementsByTagName("head")[0],
                b = t.createElement("script");
            b.type = "text/javascript";
            b.src = d;
            b.onload = a;
            b.onerror = function () {
                console.error("Error loading script", d);
            };
            c.appendChild(b);
        }
        var h = a.merge,
            e = a.win,
            u = e.navigator,
            t = e.document,
            y = a.each,
            A = e.URL || e.webkitURL || e,
            B = /Edge\/|Trident\/|MSIE /.test(u.userAgent),
            C = B ? 150 : 0;
        a.CanVGRenderer = {};
        a.downloadURL = function (d, a) {
            var c = t.createElement("a"),
                b;
            if (u.msSaveOrOpenBlob) u.msSaveOrOpenBlob(d, a);
            else if (void 0 !== c.download)
                (c.href = d),
                    (c.download = a),
                    (c.target = "_blank"),
                    t.body.appendChild(c),
                    c.click(),
                    t.body.removeChild(c);
            else
                try {
                    if (((b = e.open(d, "chart")), void 0 === b || null === b))
                        throw "Failed to open window";
                } catch (v) {
                    e.location.href = d;
                }
        };
        a.svgToDataUrl = function (d) {
            var a =
                -1 < u.userAgent.indexOf("WebKit") &&
                0 > u.userAgent.indexOf("Chrome");
            try {
                if (!a && 0 > u.userAgent.toLowerCase().indexOf("firefox"))
                    return A.createObjectURL(
                        new e.Blob([d], {
                            type: "image/svg+xml;charset-utf-16",
                        })
                    );
            } catch (c) {}
            return (
                "data:image/svg+xml;charset\x3dUTF-8," + encodeURIComponent(d)
            );
        };
        a.imageToDataUrl = function (a, f, c, b, v, l, k, m, p) {
            var d = new e.Image(),
                g,
                r = function () {
                    setTimeout(function () {
                        var n = t.createElement("canvas"),
                            e = n.getContext && n.getContext("2d"),
                            x;
                        try {
                            if (e) {
                                n.height = d.height * b;
                                n.width = d.width * b;
                                e.drawImage(d, 0, 0, n.width, n.height);
                                try {
                                    (x = n.toDataURL(f)), v(x, f, c, b);
                                } catch (D) {
                                    g(a, f, c, b);
                                }
                            } else k(a, f, c, b);
                        } finally {
                            p && p(a, f, c, b);
                        }
                    }, C);
                },
                q = function () {
                    m(a, f, c, b);
                    p && p(a, f, c, b);
                };
            g = function () {
                d = new e.Image();
                g = l;
                d.crossOrigin = "Anonymous";
                d.onload = r;
                d.onerror = q;
                d.src = a;
            };
            d.onload = r;
            d.onerror = q;
            d.src = a;
        };
        a.downloadSVGLocal = function (d, f, c, b) {
            function v(b, a) {
                a = new e.jsPDF("l", "pt", [
                    b.width.baseVal.value + 2 * a,
                    b.height.baseVal.value + 2 * a,
                ]);
                e.svgElementToPdf(b, a, { removeInvalid: !0 });
                return a.output("datauristring");
            }
            function l() {
                r.innerHTML = d;
                var c = r.getElementsByTagName("text"),
                    e,
                    g = r.getElementsByTagName("svg")[0].style;
                y(c, function (a) {
                    y(["font-family", "font-size"], function (b) {
                        !a.style[b] && g[b] && (a.style[b] = g[b]);
                    });
                    a.style["font-family"] =
                        a.style["font-family"] &&
                        a.style["font-family"].split(" ").splice(-1);
                    e = a.getElementsByTagName("title");
                    y(e, function (b) {
                        a.removeChild(b);
                    });
                });
                c = v(r.firstChild, 0);
                a.downloadURL(c, n);
                b && b();
            }
            var k,
                m,
                p = !0,
                z,
                g = f.libURL || a.getOptions().exporting.libURL,
                r = t.createElement("div"),
                q = f.type || "image/png",
                n =
                    (f.filename || "chart") +
                    "." +
                    ("image/svg+xml" === q ? "svg" : q.split("/")[1]),
                h = f.scale || 1,
                g = "/" !== g.slice(-1) ? g + "/" : g;
            if ("image/svg+xml" === q)
                try {
                    u.msSaveOrOpenBlob
                        ? ((m = new MSBlobBuilder()),
                          m.append(d),
                          (k = m.getBlob("image/svg+xml")))
                        : (k = a.svgToDataUrl(d)),
                        a.downloadURL(k, n),
                        b && b();
                } catch (x) {
                    c();
                }
            else
                "application/pdf" === q
                    ? e.jsPDF && e.svgElementToPdf
                        ? l()
                        : ((p = !0),
                          w(g + "jspdf.js", function () {
                              w(g + "rgbcolor.js", function () {
                                  w(g + "svg2pdf.js", function () {
                                      l();
                                  });
                              });
                          }))
                    : ((k = a.svgToDataUrl(d)),
                      (z = function () {
                          try {
                              A.revokeObjectURL(k);
                          } catch (x) {}
                      }),
                      a.imageToDataUrl(
                          k,
                          q,
                          {},
                          h,
                          function (d) {
                              try {
                                  a.downloadURL(d, n), b && b();
                              } catch (D) {
                                  c();
                              }
                          },
                          function () {
                              var f = t.createElement("canvas"),
                                  v = f.getContext("2d"),
                                  l =
                                      d.match(
                                          /^<svg[^>]*width\s*=\s*\"?(\d+)\"?[^>]*>/
                                      )[1] * h,
                                  k =
                                      d.match(
                                          /^<svg[^>]*height\s*=\s*\"?(\d+)\"?[^>]*>/
                                      )[1] * h,
                                  m = function () {
                                      v.drawSvg(d, 0, 0, l, k);
                                      try {
                                          a.downloadURL(
                                              u.msSaveOrOpenBlob
                                                  ? f.msToBlob()
                                                  : f.toDataURL(q),
                                              n
                                          ),
                                              b && b();
                                      } catch (E) {
                                          c();
                                      } finally {
                                          z();
                                      }
                                  };
                              f.width = l;
                              f.height = k;
                              e.canvg
                                  ? m()
                                  : ((p = !0),
                                    w(g + "rgbcolor.js", function () {
                                        w(g + "canvg.js", function () {
                                            m();
                                        });
                                    }));
                          },
                          c,
                          c,
                          function () {
                              p && z();
                          }
                      ));
        };
        a.Chart.prototype.getSVGForLocalExport = function (d, f, c, b) {
            var e = this,
                l,
                k = 0,
                m,
                p,
                h,
                g,
                r,
                q = function (a, d, c) {
                    ++k;
                    c.imageElement.setAttributeNS(
                        "http://www.w3.org/1999/xlink",
                        "href",
                        a
                    );
                    k === l.length && b(e.sanitizeSVG(m.innerHTML, p));
                };
            a.wrap(a.Chart.prototype, "getChartHTML", function (a) {
                var b = a.apply(this, Array.prototype.slice.call(arguments, 1));
                p = this.options;
                m = this.container.cloneNode(!0);
                return b;
            });
            e.getSVGForExport(d, f);
            l = m.getElementsByTagName("image");
            try {
                if (l.length)
                    for (g = 0, r = l.length; g < r; ++g)
                        (h = l[g]),
                            a.imageToDataUrl(
                                h.getAttributeNS(
                                    "http://www.w3.org/1999/xlink",
                                    "href"
                                ),
                                "image/png",
                                { imageElement: h },
                                d.scale,
                                q,
                                c,
                                c,
                                c
                            );
                else b(e.sanitizeSVG(m.innerHTML, p));
            } catch (n) {
                c();
            }
        };
        a.Chart.prototype.exportChartLocal = function (d, e) {
            var c = this,
                b = a.merge(c.options.exporting, d),
                f = function () {
                    if (!1 === b.fallbackToExportServer)
                        if (b.error) b.error();
                        else throw "Fallback to export server disabled";
                    else c.exportChart(b);
                };
            ((B && "image/svg+xml" !== b.type) ||
                "application/pdf" === b.type) &&
            c.container.getElementsByTagName("image").length
                ? f()
                : c.getSVGForLocalExport(b, e, f, function (c) {
                      -1 < c.indexOf("\x3cforeignObject") &&
                      "image/svg+xml" !== b.type
                          ? f()
                          : a.downloadSVGLocal(c, b, f);
                  });
        };
        h(!0, a.getOptions().exporting, {
            libURL: "https://code.highcharts.com/5.0.6//admin//admin//admin/lib/",
            buttons: {
                contextButton: {
                    menuItems: [
                        {
                            textKey: "printChart",
                            onclick: function () {
                                this.print();
                            },
                        },
                        { separator: !0 },
                        {
                            textKey: "downloadPNG",
                            onclick: function () {
                                this.exportChartLocal();
                            },
                        },
                        {
                            textKey: "downloadJPEG",
                            onclick: function () {
                                this.exportChartLocal({ type: "image/jpeg" });
                            },
                        },
                        {
                            textKey: "downloadSVG",
                            onclick: function () {
                                this.exportChartLocal({
                                    type: "image/svg+xml",
                                });
                            },
                        },
                        {
                            textKey: "downloadPDF",
                            onclick: function () {
                                this.exportChartLocal({
                                    type: "application/pdf",
                                });
                            },
                        },
                    ],
                },
            },
        });
    })(h);
});
