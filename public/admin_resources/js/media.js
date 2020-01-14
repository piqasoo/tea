class handleSingleImg {

	constructor(name, file) {
		this.name = name;
		this.file = file;
		this.changable = false;
	}

	change() {
		if(this.changable){
			let img = document.getElementById("#"+ this.name +"-prev");
			if(img){
				img.remove();
			}
		}
		if($("#"+ this.name +"-prev").length > 0){
			// console.log("yes");
		}else {
			let parent = document.createElement("div"); 
			parent.setAttribute("class", "input-group img-prev col-md-4 img-preview");
			parent.setAttribute("id", "#"+ this.name +"-prev");

			let root = document.querySelector("."+ this.name);
			let img = document.createElement("img");
			img.setAttribute("class", this.name + "-src");
			img.setAttribute("width", "100%");
			
			root.appendChild(parent);
			parent.appendChild(img);
			this.changable = true;
		}
		let el = $("."+ this.name +"-src");
	    this.readURL(this.file, el);
	}

	readURL(input, el){
		let name = this.name;
		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
	          el.attr('src', e.target.result);
		    }
		    reader.readAsDataURL(input.files[0]);
		    $("#"+ name +"-prev").css("display","table");
		}
	}
}

class validateYouTubeUrl {
	constructor(column, value) {
		this.column = column;
		this.value = value;
	}

	change(value) {
		var url = "https://www.youtube.com/watch?v="+this.value+"";
		if(value != ''){
			url = "https://www.youtube.com/watch?v="+value+"";
		}
        if (url != undefined || url != '') {        
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                // Do anything for being valid
                // if need to change the url to embed url then use below line
                // console.log(url);  
                // console.log($('#'+this.column+'-videoObject'));  
                $('#'+this.column+'-youtube').css("display", "table");
                var src = 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1';
                // console.log(src);
                $('#'+this.column+'-videoObject').attr('src', src);
            } else {
            	// console.log('not valid');  
                $('#'+this.column+'-youtube').css("display", "none");
                $('#'+this.column+'-youtube-parent-container').append('<span class="help-block">Not valid video code!</span>'); 
            }
        }
	}
}