const audio = new Audio(base_url+'assets/sound/backsound.mp3');

function autoplay(){
	audio.play();
}

function backsound(stop) {
	// console.log(stop);
	if(stop == true){
		audio.pause();
		audio.currentTime = 0;
		document.getElementById('btn_play').classList.remove('d-none');
		document.getElementById('btn_stop').classList.add('d-none');
	}else{
		audio.play();
		document.getElementById('btn_play').classList.add('d-none');
		document.getElementById('btn_stop').classList.remove('d-none');
	}
}
