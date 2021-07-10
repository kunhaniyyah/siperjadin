
@extends('layout.sidebar')
@extends('layout.nav-header')
@section('title', 'Halaman edit')
@push('custom-css')

@endpush

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Modal Examples
                </h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Launch Primary Modal
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                  Launch Secondary Modal
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  Launch Info Modal
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                  Launch Danger Modal
                </button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                  Launch Warning Modal
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                  Launch Success Modal
                </button>
                <br />
                <br />
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
                  Launch Small Modal
                </button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  Launch Large Modal
                </button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                  Launch Extra Large Modal
                </button>
                <br />
                <br />
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-overlay">
                  Launch Modal with Overlay
                </button>
                <div class="text-muted mt-3">
                  Instructions for how to use modals are available on the
                  <a href="https://getbootstrap.com/docs/4.4/components/modal/">Bootstrap documentation</a>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Toasts Examples <small>built in AdminLTE</small>
                </h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-default toastsDefaultDefault">
                  Launch Default Toast
                </button>
                <button type="button" class="btn btn-default toastsDefaultFull">
                  Launch Full Toast (with icon)
                </button>
                <button type="button" class="btn btn-default toastsDefaultFullImage">
                  Launch Full Toast (with image)
                </button>
                <button type="button" class="btn btn-default toastsDefaultAutohide">
                  Launch Default Toasts with autohide
                </button>
                <button type="button" class="btn btn-default toastsDefaultNotFixed">
                  Launch Default Toasts with not fixed
                </button>
                <br />
                <br />
                <button type="button" class="btn btn-default toastsDefaultTopLeft">
                  Launch Default Toast (topLeft)
                </button>
                <button type="button" class="btn btn-default toastsDefaultBottomRight">
                  Launch Default Toast (bottomRight)
                </button>
                <button type="button" class="btn btn-default toastsDefaultBottomLeft">
                  Launch Default Toast (bottomLeft)
                </button>
                <br />
                <br />
                <button type="button" class="btn btn-success toastsDefaultSuccess">
                  Launch Success Toast
                </button>
                <button type="button" class="btn btn-info toastsDefaultInfo">
                  Launch Info Toast
                </button>
                <button type="button" class="btn btn-warning toastsDefaultWarning">
                  Launch Warning Toast
                </button>
                <button type="button" class="btn btn-danger toastsDefaultDanger">
                  Launch Danger Toast
                </button>
                <button type="button" class="btn btn-default bg-maroon toastsDefaultMaroon">
                  Launch Maroon Toast
                </button>
                <div class="text-muted mt-3">

                </div>
              </div>
            </div>

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  SweetAlert2 Examples
                </h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button>
                <button type="button" class="btn btn-info swalDefaultInfo">
                  Launch Info Toast
                </button>
                <button type="button" class="btn btn-danger swalDefaultError">
                  Launch Error Toast
                </button>
                <button type="button" class="btn btn-warning swalDefaultWarning">
                  Launch Warning Toast
                </button>
                <button type="button" class="btn btn-default swalDefaultQuestion">
                  Launch Question Toast
                </button>
                <div class="text-muted mt-3">
                  For more examples look at <a href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Toastr Examples
                </h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-success toastrDefaultSuccess">
                  Launch Success Toast
                </button>
                <button type="button" class="btn btn-info toastrDefaultInfo">
                  Launch Info Toast
                </button>
                <button type="button" class="btn btn-danger toastrDefaultError">
                  Launch Error Toast
                </button>
                <button type="button" class="btn btn-warning toastrDefaultWarning">
                  Launch Warning Toast
                </button>
                <div class="text-muted mt-3">
                  For more examples look at <a href="https://codeseven.github.io/toastr/">https://codeseven.github.io/toastr/</a>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->
    
                <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@push('custom.js')

@endpush

