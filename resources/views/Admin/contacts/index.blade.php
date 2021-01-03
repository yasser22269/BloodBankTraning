@extends('Admin.layouts.app')

@section('title', 'contact Home')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">فصائل الدم</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('Admin') }}">الرئيسة</a></li>
          <li class="breadcrumb-item active">فصائل الدم</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">

        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>subject</th>
                    <th>message</th>
                    <th>client</th>
                    <th> Client's email</th>
                    <th> Client's Phone</th>
                    <th>control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)

                  <tr>
                    <td>{{  $contact->id}}</td>
                    <td>{{  $contact->subject}}</td>
                    <td>{{  Str::limit($contact->message, 30)  }}</td>


                    <td>{{  $contact->clients->name  }}</td>
                    <td>{{  $contact->clients->email  }}</td>
                    <td>{{  $contact->clients->phone  }}</td>

                    <td class="td-actions ">
                    <a href="{{ route('Admin.contacts.show',$contact->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-primary" data-original-title="show contacts">
                            <i class="material-icons">show</i>
                          </button>
                    </a>
                        <form action="{{ route('Admin.contacts.destroy',$contact->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove contact">
                          <i class="material-icons">Delete</i>
                        </button>
                        </form>


                      </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="text-center">
              {{ $contacts->links() }}
              </div>

            </div>

            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>

</div>

  @endsection
