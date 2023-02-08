@extends('layouts.master')

@section('title')
    Daftar kelas
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar kelas</li>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('kelas.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
                <button onclick="cetakkelas('{{ route('kelas.cetak_kelas') }}')" class="btn btn-info btn-xs btn-flat"><i class="fa fa-id-card"></i> Cetak kelas</button>
            </div>
            <div class="box-body table-responsive">
                <form action="" method="post" class="form-kelas">
                    @csrf
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <th width="5%">
                                <input type="checkbox" name="select_all" id="select_all">
                            </th>
                            <th width="5%">No</th>
                            <th>Kode</th>
                            <th>jurusan</th>
                            <th>semester</th>
                           
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@includeIf('kelas.form')
@endsection

@push('scripts')

<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('kelas.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_kelas'},
                {data: 'jurusan'},
                {data: 'semester'},
              
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });

        $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah kelas');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=jurusan]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit kelas');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=jurusan]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=jurusan]').val(response.jurusan);
                $('#modal-form [name=semester]').val(response.semester);
                
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function cetakkelas(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang akan dicetak');
            return;
        } else {
            $('.form-kelas')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();
        }
    }
</script>
@endpush