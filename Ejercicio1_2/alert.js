const urlParams = new URLSearchParams(window.location.search);
const al = urlParams.get('alert');
if(al != null){
	setTimeout(()=>{
		alert(al);	
	},600)
}
