<x-dashboard.layout.layout title="Categories">
   
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <x-dashboard.success_alert key="success" />
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                   All Contents
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th colspan="2">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->name[Session::get('local',config('app.locale'))]}}</td>
                            <td>{{$category->description[Session::get('local',config('app.locale'))]}}</td>
                            <td>
                                {{$category->status}}
                            </td>
                            <td>{{($category->created_at) ? $category->created_at->format('d/m/Y') : 'null'}}</td>
                            <td class="d-flex">
                                <a href="{{route('categories.edit',$category->id)}}" class="mr-2 btn btn-primary">
                                    Edit
                                </a>
                                <form action="{{route('categories.soft.delete',$category->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Soft Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
             
                  </tbody>
                </table>
              </div>
              {{$categories->links()}}

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    

</x-dashboard.layout.layout>