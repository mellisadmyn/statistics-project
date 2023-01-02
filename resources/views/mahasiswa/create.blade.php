<x-page-layout>
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">
            Add Data Mahasiswa
        </h1>

        <a href="{{route('data-tunggal.index')}}" class="btn btn-primary mb-3">
            Data Mahasiswa
        </a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            
            <div class="card-body">
                
                <div class="table-responsive">
                    
                    <form action="{{route('data-tunggal.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Name
                            </label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="score" class="form-label">Score</label>
                            <input type="number" class="form-control" name="score">
                        </div>
                        
                        <div class="justify-items-end">
                            <button type="submit" class="btn btn-primary text-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-page-layout>