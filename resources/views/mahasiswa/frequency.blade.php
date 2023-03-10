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
                <h6 class="m-0 font-weight-bold text-primary">Data Distribusi Frekuensi Mahasiswa</h6>
            </div>

            <div class="card-body">
                <!-- Table Data -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Score</th>
                                <th>Frequency</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($frequency as $index => $item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->score_freq}}</td>
                                <td>{{$item->frequency}}</td>    
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