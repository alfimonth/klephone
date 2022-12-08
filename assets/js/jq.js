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
$(function(){
    $('.hapus-sup').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        var u = 'http://localhost/klephone/supplier/hapus/'

        $('#dihapus').html(nama);
        document.querySelector('#linkHapus').href = u+id;
    });
});
$(function(){
    $('.hapus-cos').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        var u = 'http://localhost/klephone/costumer/hapus/'

        $('#dihapus').html(nama);
        document.querySelector('#linkHapus').href = u+id;
    });
});
$(function(){
    $('.hapus-user').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        var u = 'http://localhost/klephone/user/hapus/'

        $('#dihapus').html(nama);
        document.querySelector('#linkHapus').href = u+id;
    });
});
$(function(){
    $('.ganti-role').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const role = $(this).data('role');

        document.querySelector('#namec').value=nama;
        document.querySelector('#idc').setAttribute('value',id);
        let idr = document.querySelectorAll('.idr')
        idr.forEach(i => {
            if(i.id == role ){
                i.selected = 'selected';
            }
        });
        
    });
});