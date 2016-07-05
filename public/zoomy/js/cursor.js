    $(document).ready(function() {
      var scaleNum = 2;
      $(".magnify").jfMagnify();
      $('.plus').click(function(){
        scaleNum += .5;
        if (scaleNum >=3) {
          scaleNum = 3;
        };
        $(".magnify").data("jfMagnify").scaleMe(scaleNum);
      });
      $('.minus').click(function(){
        scaleNum -= .5;
        if (scaleNum <=1) {
          scaleNum = 1;
        };
        $(".magnify").data("jfMagnify").scaleMe(scaleNum);
      });
      $('.magnify_glass').animate({
        'top':'60%',
        'left':'60%'
        },{
        duration: 3000, 
        progress: function(){
          $(".magnify").data("jfMagnify").update();
        }, 
        easing: "easeOutElastic"
      });
    });