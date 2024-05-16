@extends('admin.master')

@section('content')


<div class="row">
    <h3 class="mt-2 px-5">Xóa tin tức</h3>

    <div class="container mt-2 px-5  mb-2">
        <div class="card shadow">
            <div class="card-header">
                Xóa tin tức..
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.articles.destroy',$article->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    
                    <!--Tên sản phẩm-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Tiêu đề</h6>
                        <div class="col-sm-10">
                            <input type="text" name="name"
                                value="{{$article->name}}"
                                class="shadow form-control" readonly/>
                        </div>
                    </div>

                    <!--Mô tả ngắn-->
                    <div class="row mb-3">
                        <h6 class="text-dark col-sm-2 col-h6-form">Mô tả ngắn</h6>
                        <div class="col-sm-10">
                            <textarea readonly name="meta_description" maxlength="155"
                                
                                class="form-control"> {{ $article->meta_description }} </textarea>
                        </div>
                    </div>
                    <!--Tác giả-->
                    <div class="row mb-4 ">
                        <h6 class="text-dark  mb-2">Tác giả</h6>
                        <input type="text" name="author_id" value="{{ Auth::guard('admin')->id()}}"
                            class="shadow  form-control" hidden />
                        <div class="col-sm-10">
                            <input type="text" name="" value="{{ Auth::guard('admin')->user()->name}}"
                                class="shadow  form-control" readonly />
                        </div>
                    </div>
                    <!--image-->
                    <div class="row col-5 mb-4 ">
                        <h6 class="text-dark mb-2">Ảnh đại diện</h6>
                      
                        <img id="previewImage" src="{{asset('/img/article_images/' . $article->image_link) }}"
                            class="mt-2 img-thumbnail" alt="Preview">
                    </div>

                   
                    
                    <p>Bạn muốn xóa tin tức này chứ?</p>
                    <button type="submit" class="btn btn-danger">Có</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Không</a>
                </form>
            </div>
        </div>

    </div>
</div>






@endsection('content')