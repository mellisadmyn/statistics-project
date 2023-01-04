<x-page-layout>
    <!-- Begin Table Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">
            Pengolahan Data
        </h1>

        <!-- Table -->
        <div class="card shadow mb-4">
            <!-- Table Heading -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tunggal Mahasiswa</h6>
            </div>

            <div class="card-body">
                <!-- Button Add Data and Excel-->
                <div class="d-flex pb-1">
                    <div class="mr-auto pb-2">
                        <a href="{{route('data-tunggal.create')}}"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-plus fa-sm text-white-50"></i> Add Data</a>
                    </div>

                    <div class="pb-2 pr-2">
                        <a href="#import-data" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            data-toggle="modal" data-target="#modalImportDataForm"><i
                                class="fas fa-upload fa-sm text-white-50"></i> Import Data</a>
                    </div>

                    <div class="pb-2 pr-2">
                        <a href="{{route('export-data')}}"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Export Data</a>
                    </div>
                </div>

                <!-- Table Data -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($mahasiswa as $index => $item)
                            <tr>
                                <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                <td>{{$index + 1}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->score}}</td>
                                <td>
                                    <form action="{{ route('data-tunggal.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('data-tunggal.edit', $item->id) }}"
                                            class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm btndelete" onclick="return confirm('Are you sure want to remove this data?')"> 
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalImportDataForm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100">Import Data File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/import-data" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="md-form">
                                @csrf
                                <label class="form-label" for="file">Choose a file (.xlsx)</label>
                                <input type="file" class="form-control" id="file" name="file" required />
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    {{-- konfirmasi delete masih error --}}
    <script>
        $(document).ready(function () {
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $('.btndelete').click(function (e) {
                e.preventDefault();
    
                var deleteid = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };

                            $.ajax({
                                type: "DELETE",
                                url: 'data-tunggal/' + deleteid,
                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });
        });
    </script> 
    
    {{-- <script>
        function deleteConfirm() {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete').submit();
                }
            })
        }
    </script> --}}
</x-page-layout>