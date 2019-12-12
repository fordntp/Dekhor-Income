! function(a, b) {
    var c = "bootstrapMaterialDatePicker";
    var d = "plugin_" + c;
    b.locale("en");

    function e(c, d) {
        this.currentView = 0;
        this.minDate;
        this.maxDate;
        this._attachedEvents = [];
        this.element = c;
        this.$element = a(c);
        this.params = {
            date: true,
            time: true,
            format: "YYYY-MM-DD",
            minDate: null,
            maxDate: null,
            currentDate: null,
            lang: "en",
            weekStart: 0,
            disabledDays: [],
            shortTime: false,
            clearButton: false,
            nowButton: false,
            cancelText: "Cancel",
            okText: "OK",
            clearText: "Clear",
            nowText: "Now",
            switchOnClick: false,
            triggerEvent: "focus",
            monthPicker: false,
            year: true
        };
        this.params = a.fn.extend(this.params, d);
        this.name = "dtp_" + this.setName();
        this.$element.attr("data-dtp", this.name);
        b.locale(this.params.lang);
        this.init();
    }
    a.fn[c] = function(b, c) {
        this.each(function() {
            if (!a.data(this, d)) a.data(this, d, new e(this, b));
            else {
                if ("function" === typeof a.data(this, d)[b]) a.data(this, d)[b](c);
                if ("destroy" === b) delete a.data(this, d);
            }
        });
        return this;
    };
    e.prototype = {
        init: function() {
            this.initDays();
            this.initDates();
            this.initTemplate();
            this.initButtons();
            this._attachEvent(a(window), "resize", this._centerBox.bind(this));
            this._attachEvent(this.$dtpElement.find(".dtp-content"), "click", this._onElementClick.bind(this));
            this._attachEvent(this.$dtpElement, "click", this._onBackgroundClick.bind(this));
            this._attachEvent(this.$dtpElement.find(".dtp-close > a"), "click", this._onCloseClick.bind(this));
            this._attachEvent(this.$element, this.params.triggerEvent, this._fireCalendar.bind(this));
        },
        initDays: function() {
            this.days = [];
            for (var a = this.params.weekStart; this.days.length < 7; a++) {
                if (a > 6) a = 0;
                this.days.push(a.toString());
            }
        },
        initDates: function() {
            if (this.$element.val().length > 0)
                if ("undefined" !== typeof this.params.format && null !== this.params.format) this.currentDate = b(this.$element.val(), this.params.format).locale(this.params.lang);
                else this.currentDate = b(this.$element.val()).locale(this.params.lang);
            else if ("undefined" !== typeof this.$element.attr("value") && null !== this.$element.attr("value") && "" !== this.$element.attr("value")) {
                if ("string" === typeof this.$element.attr("value"))
                    if ("undefined" !== typeof this.params.format && null !== this.params.format) this.currentDate = b(this.$element.attr("value"), this.params.format).locale(this.params.lang);
                    else this.currentDate = b(this.$element.attr("value")).locale(this.params.lang);
            } else if ("undefined" !== typeof this.params.currentDate && null !== this.params.currentDate) {
                if ("string" === typeof this.params.currentDate)
                    if ("undefined" !== typeof this.params.format && null !== this.params.format) this.currentDate = b(this.params.currentDate, this.params.format).locale(this.params.lang);
                    else this.currentDate = b(this.params.currentDate).locale(this.params.lang);
                else if ("undefined" === typeof this.params.currentDate.isValid || "function" !== typeof this.params.currentDate.isValid) {
                    var a = this.params.currentDate.getTime();
                    this.currentDate = b(a, "x").locale(this.params.lang);
                } else this.currentDate = this.params.currentDate;
                this.$element.val(this.currentDate.format(this.params.format));
            } else this.currentDate = b();
            if ("undefined" !== typeof this.params.minDate && null !== this.params.minDate)
                if ("string" === typeof this.params.minDate)
                    if ("undefined" !== typeof this.params.format && null !== this.params.format) this.minDate = b(this.params.minDate, this.params.format).locale(this.params.lang);
                    else this.minDate = b(this.params.minDate).locale(this.params.lang);
            else if ("undefined" === typeof this.params.minDate.isValid || "function" !== typeof this.params.minDate.isValid) {
                var a = this.params.minDate.getTime();
                this.minDate = b(a, "x").locale(this.params.lang);
            } else this.minDate = this.params.minDate;
            else if (null === this.params.minDate) this.minDate = null;
            if ("undefined" !== typeof this.params.maxDate && null !== this.params.maxDate)
                if ("string" === typeof this.params.maxDate)
                    if ("undefined" !== typeof this.params.format && null !== this.params.format) this.maxDate = b(this.params.maxDate, this.params.format).locale(this.params.lang);
                    else this.maxDate = b(this.params.maxDate).locale(this.params.lang);
            else if ("undefined" === typeof this.params.maxDate.isValid || "function" !== typeof this.params.maxDate.isValid) {
                var a = this.params.maxDate.getTime();
                this.maxDate = b(a, "x").locale(this.params.lang);
            } else this.maxDate = this.params.maxDate;
            else if (null === this.params.maxDate) this.maxDate = null;
            if (!this.isAfterMinDate(this.currentDate)) this.currentDate = b(this.minDate);
            if (!this.isBeforeMaxDate(this.currentDate)) this.currentDate = b(this.maxDate);
        },
        initTemplate: function() {
            var b = "";
            var c = this.currentDate.year();
            for (var d = c - 3; d < c + 4; d++) b += '<div class="year-picker-item" data-year="' + d + '">' + d + "</div>";
            this.midYear = c;
            var e = '<div class="dtp-picker-year hidden" >' + '<div><a href="javascript:void(0);" class="btn btn-default dtp-select-year-range before" style="margin: 0;"><i class="material-icons">keyboard_arrow_up</i></a></div>' + b + '<div><a href="javascript:void(0);" class="btn btn-default dtp-select-year-range after" style="margin: 0;"><i class="material-icons">keyboard_arrow_down</i></a></div>' + "</div>";
            this.template = '<div class="dtp hidden" id="' + this.name + '">' + '<div class="dtp-content">' + '<div class="dtp-date-view">' + '<header class="dtp-header">' + '<div class="dtp-actual-day">Lundi</div>' + '<div class="dtp-close"><a href="javascript:void(0);"><i class="material-icons">clear</i></a></div>' + "</header>" + '<div class="dtp-date hidden">' + "<div>" + '<div class="left center p10">' + '<a href="javascript:void(0);" class="dtp-select-month-before"><i class="material-icons">chevron_left</i></a>' + "</div>" + '<div class="dtp-actual-month p80">MAR</div>' + '<div class="right center p10">' + '<a href="javascript:void(0);" class="dtp-select-month-after"><i class="material-icons">chevron_right</i></a>' + "</div>" + '<div class="clearfix"></div>' + "</div>" + '<div class="dtp-actual-num">13</div>' + "<div>" + '<div class="left center p10">' + '<a href="javascript:void(0);" class="dtp-select-year-before"><i class="material-icons">chevron_left</i></a>' + "</div>" + '<div class="dtp-actual-year p80' + (this.params.year ? "" : " disabled") + '">2014</div>' + '<div class="right center p10">' + '<a href="javascript:void(0);" class="dtp-select-year-after"><i class="material-icons">chevron_right</i></a>' + "</div>" + '<div class="clearfix"></div>' + "</div>" + "</div>" + '<div class="dtp-time hidden">' + '<div class="dtp-actual-maxtime">23:55</div>' + "</div>" + '<div class="dtp-picker">' + '<div class="dtp-picker-calendar"></div>' + '<div class="dtp-picker-datetime hidden">' + '<div class="dtp-actual-meridien">' + '<div class="left p20">' + '<a class="dtp-meridien-am" href="javascript:void(0);">AM</a>' + "</div>" + '<div class="dtp-actual-time p60"></div>' + '<div class="right p20">' + '<a class="dtp-meridien-pm" href="javascript:void(0);">PM</a>' + "</div>" + '<div class="clearfix"></div>' + "</div>" + '<div id="dtp-svg-clock">' + "</div>" + "</div>" + e + "</div>" + "</div>" + '<div class="dtp-buttons">' + '<button class="dtp-btn-now btn btn-flat hidden">' + this.params.nowText + "</button>" + '<button class="dtp-btn-clear btn btn-flat hidden">' + this.params.clearText + "</button>" + '<button class="dtp-btn-cancel btn btn-flat">' + this.params.cancelText + "</button>" + '<button class="dtp-btn-ok btn btn-flat">' + this.params.okText + "</button>" + '<div class="clearfix"></div>' + "</div>" + "</div>" + "</div>";
            if (a("body").find("#" + this.name).length <= 0) {
                a("body").append(this.template);
                if (this) this.dtpElement = a("body").find("#" + this.name);
                this.$dtpElement = a(this.dtpElement);
            }
        },
        initButtons: function() {
            this._attachEvent(this.$dtpElement.find(".dtp-btn-cancel"), "click", this._onCancelClick.bind(this));
            this._attachEvent(this.$dtpElement.find(".dtp-btn-ok"), "click", this._onOKClick.bind(this));
            this._attachEvent(this.$dtpElement.find("a.dtp-select-month-before"), "click", this._onMonthBeforeClick.bind(this));
            this._attachEvent(this.$dtpElement.find("a.dtp-select-month-after"), "click", this._onMonthAfterClick.bind(this));
            this._attachEvent(this.$dtpElement.find("a.dtp-select-year-before"), "click", this._onYearBeforeClick.bind(this));
            this._attachEvent(this.$dtpElement.find("a.dtp-select-year-after"), "click", this._onYearAfterClick.bind(this));
            this._attachEvent(this.$dtpElement.find(".dtp-actual-year"), "click", this._onActualYearClick.bind(this));
            this._attachEvent(this.$dtpElement.find("a.dtp-select-year-range.before"), "click", this._onYearRangeBeforeClick.bind(this));
            this._attachEvent(this.$dtpElement.find("a.dtp-select-year-range.after"), "click", this._onYearRangeAfterClick.bind(this));
            this._attachEvent(this.$dtpElement.find("div.year-picker-item"), "click", this._onYearItemClick.bind(this));
            if (true === this.params.clearButton) {
                this._attachEvent(this.$dtpElement.find(".dtp-btn-clear"), "click", this._onClearClick.bind(this));
                this.$dtpElement.find(".dtp-btn-clear").removeClass("hidden");
            }
            if (true === this.params.nowButton) {
                this._attachEvent(this.$dtpElement.find(".dtp-btn-now"), "click", this._onNowClick.bind(this));
                this.$dtpElement.find(".dtp-btn-now").removeClass("hidden");
            }
            if (true === this.params.nowButton && true === this.params.clearButton) this.$dtpElement.find(".dtp-btn-clear, .dtp-btn-now, .dtp-btn-cancel, .dtp-btn-ok").addClass("btn-xs");
            else if (true === this.params.nowButton || true === this.params.clearButton) this.$dtpElement.find(".dtp-btn-clear, .dtp-btn-now, .dtp-btn-cancel, .dtp-btn-ok").addClass("btn-sm");
        },
        initMeridienButtons: function() {
            this.$dtpElement.find("a.dtp-meridien-am").off("click").on("click", this._onSelectAM.bind(this));
            this.$dtpElement.find("a.dtp-meridien-pm").off("click").on("click", this._onSelectPM.bind(this));
        },
        initDate: function(a) {
            this.currentView = 0;
            if (false === this.params.monthPicker) this.$dtpElement.find(".dtp-picker-calendar").removeClass("hidden");
            this.$dtpElement.find(".dtp-picker-datetime").addClass("hidden");
            this.$dtpElement.find(".dtp-picker-year").addClass("hidden");
            var b = "undefined" !== typeof this.currentDate && null !== this.currentDate ? this.currentDate : null;
            var c = this.generateCalendar(this.currentDate);
            if ("undefined" !== typeof c.week && "undefined" !== typeof c.days) {
                var d = this.constructHTMLCalendar(b, c);
                this.$dtpElement.find("a.dtp-select-day").off("click");
                this.$dtpElement.find(".dtp-picker-calendar").html(d);
                this.$dtpElement.find("a.dtp-select-day").on("click", this._onSelectDate.bind(this));
                this.toggleButtons(b);
            }
            this._centerBox();
            this.showDate(b);
        },
        initHours: function() {
            this.currentView = 1;
            this.showTime(this.currentDate);
            this.initMeridienButtons();
            if (this.currentDate.hour() < 12) this.$dtpElement.find("a.dtp-meridien-am").click();
            else this.$dtpElement.find("a.dtp-meridien-pm").click();
            var a = this.params.shortTime ? "h" : "H";
            this.$dtpElement.find(".dtp-picker-datetime").removeClass("hidden");
            this.$dtpElement.find(".dtp-picker-calendar").addClass("hidden");
            this.$dtpElement.find(".dtp-picker-year").addClass("hidden");
            var b = this.createSVGClock(true);
            for (var c = 0; c < 12; c++) {
                var d = -(162 * Math.sin(2 * -Math.PI * (c / 12)));
                var e = -(162 * Math.cos(2 * -Math.PI * (c / 12)));
                var f = this.currentDate.format(a) == c ? "#8BC34A" : "transparent";
                var g = this.currentDate.format(a) == c ? "#fff" : "#000";
                var h = this.createSVGElement("circle", {
                    id: "h-" + c,
                    "class": "dtp-select-hour",
                    style: "cursor:pointer",
                    r: "30",
                    cx: d,
                    cy: e,
                    fill: f,
                    "data-hour": c
                });
                var i = this.createSVGElement("text", {
                    id: "th-" + c,
                    "class": "dtp-select-hour-text",
                    "text-anchor": "middle",
                    style: "cursor:pointer",
                    "font-weight": "bold",
                    "font-size": "20",
                    x: d,
                    y: e + 7,
                    fill: g,
                    "data-hour": c
                });
                i.textContent = 0 === c ? this.params.shortTime ? 12 : c : c;
                if (!this.toggleTime(c, true)) {
                    h.className += " disabled";
                    i.className += " disabled";
                    i.setAttribute("fill", "#bdbdbd");
                } else {
                    h.addEventListener("click", this._onSelectHour.bind(this));
                    i.addEventListener("click", this._onSelectHour.bind(this));
                }
                b.appendChild(h);
                b.appendChild(i);
            }
            if (!this.params.shortTime) {
                for (var c = 0; c < 12; c++) {
                    var d = -(110 * Math.sin(2 * -Math.PI * (c / 12)));
                    var e = -(110 * Math.cos(2 * -Math.PI * (c / 12)));
                    var f = this.currentDate.format(a) == c + 12 ? "#8BC34A" : "transparent";
                    var g = this.currentDate.format(a) == c + 12 ? "#fff" : "#000";
                    var h = this.createSVGElement("circle", {
                        id: "h-" + (c + 12),
                        "class": "dtp-select-hour",
                        style: "cursor:pointer",
                        r: "30",
                        cx: d,
                        cy: e,
                        fill: f,
                        "data-hour": c + 12
                    });
                    var i = this.createSVGElement("text", {
                        id: "th-" + (c + 12),
                        "class": "dtp-select-hour-text",
                        "text-anchor": "middle",
                        style: "cursor:pointer",
                        "font-weight": "bold",
                        "font-size": "22",
                        x: d,
                        y: e + 7,
                        fill: g,
                        "data-hour": c + 12
                    });
                    i.textContent = c + 12;
                    if (!this.toggleTime(c + 12, true)) {
                        h.className += " disabled";
                        i.className += " disabled";
                        i.setAttribute("fill", "#bdbdbd");
                    } else {
                        h.addEventListener("click", this._onSelectHour.bind(this));
                        i.addEventListener("click", this._onSelectHour.bind(this));
                    }
                    b.appendChild(h);
                    b.appendChild(i);
                }
                this.$dtpElement.find("a.dtp-meridien-am").addClass("hidden");
                this.$dtpElement.find("a.dtp-meridien-pm").addClass("hidden");
            }
            this._centerBox();
        },
        initMinutes: function() {
            this.currentView = 2;
            this.showTime(this.currentDate);
            this.initMeridienButtons();
            if (this.currentDate.hour() < 12) this.$dtpElement.find("a.dtp-meridien-am").click();
            else this.$dtpElement.find("a.dtp-meridien-pm").click();
            this.$dtpElement.find(".dtp-picker-year").addClass("hidden");
            this.$dtpElement.find(".dtp-picker-calendar").addClass("hidden");
            this.$dtpElement.find(".dtp-picker-datetime").removeClass("hidden");
            var a = this.createSVGClock(false);
            for (var b = 0; b < 60; b++) {
                var c = b % 5 === 0 ? 162 : 158;
                var d = b % 5 === 0 ? 30 : 20;
                var e = -(c * Math.sin(2 * -Math.PI * (b / 60)));
                var f = -(c * Math.cos(2 * -Math.PI * (b / 60)));
                var g = this.currentDate.format("m") == b ? "#8BC34A" : "transparent";
                var h = this.createSVGElement("circle", {
                    id: "m-" + b,
                    "class": "dtp-select-minute",
                    style: "cursor:pointer",
                    r: d,
                    cx: e,
                    cy: f,
                    fill: g,
                    "data-minute": b
                });
                if (!this.toggleTime(b, false)) h.className += " disabled";
                else h.addEventListener("click", this._onSelectMinute.bind(this));
                a.appendChild(h);
            }
            for (var b = 0; b < 60; b++)
                if (b % 5 === 0) {
                    var e = -(162 * Math.sin(2 * -Math.PI * (b / 60)));
                    var f = -(162 * Math.cos(2 * -Math.PI * (b / 60)));
                    var g = this.currentDate.format("m") == b ? "#fff" : "#000";
                    var i = this.createSVGElement("text", {
                        id: "tm-" + b,
                        "class": "dtp-select-minute-text",
                        "text-anchor": "middle",
                        style: "cursor:pointer",
                        "font-weight": "bold",
                        "font-size": "20",
                        x: e,
                        y: f + 7,
                        fill: g,
                        "data-minute": b
                    });
                    i.textContent = b;
                    if (!this.toggleTime(b, false)) {
                        i.className += " disabled";
                        i.setAttribute("fill", "#bdbdbd");
                    } else i.addEventListener("click", this._onSelectMinute.bind(this));
                    a.appendChild(i);
                }
            this._centerBox();
        },
        animateHands: function() {
            var a = this.currentDate.hour();
            var b = this.currentDate.minute();
            var c = this.$dtpElement.find(".hour-hand");
            c[0].setAttribute("transform", "rotate(" + 360 * a / 12 + ")");
            var d = this.$dtpElement.find(".minute-hand");
            d[0].setAttribute("transform", "rotate(" + 360 * b / 60 + ")");
        },
        createSVGClock: function(a) {
            var b = this.params.shortTime ? -120 : -90;
            var c = this.createSVGElement("svg", {
                "class": "svg-clock",
                viewBox: "0,0,400,400"
            });
            var d = this.createSVGElement("g", {
                transform: "translate(200,200) "
            });
            var e = this.createSVGElement("circle", {
                r: "192",
                fill: "#eee",
                stroke: "#bdbdbd",
                "stroke-width": 2
            });
            var f = this.createSVGElement("circle", {
                r: "15",
                fill: "#757575"
            });
            d.appendChild(e);
            if (a) {
                var g = this.createSVGElement("line", {
                    "class": "minute-hand",
                    x1: 0,
                    y1: 0,
                    x2: 0,
                    y2: -150,
                    stroke: "#bdbdbd",
                    "stroke-width": 2
                });
                var h = this.createSVGElement("line", {
                    "class": "hour-hand",
                    x1: 0,
                    y1: 0,
                    x2: 0,
                    y2: b,
                    stroke: "#8BC34A",
                    "stroke-width": 8
                });
                d.appendChild(g);
                d.appendChild(h);
            } else {
                var g = this.createSVGElement("line", {
                    "class": "minute-hand",
                    x1: 0,
                    y1: 0,
                    x2: 0,
                    y2: -150,
                    stroke: "#8BC34A",
                    "stroke-width": 2
                });
                var h = this.createSVGElement("line", {
                    "class": "hour-hand",
                    x1: 0,
                    y1: 0,
                    x2: 0,
                    y2: b,
                    stroke: "#bdbdbd",
                    "stroke-width": 8
                });
                d.appendChild(h);
                d.appendChild(g);
            }
            d.appendChild(f);
            c.appendChild(d);
            this.$dtpElement.find("#dtp-svg-clock").empty();
            this.$dtpElement.find("#dtp-svg-clock")[0].appendChild(c);
            this.animateHands();
            return d;
        },
        createSVGElement: function(a, b) {
            var c = document.createElementNS("http://www.w3.org/2000/svg", a);
            for (var d in b) c.setAttribute(d, b[d]);
            return c;
        },
        isAfterMinDate: function(a, c, d) {
            var e = true;
            if ("undefined" !== typeof this.minDate && null !== this.minDate) {
                var f = b(this.minDate);
                var g = b(a);
                if (!c && !d) {
                    f.hour(0);
                    f.minute(0);
                    g.hour(0);
                    g.minute(0);
                }
                f.second(0);
                g.second(0);
                f.millisecond(0);
                g.millisecond(0);
                if (!d) {
                    g.minute(0);
                    f.minute(0);
                    e = parseInt(g.format("X")) >= parseInt(f.format("X"));
                } else e = parseInt(g.format("X")) >= parseInt(f.format("X"));
            }
            return e;
        },
        isBeforeMaxDate: function(a, c, d) {
            var e = true;
            if ("undefined" !== typeof this.maxDate && null !== this.maxDate) {
                var f = b(this.maxDate);
                var g = b(a);
                if (!c && !d) {
                    f.hour(0);
                    f.minute(0);
                    g.hour(0);
                    g.minute(0);
                }
                f.second(0);
                g.second(0);
                f.millisecond(0);
                g.millisecond(0);
                if (!d) {
                    g.minute(0);
                    f.minute(0);
                    e = parseInt(g.format("X")) <= parseInt(f.format("X"));
                } else e = parseInt(g.format("X")) <= parseInt(f.format("X"));
            }
            return e;
        },
        rotateElement: function(b, c) {
            a(b).css({
                WebkitTransform: "rotate(" + c + "deg)",
                "-moz-transform": "rotate(" + c + "deg)"
            });
        },
        showDate: function(a) {
            if (a) {
                this.$dtpElement.find(".dtp-actual-day").html(a.locale(this.params.lang).format("dddd"));
                this.$dtpElement.find(".dtp-actual-month").html(a.locale(this.params.lang).format("MMM").toUpperCase());
                this.$dtpElement.find(".dtp-actual-num").html(a.locale(this.params.lang).format("DD"));
                this.$dtpElement.find(".dtp-actual-year").html(a.locale(this.params.lang).format("YYYY"));
            }
        },
        showTime: function(a) {
            if (a) {
                var b = a.minute();
                var c = (this.params.shortTime ? a.format("hh") : a.format("HH")) + ":" + (2 == b.toString().length ? b : "0" + b) + (this.params.shortTime ? " " + a.format("A") : "");
                if (this.params.date) this.$dtpElement.find(".dtp-actual-time").html(c);
                else {
                    if (this.params.shortTime) this.$dtpElement.find(".dtp-actual-day").html(a.format("A"));
                    else this.$dtpElement.find(".dtp-actual-day").html("&nbsp;");
                    this.$dtpElement.find(".dtp-actual-maxtime").html(c);
                }
            }
        },
        selectDate: function(a) {
            if (a) {
                this.currentDate.date(a);
                this.showDate(this.currentDate);
                this.$element.trigger("dateSelected", this.currentDate);
            }
        },
        generateCalendar: function(a) {
            var c = {};
            if (null !== a) {
                var d = b(a).locale(this.params.lang).startOf("month");
                var e = b(a).locale(this.params.lang).endOf("month");
                var f = d.format("d");
                c.week = this.days;
                c.days = [];
                for (var g = d.date(); g <= e.date(); g++) {
                    if (g === d.date()) {
                        var h = c.week.indexOf(f.toString());
                        if (h > 0)
                            for (var i = 0; i < h; i++) c.days.push(0);
                    }
                    c.days.push(b(d).locale(this.params.lang).date(g));
                }
            }
            return c;
        },
        constructHTMLCalendar: function(a, c) {
            var d = "";
            d += '<div class="dtp-picker-month">' + a.locale(this.params.lang).format("MMMM YYYY") + "</div>";
            d += '<table class="table dtp-picker-days"><thead>';
            for (var e = 0; e < c.week.length; e++) d += "<th>" + b(parseInt(c.week[e]), "d").locale(this.params.lang).format("dd").substring(0, 1) + "</th>";
            d += "</thead>";
            d += "<tbody><tr>";
            for (var e = 0; e < c.days.length; e++) {
                if (e % 7 == 0) d += "</tr><tr>";
                d += '<td data-date="' + b(c.days[e]).locale(this.params.lang).format("D") + '">';
                if (0 != c.days[e]) {
                    if (false === this.isBeforeMaxDate(b(c.days[e]), false, false) || false === this.isAfterMinDate(b(c.days[e]), false, false) || this.params.disabledDays.indexOf(c.days[e].isoWeekday()) !== -1) d += '<span class="dtp-select-day">' + b(c.days[e]).locale(this.params.lang).format("DD") + "</span>";
                    else if (b(c.days[e]).locale(this.params.lang).format("DD") === b(this.currentDate).locale(this.params.lang).format("DD")) d += '<a href="javascript:void(0);" class="dtp-select-day selected">' + b(c.days[e]).locale(this.params.lang).format("DD") + "</a>";
                    else d += '<a href="javascript:void(0);" class="dtp-select-day">' + b(c.days[e]).locale(this.params.lang).format("DD") + "</a>";
                    d += "</td>";
                }
            }
            d += "</tr></tbody></table>";
            return d;
        },
        setName: function() {
            var a = "";
            var b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for (var c = 0; c < 5; c++) a += b.charAt(Math.floor(Math.random() * b.length));
            return a;
        },
        isPM: function() {
            return this.$dtpElement.find("a.dtp-meridien-pm").hasClass("selected");
        },
        setElementValue: function() {
            this.$element.trigger("beforeChange", this.currentDate);
            if ("undefined" !== typeof a.material) this.$element.removeClass("empty");
            this.$element.val(b(this.currentDate).locale(this.params.lang).format(this.params.format));
            this.$element.trigger("change", this.currentDate);
        },
        toggleButtons: function(a) {
            if (a && a.isValid()) {
                var c = b(a).locale(this.params.lang).startOf("month");
                var d = b(a).locale(this.params.lang).endOf("month");
                if (!this.isAfterMinDate(c, false, false)) this.$dtpElement.find("a.dtp-select-month-before").addClass("invisible");
                else this.$dtpElement.find("a.dtp-select-month-before").removeClass("invisible");
                if (!this.isBeforeMaxDate(d, false, false)) this.$dtpElement.find("a.dtp-select-month-after").addClass("invisible");
                else this.$dtpElement.find("a.dtp-select-month-after").removeClass("invisible");
                var e = b(a).locale(this.params.lang).startOf("year");
                var f = b(a).locale(this.params.lang).endOf("year");
                if (!this.isAfterMinDate(e, false, false)) this.$dtpElement.find("a.dtp-select-year-before").addClass("invisible");
                else this.$dtpElement.find("a.dtp-select-year-before").removeClass("invisible");
                if (!this.isBeforeMaxDate(f, false, false)) this.$dtpElement.find("a.dtp-select-year-after").addClass("invisible");
                else this.$dtpElement.find("a.dtp-select-year-after").removeClass("invisible");
            }
        },
        toggleTime: function(a, c) {
            var d = false;
            if (c) {
                var e = b(this.currentDate);
                e.hour(this.convertHours(a)).minute(0).second(0);
                d = !(false === this.isAfterMinDate(e, true, false) || false === this.isBeforeMaxDate(e, true, false));
            } else {
                var e = b(this.currentDate);
                e.minute(a).second(0);
                d = !(false === this.isAfterMinDate(e, true, true) || false === this.isBeforeMaxDate(e, true, true));
            }
            return d;
        },
        _attachEvent: function(a, b, c) {
            a.on(b, null, null, c);
            this._attachedEvents.push([a, b, c]);
        },
        _detachEvents: function() {
            for (var a = this._attachedEvents.length - 1; a >= 0; a--) {
                this._attachedEvents[a][0].off(this._attachedEvents[a][1], this._attachedEvents[a][2]);
                this._attachedEvents.splice(a, 1);
            }
        },
        _fireCalendar: function() {
            this.currentView = 0;
            this.$element.blur();
            this.initDates();
            this.show();
            if (this.params.date) {
                this.$dtpElement.find(".dtp-date").removeClass("hidden");
                this.initDate();
            } else if (this.params.time) {
                this.$dtpElement.find(".dtp-time").removeClass("hidden");
                this.initHours();
            }
        },
        _onBackgroundClick: function(a) {
            a.stopPropagation();
            this.hide();
        },
        _onElementClick: function(a) {
            a.stopPropagation();
        },
        _onKeydown: function(a) {
            if (27 === a.which) this.hide();
        },
        _onCloseClick: function() {
            this.hide();
        },
        _onClearClick: function() {
            this.currentDate = null;
            this.$element.trigger("beforeChange", this.currentDate);
            this.hide();
            if ("undefined" !== typeof a.material) this.$element.addClass("empty");
            this.$element.val("");
            this.$element.trigger("change", this.currentDate);
        },
        _onNowClick: function() {
            this.currentDate = b();
            if (true === this.params.date) {
                this.showDate(this.currentDate);
                if (0 === this.currentView) this.initDate();
            }
            if (true === this.params.time) {
                this.showTime(this.currentDate);
                switch (this.currentView) {
                    case 1:
                        this.initHours();
                        break;

                    case 2:
                        this.initMinutes();
                }
                this.animateHands();
            }
        },
        _onOKClick: function() {
            switch (this.currentView) {
                case 0:
                    if (true === this.params.time) this.initHours();
                    else {
                        this.setElementValue();
                        this.hide();
                    }
                    break;

                case 1:
                    this.initMinutes();
                    break;

                case 2:
                    this.setElementValue();
                    this.hide();
            }
        },
        _onCancelClick: function() {
            if (this.params.time) switch (this.currentView) {
                case 0:
                    this.hide();
                    break;

                case 1:
                    if (this.params.date) this.initDate();
                    else this.hide();
                    break;

                case 2:
                    this.initHours();
            } else this.hide();
        },
        _onMonthBeforeClick: function() {
            this.currentDate.subtract(1, "months");
            this.initDate(this.currentDate);
            this._closeYearPicker();
        },
        _onMonthAfterClick: function() {
            this.currentDate.add(1, "months");
            this.initDate(this.currentDate);
            this._closeYearPicker();
        },
        _onYearBeforeClick: function() {
            this.currentDate.subtract(1, "years");
            this.initDate(this.currentDate);
            this._closeYearPicker();
        },
        _onYearAfterClick: function() {
            this.currentDate.add(1, "years");
            this.initDate(this.currentDate);
            this._closeYearPicker();
        },
        refreshYearItems: function() {
            var c = this.currentDate.year(),
                d = this.midYear;
            var e = 1850;
            if ("undefined" !== typeof this.minDate && null !== this.minDate) e = b(this.minDate).year();
            var f = 2200;
            if ("undefined" !== typeof this.maxDate && null !== this.maxDate) f = b(this.maxDate).year();
            this.$dtpElement.find(".dtp-picker-year .invisible").removeClass("invisible");
            this.$dtpElement.find(".year-picker-item").each(function(b, g) {
                var h = d - 3 + b;
                a(g).attr("data-year", h).text(h).data("year", h);
                if (c == h) a(g).addClass("active");
                else a(g).removeClass("active");
                if (h < e || h > f) a(g).addClass("invisible");
            });
            if (e >= d - 3) this.$dtpElement.find(".dtp-select-year-range.before").addClass("invisible");
            if (f <= d + 3) this.$dtpElement.find(".dtp-select-year-range.after").addClass("invisible");
            this.$dtpElement.find(".dtp-select-year-range").data("mid", d);
        },
        _onActualYearClick: function() {
            if (this.params.year)
                if (this.$dtpElement.find(".dtp-picker-year.hidden").length > 0) {
                    this.$dtpElement.find(".dtp-picker-datetime").addClass("hidden");
                    this.$dtpElement.find(".dtp-picker-calendar").addClass("hidden");
                    this.$dtpElement.find(".dtp-picker-year").removeClass("hidden");
                    this.midYear = this.currentDate.year();
                    this.refreshYearItems();
                } else this._closeYearPicker();
        },
        _onYearRangeBeforeClick: function() {
            this.midYear -= 7;
            this.refreshYearItems();
        },
        _onYearRangeAfterClick: function() {
            this.midYear += 7;
            this.refreshYearItems();
        },
        _onYearItemClick: function(b) {
            var c = a(b.currentTarget).data("year");
            var d = this.currentDate.year();
            var e = c - d;
            this.currentDate.add(e, "years");
            this.initDate(this.currentDate);
            this._closeYearPicker();
            this.$element.trigger("yearSelected", this.currentDate);
        },
        _closeYearPicker: function() {
            this.$dtpElement.find(".dtp-picker-calendar").removeClass("hidden");
            this.$dtpElement.find(".dtp-picker-year").addClass("hidden");
        },
        enableYearPicker: function() {
            this.params.year = true;
            this.$dtpElement.find(".dtp-actual-year").reomveClass("disabled");
        },
        disableYearPicker: function() {
            this.params.year = false;
            this.$dtpElement.find(".dtp-actual-year").addClass("disabled");
            this._closeYearPicker();
        },
        _onSelectDate: function(b) {
            this.$dtpElement.find("a.dtp-select-day").removeClass("selected");
            a(b.currentTarget).addClass("selected");
            this.selectDate(a(b.currentTarget).parent().data("date"));
            if (true === this.params.switchOnClick && true === this.params.time) setTimeout(this.initHours.bind(this), 200);
            if (true === this.params.switchOnClick && false === this.params.time) setTimeout(this._onOKClick.bind(this), 200);
        },
        _onSelectHour: function(b) {
            if (!a(b.target).hasClass("disabled")) {
                var c = a(b.target).data("hour");
                var d = a(b.target).parent();
                var e = d.find(".dtp-select-hour");
                for (var f = 0; f < e.length; f++) a(e[f]).attr("fill", "transparent");
                var g = d.find(".dtp-select-hour-text");
                for (var f = 0; f < g.length; f++) a(g[f]).attr("fill", "#000");
                a(d.find("#h-" + c)).attr("fill", "#8BC34A");
                a(d.find("#th-" + c)).attr("fill", "#fff");
                this.currentDate.hour(parseInt(c));
                if (true === this.params.shortTime && this.isPM()) this.currentDate.add(12, "hours");
                this.showTime(this.currentDate);
                this.animateHands();
                if (true === this.params.switchOnClick) setTimeout(this.initMinutes.bind(this), 200);
            }
        },
        _onSelectMinute: function(b) {
            if (!a(b.target).hasClass("disabled")) {
                var c = a(b.target).data("minute");
                var d = a(b.target).parent();
                var e = d.find(".dtp-select-minute");
                for (var f = 0; f < e.length; f++) a(e[f]).attr("fill", "transparent");
                var g = d.find(".dtp-select-minute-text");
                for (var f = 0; f < g.length; f++) a(g[f]).attr("fill", "#000");
                a(d.find("#m-" + c)).attr("fill", "#8BC34A");
                a(d.find("#tm-" + c)).attr("fill", "#fff");
                this.currentDate.minute(parseInt(c));
                this.showTime(this.currentDate);
                this.animateHands();
                if (true === this.params.switchOnClick) setTimeout(function() {
                    this.setElementValue();
                    this.hide();
                }.bind(this), 200);
            }
        },
        _onSelectAM: function(b) {
            a(".dtp-actual-meridien").find("a").removeClass("selected");
            a(b.currentTarget).addClass("selected");
            if (this.currentDate.hour() >= 12)
                if (this.currentDate.subtract(12, "hours")) this.showTime(this.currentDate);
            this.toggleTime(1 === this.currentView);
        },
        _onSelectPM: function(b) {
            a(".dtp-actual-meridien").find("a").removeClass("selected");
            a(b.currentTarget).addClass("selected");
            if (this.currentDate.hour() < 12)
                if (this.currentDate.add(12, "hours")) this.showTime(this.currentDate);
            this.toggleTime(1 === this.currentView);
        },
        _hideCalendar: function() {
            this.$dtpElement.find(".dtp-picker-calendar").addClass("hidden");
        },
        convertHours: function(a) {
            var b = a;
            if (true === this.params.shortTime)
                if (a < 12 && this.isPM()) b += 12;
            return b;
        },
        setDate: function(a) {
            this.params.currentDate = a;
            this.initDates();
        },
        setMinDate: function(a) {
            this.params.minDate = a;
            this.initDates();
        },
        setMaxDate: function(a) {
            this.params.maxDate = a;
            this.initDates();
        },
        destroy: function() {
            this._detachEvents();
            this.$dtpElement.remove();
        },
        show: function() {
            this.$dtpElement.removeClass("hidden");
            this._attachEvent(a(window), "keydown", this._onKeydown.bind(this));
            this._centerBox();
            this.$element.trigger("open");
            if (true === this.params.monthPicker) this._hideCalendar();
        },
        hide: function() {
            a(window).off("keydown", null, null, this._onKeydown.bind(this));
            this.$dtpElement.addClass("hidden");
            this.$element.trigger("close");
        },
        _centerBox: function() {
            var a = (this.$dtpElement.height() - this.$dtpElement.find(".dtp-content").height()) / 2;
            this.$dtpElement.find(".dtp-content").css("marginLeft", -(this.$dtpElement.find(".dtp-content").width() / 2) + "px");
            this.$dtpElement.find(".dtp-content").css("top", a + "px");
        },
        enableDays: function() {
            var b = this.params.enableDays;
            if (b) a(".dtp-picker-days tbody tr td").each(function() {
                if (!(a.inArray(a(this).index(), b) >= 0)) a(this).find("a").css({
                    background: "#e3e3e3",
                    cursor: "no-drop",
                    opacity: "0.5"
                }).off("click");
            });
        }
    };
}(jQuery, moment);