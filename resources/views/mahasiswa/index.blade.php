<x-page-layout>
    <!-- Begin Table Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            Tables
        </h1>

        <!-- Table -->
        <div class="card shadow mb-4">
            <!-- Table Heading -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mahasiswa Data Table</h6>
            </div>

            <div class="card-body">
                <!-- Button Add Data -->
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                    <a href="{{route('mahasiswa.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>  Add Data</a>
                </div>
                {{-- <div>
                    <a href="{{route('mahasiswa.create')}}" class="btn btn-primary float-end mb-3 p-32">
                        Add Data
                    </a>
                </div> --}}

                <!-- Table Data -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->score}}</td>
                                <td>
                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}"
                                            class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm">
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

    </div>
    <!-- /.container-fluid -->
</x-page-layout>