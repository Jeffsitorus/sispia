$('#tableAlumni').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
  "columnDefs": [
    {
      "targets": [-1, 6, 7, 5],
      "orderable": false,
      "searchable": false,
    },
  ],
});

$('#laporanAlumni').DataTable({
  "language": {
    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
    "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
    "info": "Menampilkan halaman _PAGE_ of _PAGES_",
    "infoEmpty": "Data tidak tersedia",
    "infoFiltered": "(filtered from _MAX_ total records)"
  },
});