<x-page-layout>
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">
            Update Data
        </h1>

        <a href="{{route('data-tunggal.index')}}" class="btn btn-primary mb-3">
            Data Mahasiswa
        </a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Data Mahasiswa</h6>
            </div>
            
            <div class="card-body">
                
                <div class="table-responsive">
                    
                    <form action="{{route('data-tunggal.update', $mahasiswa->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Name
                            </label>
                            <input type="text" class="form-control" name="nama" value="{{$mahasiswa->nama}}">
                        </div>
                        <div class="mb-3">
                            <label for="score" class="form-label">Score</label>
                            <input type="number" class="form-control" name="score" value="{{$mahasiswa->score}}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-page-layout>