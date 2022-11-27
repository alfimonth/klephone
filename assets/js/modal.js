$(function(){
    $('.hapus').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        var u = 'http://localhost/klephone/produk/hapus/'

        $('#dihapus').html(nama);
        document.querySelector('#linkHapus').href = u+id;
    });
});
$(function(){
    $('.hapus-brand').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        var u = 'http://localhost/klephone/brand/hapus/'

        $('#dihapus').html(nama);
        document.querySelector('#linkHapus').href = u+id;
    });
});