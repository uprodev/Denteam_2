jQuery(document).ready(function($) { 

	function filter_vacancies() {
		var url = $("#filter_vacancies").attr("action");
		var query = $("#filter_vacancies").attr("action");
		newurl = query;
		query = $("#filter_vacancies").serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		var filter = $("#filter_vacancies");
		$.ajax({
			url: "/wp-admin/admin-ajax.php",
    		data: filter.serialize(),
    		type: filter.attr("method"),
    		beforeSend: function (xhr) {
    			$("#response_vacancies").empty();
    			$(".btn_more_vacancies_wrap").remove();
				$("#filter_vacancies .btn-dropdown").html($("#filter_vacancies").find("input:checked").data("label"));
    		},
    		success: function (data) {
    			$("#response_vacancies").html(data);
    		},
    	});
		return false;
	}

	$('#filter_vacancies').submit(function(e){
		e.preventDefault();
		filter_vacancies();
	});

	$(document).on('change', '#filter_vacancies .dropdown-scroller input', function (e){
		filter_vacancies();
	});


	function filter_stories() {
		var url = $("#filter_stories").attr("action");
		var query = $("#filter_stories").attr("action");
		newurl = query;
		query = $("#filter_stories").serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		var filter = $("#filter_stories");
		$.ajax({
			url: "/wp-admin/admin-ajax.php",
    		data: filter.serialize(),
    		type: filter.attr("method"),
    		beforeSend: function (xhr) {
    			$("#response_stories").empty();
    			$(".btn_more_stories_wrap").remove();
				$("#filter_stories .btn-dropdown").html($("#filter_stories").find("input:checked").data("label"));
    		},
    		success: function (data) {
    			$("#response_stories").html(data);
    		},
    	});
		return false;
	}

	$('#filter_stories').submit(function(e){
		e.preventDefault();
		filter_stories();
	});

	$(document).on('change', '#filter_stories .dropdown-scroller input', function (e){
		filter_stories();
	});


	function filter_news() {
		var url = $("#filter_news").attr("action");
		var query = $("#filter_news").attr("action");
		newurl = query;
		query = $("#filter_news").serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		var filter = $("#filter_news");
		$.ajax({
			url: "/wp-admin/admin-ajax.php",
    		data: filter.serialize(),
    		type: filter.attr("method"),
    		beforeSend: function (xhr) {
    			$("#response_news").empty();
    			$(".btn_more_news_wrap").remove();
				$("#filter_news .btn-dropdown").html($("#filter_news").find("input:checked").data("label"));
    		},
    		success: function (data) {
    			$("#response_news").html(data);
    		},
    	});
		return false;
	}

	$('#filter_news').submit(function(e){
		e.preventDefault();
		filter_news();
	});

	$(document).on('change', '#filter_news .dropdown-scroller input', function (e){
		filter_news();
	});



	$(document).on('click', '.btn_more_vacancies', function(e){
    e.preventDefault();
    let _this = $(this);

    let data = {
      'action': 'more_vacancies',
      'query': _this.attr('data-param-posts'),
      'page': this_page,
      'tpl': _this.attr('data-tpl')
    }

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      data: data,
      type: 'POST',
      success:function(data){
        if (data) {
          $('#response_vacancies').append(data); 
          this_page++;                      
          if (this_page == _this.attr('data-max-pages')) {
            $('.btn_more_vacancies_wrap').remove();               
          }
        } else {                              
          $('.btn_more_vacancies_wrap').remove();                   
        }
      }
    });
  });

	$(document).on('click', '.btn_more_stories', function(e){
    e.preventDefault();
    let _this = $(this);

    let data = {
      'action': 'more_stories',
      'query': _this.attr('data-param-posts'),
      'page': this_page,
      'tpl': _this.attr('data-tpl')
    }

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      data: data,
      type: 'POST',
      success:function(data){
        if (data) {
          $('#response_stories').append(data); 
          this_page++;                      
          if (this_page == _this.attr('data-max-pages')) {
            $('.btn_more_stories_wrap').remove();               
          }
        } else {                              
          $('.btn_more_stories_wrap').remove();                   
        }
      }
    });
  });

	$(document).on('click', '.btn_more_news', function(e){
    e.preventDefault();
    let _this = $(this);

    let data = {
      'action': 'more_news',
      'query': _this.attr('data-param-posts'),
      'page': this_page,
      'tpl': _this.attr('data-tpl')
    }

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      data: data,
      type: 'POST',
      success:function(data){
        if (data) {
          $('#response_news').append(data); 
          this_page++;                      
          if (this_page == _this.attr('data-max-pages')) {
            $('.btn_more_news_wrap').remove();               
          }
        } else {                              
          $('.btn_more_news_wrap').remove();                   
        }
      }
    });
  });

});