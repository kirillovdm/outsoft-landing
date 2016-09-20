$(document).ready(function() {
	
	$('.tech, .section_2__icon-block, .section_4__icon-container, .section_5__icon-container').trigger('hover');

	$(document).on('keyup', '.section_1__block-2__form__input', function() {
		if ( $(this).val().length > 0 ) {
			$(this).next('label').hide();
		} else {
			$(this).next('label').show();
		}
	});

	$(document).on('click', 'textarea', function() {
		$(this).next('label').hide();
	});
	$('textarea').focusout(function() {
		if ( $(this).val().length == 0 ) {
			$(this).next('label').show();
		}
	});

	$(document).on('click', '.close', function() {
		$('.modal').hide();
		$('form').trigger( 'reset' );
	});

	$('.icons_box .tech').hover(
		function() {
			var title = $(this).attr('data-title');
			$('.tech_title').html(title);
			$('.tech_title_box').fadeIn();
		},
		function() {
			$('.tech_title_box').hide();
		}
		);

	$("form").submit(function(e) {
		e.preventDefault();
		var name = $(this).find('input[name="name"]').val();
		var phone = $(this).find('input[name="phone"]').val();
		var email = $(this).find('input[name="email"]').val();
		var about = $(this).find('textarea[name="about"]').val();

		if ( name != '' && phone != '' && email != '' ) {
			$('.section_1__block-2__form__button').css("pointer-events", "none");
			$('.section_1__block-2__form__button').html('sending...');

			console.log($(this));
	        var contentURL = 'Name: ' + name + '\nPhone: ' + phone + '\nEmail: ' + email + '\nRequest: ' + about + '\n' + 'URL: ' + location.href + '\n' + 'IP: ';
	        var formData = {
	            userName: name,
	            userPhone: phone,
	            userEmail: email,
	            content: contentURL,

	            fullUrl: location.href,
                campaign: $("#campaign").val(),
                keyword: $("#keyword").val(),
                        
	            cleanContent: about,
	            origin: $(this).find('input[name="origin"]').val(),
	            titleMail: $('.section_1__block-1__caption').text(),
	            subject: 'Sent from http://lp.outsoft.com/outsoft',
	            the_req: $(this).find('input[name="the_req"]').val(),
	            the_source: $(this).find('input[name="the_source"]').val(),
	            all_hidden_fields: $(this).serialize(),
	        };

	    	// console.log(formData);
	    	// console.log(formData.all_hidden_fields);
	        jQuery.ajax({
	            url: "http://lp.outsoft.com/outsoft/contact-form.php",
	            data: formData,
	            type: "POST",
	            success: function ( r ) {
	                location.href = 'http://lp.outsoft.com/outsoft/success.php';
	                console.log( r );
	                dataLayer.push({'event': 'Send_form'}); //просили добавить,но я думаю тут должен быть идентификатор формы,надо уточнить
	            },
	            error: function (xhr, status, error) {
	                alert('cannot connect to server, please reload page and try again');
	            }

	        });

	        $.post('https://hooks.slack.com/services/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', {
		        payload: JSON.stringify({
		        	username: "Потенциальный клиент",
				   	icon_emoji: ":four_leaf_clover:",
				   	text: 'Привет, отправил новый запрос с лендинга.\nВот мои данные:\nИмя: '+ name +'\nКонтакты: '+ phone +'\nE-mail: '+ email +'\nПро мой проект: '+ about + '\nURL: ' + location.href + '\nСкорее свяжитесь со мной! :)',
		        })
			});
		}
        return false;
	});
			
	$("img, a").on("dragstart", function(event) { event.preventDefault(); });

	$(".to_top").leanModal();

	// $('.tech_main').click(function() {
		
	// });


});
