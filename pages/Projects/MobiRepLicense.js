let upload = document.getElementById('upload');


let ciflic = document.getElementById('ciflic');

upload.addEventListener('change', ()=>{
	//file reader 
	let fr = new FileReader();

	fr.readAsText(upload.files[0]);

	fr.onload = function(){
		ciflic.value = fr.result;
	};
});