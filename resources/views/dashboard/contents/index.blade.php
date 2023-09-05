<x-dashboard.layout.layout title="Contents">

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
                   All Categories
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
                    <th>Category</th>

                    <th>Created At</th>
                    <th colspan="2">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($contents as $content )
                        <tr>
                            <td>{{$content->title[Session::get('local',config('app.locale'))]}}</td>
                            <td>
                              <button class="btn btn-primary">Click to view</button>
                            </td>
                            <td>{{$content->status}}</td>
                            <td>{{$content->category->name[Session::get('local',config('app.locale'))]}}</td>

                            <td>{{($content->created_at) ? $content->created_at->format('d/m/Y') :'null'}}</td>
                            <td class="d-flex">
                                <a href="{{route('contents.edit',$content->id)}}" class="mr-2 btn btn-primary">
                                    Edit
                                </a>
                                <form action="{{route('contents.destroy',$content->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
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
              {{-- {{$categories->links()}} --}}

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