const notifData = $('.notif-data').data('notifdata');

if(notifData) {
	Swal.fire({
	  title: 'Data Barang !',
	  text: 'Berhasil '  + notifData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-barang').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Hapus Barang",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifDatakat = $('.notif-datakat').data('notifdatakat');

if(notifDatakat) {
	Swal.fire({
	  title: 'Data Kategori !',
	  text: 'Berhasil '  + notifDatakat,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-kategori').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Hapus Kategori",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});


const notifDatajns = $('.notif-datajns').data('notifdatajns');

if(notifDatajns) {
	Swal.fire({
	  title: 'Data Jenis !',
	  text: 'Berhasil '  + notifDatajns,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-jenis').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Hapus Jenis",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});


const notifDatasat = $('.notif-datasat').data('notifdatasat');

if(notifDatasat) {
	Swal.fire({
	  title: 'Data Satuan !',
	  text: 'Berhasil '  + notifDatasat,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-satuan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Hapus Satuan",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifPermintaan = $('.notif-permintaan').data('notifpermintaan');

if(notifPermintaan) {
	Swal.fire({
	  title: 'Permintaan !',
	  text: 'Berhasil '  + notifPermintaan,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('#keluarkan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Logout ?',
	  text: "Yakin Logout ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

$('.approve-permintaan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Approve ?',
	  text: "Setuju Permintaan Barang",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

$('.app-permintaan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Approve',
	  text: "Approve Permintaan Barang ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});


const notifApprove = $('.notif-approve').data('notifapprove');

if(notifApprove) {
	Swal.fire({
	  title: 'Approve !',
	  text:  notifApprove,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

const notifSupplier = $('.notif-supplier').data('notifsupplier');

if(notifSupplier) {
	Swal.fire({
	  title: 'Supplier !',
	  text: 'Berhasil' + notifSupplier,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-supplier').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Supplier ?',
	  text: "Hapus Supplier",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifPengadaan = $('.notif-pengadaan').data('notifpengadaan');

if(notifPengadaan) {
	Swal.fire({
	  title: 'Pengadaan !',
	  text: 'Berhasil' + notifPengadaan,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-pengadaan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Pengadaan ?',
	  text: "Hapus Pengadaan",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifApproveada = $('.notif-approvepengadaan').data('notifapprovepengadaan');

if(notifApproveada) {
	Swal.fire({
	  title: 'Approve Pengadaan !',
	  text: 'Berhasil '  + notifApproveada,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.approve-terima-pengadaan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Approve Pengadaan Barang",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yakin'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

$('.approve-tolak-pengadaan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Tolak Pengadaan Barang",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yakin'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifDataproduksi = $('.notif-dataproduksi').data('notifdataproduksi');

if(notifDataproduksi) {
	Swal.fire({
	  title: 'Data Produksi !',
	  text: 'Berhasil '  + notifDataproduksi,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-produksi').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Apakah Anda Yakin ?',
	  text: "Hapus Produksi",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifSupplierpemesanan = $('.notif-supplierpemesanan').data('notifsupplierpemesanan');

if(notifSupplierpemesanan) {
	Swal.fire({
	  title: 'Pemesanan !',
	  text:  notifSupplierpemesanan,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

const notifPesannya = $('.notif-permintaanpesannya').data('notifpermintaanpesannya');

if(notifPesannya) {
	Swal.fire({
	  title: 'Pesan !',
	  text: 'Berhasil '  + notifPesannya,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-pesannya').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Yakin ?',
	  text: "Hapus Pesan",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

$('.terima-pesan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Pesan ',
	  text: "Pesan Diterima ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifstaff = $('.notif-staff').data('notifstaff');

if(notifstaff) {
	Swal.fire({
	  title: 'Data Kepala Cabang !',
	  text: 'Berhasil '  + notifstaff,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-staff').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Data Staff ',
	  text: "Hapus Staff ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifkar = $('.notif-kar').data('notifkar');

if(notifkar) {
	Swal.fire({
	  title: 'Data Karyawan !',
	  text: 'Berhasil '  + notifkar,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-kar').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Data Karyawan ',
	  text: "Hapus Karyawan ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const notifBaku = $('.notif-baku').data('notifbaku');

if(notifBaku) {
	Swal.fire({
	  title: 'Bahan Baku !',
	  text: 'Berhasil '  + notifBaku,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-baku').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Bahan Baku ',
	  text: "Hapus ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});