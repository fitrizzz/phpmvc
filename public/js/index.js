$(function(){

	$(".tombolTambahData").on("click", function () {
    	$("#formModalLabel").html("Tambah Data Mahasiswa");
		$(".modal-footer button[type=submit]").html("Tambah Data!");
  	});

	$(".tampilModalUbah").on('click',function(){
		$("#formModalLabel").html("Ubah Data Mahasiswa")
		$(".modal-footer button[type=submit]").html("Ubah Data!");
		$(".modal-body form").attr(
      "action","http://localhost/mvcphp/public/mahasiswa/ubah");

		let id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/mvcphp/public/mahasiswa/getubah',
			data: {id:id},
			method: "POST",
			dataType: 'json',
			success: function(data){
				// console.log(data);
				$("#nama").val(data.nama);
				$("#matrik_number").val(data.matrik_number);
				$("#email").val(data.email);
				$("#jurusan").val(data.jurusan);
				$("#id").val(data.id);
			}
		});
		
	});

});