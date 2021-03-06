new function() {
    var h = "footer";
    var f = "fixed-footer";

    function g() {
        var b = document.getElementsByTagName("body")[0].clientHeight;
        document.getElementById(h).style.top = "0px";
        var a = document.getElementById(h).offsetTop;
        var d = document.getElementById(h).offsetHeight;
        if (window.innerHeight) {
            var c = window.innerHeight
        } else {
            if (document.documentElement && document.documentElement.clientHeight != 0) {
                var c = document.documentElement.clientHeight
            }
        }
        if (a + d < c) {
            document.getElementById(h).style.position = "relative";
            document.getElementById(h).style.top = (c - d - a - 1) + "px";
            if (document.body.classList) {
                document.body.classList.add(f)
            } else {
                document.body.className += " " + f
            }
        } else {
            if (document.body.classList) {
                document.body.classList.remove(f)
            } else {
                document.body.className = document.body.className.replace(new RegExp("(^|\\b)" + f + "(\\b|$)", "gi"), " ")
            }
        }
    }

    function j(c) {
        var b = document.createElement("div");
        var d = document.createTextNode("S");
        b.appendChild(d);
        b.style.visibility = "hidden";
        b.style.position = "absolute";
        b.style.top = "0";
        document.body.appendChild(b);
        var e = b.offsetHeight;

        function a() {
            if (e != b.offsetHeight) {
                c();
                e = b.offsetHeight
            }
        }
        setInterval(a, 1000)
    }

    function i(a, c, d) {
        try {
            a.addEventListener(c, d, false)
        } catch (b) {
            a.attachEvent("on" + c, d)
        }
    }
    i(window, "load", g);
    i(window, "load", function() {
        j(g)
    });
    i(window, "resize", g)
};
jQuery(function() {
    var b = jQuery("#page-top");
    b.hide();
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 400) {
            b.fadeIn()
        } else {
            b.fadeOut()
        }
    });
    b.click(function() {
        jQuery("body,html").animate({
            scrollTop: 0
        }, 800);
        return false
    })
});
(function(n, q, s) {
    function m() {
        return q("body").hasClass("mobile")
    }
    var r = {
        click: function(a) {
            a.preventDefault();
            a.stopPropagation();
            if (!m() || this.isClickable()) {
                n.location.replace(this.getLink().attr("href"));
                return
            }
            this.toggle()
        },
        mouseenter: function() {
            this.expand()
        },
        mouseleave: function() {
            this.collapse()
        }
    };
    var l = (function() {
        function j(v, u, B, w) {
            if (!(this instanceof j)) {
                return new j(v)
            }
            u = u || {
                click: function() {},
                mouseenter: function() {},
                mouseleave: function() {}
            };
            this.$element = v;
            this.expanded = (typeof B !== "undefined") ? B : false;
            this.$icon = null;
            this.listener = u;
            this.mobile = (typeof w !== "undefined") ? w : true
        }
        j.prototype.getElement = function f() {
            return this.$element
        };
        j.prototype.getIcon = function y() {
            this.$icon = this.$icon || q("<i></i>").prependTo(this.$element);
            return this.$icon
        };
        j.prototype.getLink = function z() {
            return this.$element.find("> a").eq(0)
        };
        j.prototype.hasChildren = function b() {
            return !!this.$element.find("> ul").length
        };
        j.prototype.isExpanded = function h() {
            return this.expanded
        };
        j.prototype.isClickable = function d() {
            if (!this.getLink().length) {
                return false
            }
            return (!this.hasChildren() || (this.hasChildren() && this.isExpanded()))
        };
        j.prototype.initialize = function g() {
            this.$icon = q("<i></i>");
            this.$element.prepend(this.$icon);
            this.refresh(false);
            this.addEventListener()
        };
        j.prototype.refresh = function a(u) {
            u = (typeof u !== "undefined") ? u : true;
            if (this.expanded || !this.hasChildren()) {
                this.expand(u)
            } else {
                this.collapse(u)
            }
        };
        j.prototype.expand = function i(v) {
            var u = this;
            this.expanded = true;
            v = (typeof v !== "undefined") ? v : true;
            if (v) {
                this.$element.find("> ul").slideDown("fast", function() {
                    u.getIcon().attr({
                        "class": "fa fa-angle-right"
                    });
                    u.$element.removeClass("menu-item-collapsed").addClass("menu-item-expanded")
                })
            } else {
                this.getIcon().attr({
                    "class": "fa fa-angle-right"
                });
                this.$element.removeClass("menu-item-collapsed").addClass("menu-item-expanded")
            }
        };
        j.prototype.collapse = function x(v) {
            var u = this;
            this.expanded = false;
            v = (typeof v !== "undefined") ? v : true;
            if (v) {
                this.$element.find("> ul").slideUp("fast", function() {
                    u.getIcon().attr({
                        "class": "fa fa-angle-down"
                    });
                    u.$element.removeClass("menu-item-expanded").addClass("menu-item-collapsed")
                })
            } else {
                this.getIcon().attr({
                    "class": "fa fa-angle-down"
                });
                this.$element.removeClass("menu-item-expanded").addClass("menu-item-collapsed")
            }
        };
        j.prototype.toggle = function c() {
            if (!this.hasChildren()) {
                return
            }
            this.expanded ? this.collapse() : this.expand()
        };
        j.prototype.addEventListener = function e() {
            this.$element.click(q.proxy(this.listener.click, this));
            if (!this.mobile) {
                this.$element.hover(q.proxy(this.listener.mouseenter, this), q.proxy(this.listener.mouseleave, this))
            }
        };
        return j
    }());
    var p = (function() {
        function a(g, f) {
            if (!(this instanceof a)) {
                return new a()
            }
            this.$element = g;
            this.mobile = (typeof f !== "undefined") ? f : true
        }
        a.prototype.initialize = function c() {
            var f = this;
            this.getMenuItems().each(function() {
                var g = q(this);
                var h = new l(g, r, false, f.mobile);
                g.data("st-menu", f);
                g.data("st-menu-item", h);
                h.initialize()
            });
            this.addEventListener()
        };
        a.prototype.getMenuItems = function b() {
            return this.$element.find("li")
        };
        a.prototype.collapseChildren = function d() {
            this.getMenuItems().each(function() {
                q(this).data("st-menu-item").collapse()
            })
        };
        a.prototype.addEventListener = function e() {
            var f = this;
            if (this.mobile) {
                return
            }
            this.$element.on("mouseleave", function() {
                f.collapseChildren()
            })
        };
        return a
    }());

    function t() {
        var a = q(".acordion_tree ul.menu");
        var b = m();
        a.each(function() {
            var c = q(this);
            var d = new p(c, b);
            c.data("st-menu", d);
            d.initialize()
        })
    }

    function k() {
        var a = q(".trigger");
        a.click(function(c) {
            var b = q(this);
            c.preventDefault();
            c.stopPropagation();
            b.toggleClass("active");
            b.next(".acordion_tree").slideToggle("normal")
        })
    }

    function o() {
        t();
        k()
    }
    q(o)
}(window, jQuery));
jQuery(function() {
    jQuery("ul.menu li").filter(function() {
        return !jQuery(this).closest(".acordion").length
    }).hover(function() {
        jQuery(">ul:not(:animated)", this).slideDown("fast")
    }, function() {
        jQuery(">ul", this).slideUp("fast")
    })
});
(function(e, f, h, g) {
    if (typeof h.fn.slick === "undefined") {
        return
    }
    h(function() {
        h("[data-slick]").slick()
    })
}(window, window.document, jQuery));
jQuery(function() {
    jQuery("a[href^=#]").click(function() {
        var c = 400;
        var b = jQuery(this).attr("href");
        var d = jQuery(b == "#" || b == "" ? "html" : b);
        var a = d.offset().top;
        jQuery("body,html").animate({
            scrollTop: a
        }, c, "swing");
        return false
    })
});
jQuery(function() {
    jQuery("span.hatenamark").each(function() {
        jQuery(this).prepend('<i class="fa fa-question-circle"></i>')
    });
    jQuery("span.checkmark").each(function() {
        jQuery(this).prepend('<i class="fa fa-check-circle"></i>')
    });
    jQuery("span.attentionmark").each(function() {
        jQuery(this).prepend('<i class="fa fa-exclamation-triangle"></i>')
    });
    jQuery("span.memomark").each(function() {
        jQuery(this).prepend('<i class="fa fa-pencil-square-o"></i>')
    })
});
