<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<base href="{{asset('/layout/backend')}}/">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
<script src="js/lumino.glyphs.js"></script>
<script src="js/mychart.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('/')}}">Huân Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a  class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><img width="30px" height="30px" src="{{asset('image/'.Auth::user()->avatar)}}"></svg>
					    {{ Auth::user()->name_user }}
						 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{route('Logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="{{asset('admin/statistic')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Danh mục</a></li>
            <li><a href="{{asset('admin/productorder')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Order</a></li>
            <li><a href="{{asset('admin/users')}}"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>User</a></li>
            <li><a href="{{asset('admin/comments')}}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>Comment</a></li>

            <li><a href="{{asset('admin/childcomment')}}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>Comment Child</a></li>
            <li><a href="{{asset('admin/suggests')}}"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>Suggest</a></li>
            <li role="presentation" class="divider"></li>
		</ul>

	</div><!--/.sidebar-->


	<!-- Main -->
	@yield('main')
	<!-- Main -->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
		        $(this).find('em:first').toggleClass("glyphicon-minus");
		    });
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>
<script>
  $('#calendar').datepicker({
  });

  !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){
          $(this).find('em:first').toggleClass("glyphicon-minus");
      });
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
  }(window.jQuery);

  $(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
  })
  $(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
  })
  // Chang Image add product
  function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#avatar').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $(document).ready(function() {
      $('#avatar').click(function(){
          $('#img').click();
      });
  });
 </script>
</html>
