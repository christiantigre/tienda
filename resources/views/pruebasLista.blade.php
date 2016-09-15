<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <style type="text/css">
        body {
  margin: 0;
  font-family: 'Open Sans';
  font-size: 13px;
}
a {
  text-decoration: none;
  color: #777;
}
.categories {
  float: left;
  position: relative;
}
.categories > a {
  padding: 10px;
  border-radius: 5px;
  float: left;
  color: #fff;
  background: #d9534f;
  position: relative;
}
.kp-menu-container {
  position: absolute;
  top: 38px;
  left: 0;
  background: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  float: left;
  height: 0;
  overflow: hidden;
}
.kp-menu-container.on {
  height: 400px;
  overflow: visible;
}
.kp-menu-container h3 {
  margin: 20px 0 0 20px;
  padding: 0;
  color: #d9534f;
}
.kp-menu-container ul.main {
  margin: 20px;
  padding: 0;
  float: left;
  width: 150px;
}
.kp-menu-container ul.main > li {
  list-style: none;
  line-height: 28px;
  position: relative;
}
.kp-menu-container ul.main > li a.active {
  color: #5bc0de;
}
.kp-menu-container ul.main > li a:hover {
  color: #5bc0de;
}
.kp-submenu-container {
  float: left;
  position: absolute;
  top: 0;
  left: 190px;
  background: #fdfdfd;
  height: 400px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  width: 0;
  overflow: hidden;
  transition: all .4s ease;
}
.kp-submenu-container.on {
  width: 450px;
}
.kp-submenu-container .submenu-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 500px;
  display: none;
}
.kp-submenu-container ul {
  padding: 0;
}
.kp-submenu-container ul li {
  list-style: none;
  line-height: 26px;
  float: left;
  width: 140px;
  margin-left: 20px;
}
    </style>

</head>
<body>

    <div class="categories">
        <a href="#">Categories</a>

        <div class="kp-menu-container">

            <!-- // left menu.... -->
            <ul class="main">
                @foreach($categories as $category)
                    <li><a href="">{{$category->name}}</a></li>
                @endforeach
            </ul>

            <!-- // right menu....... -->
            <div class="kp-submenu-container">
                @foreach($categories as $category)
                    <div class="submenu-content">
                        <h3>{{$category->name}}</h3>
                        <ul>
                            @foreach($category->subcategories->take(20) as $subcategory)
                                <li><a href="">{{$subcategory->name}}</a></li>
                            @endforeach
                            <li><a href="">more subcategories..</a></li>
                        </ul>
                    </div>

                @endforeach

                <!-- thanks for watching........... sssl    subscribe, share, like, comment................ -->

            </div>
        </div>

    </div>

    <br>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        var kpMenuContainer = $('.kp-menu-container'),
        kpSubMenuContainer = kpMenuContainer.find('.kp-submenu-container'),
        kpSubMenuContent = kpMenuContainer.find('.submenu-content');
        $('.categories').hover(function(){
            kpMenuContainer.addClass('on');
        },function(){
            $('.main li a').removeClass('active');
            kpSubMenuContainer.removeClass('on');
            kpMenuContainer.removeClass('on');
        });
        $('.main li').hover(function() {
            var index = $(this).index();
            kpSubMenuContent.hide();
            kpSubMenuContent.eq(index).show();
            kpSubMenuContainer.addClass('on');
            $('.main li a').removeClass('active');
            $(this).find('a').addClass('active');
        });
    </script>
</body>
</html>

categorias funcional
<h2>Categorías</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        @foreach ($sections as $section)
            <div class="panel-heading">                                        
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $section->name }}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{ $section->name }}
                    </a>
                </h4>
            </div>
            <div id="{{ $section->name }}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                       @foreach ($sections as $section)

                            @foreach($section->subsecciones->take(7) as $subsecciones)
                                <li><a href="">{{$subsecciones->category->name}}</a></li>
                            @endforeach
                            <li><a href="">more subcategories..</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach

    </div>
</div><!--/category-products-->
