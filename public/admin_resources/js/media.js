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