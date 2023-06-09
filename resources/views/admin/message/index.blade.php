@extends('layouts.admin')

@section('title', 'İletişim Formu Mesaj Listesi ')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="template-demo">
                                <div class="card-body">
                                    <h4 style="font-size: large" class="card-title">Mesaj Listesi</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>İsim</th>
                                                <th>Email</th>
                                                <th>Mesaj</th>
                                                <th>Durumu</th>
                                                <th>Sil</th>
                                                <th>Göster</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $rs)

                                                <tr>
                                                    <td>{{$rs->id}}</td>
                                                    <td>{{$rs->name}}</td>
                                                    <td>{{$rs->email}}</td>
                                                    <td>{{$rs->message}}</td>
                                                    <td>{{$rs->status}}</td>
                                                    <td style="text-align: center">
                                                        <a class="btn btn-danger btn-rounded btn-fw"
                                                           style="color: white;"
                                                           href="{{route('admin_message_delete',['id'=>$rs->id])}}"
                                                           ,
                                                           onclick="return confirm('Delete Are You Sure ?')">Sil</a>
                                                    </td>
                                                    <td><a href="/admin/message/show/{{$rs->id}}"
                                                           class="btn btn-success btn-rounded btn-fw"
                                                           onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">Göster</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')

@endsection