<x-dashboard.layout.layout title="Edit Content">
   
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
                 Edit Content
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               
                <form action="{{route('contents.update',$content->id)}}" method="POST">
                   @csrf
                   @method('PUT')
                   @include('dashboard.contents._form',[
                     'button_label'=>'Save'
                   ])
                </form>


            </div>
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