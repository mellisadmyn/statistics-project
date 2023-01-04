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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Deskripsi Data Mahasiswa</h6>
            </div>

            <div class="card-body">
                <!-- Table Data -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Total Data</th>
                                <th>Average Score (Mean)</th>
                                <th>Minimum Score</th>
                                <th>Maximum Score</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $data['total'] }}</td>
                                <td>{{ $data['mean'] }}</td>
                                <td>{{ $data['min'] }}</td>
                                <td>{{ $data['max'] }}</td>  
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</x-page-layout>