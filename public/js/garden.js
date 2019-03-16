function f_brokenheart(e) {
    if (e >= 3.8 && e <= 3.9) {
        return new Array(-2.2, -2.4, 1.8, 2, 2.2)
    }
    var t = -5;
    var n = 5;
    var r = new Array;
    var i = false;
    var s;
    for (s = t; s < n; s += .001) {
        var o = 17 * Math.pow(s, 2) - 16 * Math.abs(s) * e + 17 * Math.pow(e, 2) + 350 / Math.abs(5 * s + Math.sin(5 * e)) < 225;
        if (i ^ o) {
            r.push(s)
        }
        i = o
    }
    return r
}

function getHeartPoint(e) {
    var t = e / Math.PI;
    var n = 250 * Math.cos(t);
    var r = 250 * Math.sin(t);
    return new Array(offsetX + n, offsetY + r)
}

function startHeartAnimation() {
    var e = -6;
    var t = 6;
    var n = 100;
    var r = e;
    var i = setInterval(function() {
        var e = f_brokenheart(r);
        for (var n = 0; n < e.length; n++) {
            garden.createRandomBloom(e[n] * 70 + offsetX, -r * 70 + offsetY + 50)
        }
        if (r > t) {
            clearInterval(i);
            showMessages()
        } else {
            r += .2
        }
    }, n)
}

function timeElapse(e) {
    var t = Date();
    var n = (Date.parse(t) - Date.parse(e)) / 1e3;
    var r = Math.floor(n / (3600 * 24));
    n = n % (3600 * 24);
    var i = Math.floor(n / 3600);
    if (i < 10) {
        i = "0" + i
    }
    n = n % 3600;
    var s = Math.floor(n / 60);
    if (s < 10) {
        s = "0" + s
    }
    n = n % 60;
    if (n < 10) {
        n = "0" + n
    }
    var o = '    <span class="digit">' + r + '</span> days <span class="digit">' + i + '</span> hrs <span class="digit"><br/>  ' + s + '</span> mins <span class="digit">' + n + "</span> secs";
    $("#elapseClock").html(o)
}

function showMessages() {
    adjustWordsPosition();
    $("#messages").fadeIn(5e3, function() {
        showLoveU()
    })
}

function adjustWordsPosition() {
    $("#words").css("position", "absolute");
    $("#words").css("top", $("#garden").position().top + 130);
    $("#words").css("left", $("#garden").position().left + 83)
}

function adjustCodePosition() {
    $("#code").css("margin-top", ($("#garden").height() - $("#code").height()) / 2)
}

function showLoveU() {
    $("#loveu").fadeIn(3e3)
}
var $window = $(window),
    gardenCtx, gardenCanvas, $garden, garden;
var clientWidth = $(window).width();
var clientHeight = $(window).height();
$(function() {
    $loveHeart = $("#loveHeart");
    var e = $loveHeart.width() / 2;
    var t = $loveHeart.height() / 2;
    $garden = $("#garden");
    gardenCanvas = $garden[0];
    gardenCanvas.width = $("#loveHeart").width();
    gardenCanvas.height = $("#loveHeart").height();
    gardenCtx = gardenCanvas.getContext("2d");
    gardenCtx.globalCompositeOperation = "lighter";
    garden = new Garden(gardenCtx, gardenCanvas);
    $("#content").css("width", $loveHeart.width() + $("#code").width());
    $("#content").css("height", Math.max($loveHeart.height(), $("#code").height()));
    $("#content").css("margin-top", Math.max(($window.height() - $("#content").height()) / 2, 10));
    $("#content").css("margin-left", Math.max(($window.width() - $("#content").width()) / 2, 10));
    setInterval(function() {
        garden.render()
    }, Garden.options.growSpeed)
});
$(window).resize(function() {
    var e = $(window).width();
    var t = $(window).height();
    if (e != clientWidth && t != clientHeight) {
        location.replace(location)
    }
});
(function(e) {
    e.fn.typewriter = function() {
        this.each(function() {
            var t = e(this),
                n = t.html(),
                r = 0;
            t.html("");
            var i = setInterval(function() {
                var e = n.substr(r, 1);
                if (e == "<") {
                    r = n.indexOf(">", r) + 1
                } else {
                    r++
                }
                t.html(n.substring(0, r) + (r & 1 ? "_" : ""));
                if (r >= n.length) {
                    clearInterval(i)
                }
            }, 17)
        });
        return this
    }
})(jQuery);

function Vector(e, t) {
    this.x = e;
    this.y = t
}

function Petal(e, t, n, r, i, s) {
    this.stretchA = e;
    this.stretchB = t;
    this.startAngle = n;
    this.angle = r;
    this.bloom = s;
    this.growFactor = i;
    this.r = 1;
    this.isfinished = false
}

function Bloom(e, t, n, r, i) {
    this.p = e;
    this.r = t;
    this.c = n;
    this.pc = r;
    this.petals = [];
    this.garden = i;
    this.init();
    this.garden.addBloom(this)
}

