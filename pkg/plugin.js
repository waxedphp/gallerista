
;(function ( $, window, document, undefined ) {

    var pluginName = 'gallerista',
        _search = '.waxed-gallerista',
        _api = [],
        defaults = {
            propertyName: "value"
        },
        inited = false
        ;

    function Instance(pluggable,element,dd){
      var that = this;
      this.pluggable = pluggable;
      this.element = element;
      this.o = element;
      this.t = 'gallerista';
      this.dd = dd;
      this.name = '';
      this.cfg = {
      };
      this.index = 0;

      this.invalidate = function(RECORD){

      },

      this.setRecord = function(RECORD){
        if (typeof that.dd.name == 'undefined') return;
        var rec = that.pluggable.getvar(that.dd.name, RECORD);
        if (typeof rec != 'object') { return; };
        //$(this.element).JSONView(rec,{});
        this.build(rec);
      },

      this.build = function(rec) {
        this.index = 0;
        $(this.element).empty();
        let a = $('<div></div>').appendTo(this.element);
        $(a).addClass('gallerista-box');
        let b = $('<img>').appendTo(a);
        $(b).addClass('responsive').addClass('small-round');
        let bb = $('<img>').appendTo(a).hide();
        $(bb).addClass('responsive').addClass('small-round');

        if (typeof rec.images == 'object') {
          $(b).attr("src",rec.images[0].image);
          $(bb).attr("src",rec.images[0].image);
        }
        this.mainImageBox = a;
        this.mainImage = b;
        this.mainImageCopy = bb;
        $(this.mainImage).swipe( {
          //Generic swipe handler for all directions
          swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            //console.log("You swiped " + direction );
            switch(direction) {
              case 'left': that.swipedLeft();break;
              case 'right': that.swipedRight();break;
            }
            //console.log("INDEX " + that.index );
          }
        });

        let c = $('<div></div>').appendTo(this.element);
        $(c).addClass('gallerista-strip');
        let d = $('<div></div>').appendTo(c);
        $(d).addClass('gallerista-strip-inside');
        var pp={'left':0};var w=0;
        if (typeof rec.images == 'object') {
          for (var i=0; i<rec.images.length;i++) {
            var p = $('<img>').appendTo(d);
            $(p).addClass('thumbnail').addClass('small-round');
            $(p).attr("src",rec.images[i].thumb);
            $(p).data('idx', i);
            $(p).data('img', rec.images[i].image);
            $(p).on('click', function(a) {
              that.clicked(a, this);
            });
          }
        }
        this.stripInside = d;

        $(this.stripInside).swipe( {
          //Generic swipe handler for all directions
          swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            //console.log("You swiped " + direction );
            switch(direction) {
              case 'left': that.stripSwipedLeft();break;
              case 'right': that.stripSwipedRight();break;
            }
          }
        });


        var navNext = $('<a class="nav-next "></a>');
        var navPrev = $('<a class="nav-prev "></a>');
        navNext.on('click', that.swipedLeft);
        navPrev.on('click', that.swipedRight);
        $(that.mainImageBox).prepend(navNext);
        $(that.mainImageBox).prepend(navPrev);
        $(that.mainImageBox).addClass('jquery-horizontal-scroll-wrap');

      },

      this.getStripWidth = function() {
        var w=0;
        var a = $(this.stripInside).find('img.thumbnail');
        a = a[a.length-1];
        var p=$(a).position();
        w=p.left+$(a).width();
        return w;
      },

      this.centerThumbInStrip = function(thumb) {
        var s = $(thumb).parent();
        var f = $(s).parent();
        var tp=$(thumb).position();
        var tw=$(thumb).width();
        var fw=$(f).width();
        var sw=this.getStripWidth();
        if(sw<fw)return;
        var x =(fw/2)-(tw/2)-tp.left;
        x=Math.min(x,0);
        x=Math.max(x,fw-sw);
        $(s).animate({
          left: x
        }, 200, function() {
          // Animation complete.
        });
      },

      this.moveStrip = function(xx) {
        var s = $(this.stripInside);
        var f = $(s).parent();
        var fw=$(f).width();
        var sw=this.getStripWidth();
        if(sw<fw)return;
        var p=s.position();
        var x =p.left+xx;
        x=Math.min(x,0);
        x=Math.max(x,fw-sw);
        $(s).animate({
          left: x
        }, 200, function() {
          // Animation complete.
        });
      },

      this.getThumbByIndex = function() {
        var a = $(this.stripInside).find('img.thumbnail');
        if (that.index<0) that.index=a.length-1;
        if (that.index>=a.length) that.index=0;
        return a[that.index];
      },

      this.clicked = function(a,b) {
        that.index = $(b).data('idx');
        $(this.mainImage).attr("src",$(b).data('img'));
        this.centerThumbInStrip(b);
      },
      this.swipedLeft = function() {
        that.index = that.index+1;
        var thumb = that.getThumbByIndex();
        var w=$(that.mainImage).width();
        var h=$(that.mainImageBox).height();
        $(that.mainImageBox).css('height', h);
        $(that.mainImageCopy).show();
        $(that.mainImage).hide();
        that.clicked(that.index, thumb);
        $(that.mainImageCopy).animate({
          left: "-="+w
        }, 400, function() {
          // Animation complete.
          $(that.mainImageCopy).hide().css('left', 0);
          $(that.mainImage).show();
          $(that.mainImageBox).css('height', 'auto');
          $(that.mainImageCopy).attr('src', $(that.mainImage).attr('src'));
          //$(that.mainImage).css({opacity:0}).animate({opacity:100},5000);
        });
      },
      this.swipedRight = function() {
        that.index = that.index-1;
        var thumb = that.getThumbByIndex();
        var w=$(that.mainImage).width();
        var h=$(that.mainImageBox).height();
        $(that.mainImageBox).css('height', h);
        $(that.mainImageCopy).show();
        $(that.mainImage).hide();
        that.clicked(that.index, thumb);
        $(that.mainImageCopy).animate({
          left: "+="+w
        }, 400, function() {
          // Animation complete.
          $(that.mainImageCopy).hide().css('left', 0);
          $(that.mainImage).show();
          $(that.mainImageBox).css('height', 'auto');
          //$(that.mainImage).css({opacity:0}).animate({opacity:100},5000);
          $(that.mainImageCopy).attr('src', $(that.mainImage).attr('src'));
        });

      },

      this.stripSwipedLeft = function() {
        that.moveStrip(-($(that.mainImageBox).width()*0.8));
      },
      this.stripSwipedRight = function() {
        that.moveStrip(+($(that.mainImageBox).width()*0.8));
      },

      this.free = function() {

      },

      this.init=function() {
        $(that.element).text('gallerista');



        inited = true;
      },
      this._init_();
    }

    $.waxxx(pluginName, _search, Instance, _api);


})( jQuery, window, document );
/*--*/
//# sourceURL: /js/jam/boilerplate/plugin.js
