$(document).ready(function() {


	//Validacion del formulario
	$('#soporteForm').bootstrapValidator({
		message: "Esto no es válido",
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			nombre: {
				validators: {
					notEmpty: {
						message: "Este es un campo obligatorio"
					}
				}
			},
			email: {
				validators: {
					notEmpty: {
						message: "Este es un campo obligatorio"
					},
					emailAddress: {
						message: "Eso no parece un correo electrónico"
					}
				}
			}, 
			mensaje: {
				validators: {
					notEmpty: {
						message: "El mensaje no puede ir vacio (¿Quien manda un mensaje vacio? "
					}
				}
			}
		}
	}).on('success.form.bv', function(e) {
		e.preventDefault();

		var $form = $(e.target);

		var bv = $form.data('bootstrapValidator');

		$.post($form.attr('action'), $form.serialize(), function(result) {
			$('#correcto').fadeIn();
			console.log(result);
		}, 'json' );

	});
});

smoothScroll.init({
    speed: 700, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutQuad', // Easing pattern to use
    updateURL: false, // Boolean. Whether or not to update the URL with the anchor hash on scroll
    offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
    callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
    callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
});