function Garden(e, t) {
    this.blooms = [];
    this.element = t;
    this.ctx = e
}
Vector.prototype = {
    rotate: function(e) {
        var t = this.x;
        var n = this.y;
        this.x = Math.cos(e) * t - Math.sin(e) * n;
        this.y = Math.sin(e) * t + Math.cos(e) * n;
        return this
    },
    mult: function(e) {
        this.x *= e;
        this.y *= e;
        return this
    },
    clone: function() {
        return new Vector(this.x, this.y)
    },
    length: function() {
        return Math.sqrt(this.x * this.x + this.y * this.y)
    },
    subtract: function(e) {
        this.x -= e.x;
        this.y -= e.y;
        return this
    },
    set: function(e, t) {
        this.x = e;
        this.y = t;
        return this
    }
};
Petal.prototype = {
    draw: function() {
        var e = this.bloom.garden.ctx;
        var t, n, r, i;
        t = (new Vector(0, this.r)).rotate(Garden.degrad(this.startAngle));
        n = t.clone().rotate(Garden.degrad(this.angle));
        r = t.clone().mult(this.stretchA);
        i = n.clone().mult(this.stretchB);
        e.strokeStyle = this.bloom.c;
        e.beginPath();
        e.moveTo(t.x, t.y);
        e.bezierCurveTo(r.x, r.y, i.x, i.y, n.x, n.y);
        e.stroke()
    },
    render: function() {
        if (this.r <= this.bloom.r) {
            this.r += this.growFactor;
            this.draw()
        } else {
            this.isfinished = true
        }
    }
};
Bloom.prototype = {
    draw: function() {
        var e, t = true;
        this.garden.ctx.save();
        this.garden.ctx.translate(this.p.x, this.p.y);
        for (var n = 0; n < this.petals.length; n++) {
            e = this.petals[n];
            e.render();
            t *= e.isfinished
        }
        this.garden.ctx.restore();
        if (t == true) {
            this.garden.removeBloom(this)
        }
    },
    init: function() {
        var e = 360 / this.pc;
        var t = Garden.randomInt(0, 90);
        for (var n = 0; n < this.pc; n++) {
            this.petals.push(new Petal(Garden.random(Garden.options.petalStretch.min, Garden.options.petalStretch.max), Garden.random(Garden.options.petalStretch.min, Garden.options.petalStretch.max), t + n * e, e, Garden.random(Garden.options.growFactor.min, Garden.options.growFactor.max), this))
        }
    }
};
Garden.prototype = {
    render: function() {
        for (var e = 0; e < this.blooms.length; e++) {
            this.blooms[e].draw()
        }
    },
    addBloom: function(e) {
        this.blooms.push(e)
    },
    removeBloom: function(e) {
        var t;
        for (var n = 0; n < this.blooms.length; n++) {
            t = this.blooms[n];
            if (t === e) {
                this.blooms.splice(n, 1);
                return this
            }
        }
    },
    createRandomBloom: function(e, t) {
        this.createBloom(e, t, Garden.randomInt(Garden.options.bloomRadius.min, Garden.options.bloomRadius.max), Garden.randomrgba(Garden.options.color.rmin, Garden.options.color.rmax, Garden.options.color.gmin, Garden.options.color.gmax, Garden.options.color.bmin, Garden.options.color.bmax, Garden.options.color.opacity), Garden.randomInt(Garden.options.petalCount.min, Garden.options.petalCount.max))
    },
    createBloom: function(e, t, n, r, i) {
        new Bloom(new Vector(e, t), n, r, i, this)
    },
    clear: function() {
        this.blooms = [];
        this.ctx.clearRect(0, 0, this.element.width, this.element.height)
    }
};
Garden.options = {
    petalCount: {
        min: 8,
        max: 15
    },
    petalStretch: {
        min: .1,
        max: 3
    },
    growFactor: {
        min: .1,
        max: 1
    },
    bloomRadius: {
        min: 8,
        max: 10
    },
    density: 10,
    growSpeed: 1e3 / 60,
    color: {
        rmin: 128,
        rmax: 255,
        gmin: 0,
        gmax: 128,
        bmin: 0,
        bmax: 128,
        opacity: .1
    },
    tanAngle: 60
};
Garden.random = function(e, t) {
    return Math.random() * (t - e) + e
};
Garden.randomInt = function(e, t) {
    return Math.floor(Math.random() * (t - e + 1)) + e
};
Garden.circle = 2 * Math.PI;
Garden.degrad = function(e) {
    return Garden.circle / 360 * e
};
Garden.raddeg = function(e) {
    return e / Garden.circle * 360
};
Garden.rgba = function(e, t, n, r) {
    return "rgba(" + e + "," + t + "," + n + "," + r + ")"
};
Garden.randomrgba = function(e, t, n, r, i, s, o) {
    var u = Math.round(Garden.random(e, t));
    var a = Math.round(Garden.random(n, r));
    var f = Math.round(Garden.random(i, s));
    var l = 5;
    if (Math.abs(u - a) <= l && Math.abs(a - f) <= l && Math.abs(f - u) <= l) {
        return Garden.rgba(e, t, n, r, i, s, o)
    } else {
        return Garden.rgba(u, a, f, o)
    }
};