<x-dashboard.layout.layout title="Create Category">
   
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
                 {{__('test.all_categories')}}
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @include('dashboard.categories._form',[
                    'button_label'=>'Create'
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