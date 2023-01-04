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
                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa Bergolong</h6>
            </div>

            <div class="card-body">
                <!-- Table Data -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Data Range</th>
                                <th>Frequency</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rangedata as $index => $item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item}}</td>
                                <td>{{$frequency[$index]}}</td>
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