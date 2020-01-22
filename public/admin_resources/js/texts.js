$( document ).ready(function() {
	if($('.btn-save').length > 0){
		$(".btn-save").click(function(){
			setTraslateData($(this));
		  	if(translate.data.old_value !== translate.data.new_value){
		  		translate.update();
		  	}
		});
	}

	if($('.btn-remove').length > 0){
		$('.btn-remove').click(function(){
			setTraslateData($(this));
		  	translate.remove();
		});
	}
});

function setTraslateData(self){
	translate.parent = self.parent().parent()[0];
	translate.textarea = self.parent().parent().find('textarea[name="text_value"]')[0];
	translate.data.lang = self.data('lang');
	translate.data.group = self.data('group');
	translate.data.key = self.data('key');
	translate.data.old_value = self.data('value');
	translate.data.new_value = self.parent().parent().find('textarea[name="text_value"]').val();
}

var translate = {
	textarea: '',
	parent: '',
	data: {
		lang: '',
		group: '',
		key: '',
		old_value: '',
		new_value: '',
	},
	update: function(){
		//update this record;
		self = this;
		$.ajax({
			type: 'POST',
			beforeSend: function(request) {
				request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
			},
			url: '/admin/texts',
			data: this.data,
			success: function(response) {
				if(response.code == 200){
					self.textarea.classList.add('btn-success');
					setTimeout(function(){
					  	self.textarea.classList.remove('btn-success');
					}, 1000);
				}
				else{
					console.log(response);
				}
			}
		});
	},
	remove: function(){
		self = this;
		$.ajax({
			type: 'DELETE',
			beforeSend: function(request) {
				request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
			},
			url: '/admin/texts/1',
			data: this.data,
			success: function(response) {
				if(response.code == 200){
					var id = self.parent.getAttribute('data-id');
					var rows = document.querySelectorAll('tr[data-id="'+ id +'"]');
					if(rows.length > 0){
						for (var i = 0; i < rows.length; i++) {
							rows[i].style.display = "none";
						}
					}
				}
				else{
					console.log(response);
				}
			}
		});
	}
}

$( "form" ).on( "submit", function( event ) {
  event.preventDefault();
  var self = this;
  var data = $( this ).serialize();
  var keyInput = document.querySelector('.new-text input[name="key"]');
  var valueInput = document.querySelector('.new-text input[name="value"]');
  $.ajax({
			type: 'POST',
			beforeSend: function(request) {
				request.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
			},
			url: '/admin/texts',
			data: data,
			success: function(response) {
				if(response.code != 404){
					// console.log(keyInput);
					keyInput.value = '';
					valueInput.value = '';
					// console.log(valueInput);
					// self.input.classList.add('btn-success');
					// setTimeout(function(){
					//   	self.textarea.classList.remove('btn-success');
					// }, 1000);
				}
				else{
					console.log(response);
				}
			}
		});

});

// function AddText(e){
// 	e.preventDefault();
// 	console.log($( this ).serialize());
// 	// console.log(data.serialize());
// }

