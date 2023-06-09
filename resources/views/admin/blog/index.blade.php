@extends('layouts.admin')

@section('title', 'Bloglar ')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="template-demo">
                                <div class="card-body">
                                    <h4 style="font-size: large" class="card-title">Blog Listesi</h4>
                                    <div class="col-sm-push-6">
                                        <a href="/admin/blog/create" class="btn btn-md btn-inverse-primary btn-fw">Blog Ekle</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Kullanıcı</th>
                                                <th>Kategori</th>
                                                <th>Başlık</th>
                                                <th>Fotoğraf</th>
                                                <th>Durumu</th>
                                                <th>Düzelt</th>
                                                <th>Sil</th>
                                                <th>Göster</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $rs)
                                                <tr>
                                                    <td>{{$rs->id}}</td>
                                                    @foreach($user as $temp)
                                                        @if($rs->user_id==$temp->id)
                                                            <td>{{$temp->name}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs->category,$rs->category->title)}}</td>
                                                    <td>{{$rs->title}}</td>
                                                    <td>
                                                        @if($rs->image)
                                                            <img src="{{Storage::url($rs->image)}}"
                                                                 style="border-radius:2px;width:100%;height:100%">
                                                        @endif
                                                    </td>
                                                    <td>{{$rs->status}}</td>
                                                    <td><a href="/admin/blog/edit/{{$rs->id}}"
                                                           class="btn btn-primary btn-rounded btn-fw">Düzelt</a></td>
                                                    <td style="text-align: center">
                                                        <a class="btn btn-danger btn-rounded btn-fw"
                                                           style="color: white;"
                                                           href="{{route('admin_blog_delete',['id'=>$rs->id])}}"
                                                           ,
                                                           onclick="return confirm('Delete Are You Sure ?')">Sil</a>
                                                    </td>
                                                    <td><a href="/admin/blog/show/{{$rs->id}}"
                                                           class="btn btn-success btn-rounded btn-fw">Göster</a></td>
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